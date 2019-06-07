<?php

declare(strict_types=1);

namespace App\Domain\Users\ApiControllers;

use App\Domain\Users\Models\User;
use Illuminate\Http\JsonResponse;
use App\Domain\Users\Actions\DeleteUserAction;
use App\Domain\Users\Requests\DeleteUserRequest;

class DeleteUsersController
{
    /**
     * Delete a specific user.
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
