<?php

declare(strict_types=1);

namespace App\Domain\Users\ApiControllers;

use App\Domain\Users\Models\User;
use Spatie\QueryBuilder\QueryBuilder;
use App\Domain\Users\Resources\UserResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BrowseUsersController
{
    /**
     * Browse all existing users.
     *
     * @group Users
     * @queryParam page The page which should be shown
     * @queryParam filters[name] Optional name which should be filtered
     * @queryParam fields[users] Define fields which should be loaded
     * @authenticated
     * @responseFile responses/users.browse.json
     */
    public function __invoke(): AnonymousResourceCollection
    {
        $query = QueryBuilder::for(User::class)
            ->allowedFilters(['name'])
            ->paginate();

        return UserResource::collection($query);
    }
}
