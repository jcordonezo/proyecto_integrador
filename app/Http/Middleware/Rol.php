<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Rol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $rol)
    {
        $rolesPermitidos = explode('|', $rol);
        $rolUsuario = $request->user()->rol->nombre;
        if(!in_array($rolUsuario, $rolesPermitidos)) {
            return abort(403, 'No tienes permisos para acceder a esta página');
        }
        return $next($request);
    }

}
