<?php

namespace App\Domains\Users;

use Codecasts\Presenter\Presentable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Presentable, Notifiable;

    protected $presenter = UserPresenter::class;

    protected $fillable = [
        'name', 'loginff', 'email', 'avatar', 'profile', 'balance'
    ];

}
