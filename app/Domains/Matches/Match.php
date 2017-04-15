<?php

namespace App\Domains\Matches;

use Codecasts\Presenter\Presentable;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    use Presentable;

    protected $presenter = MatchPresenter::class;

    protected $fillable = [
        'tone', 'ttwo', 'championship', 'slug', 'link', 'score', 'live', 'datetime'
    ];

}
