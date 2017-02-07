<table class="table table-striped table-bordered table-hover ">
    <thead>
    <thead>
    <th>NOMBRE</th>
    <th>APELLIDO</th>
    <th>DIRECCION</th>
    <th>TIPO</th>
    <th></th>
    </thead>
    <tbody>
    @foreach($clientes as $cliente)
        <tr>
            <td>{{$cliente->nombre}}</td>
            <td>{{$cliente->apellido}}</td>
            <td>{{$cliente->direccion}}</td>
            <td>{{$tipos[$cliente->tipo]}}</td>
            <td>
                {!! link_to_route('cliente.edit', $title="Editar", $parameters=$cliente->id, $attributes=['class'=>'btn btn-primary btn-sm']) !!}&nbsp;
                {!! link_to_route('cliente.show', $title="Mostrar", $parameters=$cliente->id, $attributes=['class'=>'btn btn-info btn-sm']) !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>