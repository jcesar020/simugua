@foreach($datos as $dato)
    <tr>
        <td>{{$dato->id}}</td>
        <td>
            {{$dato->sector}}
        </td>

        <td>


            {{$dato->cone}}
        </td>
        <td>{{$dato->lect}}</td>
        <td>{{$dato->ingr}}</td>
        <td>{{$dato->vali}}</td>
        <td>{{$dato->obse}}</td>
        <td>{{$dato->apro}}</td>
        <td>{{$dato->fact}}</td>
        <td>
            <?php
                //Preparar parametro de lectura
                $parametro=$_REQUEST['anio']. $_REQUEST['mes'] . "/" .  $dato->id;
            ?>



                {!! link_to( "lectura/" .$parametro.'/ingresar', 'Editar', $attributes=['class'=>'btn btn-primary']) !!}
                {{----}}
                {{--{!! link_to( "facturas/" .$parametro . '/facturar', 'Facturar', $attributes=['class'=>'btn btn-warning']) !!}--}}
                {{----}}
                {!! link_to("lectura/". $parametro.'/imprimir', 'Imprimir', $attributes=['class'=>'btn btn-info btn-sm']) !!}

        </td>

    </tr>
@endforeach