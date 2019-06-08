<?php

declare(strict_types=1);

namespace App\Domain\Users\Requests;

use App\Domain\Users\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        $user = Auth::user();
        if (!$user) {
            return false;
        }

        return $user->can('create', User::class);
    }

    public function rules(): array
    {
        return [
            'name'     => ['required', 'min:3', 'max:250'],
            'email'    => ['required', 'email'],
            'password' => ['required', 'min:8', 'max:250'],
        ];
    }
}
