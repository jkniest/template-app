<?php

declare(strict_types=1);

namespace App\Domain\Users\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use App\Controllers\Controller;
use App\Domain\Users\Models\User;

class ReadUsersController extends Controller
{
    public function __invoke(User $user): Response
    {
        return Inertia::render('Users/Read', [
            'user' => $user,
        ]);
    }
}
