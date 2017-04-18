<?php

namespace App\Units\Transfer;

use Codecasts\Support\Http\Routing\RouteFile;

/**
 * Web Routes.
 *
 * This file is where you may define all of the routes that are handled
 * by your application. Just tell Laravel the URIs it should respond
 * to using a Closure or controller method. Build something great!
 */
class Routes extends RouteFile
{
    /**
     * Declare Web Routes.
     */
    public function routes()
    {
        $this->accessRoutes();
        $this->userRoutes();
        $this->indexRoute();
    }

    protected function accessRoutes()
    {
        $this->router->group(['prefix' => 'admin/transferencias', 'middleware' => 'auth'], function () {
            $this->router->get('{id}/{tp}/update', 'TransferController@update')->name('transfer.update');
            $this->router->get('{type?}/{date?}', 'TransferController@index')->name('transfer.index');
        });
    }

    protected function userRoutes()
    {
        $this->router->group(['prefix' => 'transferencias', 'middleware' => 'auth'], function () {
            $this->router->get('solicitar', 'TransferController@request')->name('transfer.request');
        });
    }

    protected function indexRoute()
    {
    }
}
