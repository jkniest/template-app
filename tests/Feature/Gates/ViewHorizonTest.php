<?php

declare(strict_types=1);

namespace Tests\Feature\Gates;

use Tests\TestCase;
use App\Domain\Users\Models\User;

class ViewHorizonTest extends TestCase
{
    /** @test */
    public function it_is_visible_for_administrator(): void
    {
        $admin = factory(User::class)->state('admin')->create();

        $this->assertTrue($admin->can('viewHorizon'));
    }

    /** @test */
    public function it_is_not_visible_for_normal_users(): void
    {
        $member = factory(User::class)->create();

        $this->assertFalse($member->can('viewHorizon'));
    }
}
