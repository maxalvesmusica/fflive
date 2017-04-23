<?php

namespace App\Domains\Transmissions;

use Codecasts\Presenter\Presentable;
use Illuminate\Database\Eloquent\Model;

class Transmission extends Model
{
    use Presentable;

    protected $presenter = TransmissionPresenter::class;

    protected $table = 'transmissions';

    protected $fillable = [
        'link', 'live'
    ];
}
