<?php

namespace App\Units\Game\Http\Controllers;

use App\Domains\Games\GameRepository;
use App\Units\Core\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GameController extends Controller
{
    protected $gameRepository;

    public function __construct(GameRepository $gr)
    {
        parent::__construct();
        $this->gameRepository = $gr;
    }

    public function store($match, Request $request)
    {
        $input = $request->except(['_token']);
        $input['user_id'] = \Auth::user()->id;
        $input['result'] = '';

        $game = $this->gameRepository->create($input);
        return $game;
    }
}