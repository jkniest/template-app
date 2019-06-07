<?php

declare(strict_types=1);

namespace Tests\Unit\Domain\Users\Actions;

use Tests\TestCase;
use Illuminate\Http\Request;
use App\Domain\Users\Models\User;
use App\Domain\Users\Actions\UpdateUser;

class UpdateUserTest extends TestCase
{
    /** @test */
    public function it_can_update_users(): void
    {
        $action = new UpdateUser();

        $request = $this->prophesize(Request::class);
        $request->only(['name', 'email'])->willReturn([
            'name'  => 'New John',
            'email' => 'new@example.com',
        ]);

        $user = factory(User::class)->create();

        $action->execute($user, $request->reveal());

        $user->refresh();
        $this->assertSame('New John', $user->name);
        $this->assertSame('new@example.com', $user->email);
    }
}
