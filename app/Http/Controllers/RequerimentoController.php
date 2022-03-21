<?php

namespace App\Http\Controllers;

use App\Models\Requerimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use SebastianBergmann\Environment\Console;

class RequerimentoController extends Controller
{
    public function index()
    {
        $requerimentos = Requerimento::orderBy('numero', 'desc')->paginate(2);
        return view('requerimentos.requerimento', ['requerimentos' => $requerimentos]);
    }

    public function search(Request $request)
    {
        $filters = $request->all();
        $requerimentos = Requerimento::where('numero', 'LIKE', "%{$request->search}%")
            ->orwhere('requerente', 'LIKE', "%{$request->search}%")
            ->paginate(2);
        return view('requerimentos.requerimento', compact('requerimentos', 'filters'));
    }


    public function store(Request $request)
    {
        $requer = new Requerimento();
        $requer->numero = $request->numero;
        $requer->requerente = $request->requerente;
        $requer->assunto = $request->assunto;
        $requer->data_entrada = $request->data_entrada;
        $requer->observacao = $request->observacao;
        $requer->contacto = $request->contacto;
        $requer->data_despacho = $request->data_despacho;
        $requer->tipo_despacho = $request->tipo_despacho;
        $save =   $requer->save();



        //return $save  ? ["Resultado" => "Dados guardados com sucesso"]
        //    :  ["Resultado" => "Falha ao guardar dados"];
        if ($save) {

            return Redirect('add');
        }
    }
    public function edit($id)
    {
        $requerimentos = Requerimento::findOrFail($id);
        return view('requerimentos.update_requerimento', ['requerimento' => $requerimentos]);
    }
    public function despacho()
    {
        return view('requerimentos.despacho_requerimento');
    }

    public function update(Request $request)
    {
        $requer = Requerimento::findOrFail($request->id);
        $requer->numero = $request->numero;
        $requer->requerente = $request->requerente;
        $requer->assunto = $request->assunto;
        $requer->data_entrada = $request->data_entrada;
        $requer->observacao = $request->observacao;
        $requer->data_despacho = $request->data_despacho;
        $requer->tipo_despacho = $request->tipo_despacho;
        $requer->contacto = $request->contacto;
        $update = $requer->update();
        if ($update) {
            return Redirect('add');
        }
    }
    public function destroy($id)
    {
        Requerimento::findOrFail($id)->delete();
        return Redirect('/add');
    }
}
