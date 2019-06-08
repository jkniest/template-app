<?php

declare(strict_types=1);

namespace App\Domain\Users\Requests;

use App\Domain\Users\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::user()->can('create', User::class);
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
