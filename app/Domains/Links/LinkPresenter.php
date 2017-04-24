<?php

namespace App\Domains\Links;


use Codecasts\Presenter\Presenter;

/**
 * Class LinksPresenter.
 */

class LinkPresenter extends Presenter
{
    public function status()
    {
        return ($this->entity->done == 0) ? 'Pendente' : 'Concluída';
    }
}
