<?php

namespace App\Domains\Transmissions;

use Prettus\Repository\Eloquent\BaseRepository;

class TransmissionRepository extends BaseRepository
{

    function model()
    {
        return "App\\Domains\\Transmissions\\Transmission";
    }
}
