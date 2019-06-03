<?php

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
            'name'     => ['required', 'min:3'],
            'email'    => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ];
    }
}
