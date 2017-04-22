<?php

namespace App\Units\User\Http\Controllers;

use App\Domains\Matches\MatchRepository;
use App\Domains\Bonus\BonusRepository;
use App\Domains\Users\UserRepository;
use App\Units\Core\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;
    protected $matchRepository;
    protected $bonusRepository;

    public function __construct(UserRepository $ur, MatchRepository $mr, BonusRepository $br)
    {
        parent::__construct();
        $this->userRepository = $ur;
        $this->matchRepository = $mr;
        $this->bonusRepository = $br;
    }

    public function index()
    {
        $user = \Auth::user();
        $bonus = $this->bonusRepository->findWhere(['user_id' => \Auth::user()->id, 'done' => 0])->first();
        $matches = [];
        return view('user::index', compact('user', 'matches', 'bonus'));
    }

    public function games()
    {
      $matches = $this->matchRepository->findWhere([['datetime', 'like', date('Y-m-d')."%"], 'live' => 1]);

      return view('user::games', compact('matches'));
    }

    public function bonus()
    {
        $user = \Auth::user();
        $matches = $this->matchRepository->findWhere([['datetime', 'like', date('Y-m-d')."%"], 'live' => 1]);

        return view('user::bonus', compact('user', 'matches'));
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