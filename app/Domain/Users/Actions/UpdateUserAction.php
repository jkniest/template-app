<?php

namespace App\Domain\Users\Actions;

use App\Domain\Users\Models\User;
use Illuminate\Http\Request;

class UpdateUserAction
{
    public function execute(User $user, Request $request): void
    {
        $user->update($request->only(['name', 'email']));
    }
}
