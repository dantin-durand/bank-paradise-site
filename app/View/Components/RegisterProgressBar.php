<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RegisterProgressBar extends Component
{
    public $items;
    public $itemsMax;

    public function __construct($items, $itemsMax)
    {
        $this->items = $items;
        $this->itemsMax = $itemsMax;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.register-progress-bar');
    }
}
