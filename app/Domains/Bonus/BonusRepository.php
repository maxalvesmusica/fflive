<?php

namespace App\Domains\Bonus;

use App\Domains\Games\GameRepository;
use Illuminate\Container\Container as Application;
use Prettus\Repository\Eloquent\BaseRepository;

class BonusRepository extends BaseRepository
{
    protected $gameRepository;
    protected $bonusRepository;

    public function __construct(Application $app, GameRepository $gr)
    {
        parent::__construct($app);
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
        foreach ($bets as $bet) {
            $bonus = $this->bonus(count($bet));
            $arr = [
                'user_id' => $bet[0]->user_id,
                'bet_id' => $bet[0]->bet_id,
                'match_id' => $bet[0]->match_id,
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
        $games = $this->gameRepository->with('match')->findWhere([['created_at', 'like', "$date%"], 'result' => 1]);
        return $games->groupBy('bet_id');
    }

    public function bonus($count)
    {
        switch ($count) {
            case 1:
                return 10.00;
                break;
            case 2:
                return 20.00;
                break;
            case 3:
                return 'Camisa';
                break;
            case 4:
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
