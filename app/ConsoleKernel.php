<?php

namespace App;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel;

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
        collect(Modules::ALL)->each(function (string $module) {
            $this->load(app_path("Application/{$module}/Commands"));
        });
    }
}
