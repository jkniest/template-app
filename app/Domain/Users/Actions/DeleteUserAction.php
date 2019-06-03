<?php

namespace App\Domain\Users\Actions;

use App\Domain\Users\Models\User;

class DeleteUserAction
{
    public function execute(User $user): void
    {
        $user->delete();
    }
}
