<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function gerarPDF()
    {
        $beneficiarios =  Beneficiario::all();
        $pdf = PDF::loadView('relatorios.pdf_lista_beneficiarios', compact('beneficiarios'));
        return $pdf->setPaper('a4')->download('lista_de_beneficiarios.pdf');
        return view('relatorios.pdf_lista_beneficiarios', ['beneficiarios' => $beneficiarios]);
    }
    public function gerarComprovativo($id)
    {
        $beneficiarios = Beneficiario::findOrFail($id);
        $pdf = PDF::loadView('relatorios.pdf_beneficiarios', compact('beneficiarios'));
        return $pdf->setPaper('a4')->stream('beneficiario.pdf');
        return view('relatorios.pdf_beneficiarios', ['beneficiarios' => $beneficiarios]);
    }
    //Neste exemplo vai fazer o download do arquivo de PDF. Se precisar exibir no Browser pode trocar o método ->download(‘nome’) por ->stream();
    // Se precisar salvar o arquivo localmente pode utilizar o método ->save(‘path aqui’)
}
