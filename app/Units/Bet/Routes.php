<?php

namespace App\Units\Bet;
namespace App\Units\Bet;

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
    }

    protected function accessRoutes()
    {
        $this->router->group(['prefix' => 'palpites', 'middleware' => 'auth'], function () {
            $this->router->get('salvar', 'BetController@store')->name('game.store');
            $this->router->get('index', 'BetController@user')->name('bet.user');
            $this->router->get('concluir', 'BetController@finish')->name('bet.finish');
            $this->router->get('{id}', 'BetController@show')->name('bet.show');
        });
    }
}
