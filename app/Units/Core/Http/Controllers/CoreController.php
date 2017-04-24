<?php

namespace App\Units\Core\Http\Controllers;

use App\Domains\Links\LinkRepository;
use App\Domains\Users\UserRepository;
use Illuminate\Http\Request;

class CoreController
{
    protected $userRepository;
    protected $linkRepository;

    function __construct(UserRepository $ur, LinkRepository $lr)
    {
        $this->userRepository = $ur;
        $this->linkRepository = $lr;
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
     return redirect()->route('user.index');
    }

    public function link()
    {
        $link = $this->linkRepository->find(1);

        return view('core::link', compact('link'));
    }

    public function update(Request $request)
    {
        $this->linkRepository->update(['link' => $request->get('link')], 1);

        return redirect()->route('transmission.index');
    }

    public function admin()
    {
     if (\Auth::check() && \Auth::user()->profile == 'admin') {
         return redirect()->route('transmission.index');
     }
        \Auth::logout();
        session()->flush();
        return view('auth::login');
    }
}