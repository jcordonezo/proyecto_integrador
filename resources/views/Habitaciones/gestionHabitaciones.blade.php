@include('partials.head')
<br>
<br>
<div class="container text-center">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('habitaciones.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="card">
                        <div class="card-header">
                            <h1>Gestion de Habitaciones <a href="{{route('habitaciones.pdf')}}" class="btn btn-success" Target="_blank"> Ver PDF</a> </h1>
                        </div>
                        <div class="card-body">
                        <h5 class="card-title">
                            <h4>Crear nueva habitación</h4>
                        </h5>
                        <label for="numero_habitacion">Indique el número de la habitación:</label>
                        <input required id="numero_habitacion" type="number" name="numero_habitacion" class="form-control" placeholder="Ejemplo: 101">
                        <br>
                        <label for="numero_camas">Indique el número de camas:</label>
                        <input required id="numero_camas" type="number" name="numero_camas" class="form-control" placeholder="Ejemplo: 2">
                        <br>
                        <label for="precio">Indique el precio de la habitación (precio base):</label>
                        <input required id="precio" type="number" name="precio_base" class="form-control" placeholder="Ejemplo: 50">
                        <br>
                        <label for="tipo_cama">Indique el tipo de cama:</label>
                        <select required id="tipo_cama" name="tipo_cama" class="form-control">
                            <option value="Individual">Individual</option>
                            <option value="Matrimonial">Matrimonial</option>
                            <option value="Queen">Queen</option>
                            <option value="King">King</option>
                        </select>
                        <br>
                        <label for="tipo">Indique el tipo de habitación:</label>
                        <select required id="tipo" name="tipo_habitacion" class="form-control">
                            <option value="Individual">Individual</option>
                            <option value="Doble">Doble</option>
                            <option value="Familiar">Familiar</option>
                        </select>
                        <br>
                        <label for="banio_privado">¿Tiene baño privado?</label>
                        <select required id="banio_privado" name="banio_privado" class="form-control">
                            <option value="Sí">Sí</option>
                            <option value="No">No</option>
                        </select>
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
            @if(Session::has('actualizado'))
            <div class="alert alert-success" role="alert">
                {{Session::get('actualizado')}}
            </div>
            @endif
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Número de habitación</th>
                    <th scope="col">Camas</th>
                    <th scope="col">Tipo de cama</th>
                    <th scope="col">Tipo de habitación</th>
                    <th scope="col">Baño privado</th>
                    <th scope="col">Precio base</th>
                    <th scope="col">Opciones</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($habitaciones as $habitaciones)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$habitaciones->numero_habitacion}}</td>
                        <td>{{$habitaciones->camas}}</td>
                        <td>{{$habitaciones->tipo_cama}}</td>
                        <td>{{$habitaciones->tipo_habitacion}}</td>
                        <td>{{$habitaciones->banio_privado}}</td>
                        <td>${{$habitaciones->precio_base}}</td>
                        <td>
                            <a href="{{ route('habitaciones.edit', $habitaciones->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('habitaciones.destroy', $habitaciones->id) }}" method="POST" class="d-inline">
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

