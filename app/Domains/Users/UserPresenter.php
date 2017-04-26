<?php

namespace App\Domains\Users;

use Codecasts\Presenter\Presenter;
use Illuminate\Support\Str;

/**
 * Class UserPresenter.
 */
class UserPresenter extends Presenter
{
    public function balance()
    {
        return number_format($this->entity->balance, 2, ',','.');
    }

    public function action()
    {
        return ($this->entity->block == 1) ? 0 : 1;
    }

    public function active()
    {
        return ($this->entity->block == 1) ? 'Liberar' : 'Bloquear';
    }
}
