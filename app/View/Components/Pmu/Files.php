<?php

namespace App\View\Components\Pmu;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class Files extends Component
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
        $files = DB::table('files')->where('toPmu', 1)->get();
        return view('components.pmu.files', ['files' => $files]);
    }
}
