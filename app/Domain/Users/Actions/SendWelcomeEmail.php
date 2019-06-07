<?php

declare(strict_types=1);

namespace App\Domain\Users\Actions;

use App\Domain\Users\Models\User;
use Illuminate\Support\Facades\Log;
use Spatie\QueueableAction\QueueableAction;

class SendWelcomeEmail
{
    use QueueableAction;

    public function execute(User $user): void
    {
        Log::info('Sending e-mail to: '.$user->email);
    }
}
