<?php

namespace App\Domains\Transfers;

use App\Domains\Users\User;
use Codecasts\Presenter\Presentable;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use Presentable;

    protected $presenter = TransferPresenter::class;

    protected $fillable = [
        'user_id', 'balance', 'done'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
