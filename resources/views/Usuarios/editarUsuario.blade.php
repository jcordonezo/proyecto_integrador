@include('partials.head')
<br>
<br>
<div class="container text-center">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <div class="card">
                        <div class="card-header">
                            <h1>Gestion de Usuarios <a href="{{route('usuarios.pdf')}}" class="btn btn-success" Target="_blank"> Ver PDF</a> </h1>
                        </div>
                        <div class="card-body">
                        <h5 class="card-title">
                            <h4>Crear nuevo usuario</h4>
                        </h5>
                        <label for="rol">Seleccione un rol:</label>
                        <select class="form-control" id="rol" name="id_rol" class="form-control mt-4" required>
                            @foreach ($roles as $rol)
                                <option value="{{ $rol->id}}">{{ $rol->nombre}} </option>
                            @endforeach
                        </select>
                        <br>
                        <label for="nombre">Nombre:</label>
                        <input required type="text" name="nombre" id="nombre" class="form-control" placeholder="Ejemplo: Alberto" aria-describedby="helpId" required value="{{ $usuario->nombre }}">
                        <br>
                        <label for="apellido">Apellido:</label>
                        <input required type="text" name="apellido" id="apellido" class="form-control" placeholder="Ejemplo: Gómez" aria-describedby="helpId" required value="{{ $usuario->apellido }}">
                        <br>
                        <label for="documento">Documento:</label>
                        <input required type="number" name="documento" id="documento" class="form-control" placeholder="Ejemplo: 1053123456" aria-describedby="helpId" required value="{{ $usuario->documento }}">
                        <br>
                        <label for="email">Correo:</label>
                        <input required type="email" name="email" id="email" class="form-control" placeholder="Ejemplo: alberto@gmail.com" aria-describedby="helpId" required value="{{ $usuario->email }}">
                        <br>
                        <label for="telefono">Celular:</label>
                        <input required type="phone" name="telefono" id="telefono" class="form-control" placeholder="Ejemplo: 3108970106" aria-describedby="helpId" required value="{{ $usuario->telefono }}">
                        <br>
                        <label for="contrasenia">Contraseña:</label>
                        <input min="5" required type="password" name="contrasenia" id="contrasenia" class="form-control" placeholder="" aria-describedby="helpId" required value="{{ $usuario->password }}">
                        <br>
                        <label for="contraseniaDos">Confirmar contraseña:</label>
                        <input min="5" required type="password" name="contraseniaDos" id="contraseniaDos" class="form-control" placeholder="" aria-describedby="helpId" required  value="{{ $usuario->password }}">
                        <br>
                        <button id="boton" type="submit" class="btn btn-primary mt-4">Editar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@include('partials.footer')


