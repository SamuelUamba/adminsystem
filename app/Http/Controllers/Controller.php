<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function usersList()
    {

        $users = User::orderBy('name', 'desc')->paginate(7);
        return view('admin.userTable', ['users' => $users]);
    }
    public function search(Request $request)
    {
        $filters = $request->all();
        $users = User::where('name', 'LIKE', "%{$request->search}%")
            ->orwhere('email', 'LIKE', "%{$request->search}%")
            ->paginate(7);
        return view('admin.userTable', compact('users', 'filters'));
    }
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return Redirect('/user/list')->with('status', 'Usuario Eliminado');
    }
    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('admin.userUpdate', ['users' => $users]);
    }
    public function update(Request $request)
    {
        $requer = User::findOrFail($request->id);
        $requer->name = $request->name;
        $requer->email = $request->email;
        $requer->tipo = $request->tipo;
        $requer->password = $request->password;
        $update = $requer->update();
        if ($update) {
            return Redirect('/user/list')->with('status', 'Usuario Actualizado');
        }
    }
}
