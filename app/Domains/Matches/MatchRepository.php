<?php

namespace App\Domains\Matches;

use Prettus\Repository\Eloquent\BaseRepository;

class MatchRepository extends BaseRepository
{

    function model()
    {
        return "App\\Domains\\Matches\\Match";
    }
}
