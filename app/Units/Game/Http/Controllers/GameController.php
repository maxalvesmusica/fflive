<?php

namespace App\Units\Game\Http\Controllers;

use App\Domains\Bets\BetRepository;
use App\Domains\Games\GameRepository;
use App\Units\Core\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GameController extends Controller
{
    protected $gameRepository;
    protected $betRepository;

    public function __construct(GameRepository $gr, BetRepository $br)
    {
        parent::__construct();
        $this->gameRepository = $gr;
        $this->betRepository = $br;
    }
}