<?php

declare(strict_types=1);

namespace App;

use Exception;
use Illuminate\Foundation\Exceptions\Handler;

class ExceptionHandler extends Handler
{
    public function report(Exception $exception)
    {
        if ($this->shouldReport($exception) && app()->bound('sentry')) {
            app('sentry')->captureException($exception);
        }

        return parent::report($exception);
    }
}
