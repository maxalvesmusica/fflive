<?php

namespace App\Domains\Games\Providers;

use App\Domains\Games\Database\CreateGamesTable;
use Codecasts\Support\Domain\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    protected $alias = 'games';

    protected $migrations = [
        CreateGamesTable::class
    ];
}