<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Objective;
use Illuminate\Support\Facades\Storage;
use App\Models\Files;

use App\Models\User;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        if (Auth::user()->role_id == 1 and $user->status == 1) {
            return view('files.index');
        }
    }

    public function toPmu($id)
    {
        $file = Files::find($id);
        $file->update(['toPmu' => 1]);
        return back()->with('success', 'Document Sent to PMU Successfully !');
    }

    public function toAccount($id)
    {
        $file = Files::find($id);
        $file->update(['toAccountants' => 1]);
        return back()->with('success', 'Document Sent to Accountants Successfully !');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = User::where('id', Auth::user()->id)->select('id', 'role_id')->first();
        $fields = $request->validate([
            'fileobjective' => ['required', 'max:255'],
            'filename' => ['required'],
        ]);

        $file = $request->file('filename');
        $file_name = date('YmdHis') . $request->name;
        $ext = strtolower($file->getClientOriginalExtension());
        $file_full_name = $file_name . '.' . $ext;
        $file->storeAs('public/files', $file_full_name);

        Files::create([
            'filename' => $file_full_name,
            'fileobjective' => $fields['fileobjective'],
            'user_id' => $user->id,
            'role_id' => $user->role_id,
        ]);

        return back()->with('success', 'File Created succeffuly !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $filename = Files::find($id);
        $file = $filename->filename;
        $path = storage_path('/app/public/files') . "/" . $file;

        if (file_exists($path)) {
            return Response::download($path);
        } else {
            return 'Failed';
        }
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
        $objectives = Objective::all();
        $file = Files::find($id);
        return view('files.edit', compact('file', 'roles', 'objectives'));
    }
    public function fileaprove($id)
    {
        $user = Files::find($id);
        if ($user->filestatus == 'Not Aproved') {
            Files::where('id', $user->id)
                ->update(['filestatus' => 'Aproved']);
            return back()->with('success', 'File Aproved Successfully !');
        } else {
            Files::where('id', $user->id)
                ->update(['filestatus' => 'Not Aproved']);
            return back()->with('info', 'File Aproval request has been Declined !');
        }
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

        $files = Files::find($id);
        $filename = $files->filename;
        if ($request->hasFile('filename')) {
            $file_path = public_path('storage/files') . "/" . $filename;
            // unlink($file_path);
            Storage::delete($file_path); //Or you can do it as well
            $file = $request->file('filename');
            $file_name = date('YmdHis') . $filename;
            $ext = strtolower($file->getClientOriginalExtension());
            $file_full_name = $file_name . '.' . $ext;
            $file->storeAs('public/files', $file_full_name);
        }

        $files->update([
            'filename' => $file_full_name,
            'user_id' => $files->user_id,
            'role_id' => $files->role_id,
            'fileobjective' => $request->fileobjective,
            'filestatus' => $files->filestatus,
            'paymentstatus' => $files->paymentstatus,
        ]);
        return redirect()->route('dashboard')->with('success', 'File Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
