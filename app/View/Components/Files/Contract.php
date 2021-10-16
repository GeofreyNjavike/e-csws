<?php

namespace App\View\Components\Files;

use App\Models\Files;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Contract extends Component
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
        $files = Files::where('user_id', Auth::user()->id)->get();
        return view('components.files.contract', ['files' => $files]);
    }
}
