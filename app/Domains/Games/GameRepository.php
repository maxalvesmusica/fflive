<?php

namespace App\Domains\Games;

use Prettus\Repository\Eloquent\BaseRepository;

class GameRepository extends BaseRepository
{

    function model()
    {
        return "App\\Domains\\Games\\Game";
    }
}
