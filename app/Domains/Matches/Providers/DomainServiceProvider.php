<?php

namespace App\Domains\Matches\Providers;

use App\Domains\Matches\Database\CreateMatchesTable;
use Codecasts\Support\Domain\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    protected $alias = 'matches';

    protected $migrations = [
        CreateMatchesTable::class
    ];
}