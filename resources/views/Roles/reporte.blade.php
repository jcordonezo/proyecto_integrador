<h1>Listado de Roles</h1>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Nombre del rol</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($roles as $rol)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$rol->nombre }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
