<?php

namespace App\Domains\Transfers;


use Codecasts\Presenter\Presenter;

/**
 * Class TransferPresenter.
 */

class TransferPresenter extends Presenter
{
    public function balance()
    {
        return number_format($this->entity->balance, 2, ',','.');
    }

    public function status()
    {
        return ($this->entity->done == 0) ? 'Pendente' : 'Concluída';
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
