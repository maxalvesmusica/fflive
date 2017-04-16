<?php

namespace App\Domains\Users\Providers;

use App\Domains\Users\Database\CreatePasswordResetsTable;
use App\Domains\Users\Database\CreateUsersTable;
use App\Domains\Users\Database\ModifyUsersTable;
use Codecasts\Support\Domain\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    protected $alias = 'users';

    protected $migrations = [
        CreateUsersTable::class,
        ModifyUsersTable::class
    ];
}