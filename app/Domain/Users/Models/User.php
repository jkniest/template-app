<?php

declare(strict_types=1);

namespace App\Domain\Users\Models;

use App\Models\HasUuid;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasUuid, HasApiTokens;

    /** @var array */
    protected $guarded = [];

    /** @var string[] */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
