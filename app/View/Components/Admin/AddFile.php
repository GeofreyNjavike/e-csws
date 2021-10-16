<?php

namespace App\View\Components\Admin;

use App\Models\Role;
use Illuminate\View\Component;
use App\Models\Objective;

class AddFile extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $roles = Role::all();
        $objectives = Objective::all();
        return view('components.admin.add-file', ['roles' => $roles], ['objectives' => $objectives]);
    }
}
