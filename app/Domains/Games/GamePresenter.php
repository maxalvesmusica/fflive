<?php

namespace App\Domains\Games;

use Codecasts\Presenter\Presenter;

/**
 * Class GamePresenter.
 */
class GamePresenter extends Presenter
{
    public function active()
    {
        return ($this->entity->status == 1) ? 'ativo' : 'Bloqueado';
    }

    public function color()
    {
        return ($this->entity->result == 1) ? 'green' : 'orange';
    }

    public function result()
    {
        return ($this->entity->result == 1) ? 'Acertou!' : '';
    }
}
