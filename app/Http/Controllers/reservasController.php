<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Habitacion;
use App\Models\HabitacionReservaUsuario;

class reservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = Reserva::all();
        $habitaciones = Habitacion::all();
        return view('reservas.gestionReserva', compact('reservas', 'habitaciones'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reserva = new Reserva();
        $reserva ->fecha_generacion = new \DateTime();
        $reserva->fecha_ingreso = $request->fecha_ingreso;
        $reserva->fecha_salida = $request->fecha_salida;
        $reserva->numero_personas = $request->numero_personas;
        $reserva->save();

        //traer el id de la ultima reserva
        $ultimaReserva = Reserva::all()->last();
        $reservaHabitacionesUsuarios = new HabitacionReservaUsuario();
        $reservaHabitacionesUsuarios->id_habitacion = $reserva->numero_habitacion;
        $reservaHabitacionesUsuarios->id_usuario = $reserva->id_usuario;
        $reservaHabitacionesUsuarios->id_reserva = $ultimaReserva;
        




        $reservaHabitacionesUsuarios->id_reserva = $reserva->id;
        return redirect()->route('reservas.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
