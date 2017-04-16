<?php

namespace App\Domains\Transfers\Providers;

use App\Domains\Transfers\Database\CreateTransfersTable;
use Codecasts\Support\Domain\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    protected $alias = 'transfers';

    protected $migrations = [
        CreateTransfersTable::class
    ];
}