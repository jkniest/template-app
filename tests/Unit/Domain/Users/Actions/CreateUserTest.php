<?php

declare(strict_types=1);

namespace Tests\Unit\Domain\Users\Actions;

use Tests\TestCase;
use Illuminate\Http\Request;
use App\Domain\Users\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Domain\Users\Actions\CreateUser;

class CreateUserTest extends TestCase
{
    /** @test */
    public function it_can_create_users(): void
    {
        $action = new CreateUser();

        $request = $this->prophesize(Request::class);
        $request->only(['name', 'email'])->willReturn([
            'name'  => 'Jon Snow',
            'email' => 'jon@example.com',
        ]);
        $request->get('password')->willReturn('the-wall-123');

        $user = $action->execute($request->reveal());
        $this->assertSame('Jon Snow', $user->name);
        $this->assertSame('jon@example.com', $user->email);
        $this->assertTrue(Hash::check('the-wall-123', $user->password));

        $this->assertCount(1, User::all());
        $this->assertTrue(User::first()->is($user));
    }
}
