<?php

namespace App\Units\Core;

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
        $this->router->get('/', 'CoreController@index')->name('index');
        $this->router->get('admin', 'CoreController@admin')->name('index.admin');
        $this->router->get('img/download', 'CoreController@img')->name('index.img');
        $this->router->get('admin/link', 'CoreController@link')->name('core.link');
        $this->router->post('admin/link', 'CoreController@update')->name('core.update');
        $this->router->get('index', 'CoreController@dashboard')->name('dashboard');
        $this->router->post('admin/img', 'CoreController@img')->name('core.img');
    }
}
