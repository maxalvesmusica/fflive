<?php

namespace App\Domains\Bets;


use Codecasts\Presenter\Presenter;

/**
 * Class BetsPresenter.
 */

class BetPresenter extends Presenter
{
    public function status()
    {
        return ($this->entity->done == 0) ? 'Pendente' : 'Concluída';
    }
}
