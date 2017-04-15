<?php

namespace App\Units\User\Http\Controllers;

use App\Domains\Matches\MatchRepository;
use App\Domains\Users\UserRepository;
use App\Units\Core\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;
    protected $matchRepository;

    public function __construct(UserRepository $ur, MatchRepository $mr)
    {
        parent::__construct();
        $this->userRepository = $ur;
        $this->matchRepository = $mr;
    }

    public function index()
    {
        $user = \Auth::user();
        $matches = $this->matchRepository->findWhere([['datetime', 'like', date('Y-m-d').'%'], 'live' => 1]);

        return view('user::index', compact('user', 'matches'));
    }

    public function show()
    {
        $users = $this->userRepository->all();
        return view('user::list', compact('users'));
    }
}