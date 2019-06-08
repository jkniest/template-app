<?php

declare(strict_types=1);

namespace App\Domain\Users\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::user()->can('update', $this->user);
    }

    public function rules(): array
    {
        return [
            'name'  => ['nullable', 'min:3', 'max:250'],
            'email' => ['nullable', 'email'],
        ];
    }
}
