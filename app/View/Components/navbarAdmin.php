<?php

namespace App\View\Components;

use Illuminate\View\Component;

class navbaAdmin extends Component
{
    public $activePage;

    public function __construct($activePage)
    {
        $this->activePage = $activePage;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navbar-admin');
    }
}
