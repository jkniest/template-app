<?php

declare(strict_types=1);

namespace App\Providers;

use Laravel\Horizon\Horizon;
use App\Domain\Users\Models\User;
use Illuminate\Support\Facades\Gate;
use Laravel\Horizon\HorizonApplicationServiceProvider;

class HorizonServiceProvider extends HorizonApplicationServiceProvider
{
    public function boot(): void
    {
        parent::boot();

        Horizon::routeMailNotificationsTo(config('services.horizon.mail'));
        Horizon::routeSlackNotificationsTo(config('services.horizon.slack'), config('services.horizon.slack-channel'));
    }

    protected function gate(): void
    {
        Gate::define('viewHorizon', static function (User $user) {
            return $user->is_admin;
        });
    }
}
