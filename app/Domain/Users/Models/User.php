<?php

namespace App\Domain\Users\Models;

use App\Models\HasUuid;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasUuid;

    /** @var array */
    protected $guarded = [];

    /** @var string[] */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
