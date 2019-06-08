<?php

declare(strict_types=1);

namespace App\Domain\Users\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        $user = Auth::user();
        if (!$user) {
            return false;
        }

        return $user->can('update', $this->user);
    }

    public function rules(): array
    {
        return [
            'name'  => ['nullable', 'min:3', 'max:250'],
            'email' => ['nullable', 'email'],
        ];
    }
}
