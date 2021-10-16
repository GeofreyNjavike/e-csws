<?php

namespace App\View\Components\Admin;

use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\View\Component;

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
        $files = DB::table('files')
            ->join('users', 'users.id', '=', 'files.user_id')
            ->join('roles', 'roles.id', '=', 'files.role_id')
            ->select('files.filename', 'users.lastname', 'roles.role', 'files.*')
            ->get();
        $filez = DB::table('files')->get();
        return view('components.admin.files', ['files' => $files], ['filez' => $filez]);
    }
}
