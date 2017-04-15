<?php

namespace App\Units\Match;

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
        $this->router->group(['prefix' => 'admin/partidas', 'middleware' => 'auth'], function () {
            $this->router->get('index', 'MatchController@index')->name('match.index');
            $this->router->get('nova', 'MatchController@create')->name('match.create');
            $this->router->get('resultado', 'MatchController@score')->name('match.score');
            $this->router->post('nova', 'MatchController@store')->name('match.store');
            $this->router->get('{match}/block', 'MatchController@block')->name('match.block');
            $this->router->get('{match}/palpites', 'MatchController@details')->name('match.details');
            $this->router->get('{slug}', 'MatchController@show')->name('match.show');
        });
    }
}
