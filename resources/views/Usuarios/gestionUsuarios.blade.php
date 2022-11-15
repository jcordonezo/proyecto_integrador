@include('partials.head')
<br>
<br>
<div class="container text-center">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('usuarios.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="card">
                        <div class="card-header">
                            <h1>Edición de Usuarios <a href="{{route('usuarios.pdf')}}" class="btn btn-success" Target="_blank"> Ver PDF</a> </h1>
                        </div>
                        <div class="card-body">
                        <h5 class="card-title">
                            <h4>Edita al usuario</h4>
                        </h5>
                        <label for="rol">Seleccione un rol:</label>
                        <select class="form-control" id="rol" name="id_rol" class="form-control mt-4" required>
                            @foreach ($roles as $rol)
                                <option value="{{ $rol->id}}">{{ $rol->nombre}} </option>
                            @endforeach
                        </select>
                        <br>
                        <label for="nombre">Nombre:</label>
                        <input required type="text" name="nombre" id="nombre" class="form-control" placeholder="Ejemplo: Alberto" aria-describedby="helpId" required>
                        <br>
                        <label for="apellido">Apellido:</label>
                        <input required type="text" name="apellido" id="apellido" class="form-control" placeholder="Ejemplo: Gómez" aria-describedby="helpId" required>
                        <br>
                        <label for="documento">Documento:</label>
                        <input required type="number" name="documento" id="documento" class="form-control" placeholder="Ejemplo: 1053123456" aria-describedby="helpId" required>
                        <br>
                        <label for="email">Correo:</label>
                        <input required type="email" name="email" id="email" class="form-control" placeholder="Ejemplo: alberto@gmail.com" aria-describedby="helpId" required>
                        <br>
                        <label for="telefono">Celular:</label>
                        <input required type="number" name="telefono" id="telefono" class="form-control" placeholder="Ejemplo: 3108970106" aria-describedby="helpId" required>
                        <br>
                        <label for="contrasenia">Contraseña:</label>
                        <input min="5" required type="password" name="contrasenia" id="contrasenia" class="form-control" placeholder="" aria-describedby="helpId" required>
                        <br>
                        <label for="contraseniaDos">Confirmar contraseña:</label>
                        <input min="5" required type="password" name="contraseniaDos" id="contraseniaDos" class="form-control" placeholder="" aria-describedby="helpId" required>
                        <br>
                        <button id="boton" type="submit" class="btn btn-primary mt-4">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
            @if(Session::has('creado'))
            <div class="alert alert-success" role="alert">
                {{Session::get('creado')}}
            </div>
            @endif
            @if(Session::has('actualizado'))
            <div class="alert alert-success" role="alert">
                {{Session::get('actualizado')}}
            </div>
            @endif
            @if(Session::has('eliminado'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('eliminado')}}
            </div>
            @endif
            @if(Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('error')}}
            </div>
            @endif
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Documento</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        {{-- name in id_usuario from usuarioes table --}}
                        <td>{{$usuario->id}}</td>
                        <td>{{$usuario->nombre}}</td>
                        <td>{{$usuario->apellido}}</td>
                        <td>{{$usuario->documento}}</td>
                        <td>{{$usuario->email}}</td>
                        <td>{{$usuario->telefono}}</td>
                        <td>
                            <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('partials.footer')

