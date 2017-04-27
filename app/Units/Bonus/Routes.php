<?php

namespace App\Units\Bonus;

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
    }

    protected function accessRoutes()
    {
        $this->router->group(['prefix' => 'admin/bonus', 'middleware' => 'auth'], function () {
            $this->router->get('check/{date}', 'BonusController@check')->name('bonus.check');
            $this->router->get('{bonus}/{user}/update', 'BonusController@update')->name('bonus.update');
            $this->router->get('{type?}/{date?}', 'BonusController@index')->name('bonus.index');
        });
    }

    protected function userRoutes()
    {
        $this->router->group(['prefix' => 'bonus', 'middleware' => 'auth'], function () {
            $this->router->post('request', 'BonusController@brequest')->name('bonus.request');
        });
    }
}
