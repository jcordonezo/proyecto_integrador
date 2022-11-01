@include('partials.head')
<br>
<div class="container text-center">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('roles.update', $rol->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <div class="card">
                        <div class="card-header">
                            <h1>Editar rol</h1>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                            <label for="rol">Nombre del rol</label>
                            </h5>
                            <input type="text" name="nombre_rol" id="rol" class="form-control" placeholder="Ejemplo: Recepcionista" aria-describedby="helpId" value="{{ $rol->nombre }}" required>
                            <button type="submit" class="btn btn-primary mt-4">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@include('partials.footer')
