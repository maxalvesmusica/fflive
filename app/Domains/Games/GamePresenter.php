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
}
