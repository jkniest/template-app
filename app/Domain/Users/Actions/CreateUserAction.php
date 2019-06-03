<?php

namespace App\Domain\Users\Actions;

use App\Domain\Users\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CreateUserAction
{
    public function execute(Request $request): User
    {
        return User::create(array_merge($request->only(['name', 'email']), [
            'password' => Hash::make($request->get('password'))
        ]));
    }
}
