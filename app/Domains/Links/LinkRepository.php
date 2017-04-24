<?php

namespace App\Domains\Links;

use Prettus\Repository\Eloquent\BaseRepository;

class LinkRepository extends BaseRepository
{
    function model()
    {
        return "App\\Domains\\Links\\Link";
    }
}
