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
        $this->userRoutes();
        $this->socialRoutes();
    }

    protected function accessRoutes()
    {
        $this->router->get('loginff', 'UserController@updateLogin')->middleware('auth')->name('user.update.login');
        $this->router->group(['prefix' => 'admin/usuarios', 'middleware' => 'auth'], function() {
            $this->router->get('{user}/saldo', 'UserController@balance')->name('user.balance');
            $this->router->post('{user}/saldo', 'UserController@postBalance')->name('user.postBalance');
            $this->router->get('{search?}', 'UserController@show')->name('user.list');
        });
    }

    public function userRoutes()
    {
        $this->router->group(['prefix' => 'usuario', 'middleware' => 'auth'], function() {
            $this->router->get('/', 'UserController@index')->name('user.index');
            $this->router->get('partidas', 'UserController@games')->name('user.games');
            $this->router->get('bonus', 'UserController@bonus')->name('user.bonus');
            $this->router->get('{user}/whats', 'UserController@whats')->name('user.whats');
            $this->router->get('{user}/insta', 'UserController@insta')->name('user.insta');
            $this->router->get('{user}/face', 'UserController@face')->name('user.face');
            $this->router->get('perfil', 'UserController@profile')->name('user.profile');
            $this->router->get('{id}/{action}/block', 'UserController@block')->name('user.block');
        });
    }

    protected function socialRoutes()
    {
        $this->router->get('social/redirect', 'SocialController@redirect')->name('social.redirect');
        $this->router->get('social/callback', 'SocialController@callback')->name('social.callback');
    }
}
