<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitacion;
use \PDF;


class HabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $habitaciones = Habitacion::all();
        return view('Habitaciones.gestionHabitaciones', compact('habitaciones'));
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
        $habitacion = new Habitacion();
        $habitacion->numero_habitacion = $request->numero_habitacion;
        $habitacion->camas = $request->numero_camas;
        $habitacion->tipo_cama = $request->tipo_cama;
        $habitacion->banio_privado = $request->banio_privado;
        $habitacion->tipo_habitacion = $request->tipo_habitacion;
        $habitacion->precio_base = $request->precio_base;
        $habitacion->save();

        return redirect()->route('habitaciones.index');
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
        $habitaciones = Habitacion::find($id);
        return view('Habitaciones.editarHabitacion', compact('habitaciones'));
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
        $habitacion = Habitacion::find($id);
        $habitacion->numero_habitacion = $request->numero_habitacion;
        $habitacion->camas = $request->numero_camas;
        $habitacion->save();
        return redirect()->route('habitaciones.index')->with('actualizado', 'Habitaci??n actualizada con ??xito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $habitacion = Habitacion::find($id);
        $habitacion->delete();
        return redirect()->route('habitaciones.index')->with('eliminado', 'Habitaci??n eliminada con ??xito');

    }

    public function pdf(){
        $habitaciones = Habitacion::all();
        $pdf = PDF::loadView('Habitaciones.reporte',["habitaciones" => $habitaciones]);
        return $pdf->stream('reporte_habitaciones.pdf', array('Attachment' => 0));
    }

}
