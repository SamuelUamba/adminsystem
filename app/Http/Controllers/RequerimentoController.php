<?php

namespace App\Http\Controllers;

use App\Models\Requerimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RequerimentoController extends Controller
{
    public function index()
    {
        return view('requerimento');
    }
    public function store(Request $request)
    {
        $requer = new Requerimento();
        $requer->numero = $request->numero;
        $requer->requerente = $request->requerente;
        $requer->assunto = $request->assunto;
        $requer->dataentrada = $request->dataentrada;
        $requer->datadespacho = $request->datadespacho;
        $requer->tipodespacho = $request->tipodespacho;
        $save =   $requer->save();
        //return $save  ? ["Resultado" => "Dados guardados com sucesso"]
        //    :  ["Resultado" => "Falha ao guardar dados"];
        if ($save) {

            return Redirect::to('adicionarrequerimento');
        }
    }
}
