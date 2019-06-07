<?php

declare(strict_types=1);

namespace Tests\Unit\Domain\Users\Actions;

use Tests\TestCase;
use App\Domain\Users\Models\User;
use App\Domain\Users\Actions\DeleteUser;

class DeleteUserTest extends TestCase
{
    /** @test */
    public function it_can_delete_users(): void
    {
        $action = new DeleteUser();

        $user = $this->prophesize(User::class);
        $user->delete()->shouldBeCalledOnce();

        $action->execute($user->reveal());
    }
}
