<?php

namespace App\Domains\Bonus;

use App\Domains\Users\User;
use Codecasts\Presenter\Presentable;
use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    use Presentable;

    protected $presenter = BonusPresenter::class;

    protected $table = 'bonus';

    protected $fillable = [
        'user_id', 'type', 'done'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
