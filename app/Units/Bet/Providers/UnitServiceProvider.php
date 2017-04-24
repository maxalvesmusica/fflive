<?php

namespace App\Units\Bet\Providers;

use Codecasts\Support\Units\ServiceProvider;

class UnitServiceProvider extends ServiceProvider
{
    protected $alias = 'bet';

    protected $hasViews = true;

    protected $hasTranslations = true;

    protected $providers = [
        RouteServiceProvider::class,
    ];
}
