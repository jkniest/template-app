<?php

declare(strict_types=1);

namespace App\Domain\Users\ApiControllers;

use App\Domain\Users\Models\User;
use Spatie\QueryBuilder\QueryBuilder;
use App\Domain\Users\Resources\UserResource;

class ReadUsersController
{
    /**
     * Read a specific user.
     *
     * @group Users
     * @queryParam user required The uuid of the user
     * @authenticated
     * @responseFile responses/users.read.json
     */
    public function __invoke(User $user): UserResource
    {
        $query = QueryBuilder::for(User::class)
            ->find($user->getKey());

        return new UserResource($query);
    }
}
