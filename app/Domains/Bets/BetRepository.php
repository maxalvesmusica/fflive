<?php

namespace App\Domains\Bets;

use Prettus\Repository\Eloquent\BaseRepository;

class BetRepository extends BaseRepository
{
    public function getByUser($user, $date)
    {
        return $this->getOrCreate($user, $date);
    }

    public function getOrCreate($user, $date)
    {
        $bet = $this->findWhere(['date' => $date, 'user_id' => $user])->first();
        if ( ! $bet) {
            $bet = $this->create(['date' => $date, 'user_id' => $user]);
        }

        return $bet;
    }

    function model()
    {
        return "App\\Domains\\Bets\\Bet";
    }
}
