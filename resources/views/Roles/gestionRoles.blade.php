@include('partials.head')
<br>
<br>
<div class="container text-center">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('roles.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="card">
                        <div class="card-header">
                            <h1>Gestion de roles <a href="{{route('roles.pdf')}}" class="btn btn-success" Target="_blank"> Ver PDF</a> </h1>
                        </div>
                        <div class="card-body">
                        <h5 class="card-title">
                            <label for="rol">Nombre del rol</label>
                        </h5>
                        <input type="text" name="nombre_rol" id="rol" class="form-control" placeholder="Ejemplo: Recepcionista" aria-describedby="helpId" required>
                        <button type="submit" class="btn btn-primary mt-4">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
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
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre del rol</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $rol)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $rol->nombre }}</td>
                        <td>
                            <a href="{{ route('roles.edit', $rol->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('roles.destroy', $rol->id) }}" method="POST" class="d-inline">
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
