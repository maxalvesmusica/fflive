<?php

namespace App\Domains\Users;

use Prettus\Repository\Eloquent\BaseRepository;

class UserRepository extends BaseRepository
{

    function model()
    {
        return "App\\Domains\\Users\\User";
    }
}
