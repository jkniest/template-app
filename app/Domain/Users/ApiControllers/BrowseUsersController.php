<?php

namespace App\Domain\Users\ApiControllers;

use App\Domain\Users\Models\User;
use App\Domain\Users\Resources\UserResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Spatie\QueryBuilder\QueryBuilder;

class BrowseUsersController
{
    public function __invoke(): AnonymousResourceCollection
    {
        $query = QueryBuilder::for(User::class)
            ->allowedFilters(['name'])
            ->paginate();

        return UserResource::collection($query);
    }
}
