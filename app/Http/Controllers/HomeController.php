<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitacion;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
    public function index(Request $request)
    {

        $rol = Auth::user()->rol->nombre;
        $roles = Rol::all();
        $reservas = Habitacion::all();
        $habitaciones = Habitacion::all();
        $usuarios = User::all();
        switch ($rol) {
            case 'Administrador':
                return  view('Reservas.gestionReserva', compact('habitaciones', 'reservas', 'usuarios'));
                break;
            case 'Usuario':
                return  view('Usuarios.gestionUsuarios', compact('roles', 'usuarios'));
                break;
            case 'Jefe':
                $habitaciones = Habitacion::all();
                $reservas = Habitacion::all();
                $usuarios = User::all();
                return  view('Reservas.gestionReserva', compact('habitaciones', 'reservas', 'usuarios'));
                ;
                break;

            default:
                return "Otro";
                break;
        }

    }
}
