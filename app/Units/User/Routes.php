<?php

namespace App\Units\User;

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
        $this->socialRoutes();
    }

    protected function accessRoutes()
    {
        $this->router->get('logado', 'UserController@index')->middleware('auth')->name('user.index');
        $this->router->group(['prefix' => 'usuarios', 'middleware' => 'admin'], function() {
            $this->router->get('/', 'UserController@list')->name('user.list');
        });
    }

    protected function socialRoutes()
    {
        $this->router->get('social/redirect', 'SocialController@redirect')->name('social.redirect');
        $this->router->get('social/callback', 'SocialController@callback')->name('social.callback');
    }
}
