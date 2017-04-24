<?php

namespace App\Units\Transmission;

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
        $this->router->group(['prefix' => 'admin/transmissoes', 'middleware' => 'auth'], function () {
            $this->router->get('nova', 'TransmissionController@create')->name('transmission.create');
            $this->router->get('{id}/hide', 'TransmissionController@hide')->name('transmission.hide');
            $this->router->post('nova', 'TransmissionController@store')->name('transmission.store');
            $this->router->get('{date?}', 'TransmissionController@index')->name('transmission.index');
        });
    }

    protected function userRoutes()
    {
        $this->router->group(['prefix' => 'transmissoes', 'middleware' => 'auth'], function () {
            $this->router->get('index', 'TransmissionController@user')->name('transmission.user');
        });
    }
}
