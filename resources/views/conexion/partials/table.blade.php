<div class="ibox float-e-margins" >


        <div class="table-responsive">

    <!-- <table class="table table-striped table-bordered table-hover dataTables-example" > -->
    <table class="table table-striped table-bordered table-hover table-condensed dataTables-example" width="100%">
        <thead>
        <tr>
            <th>ID</th>
            <th width="5%">Secuencia</th>
            <th width="25%">CLIENTE</th>
            <th>ZONA</th>
            <th>DIRECCION</th>
            <th>ESTADO</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($conexiones as $con)
            <tr>
                <td><strong>{{$con->id}}</strong></td>
                <td>{{$con->correlativo}}</td>
                <td>{{$con->nombres}}</td>
                <td>{{$con->zona}}</td>
                <td>{{$con->direccion}}</td>
                <td>{{$estados[$con->estadoCon]}}</td>
                <td>
                    {!! link_to_route('conexion.show', $title="Mostrar", $parameters=$con->id, $attributes=['class'=>'btn btn-info btn-xs']) !!}
                    {!! link_to_route('conexion.edit', $title="Editar", $parameters=$con->id, $attributes=['class'=>'btn btn-primary btn-xs']) !!}
                </td>
             </tr>
        @endforeach
        </tbody>
    </table>


</div>
</div>