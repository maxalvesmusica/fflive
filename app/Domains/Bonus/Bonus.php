<?php

namespace App\Domains\Bonus;

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
        'user_id', 'match_id', 'type', 'done'
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
