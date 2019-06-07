<?php

declare(strict_types=1);

namespace App;

use Illuminate\Foundation\Console\Kernel;
use Illuminate\Console\Scheduling\Schedule;

class ConsoleKernel extends Kernel
{
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('backup:clean')->daily()->at('01:00');
        $schedule->command('backup:run')->daily()->at('02:00');
        $schedule->command('backup:monitor')->daily()->at('03:00');
    }

    protected function commands(): void
    {
        collect(Modules::ALL)->each(function (string $module): void {
            $this->load(app_path("Application/{$module}/Commands"));
        });
    }
}
