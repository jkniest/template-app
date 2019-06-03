<?php

namespace App\Domain\Users\ApiControllers;

use App\Domain\Users\Actions\CreateUserAction;
use App\Domain\Users\Requests\CreateUserRequest;
use App\Domain\Users\Resources\UserResource;
use Illuminate\Http\JsonResponse;

class CreateUsersController
{
    public function __invoke(CreateUserRequest $request, CreateUserAction $action): JsonResponse
    {
        $user = $action->execute($request);

        return new JsonResponse([
            'message' => 'User successfully created.',
            'data'    => new UserResource($user->fresh()),
        ]);
    }
}
