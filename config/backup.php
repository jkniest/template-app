<?php

use Spatie\Backup\Notifications\Notifiable;
use Spatie\Backup\Notifications\Notifications\BackupHasFailed;
use Spatie\Backup\Notifications\Notifications\BackupWasSuccessful;
use Spatie\Backup\Notifications\Notifications\CleanupHasFailed;
use Spatie\Backup\Notifications\Notifications\CleanupWasSuccessful;
use Spatie\Backup\Notifications\Notifications\HealthyBackupWasFound;
use Spatie\Backup\Notifications\Notifications\UnhealthyBackupWasFound;
use Spatie\Backup\Tasks\Cleanup\Strategies\DefaultStrategy;
use Spatie\Backup\Tasks\Monitor\HealthChecks\MaximumAgeInDays;
use Spatie\Backup\Tasks\Monitor\HealthChecks\MaximumStorageInMegabytes;

return [
    'backup' => [
        'name' => env('APP_NAME', 'laravel-backup'),

        'source' => [
            'files' => [
                'include' => [
                    base_path(),
                ],

                'exclude' => [
                    base_path('vendor'),
                    base_path('node_modules'),
                ],

                'follow_links' => false,
            ],

            'databases' => [
                'pgsql',
            ],
        ],

        'database_dump_compressor' => null,

        'destination' => [
            'filename_prefix' => '',

            'disks' => [
                'local',
                's3',
            ],
        ],

        'temporary_directory' => storage_path('app/backup-temp'),
    ],

    'notifications'   => [

        'notifications' => [
            BackupHasFailed::class         => ['mail', 'slack'],
            UnhealthyBackupWasFound::class => ['mail', 'slack'],
            CleanupHasFailed::class        => ['mail', 'slack'],
            BackupWasSuccessful::class     => [],
            HealthyBackupWasFound::class   => [],
            CleanupWasSuccessful::class    => [],
        ],

        'notifiable' => Notifiable::class,

        'mail' => [
            'to' => env('BACKUP_ALERT_MAIL'),
        ],

        'slack' => [
            'webhook_url' => env('BACKUP_ALERT_SLACK_WEBHOOK'),

            /*
             * If this is set to null the default channel of the webhook will be used.
             */
            'channel'     => null,

            'username' => null,

            'icon' => null,

        ],
    ],

    /*
     * Here you can specify which backups should be monitored.
     * If a backup does not meet the specified requirements the
     * UnHealthyBackupWasFound event will be fired.
     */
    'monitor_backups' => [
        [
            'name'          => env('APP_NAME', 'laravel-backup'),
            'disks'         => ['local', 's3'],
            'health_checks' => [
                MaximumAgeInDays::class          => 1,
                MaximumStorageInMegabytes::class => 5000,
            ],
        ],
    ],

    'cleanup' => [
        'strategy' => DefaultStrategy::class,

        'default_strategy' => [
            'keep_all_backups_for_days'                            => 7,
            'keep_daily_backups_for_days'                          => 16,
            'keep_weekly_backups_for_weeks'                        => 8,
            'keep_monthly_backups_for_months'                      => 4,
            'keep_yearly_backups_for_years'                        => 2,
            'delete_oldest_backups_when_using_more_megabytes_than' => 5000,
        ],
    ],
];
