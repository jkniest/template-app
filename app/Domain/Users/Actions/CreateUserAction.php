<?php

declare(strict_types=1);

namespace App\Domain\Users\Actions;

use Illuminate\Http\Request;
use App\Domain\Users\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUserAction
{
    public function execute(Request $request): User
    {
        return User::create(array_merge($request->only(['name', 'email']), [
            'password' => Hash::make($request->get('password')),
        ]));
    }
}
