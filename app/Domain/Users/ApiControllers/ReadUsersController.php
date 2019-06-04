<?php


namespace App\Domain\Users\ApiControllers;

use App\Domain\Users\Models\User;
use App\Domain\Users\Resources\UserResource;
use Spatie\QueryBuilder\QueryBuilder;

class ReadUsersController
{
    /**
     * Read a specific user
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
