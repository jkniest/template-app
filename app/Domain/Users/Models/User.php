<?php

declare(strict_types=1);

namespace App\Domain\Users\Models;

use App\Models\HasUuid;
use Laravel\Scout\Searchable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasUuid, HasApiTokens, Searchable;

    /** @var array */
    protected $guarded = [];

    /** @var string[] */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
