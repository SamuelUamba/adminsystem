<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

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
        $delete = User::findOrFail($id)->delete();
        if ($delete) {
            Alert::toast('Eliminado!', 'success');
            return Redirect('/user/list');
        } else {
            Alert::error('Erro!', 'Falha na Eliminação');
        }
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
        $requer->password = Hash::make($request->password);
        $update = $requer->update();
        if ($update) {
            Alert::toast('Dados Actualizados!', 'success');
            return Redirect('/user/list');
        }
    }
}
