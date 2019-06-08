<?php

declare(strict_types=1);

namespace App\Domain\Users\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'  => ['nullable', 'min:3', 'max:250'],
            'email' => ['nullable', 'email'],
        ];
    }
}
