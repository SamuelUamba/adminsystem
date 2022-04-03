<?php

namespace App\Http\Controllers;

use App\Models\Mercado;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MercadoController extends Controller
{

    public function index()
    {

        $mercados = Mercado::orderBy('nome_mercado', 'desc')->paginate(10);
        return view('mercados.mercados', ['mercados' => $mercados]);
    }
    public function store(Request $request)
    {
        $requer = new Mercado();
        $requer->nome_mercado = $request->nome_mercado;
        $requer->tipo = $request->tipo;
        $requer->cidade = $request->cidade;
        $save =   $requer->save();
        if ($save) {
            Alert::toast('Mercado Adicionado!', 'success');
            return Redirect('/mercados');
        }
    }
    public function mercadosList()
    {
        $mercados = Mercado::orderBy('nome_mercado', 'desc')->paginate(7);
        return view('mercados.lista', ['mercados' => $mercados]);
    }
    public function search(Request $request)
    {
        $filters = $request->all();
        $mercados = Mercado::where('nome_mercado', 'LIKE', "%{$request->search}%")
            ->orwhere('cidade', 'LIKE', "%{$request->search}%")
            ->paginate(7);
        return view('mercados.lista', compact('mercados', 'filters'));
    }

    public function destroy($id)
    {
        $delete = Mercado::findOrFail($id)->delete();
        if ($delete) {
            Alert::toast('Mercado Eliminado!', 'success');
            return Redirect('/mercados/list');
        } else {
            Alert::error('Erro!', 'Falha na Eliminação');
        }
    }


    public function edit($id)
    {
        $mercado = Mercado::findOrFail($id);
        return view('mercados.update', ['mercado' => $mercado]);
    }
    public function update(Request $request)
    {
        $requer = Mercado::findOrFail($request->id);
        $requer->nome_mercado = $request->nome_mercado;
        $requer->tipo = $request->tipo;
        $requer->cidade = $request->cidade;
        $update = $requer->update();
        if ($update) {
            Alert::toast('Dados Actualizados!', 'success');
            return Redirect('mercados/list');
        }
    }
}
