<?php

namespace App\Http\Controllers;

use App\Models\Mercado;
use Illuminate\Http\Request;

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
            return Redirect('/mercados')->with('status', 'Mercado Adicionado!');
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
        Mercado::findOrFail($id)->delete();
        return Redirect('/mercados/list')->with('status', 'Registo Removido com sucesso!');
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
            return Redirect('mercados/list')->with('status', 'Actualização feita com sucesso!');;
        }
    }
}
