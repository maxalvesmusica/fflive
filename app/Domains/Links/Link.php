<?php

namespace App\Domains\Links;

use Codecasts\Presenter\Presentable;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use Presentable;

    protected $presenter = LinksPresenter::class;

    protected $fillable = [
        'link'
    ];
}
