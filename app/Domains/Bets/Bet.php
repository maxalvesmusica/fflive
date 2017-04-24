<?php

namespace App\Domains\Bets;

use App\Domains\Games\Game;
use Codecasts\Presenter\Presentable;
use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    use Presentable;

    protected $presenter = BetsPresenter::class;

    protected $fillable = [
        'date', 'user_id'
    ];

    public function games()
    {
        return $this->hasMany(Game::class, 'bet_id');
    }
}
