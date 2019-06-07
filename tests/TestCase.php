<?php

declare(strict_types=1);

namespace Tests;

use App\Domain\Users\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    protected function signIn(?User $user = null): User
    {
        return tap($user ?? factory(User::class)->state('admin')->create(), static function (User $user): void {
            $this->be($user);
        });
    }
}
