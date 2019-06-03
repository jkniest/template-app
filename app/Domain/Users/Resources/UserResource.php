<?php

namespace App\Domain\Users\Resources;

use App\Domain\Users\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin User
 */
class UserResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
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
