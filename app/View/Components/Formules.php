<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Formules extends Component
{
    public $path;
    public $type;

    public function __construct($path, $type)
    {
        $this->path = $path;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.formules');
    }
}
