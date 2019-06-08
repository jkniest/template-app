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
        $this->signInApi();

        $user = factory(User::class)->create();

        $this->destroy($user, 'users');
    }

    /** @test */
    public function it_requires_an_authenticated_user(): void
    {
        $user = factory(User::class)->create();

        $this->destroyUnauthenticated($user, 'users');
    }

    /** @test */
    public function it_prevents_normal_users_to_delete_other_users(): void
    {
        $this->signInApi(factory(User::class)->create());
        $user = factory(User::class)->create();

        $this->destroyUnauthorized($user, 'users');
    }

    /** @test */
    public function it_allows_administrators_to_delete_all_users(): void
    {
        $this->signInApi();
        $user = factory(User::class)->create();
        $this->destroy($user, 'users');
    }

    /** @test */
    public function it_allows_users_to_delete_themself(): void
    {
        $user = factory(User::class)->create();
        $this->signInApi($user);
        $this->destroy($user, 'users');
    }
}
