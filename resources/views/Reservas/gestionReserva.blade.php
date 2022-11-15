@include('partials.head')
<br>
<br>
{{-- get id_usuario auth --}}
@php
    $id_usuario = Auth::user()->id;
@endphp
<div class="container text-center">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('reservas.store') }}" method="POST">
                @csrf
                {{-- input id_usuario hidden --}}
                <input type="hidden" name="id_usuario" value="{{ $id_usuario }}">
                <div class="form-group">
                    <div class="card">
                        <div class="card-header">
                            {{-- <h1>Gestion de Reservas <a href="{{route('habitaciones.pdf')}}" class="btn btn-success" Target="_blank"> Ver PDF</a> </h1> --}}
                        </div>
                        <div class="card-body">
                        <h5 class="card-title">
                            <h4>Crear nueva reserva</h4>
                        </h5>
                        <label for="numero_habitacion">Seleccione la habitación:</label>
                        <select required id="numero_habitacion" name="numero_habitacion" class="form-control">
                            @foreach ($habitaciones as $habitacion)
                                <option value="{{ $habitacion->id }}">{{ $habitacion->numero_habitacion }}</option>
                            @endforeach
                        </select>
                        <br>
                        {{-- fecha de ingreso --}}
                        <label for="fecha_ingreso">Seleccione la fecha de ingreso:</label>
                        <input required id="fecha_ingreso" type="date" name="fecha_ingreso" class="form-control" placeholder="Ejemplo: 2020-12-31" value="{{ old('fecha_ingreso') }}">
                        <br>
                        {{-- fecha de salida --}}
                        <label for="fecha_salida">Seleccione la fecha de salida:</label>
                        <input required id="fecha_salida" type="date" name="fecha_salida" class="form-control" placeholder="Ejemplo: 2020-12-31" value="{{ old('fecha_salida') }}">
                        <br>
                        {{-- numero de personas --}}
                        <label for="numero_personas">Indique el número de personas:</label>
                        <input required id="numero_personas" type="number" name="numero_personas" class="form-control" placeholder="Ejemplo: 2" value="{{ old('numero_personas') }}">
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
                    <th scope="col">Fecha de generación</th>
                    <th scope="col">Fecha de ingreso</th>
                    <th scope="col">Fecha de salida</th>
                    <th scope="col">Número de personas</th>
                    <th scope="col">Opciones</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($reservas as $reserva)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$reserva->fecha_generacion}}</td>
                        <td>{{$reserva->fecha_ingreso}}</td>
                        <td>{{$reserva->fecha_salida}}</td>
                        <td>{{$reserva->numero_personas}}</td>
                        <td>
                            <a href="{{ route('reservas.edit', $reserva->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST" class="d-inline">
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

