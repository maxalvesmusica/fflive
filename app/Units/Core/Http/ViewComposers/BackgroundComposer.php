<?php

namespace App\Units\Core\Http\ViewComposers;

use App\Domains\Images\ImageRepository;
use Illuminate\View\View;

class ProfileComposer
{
    protected $image;

    public function __construct(ImageRepository $img)
    {
        $this->image = $img;
    }

    public function compose(View $view)
    {
        $view->with('bg', $this->image->find(1));
    }
}