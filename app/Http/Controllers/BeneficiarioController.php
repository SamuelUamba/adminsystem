<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use App\Models\Mercado;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class BeneficiarioController extends Controller
{
    public function index()
    {
        $mercados = Mercado::orderBy('nome_mercado', 'asc')->get();
        $beneficiarios = Beneficiario::orderBy('nome', 'desc')->paginate(10);
        return view('beneficiarios.beneficiario', [
            'beneficiarios' => $beneficiarios,
            'mercados' => $mercados
        ]);
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
        $requer->inss = $request->inss;
        // upload de documentos
        if ($request->hasFile('doc_link') && $request->file('doc_link')->isvalid()) {
            $requestDocumento = $request->doc_link;
            $extension = $requestDocumento->extension();

            $documento_Name = md5($requestDocumento->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $request->doc_link->move(public_path('documentos/identificacao'), $documento_Name);

            $requer->doc_link = $documento_Name;
        }
        $save =   $requer->save();
        if ($save) {
            return Redirect('register_beneficiario')->with('status', 'Beneficiário registado com sucesso!');
        }
    }
    public function destroy($id)
    {
        Beneficiario::findOrFail($id)->delete();
        return Redirect('/getRegistos')->with('status', 'Beneficiário Removido com sucesso!');
    }

    public function edit($id)
    {
        $mercados = Mercado::all();
        $beneficiarios = Beneficiario::findOrFail($id);
        return view('beneficiarios.update_beneficiario', ['beneficiarios' => $beneficiarios, 'mercados' => $mercados]);
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
        $requer->inss = $request->inss;
        // upload de documentos
        if ($request->hasFile('doc_link') && $request->file('doc_link')->isvalid()) {
            $requestDocumento = $request->doc_link;
            $extension = $requestDocumento->extension();

            $documento_Name = md5($requestDocumento->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $request->doc_link->move(public_path('documentos/identificacao'), $documento_Name);

            $requer->doc_link = $documento_Name;
        }


        $update = $requer->update();
        if ($update) {
            return Redirect('register_beneficiario')->with('status', 'Beneficiário registado com sucesso!');;
        }
    }
}
