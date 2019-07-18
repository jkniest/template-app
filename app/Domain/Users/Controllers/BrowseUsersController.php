<?php

declare(strict_types=1);

namespace App\Domain\Users\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use App\Controllers\Controller;
use App\Domain\Users\Models\User;

class BrowseUsersController extends Controller
{
    public function __invoke(): Response
    {
        return Inertia::render('Index', [
            'user' => User::first(),
        ]);
    }
}
