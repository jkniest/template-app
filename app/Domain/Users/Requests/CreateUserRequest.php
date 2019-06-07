<?php

declare(strict_types=1);

namespace App\Domain\Users\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
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
