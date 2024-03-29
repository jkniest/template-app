<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\Str;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerPolicies();
        Passport::routes();

        Gate::guessPolicyNamesUsing(static function (string $model): ?string {
            if (Str::startsWith($model, 'Laravel')) {
                return null;
            }

            /** @var string $replace */
            $replace = str_replace('Models', 'Policies', $model);

            return $replace.'Policy';
        });
    }
}
