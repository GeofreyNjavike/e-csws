<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function dashboard()
    {
        $user = DB::table('users')->where('id', Auth::user()->id)->get();

        if ($user[0]->role_id == 2 and Auth::user()->status == 1) {
            return view('contract-dashboard');
        }
        if ($user[0]->role_id == 3 and Auth::user()->status == 1) {
            return view('accountants-dashboard');
        }
        if ($user[0]->role_id == 1) {
            return view('dashboard');
        }
        if ($user[0]->role_id == 4 and Auth::user()->status == 1) {
            return view('pmu-dashboard');
        }
    }

    public function index()
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create', ['role' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'firstname' => ['required', 'max:255'],
            'lastname' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'unique:users'],
            'password' => 'required|min:5|confirmed',
        ]);


        User::create([
            'firstname' => $fields['firstname'],
            'lastname' => $fields['lastname'],
            'email' => $fields['email'],
            'role_id' => $request->role_id,
            'password' => bcrypt($fields['password']),
        ]);

        return back()->with('success', 'user registered succeffuly !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $users = DB::table('roles')
            ->join('users', 'users.role_id', '=', 'roles.id')
            ->where('users.role_id', $user->role_id)
            ->first();
        return view('users.view', ['users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $user = User::find($id);
        $role = Role::where('id', $user->role_id)->first();
        return view('users.edit', compact('roles', 'user', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return back()->with('success', 'User Updated Successfully !');
    }

    public function deactivate(Request $request, $id)
    {
        $user = User::find($id);
        $user->update(['status' => 0]);
        return back()->with('success', 'User Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return back()->with('info', 'User has been deleted Succeffully !');
    }
}
