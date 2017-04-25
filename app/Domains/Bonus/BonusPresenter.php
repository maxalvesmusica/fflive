<?php

namespace App\Domains\Bonus;


use Codecasts\Presenter\Presenter;

/**
 * Class BonusPresenter.
 */

class BonusPresenter extends Presenter
{
    public function status()
    {
        return ($this->entity->done == 0) ? 'Pendente' : 'Concluída';
    }

    public function value()
    {
        switch($this->entity->value) {
            case 10:
                return "R$ ".number_format(10.00, 2, ',','.');
                break;
            case 20:
                return "R$ ".number_format(20.00, 2, ',','.');
                break;
            default:
                return $this->entity->value;
        }
    }

    public function request()
    {
        return date('d/m/Y H:i:s', strtotime($this->entity->created_at));
    }

    public function done()
    {
        return date('d/m/Y H:i:s', strtotime($this->entity->updated_at));
    }

    public function tp()
    {
        return ($this->entity->done == 0) ? 1 : 0;
    }
}
