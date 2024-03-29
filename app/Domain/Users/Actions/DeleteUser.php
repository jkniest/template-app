<?php

declare(strict_types=1);

namespace App\Domain\Users\Actions;

use App\Domain\Users\Models\User;

class DeleteUser
{
    public function execute(User $user): void
    {
        $user->delete();
    }
}
