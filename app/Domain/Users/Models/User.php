<?php

namespace App\Domain\Users\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /** @var array */
    protected $guarded = [];

    /** @var string[] */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
