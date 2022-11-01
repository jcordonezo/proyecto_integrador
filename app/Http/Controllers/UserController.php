<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rol;
use \PDF;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        $roles = Rol::all();
        return view('Usuarios.gestionUsuarios', compact('usuarios', 'roles'));

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
        if($request->contrasenia == $request->contraseniaDos){
        $usuario = new User();
        $usuario->id_rol = $request->id_rol;
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->documento = $request->documento;
        $usuario->email = $request->email;
        $usuario->telefono = $request->telefono;
        $usuario->password = $request->contrasenia;
        $usuario->save();
        return redirect()->route('usuarios.index')->with('creado', 'Usuario creado con éxito');
        }else{
            return redirect()->route('usuarios.index')->with('error', 'Las contraseñas no coinciden');
        }
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
        $usuario = User::find($id);
        $roles = Rol::all();
        return view('Usuarios.editarUsuario', compact('usuario', 'roles'));
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
        $usuario = User::find($id);
        $usuario->id_rol = $request->id_rol;
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->documento = $request->documento;
        $usuario->email = $request->email;
        $usuario->telefono = $request->telefono;
        $usuario->password = $request->contrasenia;
        $usuario->save();
        return redirect()->route('usuarios.index')->with('actualizado', 'Usuario actualizado con éxito');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::find($id);
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('eliminado', 'Usuario eliminado con éxito');
    }

    public function pdf(){
        $usuarios = User::all();
        $pdf = PDF::loadView('Usuarios.reporte',["usuarios" => $usuarios]);
        return $pdf->stream('reporte_usuarios.pdf', array('Attachment' => 0));
    }

}
