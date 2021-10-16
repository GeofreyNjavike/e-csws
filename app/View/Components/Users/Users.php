<?php

namespace App\View\Components\Users;

use App\Models\User;
use Illuminate\View\Component;

class Users extends Component
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
        $users = User::orderBy('created_at', 'DESC')->get();
        return view('components.users.users', ['users' => $users]);
    }
}
