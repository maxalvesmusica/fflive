<?php

namespace App\Domains\Matches;

use Codecasts\Presenter\Presenter;

/**
 * Class MatchePresenter.
 */
class MatchPresenter extends Presenter
{
    public function button()
    {
        return ($this->entity->live == 1) ? 'ENCERRAR' : 'ENCERRADO';
    }

    public function date()
    {
        return date('d/m/Y H:i:s', strtotime($this->entity->datetime));
    }
}
