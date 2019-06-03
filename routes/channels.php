<?php

use App\Domain\Users\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.User.{id}', static function (User $user, string $uuid) {
    return $user->uuid === $uuid;
});
