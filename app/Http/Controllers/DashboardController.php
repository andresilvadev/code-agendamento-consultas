<?php

namespace App\Http\Controllers;

use App\Medico;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    protected $usuarios;
    protected $medicos;

    public function __construct(User $usuarios, Medico $medicos)
    {
        $this->usuarios = $usuarios;
        $this->medicos = $medicos;
    }

    public function index() {
        $medicos = DB::table('medicos')->count();
        $usuarios = DB::table('users')->count();
        $pacientes = DB::table('pacientes')->count();
        $especialidades = DB::table('especialidades')->count();

        return view("dashboard.index", compact('medicos', 'usuarios', 'pacientes','especialidades'));
    }
}
