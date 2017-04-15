<?php

namespace App\Units\Auth;

use Codecasts\Support\Http\Routing\RouteFile;
use Illuminate\Support\Facades\App;


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
        $this->authenticationRoutes();
    }

    protected function authenticationRoutes()
    {
        $this->router->get('admin/login', 'LoginController@home')->name('login');
        $this->router->post('login', 'LoginController@login')->name('loginmesmo');
        $this->router->get('logout', 'LoginController@logout')->name('logout');
    }
}
