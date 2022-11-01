<h1>Listado de Usuarios</h1>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Rol</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Documento</th>
        <th scope="col">Correo</th>
        <th scope="col">Celular</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuario)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$usuario->id}}</td>
            <td>{{$usuario->nombre}}</td>
            <td>{{$usuario->apellido}}</td>
            <td>{{$usuario->documento}}</td>
            <td>{{$usuario->email}}</td>
            <td>{{$usuario->telefono}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</table>
