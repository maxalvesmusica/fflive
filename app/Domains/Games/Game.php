<?php

namespace App\Domains\Games;

use App\Domains\Matches\Match;
use App\Domains\Users\User;
use Codecasts\Presenter\Presentable;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use Presentable;

    protected $presenter = GamePresenter::class;

    protected $fillable = [
        'user_id', 'bet_id', 'match_id', 'score', 'result'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function match()
    {
        return $this->belongsTo(Match::class, 'match_id');
    }

}
