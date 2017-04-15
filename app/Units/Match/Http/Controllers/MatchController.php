<?php

namespace App\Units\Match\Http\Controllers;

use App\Domains\Games\GameRepository;
use App\Domains\Matches\MatchRepository;
use App\Units\Core\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    protected $matchRepository;
    protected $gameRepository;

    public function __construct(MatchRepository $ur, GameRepository $gr)
    {
        parent::__construct();
        $this->matchRepository = $ur;
        $this->gameRepository = $gr;
    }

    public function index()
    {
        $matches = $this->matchRepository->orderBy('id', 'desc')->findWhere([['datetime', 'like', date('Y-m-d').'%']]);

        return view('match::index', compact('matches'));
    }

    public function create()
    {
        return view('match::create');
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

        return "Ok";
    }

    public function details($match)
    {
        $bets = $this->gameRepository->with(['user'])->orderBy('id', 'DESC')->findWhere(['match_id' => $match]);

        return view('match::details', compact('bets'));
    }
}