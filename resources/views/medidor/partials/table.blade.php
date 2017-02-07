
<div class="table-responsive">
    <!-- <table class="table table-striped table-bordered table-hover dataTables-example" > -->

    <table class="table table-striped table-bordered table-hover dataTables-example">
        <thead>
        <tr>
            <th>SERIE_ID</th>
            <th>MARCA</th>
            <th>DIAMETRO</th>
            <th>LECTURA</th>
            <th>ESTADO</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($medidores as $medidor)
            <tr>
                <td class="text-center"><strong>{{$medidor->id}}</strong></td>
                <td>{{$medidor->marca}}</td>
                <td>{{$diametros[$medidor->diametro_id]}}</td>
                <td>{{$medidor->lectura}}</td>
                <td>{{'Activo'}}</td>
                <td>{!! link_to_route('medidor.edit', $title="Editar", $parameters=$medidor->id, $attributes=['class'=>'btn btn-primary btn-sm']) !!}</td>
            </tr>

        @endforeach
        </tbody>
    </table>


</div>
