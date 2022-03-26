<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use Illuminate\Http\Request;

class BeneficiarioController extends Controller
{
    public function index()
    {

        $beneficiarios = Beneficiario::orderBy('nome', 'desc')->paginate(10);
        return view('beneficiarios.beneficiario', ['beneficiarios' => $beneficiarios]);
    }

    public function getRegistos()
    {

        $beneficiarios = Beneficiario::orderBy('nome', 'desc')->paginate(2);
        return view('beneficiarios.tabela_registos', ['beneficiarios' => $beneficiarios]);
    }

    public function search(Request $request)
    {
        $filters = $request->all();
        $beneficiarios = Beneficiario::where('nome', 'LIKE', "%{$request->search}%")
            ->orwhere('numero_documento', 'LIKE', "%{$request->search}%")
            ->paginate(10);
        return view('beneficiarios.tabela_registos', compact('beneficiarios', 'filters'));
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
            return Redirect('register_beneficiario');
        }
    }
    public function destroy($id)
    {
        Beneficiario::findOrFail($id)->delete();
        return Redirect('register_beneficiario');
    }

    public function edit($id)
    {
        $beneficiarios = Beneficiario::findOrFail($id);
        return view('beneficiarios.update_beneficiario', ['beneficiarios' => $beneficiarios]);
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
            return Redirect('register_beneficiario');
        }
    }
}
