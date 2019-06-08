<?php

namespace App\Domain\Users\Policies;

use App\Domain\Users\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(): bool
    {
        return true;
    }

    public function view(): bool
    {
        return true;
    }

    public function create(User $signedIn): bool
    {
        return $signedIn->is_admin;
    }

    public function update(User $signedIn, User $target): bool
    {
        return $signedIn->is_admin || $signedIn->is($target);
    }

    public function delete(User $signedIn, User $target): bool
    {
        return $signedIn->is_admin || $signedIn->is($target);
    }
}
