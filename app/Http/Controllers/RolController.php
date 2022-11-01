<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;
// use Barryvdh\DomPDF\Facade as PDF;
use \PDF;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Rol::all();
        return view('Roles.gestionRoles')->with('roles', $roles);
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
        $rol = new Rol();
        $rol->nombre = $request->nombre_rol;
        $rol->save();
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rol = Rol::find($id);
        return view('Roles.editarRol')->with('rol', $rol);
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
        $rol = Rol::find($id);
        $rol->nombre = $request->nombre_rol;
        $rol->save();
        return redirect()->route('roles.index')->with('actualizado', 'Rol actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rol = Rol::find($id);
        $rol->delete();
        return redirect()->route('roles.index')->with('eliminado', 'Rol eliminado correctamente');
    }

    public function pdf(){
        $roles = Rol::all();
        $pdf = PDF::loadView('roles.reporte',["roles" => $roles]);
        return $pdf->stream('reporte_roles.pdf', array('Attachment' => 0));
    }
}
