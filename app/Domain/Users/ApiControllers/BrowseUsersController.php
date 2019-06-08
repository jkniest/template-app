<?php

declare(strict_types=1);

namespace App\Domain\Users\ApiControllers;

use Illuminate\Http\Request;
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
    public function __invoke(Request $request): AnonymousResourceCollection
    {
        $results = null;
        if ($request->has('search')) {
            $results = User::search($request->get('search'))->get()->pluck('uuid');
        }

        $query = QueryBuilder::for(User::class)
            ->allowedFilters(['name']);

        if ($results) {
            $query->whereIn('uuid', $results);
        }

        return UserResource::collection($query->paginate());
    }
}
