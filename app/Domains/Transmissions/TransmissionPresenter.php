<?php

namespace App\Domains\Transmissions;


use Codecasts\Presenter\Presenter;

/**
 * Class TransmissionPresenter.
 */

class TransmissionPresenter extends Presenter
{
    public function status()
    {
        return ($this->entity->live == 0) ? 'Pendente' : 'Concluída';
    }

    public function tp()
    {
        return ($this->entity->done == 0) ? 1 : 0;
    }
}
