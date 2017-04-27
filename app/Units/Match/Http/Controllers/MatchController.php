<?php

namespace App\Units\Match\Http\Controllers;

use App\Domains\Bonus\BonusRepository;
use App\Domains\Games\GameRepository;
use App\Domains\Links\LinkRepository;
use App\Domains\Matches\Match;
use App\Domains\Matches\MatchRepository;
use App\Units\Core\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    protected $matchRepository;
    protected $gameRepository;
    protected $bonusRepository;
    protected $linkRepository;

    public function __construct(MatchRepository $ur, GameRepository $gr, BonusRepository $br, LinkRepository $lr)
    {
        parent::__construct();
        $this->matchRepository = $ur;
        $this->gameRepository = $gr;
        $this->bonusRepository = $br;
        $this->linkRepository = $lr;
    }

    public function index($date = '')
    {
        $date = $date ?: date('Y-m-d');
        $matches = $this->matchRepository->orderBy('id', 'desc')->findWhere([['datetime', 'like', "$date%"]]);

        return view('match::index', compact('matches', 'date'));
    }

    public function create()
    {
        return view('match::create');
    }

    public function user()
    {
        $user = \Auth::user();
        $bonus = $this->bonusRepository->findWhere(['user_id' => \Auth::user()->id, 'done' => 0])->first();
        $matches = $this->matchRepository->findWhere([['datetime', 'like', date('Y-m-d')."%"], 'live' => 1]);
        $link = $this->linkRepository->find(1);
        $date = Match::where('datetime', 'like', date('Y-m-d').'%')->min('datetime');

        return view('user::palpites', compact('user', 'matches', 'bonus', 'date', 'link'));
    }

    public function store(Request $request)
    {
        $input = $request->except(['_token']);
        $input['datetime'] = $input['date'].' '.$input['time'];
        $input['score'] = '-x-';
        $this->matchRepository->create($input);

        return redirect()->route('match.index');
    }

    public function edita($match)
    {
        $match = $this->matchRepository->find($match);

        return view('match::update', compact('match'));
    }

    public function update($match, Request $request)
    {
        $input = $request->except(['_token']);

        $this->matchRepository->update($input, $match);

        return redirect()->route('match.index');
    }

    public function show($slug)
    {
        $user = \Auth::user();
        $match = $this->matchRepository->findWhere(['slug' => $slug])->first();

        return view('user::show', compact('match', 'user'));
    }

    public function block($match)
    {
        $this->matchRepository->update(['live' => 0], $match);

        return redirect()->route('match.index');
    }

    public function score(Request $request)
    {
        $input = $request->except(['_token']);
        $this->matchRepository->update(['score' => $input['score']], $input['match']);
        $this->gameRepository->checkWinnersByMatch($input['match'], $input['score']);
        return "Ok";
    }

    public function details($match)
    {
        $bets = $this->gameRepository->with(['user'])->orderBy('id', 'DESC')->findWhere(['match_id' => $match]);
        $count = $this->gameRepository->findWhere(['match_id' => $match])->count();
        return view('match::details', compact('bets', 'count'));
    }
}