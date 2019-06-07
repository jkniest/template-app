<?php

declare(strict_types=1);

namespace App\Domain\Users\ApiControllers;

use Illuminate\Http\JsonResponse;
use App\Domain\Users\Resources\UserResource;
use App\Domain\Users\Actions\CreateUserAction;
use App\Domain\Users\Requests\CreateUserRequest;

class CreateUsersController
{
    /**
     * Create a new user.
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
