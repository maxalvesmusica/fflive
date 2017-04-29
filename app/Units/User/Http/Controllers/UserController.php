<?php

namespace App\Units\User\Http\Controllers;

use App\Domains\Links\LinkRepository;
use App\Domains\Matches\Match;
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
    protected $linkRepository;

    public function __construct(UserRepository $ur, MatchRepository $mr, BonusRepository $br, LinkRepository $lr)
    {
        parent::__construct();
        $this->userRepository = $ur;
        $this->matchRepository = $mr;
        $this->bonusRepository = $br;
        $this->linkRepository = $lr;
    }

    public function index()
    {
        $user = \Auth::user();
        $bonus = $this->bonusRepository->findWhere(['user_id' => \Auth::user()->id, 'done' => 0])->first();
        $matches = $this->matchRepository->findWhere([['datetime', 'like', date('Y-m-d')."%"], 'live' => 1]);
        $link = $this->linkRepository->find(1);
        $date = Match::where('datetime', 'like', date('Y-m-d').'%')->min('datetime');

        return view('user::index', compact('user', 'matches', 'bonus', 'date', 'link'));
    }

    public function games()
    {
      $matches = $this->matchRepository->findWhere([['datetime', 'like', date('Y-m-d')."%"], 'live' => 1]);

      return view('user::games', compact('matches'));
    }

    public function balance($user)
    {
        if (\Auth::user()->profile != 'admin') {
            return redirect()->route('user.index');
        }
        $user = $this->userRepository->find($user);

        return view('user::balance', compact('user'));
    }

    public function whats($user)
    {
        if (\Auth::user()->id != $user) {
            return redirect()->route('user.index');
        }
        $user = $this->userRepository->find($user);

        return view('user::whats', compact('user'));
    }

    public function face($user)
    {
        if (\Auth::user()->id != $user) {
            return redirect()->route('user.index');
        }
        $user = $this->userRepository->find($user);

        return view('user::face', compact('user'));
    }

    public function insta($user)
    {
        $user = $this->userRepository->find($user);

        return view('user::insta', compact('user'));
    }

    public function postBalance(Request $request, $user)
    {
        $this->userRepository->update(['balance' => $request->get('balance')], $user);

        return redirect()->route('user.list');
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

    public function show($search = '')
    {
        if ($search) {
            $links = false;
            $users = $this->userRepository->findWhere([['name', 'like', "$search%"]]);
        } else {
            $links = true;
            $users = $this->userRepository->orderBy('id', 'desc')->paginate();
        }
        $count = $this->userRepository->all()->count();

        return view('user::list', compact('users', 'count', 'links'));
    }

    public function profile()
    {
        $user = $this->userRepository->find(\Auth::user()->id);
        return view('user::profile', compact('user'));
    }

    public function block($user, $action)
    {
        $this->userRepository->update(['block' => $action], $user);

        return redirect()->route('user.list');
    }

    public function updateLogin(Request $request)
    {
        $this->userRepository->update(['loginff' => $request->get('loginff')], \Auth::user()->id);

        return "OK";
    }
}