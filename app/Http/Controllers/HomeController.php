<?php

namespace App\Http\Controllers;

use App\Models\Audiencia;
use App\Models\Nota;
use App\Models\Requerimento;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $audiencias = Audiencia::all();
        $requerimentos = Requerimento::all();
        $notas = Nota::all();
        return view('home', [
            'audiencias' => $audiencias,
            'requerimentos' => $requerimentos,
            'notas' => $notas,
        ]);
    }
}
