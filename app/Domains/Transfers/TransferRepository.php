<?php

namespace App\Domains\Transfers;

use Prettus\Repository\Eloquent\BaseRepository;

class TransferRepository extends BaseRepository
{

    public function getTransfers($type, $date)
    {
        $type = $this->translateType($type);
        $arr = ['done' => $type];
        if ($date) {
            $arr += ['created_at', 'like', "$date%"];
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
                return $type;
        }
    }

    function model()
    {
        return "App\\Domains\\Transfers\\Transfer";
    }
}
