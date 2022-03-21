<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function index()
    {
        $notas = Nota::orderBy('numero', 'desc')->paginate(2);
        return view('notas.nota', ['notas' => $notas]);
    }
    public function search(Request $request)
    {
        $filters = $request->all();
        $notas = Nota::where('numero', 'LIKE', "%{$request->search}%")
            ->orwhere('proveniencia', 'LIKE', "%{$request->search}%")
            ->paginate(2);
        return view('notas.nota', compact('notas', 'filters'));
    }
    public function store(Request $request)
    {
        $requer = new Nota();
        $requer->numero = $request->numero;
        $requer->data_entrada = $request->data_entrada;
        $requer->classificacao = $request->classificacao;
        $requer->data_emissao = $request->data_emissao;
        $requer->proveniencia = $request->proveniencia;
        $requer->data_despacho = $request->data_despacho;
        $requer->assunto = $request->assunto;
        $requer->despacho = $request->despacho;

        $save =   $requer->save();
        if ($save) {
            return Redirect('nota');
        }
    }
    public function destroy($id)
    {
        Nota::findOrFail($id)->delete();
        return Redirect('nota');
    }

    public function edit($id)
    {
        $notas = Nota::findOrFail($id);
        return view('notas.update_nota', ['nota' => $notas]);
    }

    public function update(Request $request)
    {
        $requer = Nota::findOrFail($request->id);
        $requer->numero = $request->numero;
        $requer->data_entrada = $request->data_entrada;
        $requer->classificacao = $request->classificacao;
        $requer->data_emissao = $request->data_emissao;
        $requer->proveniencia = $request->proveniencia;
        $requer->data_despacho = $request->data_despacho;
        $requer->assunto = $request->assunto;
        $requer->despacho = $request->despacho;
        $update = $requer->update();
        if ($update) {
            return Redirect('nota');
        }
    }
}
