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
        $matches = [];
        return view('user::index', compact('user', 'matches'));
    }

    public function games()
    {
      $matches = $this->matchRepository->findWhere([['datetime', 'like', date('Y-m-d')."%"]]);

      return view('user::games', compact('matches'));
    }

    public function bonus()
    {
        $user = \Auth::user();
        return view('user::bonus', compact('user'));
    }

    public function bonusrequest(Request $request)
    {
        return $request->all();
    }

    public function show()
    {
        $users = $this->userRepository->orderBy('id', 'desc')->paginate();
        $count = $this->userRepository->all()->count();

        return view('user::list', compact('users', 'count'));
    }

    public function updateLogin(Request $request)
    {
        $this->userRepository->update(['loginff' => $request->get('loginff')], \Auth::user()->id);

        return "OK";
    }
}