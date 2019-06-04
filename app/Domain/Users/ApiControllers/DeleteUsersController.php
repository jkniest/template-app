<?php

namespace App\Domain\Users\ApiControllers;

use App\Domain\Users\Actions\DeleteUserAction;
use App\Domain\Users\Models\User;
use App\Domain\Users\Requests\DeleteUserRequest;
use Illuminate\Http\JsonResponse;

class DeleteUsersController
{
    /**
     * Delete a specific user
     *
     * @group Users
     * @queryParam user required The uuid of the user which should be deleted
     * @authenticated
     * @responseFile responses/users.delete.json
     */
    public function __invoke(User $user, DeleteUserRequest $request, DeleteUserAction $action): JsonResponse
    {
        $action->execute($user);

        return new JsonResponse([
            'message' => 'User successfully deleted.',
        ]);
    }
}
