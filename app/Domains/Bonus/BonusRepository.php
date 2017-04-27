<?php

namespace App\Domains\Bonus;

use App\Domains\Bets\BetRepository;
use App\Domains\Games\GameRepository;
use Illuminate\Container\Container as Application;
use Prettus\Repository\Eloquent\BaseRepository;

class BonusRepository extends BaseRepository
{
    protected $gameRepository;
    protected $betRepository;
    protected $bonusRepository;

    public function __construct(Application $app, GameRepository $gr, BetRepository $br)
    {
        parent::__construct($app);
        $this->betRepository = $br;
        $this->gameRepository = $gr;
    }

    public function getBonus($type, $date)
    {
        $type = $this->translateType($type);
        $arr = [['done', '=', $type]];
        if ($date) {
            if ($type == 1) {
                array_push($arr, ['created_at', 'like', "$date%"]);
            }
        }

        $transfers = $this->with(['user', 'match'])->orderBy('id', 'desc')->findWhere($arr);

        return $transfers;
    }

    public function check($date)
    {
        $bets = $this->getWons($date);
        foreach ($bets as $key => $bet) {
            $current = current($bet);
            $bonus = $this->bonus(count($bet));
            $arr = [
                'user_id' => $current['user_id'],
                'bet_id' => $current['bet_id'],
                'type' => 'Palpites',
                'value' => $bonus,
                'done' => 0
            ];
            $this->create($arr);
        }
        return true;
    }

    public function getWons($date)
    {
        $games = $this->betRepository->with('games')->findWhere([['created_at', 'like', "$date%"]]);
        $filter = $games->map(function($game) {
            return $game->games->where('result', 1);
        });
        $games = array_filter($filter->toArray());
        $games = collect($games);
        return $games;
    }

    public function bonus($count)
    {
        switch ($count) {
            case 2:
                return 10.00;
                break;
            case 3:
                return 20.00;
                break;
            case 4:
                return 'Camisa';
                break;
            case 5:
                return 'iPhone';
                break;
        }
    }

    public function translateType($type)
    {
        switch ($type) {
            case 'pendentes':
                return 0;
                break;
            case 'transferidas':
                return 1;
                break;
            default:
                return 0;
        }
    }

    function model()
    {
        return "App\\Domains\\Bonus\\Bonus";
    }
}
