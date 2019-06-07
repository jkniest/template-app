<?php

declare(strict_types=1);

namespace Tests\Feature\Users\Api;

use Tests\Api\BrowseApiTestCase;
use App\Domain\Users\Models\User;

class BrowseUsersTest extends BrowseApiTestCase
{
    /** @test */
    public function it_can_browse_all_users(): void
    {
        $users = factory(User::class, 20)->create();
        $this->browse('users', $users);
    }

    /** @test */
    public function it_can_filter_by_name(): void
    {
        $user1 = factory(User::class)->create(['name' => 'First user']);
        $user2 = factory(User::class)->create(['name' => 'Member 2']);
        $user3 = factory(User::class)->create(['name' => 'User three!']);

        $this->browseWithFilter('users', [$user1, $user3], [$user2], ['name' => 'user']);
    }
}
