<?php

declare(strict_types=1);

return [
    'dsn'         => env('SENTRY_LARAVEL_DSN', env('SENTRY_DSN')),
    'release'     => trim(exec('git --git-dir '.base_path('.git').' log --pretty="%h" -n1 HEAD')),
    'breadcrumbs' => [
        'sql_bindings' => true,
    ],
];
