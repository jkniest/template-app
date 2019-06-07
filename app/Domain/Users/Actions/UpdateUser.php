<?php

declare(strict_types=1);

namespace App\Domain\Users\Actions;

use Illuminate\Http\Request;
use App\Domain\Users\Models\User;

class UpdateUser
{
    public function execute(User $user, Request $request): void
    {
        $user->update($request->only(['name', 'email']));
    }
}
