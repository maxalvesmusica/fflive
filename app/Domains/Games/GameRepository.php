<?php

namespace App\Domains\Games;

use App\Domains\Users\UserRepository;
use Illuminate\Container\Container as Application;
use Prettus\Repository\Eloquent\BaseRepository;

class GameRepository extends BaseRepository
{
    protected $userRepository;

    public function __construct(Application $app, UserRepository $ur)
    {
        parent::__construct($app);
        $this->userRepository = $ur;
    }

    function checkWinnersByMatch($match, $score)
    {
        $winners = $this->findWhere(['match_id' => $match, 'score' => $score]);
        if (count($winners) != 0) {
            foreach ($winners as $winner) {
                $user = $this->userRepository->find($winner->user_id);
                $balance = $user->balance + 50.00;
                $this->userRepository->update(['balance' => $balance], $user->id);
            }
        }
        return true;
    }

    function model()
    {
        return "App\\Domains\\Games\\Game";
    }
}
