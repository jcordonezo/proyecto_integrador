@include('partials.head')
<br>
<br>
<div class="container text-center">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('habitaciones.update',$habitaciones->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <div class="card">
                        <div class="card-header">
                            <h1>Edición de Habitaciones <a href="{{route('usuarios.pdf')}}" class="btn btn-success" Target="_blank"> Ver PDF</a> </h1>
                        </div>
                        <div class="card-body">
                        <h5 class="card-title">
                            <h4>Edita la habitación</h4>
                        </h5>
                        <label for="numero_habitacion">Indique el número de la habitación:</label>
                        <input required id="numero_habitacion" type="number" name="numero_habitacion" class="form-control" placeholder="Ejemplo: 101" value="{{ $habitaciones->numero_habitacion }}">
                        <br>
                        <label for="numero_camas">Indique el número de camas:</label>
                        <input required id="numero_camas" type="number" name="numero_camas" class="form-control" placeholder="Ejemplo: 2" value="{{ $habitaciones->camas }}">
                        <button id="boton" type="submit" class="btn btn-primary mt-4">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@include('partials.footer')



