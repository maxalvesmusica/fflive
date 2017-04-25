<?php

namespace App\Units\Bet\Http\Controllers;

use App\Domains\Bets\BetRepository;
use App\Domains\Games\GameRepository;
use App\Units\Core\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BetController extends Controller
{
    protected $betRepository;
    protected $gameRepository;

    public function __construct(BetRepository $br, GameRepository $gr)
    {
        parent::__construct();
        $this->betRepository = $br;
        $this->gameRepository = $gr;
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
}