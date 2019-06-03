<?php

namespace App\Domain\Users\ApiControllers;

use App\Domain\Users\Actions\UpdateUserAction;
use App\Domain\Users\Models\User;
use App\Domain\Users\Requests\UpdateUserRequest;
use App\Domain\Users\Resources\UserResource;
use Illuminate\Http\JsonResponse;

class UpdateUsersController
{
    public function __invoke(User $user, UpdateUserRequest $request, UpdateUserAction $action): JsonResponse
    {
        $action->execute($user, $request);

        return new JsonResponse([
            'message' => 'User successfully updated.',
            'data'    => new UserResource($user->fresh()),
        ]);
    }
}
