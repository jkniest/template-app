<?php

declare(strict_types=1);

namespace Tests\Feature\Users\Api;

use Tests\Api\ReadApiTestCase;
use App\Domain\Users\Models\User;

class ReadUsersTest extends ReadApiTestCase
{
    /** @test */
    public function it_can_read_specific_users(): void
    {
        $this->signInApi();

        $user = factory(User::class)->create();

        $this->read('users', $user);
    }

    /** @test */
    public function it_requires_an_authenticated_user(): void
    {
        $user = factory(User::class)->create();

        $this->readUnauthenticated('users', $user);
    }
}
