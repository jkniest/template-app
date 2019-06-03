<?php


namespace App\Domain\Users\ApiControllers;

use App\Domain\Users\Models\User;
use App\Domain\Users\Resources\UserResource;
use Spatie\QueryBuilder\QueryBuilder;

class ReadUsersController
{
    public function __invoke(User $user): UserResource
    {
        $query = QueryBuilder::for(User::class)
            ->find($user->getKey());

        return new UserResource($query);
    }
}
