<?php

declare(strict_types=1);

namespace App\Domain\Users\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class DeleteUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        $user = Auth::user();
        if (!$user) {
            return false;
        }

        return $user->can('delete', $this->user);
    }

    public function rules(): array
    {
        return [];
    }
}
