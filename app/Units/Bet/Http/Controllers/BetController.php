<?php

namespace App\Units\Bet\Http\Controllers;

use App\Domains\Bets\BetRepository;
use App\Domains\Games\GameRepository;
use App\Domains\Links\LinkRepository;
use App\Units\Core\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BetController extends Controller
{
    protected $betRepository;
    protected $gameRepository;
    protected $linkRepository;

    public function __construct(BetRepository $br, GameRepository $gr, linkRepository $lr)
    {
        parent::__construct();
        $this->betRepository = $br;
        $this->gameRepository = $gr;
        $this->linkRepository = $lr;
    }

    public function store(Request $request)
    {
        $input = $request->except(['_token']);
        $bet = $this->betRepository->getByUser(\Auth::user()->id, date('Y-m-d'));

        $input['user_id'] = \Auth::user()->id;
        $input['bet_id'] = $bet->id;
        $input['result'] = '';

        $game = $this->gameRepository->create($input);
        return $game;
    }

    public function show($id)
    {
        $bet = $this->betRepository->with(['games', 'games.match'])->find($id);

        return view('bet::show', compact('bet'));
    }

    public function finish()
    {
        $img = $this->linkRepository->find(2);
        return view('bet::finish', compact('img'));
    }

    public function user($date = '')
    {
        $date = $date ?: date('Y-m-d');
        $bet = $this->betRepository->with(['games', 'games.match'])->findWhere([['created_at', 'like', "$date%"], 'user_id' => \Auth::user()->id])->first();

        return view('bet::user', compact('bet'));
    }
}