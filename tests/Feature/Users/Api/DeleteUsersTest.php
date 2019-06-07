<?php

declare(strict_types=1);

namespace Tests\Feature\Users\Api;

use Tests\Api\DeleteApiTestCase;
use App\Domain\Users\Models\User;

class DeleteUsersTest extends DeleteApiTestCase
{
    /** @test */
    public function it_can_delete_a_user(): void
    {
        $user = factory(User::class)->create();

        $this->destroy($user, 'users');
    }
}
