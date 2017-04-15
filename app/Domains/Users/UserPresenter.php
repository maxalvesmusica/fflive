<?php

namespace App\Domains\Users;

use Codecasts\Presenter\Presenter;
use Illuminate\Support\Str;

/**
 * Class UserPresenter.
 */
class UserPresenter extends Presenter
{
    public function address()
    {
        $number = ($this->entity->number) ?: '';
        return $this->entity->street.', '.$number;
    }

    public function classActive()
    {
        return ($this->entity->status == 1) ? 'success' : 'danger';
    }

    public function action()
    {
        return ($this->entity->status == 1) ? 0 : 1;
    }

    public function active()
    {
        return ($this->entity->status == 1) ? 'ativo' : 'Bloqueado';
    }
}
