<?php

declare(strict_types=1);

namespace App\Domain\Users\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class DeleteUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::user()->can('delete', $this->user);
    }

    public function rules(): array
    {
        return [];
    }
}
