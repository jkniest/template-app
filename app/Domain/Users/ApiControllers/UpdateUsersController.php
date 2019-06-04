<?php

namespace App\Domain\Users\ApiControllers;

use App\Domain\Users\Actions\UpdateUserAction;
use App\Domain\Users\Models\User;
use App\Domain\Users\Requests\UpdateUserRequest;
use App\Domain\Users\Resources\UserResource;
use Illuminate\Http\JsonResponse;

class UpdateUsersController
{
    /**
     * Update a user
     *
     * @group Users
     * @queryParam user required The uuid of the user which should be updated
     * @bodyParam name string The name of the new user
     * @bodyParam email string The e-mail address of the new user
     * @authenticated
     * @responseFile responses/users.update.json
     */
    public function __invoke(User $user, UpdateUserRequest $request, UpdateUserAction $action): JsonResponse
    {
        $action->execute($user, $request);

        return new JsonResponse([
            'message' => 'User successfully updated.',
            'data'    => new UserResource($user->fresh()),
        ]);
    }
}
