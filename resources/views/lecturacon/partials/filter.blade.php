<div class="panel-body">

    <h3 class="no-margins">
        {{$con[0]->id}} {{$con[0]->cliente}}
    </h3>
    <br>
    {!! link_to_route('conexion.show', $title="Regresar", $parameters=$con[0]->id, $attributes=['class'=>'btn btn-info btn-sm']) !!}

</div>