<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use Illuminate\Http\Request;

class BeneficiarioController extends Controller
{
    public function index()
    {

        $audiencias = Beneficiario::orderBy('nome', 'desc')->paginate(10);
        return view('audiencias.audiencia', ['audiencias' => $audiencias]);
    }

    public function registos()
    {

        $audiencias = Beneficiario::orderBy('nome', 'desc')->paginate(2);
        return view('audiencias.registos', ['audiencias' => $audiencias]);
    }

    public function search(Request $request)
    {
        $filters = $request->all();
        $audiencias = Beneficiario::where('numero', 'LIKE', "%{$request->search}%")
            ->orwhere('solicitante', 'LIKE', "%{$request->search}%")
            ->paginate(2);
        return view('audiencias.audiencia', compact('audiencias', 'filters'));
    }
    public function store(Request $request)
    {
        $requer = new Beneficiario();
        $requer->nome = $request->nome;
        $requer->genero = $request->genero;
        $requer->data_nascimento = $request->data_nascimento;
        $requer->numero_telefone = $request->numero_telefone;
        $requer->tipo_documento = $request->tipo_documento;
        $requer->numero_documento = $request->numero_documento;
        $requer->nome_mercado = $request->nome_mercado;
        $requer->tipo_actividade = $request->tipo_actividade;
        $requer->ano_inicio = $request->ano_inicio;

        $save =   $requer->save();
        if ($save) {
            return Redirect('audiencia');
        }
    }
    public function destroy($id)
    {
        Beneficiario::findOrFail($id)->delete();
        return Redirect('audiencia');
    }

    public function edit($id)
    {
        $audiencias = Beneficiario::findOrFail($id);
        return view('audiencias.update_audiencia', ['audiencia' => $audiencias]);
    }
    public function update(Request $request)
    {
        $requer = Beneficiario::findOrFail($request->id);
        $requer->nome = $request->nome;
        $requer->genero = $request->genero;
        $requer->data_nascimento = $request->data_nascimento;
        $requer->numero_telefone = $request->numero_telefone;
        $requer->tipo_documento = $request->tipo_documento;
        $requer->numero_documento = $request->numero_documento;
        $requer->nome_mercado = $request->nome_mercado;
        $requer->tipo_actividade = $request->tipo_actividade;
        $requer->ano_inicio = $request->ano_inicio;
        $update = $requer->update();
        if ($update) {
            return Redirect('audiencia');
        }
    }


    public function resumo()
    {
        $audiencias = Beneficiario::all();
        $totalF = Beneficiario::where('genero', 'F');
        $totalM = Beneficiario::where('genero', 'M');
        $desfechoNF = Beneficiario::where('desfecho', 'Não Favoravel');
        $desfechoF = Beneficiario::where('desfecho', 'Favoravel');
        $desfechoP = Beneficiario::where('desfecho', null);
        return view('audiencias.resumo_audiencias', [
            'audiencias' => $audiencias,
            'totalF' => $totalF,
            'totalM' => $totalM,
            'desfechoNF' => $desfechoNF,
            'desfechoP' => $desfechoP,
            'desfechoF' => $desfechoF
        ]);
    }
}
