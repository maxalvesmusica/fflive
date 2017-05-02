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
        $img = $this->linkRepository->find(2);

        return view('core::link', compact('link', 'img'));
    }

    public function download()
    {
        $img = $this->linkRepository->find(2);
        return response()->download(public_path().'/'.$img->link);
    }

    public function update(Request $request)
    {
        $this->linkRepository->update(['link' => $request->get('link')], 1);

        return redirect()->route('core.link');
    }

    public function img(Request $request)
    {
        $this->linkRepository->update(['link' => $this->updloadImage($request)], 2);

        session()->flash('message-class', 'success');
        return redirect()->route('match.index')->with('message', 'Imagem Cadastrada!');
    }

    public function updloadImage($request, $type = '')
    {
        if ( ! $request->hasFile('image')) {
            return null;
        }

        $image = $request->file('image');
        $path = public_path().'/img/';
        $name = 'futebolfacil.jpg';
        $image->move($path, $name);
        return $name;
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