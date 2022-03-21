<?php

namespace App\Http\Controllers;

use App\Models\Audiencia;
use Illuminate\Http\Request;

class AudienciaController extends Controller
{
    public function index()
    {

        $audiencias = Audiencia::orderBy('numero', 'desc')->paginate(2);
        return view('audiencias.audiencia', ['audiencias' => $audiencias]);
    }

    public function search(Request $request)
    {
        $filters = $request->all();
        $audiencias = Audiencia::where('numero', 'LIKE', "%{$request->search}%")
            ->orwhere('solicitante', 'LIKE', "%{$request->search}%")
            ->paginate(2);
        return view('audiencias.audiencia', compact('audiencias', 'filters'));
    }
    public function store(Request $request)
    {
        $requer = new Audiencia();
        $requer->numero = $request->numero;
        $requer->solicitante = $request->solicitante;
        $requer->assunto = $request->assunto;
        $requer->data_marcacao = $request->data_marcacao;
        $requer->gabinete = $request->gabinete;
        $requer->contacto = $request->contacto;
        $requer->data_atendimento = $request->data_atendimento;
        $requer->desfecho = $request->desfecho;

        $save =   $requer->save();
        if ($save) {
            return Redirect('audiencia');
        }
    }
    public function destroy($id)
    {
        Audiencia::findOrFail($id)->delete();
        return Redirect('audiencia');
    }

    public function edit($id)
    {
        $audiencias = Audiencia::findOrFail($id);
        return view('audiencias.update_audiencia', ['audiencia' => $audiencias]);
    }
    public function update(Request $request)
    {
        $requer = Audiencia::findOrFail($request->id);
        $requer->numero = $request->numero;
        $requer->solicitante = $request->solicitante;
        $requer->assunto = $request->assunto;
        $requer->data_marcacao = $request->data_marcacao;
        $requer->gabinete = $request->gabinete;
        $requer->contacto = $request->contacto;
        $requer->data_atendimento = $request->data_atendimento;
        $requer->desfecho = $request->desfecho;
        $update = $requer->update();
        if ($update) {
            return Redirect('audiencia');
        }
    }


    public function resumo()
    {
        $audiencias = Audiencia::all();
        $total_MCD = Audiencia::where('gabinete', 'MCD');
        $total_DDS = Audiencia::where('gabinete', 'DDS');
        $desfechoNF = Audiencia::where('desfecho', 'Não Favoravel');
        $desfechoF = Audiencia::where('desfecho', 'Favoravel');
        $desfechoP = Audiencia::where('desfecho', null);
        return view('audiencias.resumo_audiencias', [
            'audiencias' => $audiencias,
            'total_MCD' => $total_MCD,
            'total_DDS' => $total_DDS,
            'desfechoNF' => $desfechoNF,
            'desfechoP' => $desfechoP,
            'desfechoF' => $desfechoF
        ]);
    }
}
