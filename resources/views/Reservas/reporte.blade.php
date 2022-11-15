<h1>Listado de Habitaciones</h1>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Número de habitación</th>
        <th scope="col">Camas</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($habitaciones as $habitacion)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$habitacion->numero_habitacion }}</td>
            <td>{{$habitacion->camas }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
