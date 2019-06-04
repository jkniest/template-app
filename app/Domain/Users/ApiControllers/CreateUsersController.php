<?php

namespace App\Domain\Users\ApiControllers;

use App\Domain\Users\Actions\CreateUserAction;
use App\Domain\Users\Requests\CreateUserRequest;
use App\Domain\Users\Resources\UserResource;
use Illuminate\Http\JsonResponse;

class CreateUsersController
{
    /**
     * Create a new user
     *
     * @group Users
     * @bodyParam name string required The name of the new user
     * @bodyParam email string required The e-mail address of the new user
     * @bodyParam password string required The password of the new user
     * @authenticated
     * @responseFile responses/users.store.json
     */
    public function __invoke(CreateUserRequest $request, CreateUserAction $action): JsonResponse
    {
        $user = $action->execute($request);

        return new JsonResponse([
            'message' => 'User successfully created.',
            'data'    => new UserResource($user->fresh()),
        ]);
    }
}
