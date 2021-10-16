<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class BreadCumbs extends Component
{

    public $name;



    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        return view('components.admin.bread-cumbs');
    }
}
