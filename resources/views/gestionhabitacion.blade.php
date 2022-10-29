@include('partials.head')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Gestion de habitaciones</h1>
            <form action="{{ route('habitacion.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="numero">Numero de habitacion</label>
                    <input type="text" name="numero_habitacion" id="numero" class="form-control" placeholder="Numero de habitacion" aria-describedby="helpId">
                    <label for="numero_camas">Numero de camas</label>
                    <input type="number" name="numero_camas" id="numero_camas" class="form-control" placeholder="Numero de camas" aria-describedby="helpId">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('partials.footer')
