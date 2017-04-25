<?php

namespace App\Domains\Bonus;

use App\Domains\Bets\Bet;
use App\Domains\Matches\Match;
use App\Domains\Users\User;
use Codecasts\Presenter\Presentable;
use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    use Presentable;

    protected $presenter = BonusPresenter::class;

    protected $table = 'bonus';

    protected $fillable = [
        'user_id', 'bet_id', 'match_id', 'type', 'value', 'done'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function match()
    {
        return $this->belongsTo(Match::class, 'match_id');
    }

    public function bet()
    {
        return $this->belongsTo(Bet::class, 'bet_id');
    }
}
