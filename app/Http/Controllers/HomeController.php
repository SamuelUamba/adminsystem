<?php

namespace App\Http\Controllers;

use App\Models\Audiencia;
use App\Models\Beneficiario;
use App\Models\Mercado;
use App\Models\Nota;
use App\Models\Requerimento;
use App\Models\User;
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
        // Usuarios
        $total = User::all();
        $users = User::orderBy('name', 'desc')->paginate(2);
        $operadores = User::where('tipo', 'operador');
        $admin = User::where('tipo', 'administrador');
        $supervisor = User::where('tipo', 'supervisor');
        //Beeficiarios
        $beneficiarios = Beneficiario::orderBy('nome', 'desc')->paginate(2);
        $totalF = Beneficiario::where('genero', 'F');
        $totalM = Beneficiario::where('genero', 'M');
        $totalinss = Beneficiario::where('inss', '1');
        //Mercados
        $mercados = Mercado::orderBy('nome_mercado', 'desc')->paginate(2);

        return view('home', [
            'beneficiarios' => $beneficiarios,
            'totalF' => $totalF,
            'totalM' => $totalM,
            'total' => $total,
            'totalinss' => $totalinss,

            //Users
            'operadores' => $operadores,
            'admin' => $admin,
            'supervisor' => $supervisor,
            'users' => $users,

            //mercados
            'mercados' => $mercados,

        ]);
    }
    public function register()
    {
        return view('auth.register');
    }
}
