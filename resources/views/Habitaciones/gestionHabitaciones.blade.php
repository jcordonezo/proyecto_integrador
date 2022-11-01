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
                    <th scope="col">Opciones</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($habitaciones as $habitaciones)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$habitaciones->numero_habitacion}}</td>
                        <td>{{$habitaciones->camas}}</td>
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

