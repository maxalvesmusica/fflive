<?php

namespace App\Units\Core\Http\Controllers;

/**
 * Class Controller.
 */
class Controller extends \Codecasts\Support\Http\Controller
{
    protected $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = \Auth::user();
            return $next($request);
        });
    }
    public function view($view, $data = [])
    {
        $user = \Auth::user();
        return view($view, $data)->with(['user' => $user]);
    }
}