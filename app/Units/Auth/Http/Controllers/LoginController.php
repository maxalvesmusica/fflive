<?php

namespace App\Units\Auth\Http\Controllers;

use Codecasts\Support\Http\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function home()
    {
        if (\Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth::login');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        if (\Auth::attempt(['email' => $input['email'], 'password' => $input['password']])) {
            return redirect()->route('dashboard');
        }

        return redirect()->route('index');

    }

    public function logout()
    {
        \Auth::logout();
        session()->flush();
        return redirect('/');
    }
}
