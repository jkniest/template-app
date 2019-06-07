<?php

declare(strict_types=1);

namespace App\Domain\Users\Resources;

use Illuminate\Http\Request;
use App\Domain\Users\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin User
 */
class UserResource extends JsonResource
{
    /**
     * @param Request $request
     */
    public function toArray($request): array
    {
        return [
            'uuid'  => $this->uuid,
            'name'  => $this->name,
            'email' => $this->email,
        ];
    }
}
