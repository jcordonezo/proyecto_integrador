@include('publicoPartials.head')

<br>
<div class="container text-center">
    <div class="row">
        @foreach ($habitaciones as $habitacion)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body bg-ligth">
                        <h2 class="card-title">Número de habitación: {{ $habitacion->numero_habitacion}}</h2>
                        <p class="card-text">Número de camas: {{ $habitacion->camas }}</p>
                        <p class="card-text">Tipo de cama: {{ $habitacion->tipo_cama }}</p>
                        <p class="card-text">Tipo de habitación: {{ $habitacion->tipo_habitacion }}</p>
                        <p class="card-text">Baño privado: {{ $habitacion->banio_privado }}</p>
                        <p class="card-text">Precio base: ${{ $habitacion->precio_base }}</p>
                        <img src="{{ asset('images/gallery3.jpg')}}" alt="" width="200">
                        <br>
                        <br>
                        <a href="{{route('login')}}" class="btn btn-primary">Reservar</a>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                {{-- <a href="{{ route('habitacion', $habitacion->id) }}" class="btn btn-sm btn-outline-secondary">Ver</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


@include('publicoPartials.footer')

