<?php

namespace App\Http\Controllers;

use App\Models\Audiencia;
use App\Models\Beneficiario;
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
        $totauser_beneficiarios = User::where('tipo', 'beneficiario');
        $admin = User::where('tipo', 'administrador');
        $supervisor = User::where('tipo', 'supervisor');
        //Beeficiarios
        $beneficiarios = Beneficiario::all();
        $totalF = Beneficiario::where('genero', 'F');
        $totalM = Beneficiario::where('genero', 'M');
        return view('home', [
            'beneficiarios' => $beneficiarios,
            'totalF' => $totalF,
            'totalM' => $totalM,
            'total' => $total,

            //Users
            'beneficiarios' => $totauser_beneficiarios,
            'admin' => $admin,
            'supervisor' => $supervisor,
            'users' => $users,
        ]);
    }
    public function register()
    {
        return view('auth.register');
    }
}
