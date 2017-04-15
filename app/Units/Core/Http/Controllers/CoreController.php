<?php

namespace App\Units\Core\Http\Controllers;

use App\Domains\Users\UserRepository;
use Illuminate\Http\Request;

class CoreController
{
    protected $userRepository;

    function __construct(UserRepository $ur)
    {
        $this->userRepository = $ur;
    }

    public function index()
    {
        if (\Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('core::index');
    }

    public function dashboard()
    {
     $route = \Auth::user()->profile == 'user' ? 'user.index' : 'match.index';
     return redirect()->route($route);
    }
}