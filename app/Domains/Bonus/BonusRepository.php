<?php

namespace App\Domains\Bonus;

use Prettus\Repository\Eloquent\BaseRepository;

class BonusRepository extends BaseRepository
{

    public function getBonus($type, $date)
    {
        $type = $this->translateType($type);
        $arr = [['done', '=', $type]];
        if ($date) {
            array_push($arr, ['created_at', 'like', "$date%"]);
        }

        $transfers = $this->with(['user'])->orderBy('id', 'desc')->findWhere($arr);

        return $transfers;
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
