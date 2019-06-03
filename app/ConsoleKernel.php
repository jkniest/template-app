<?php

namespace App;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel;

class ConsoleKernel extends Kernel
{
    protected function schedule(Schedule $schedule): void
    {
        //
    }

    protected function commands(): void
    {
        collect(Modules::ALL)->each(function (string $module) {
            $this->load(app_path("Application/{$module}/Commands"));
        });
    }
}
