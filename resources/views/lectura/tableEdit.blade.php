@extends('layouts.admin')
@section('style')
    {!! HTML::style('css/plugins/dataTables/dataTables.bootstrap.css') !!}
    {!! HTML::style('css/plugins/dataTables/dataTables.responsive.css') !!}
    {!!Html::style("css/plugins/datapicker/datepicker3.css")!!}

        <!-- Sweet Alert -->
    {!! HTML::style('css/plugins/sweetalert/sweetalert.css') !!}

@endsection
@section('content')
    <h2>INGRESO DE LECTURAS</h2>

    <audio id="audio" src="http://www.soundjay.com/button/beep-07.wav" autostart="false"></audio>
    <audio id="audio_error" src="http://www.soundjay.com/button/beep-05.wav" autostart="false"></audio>

    <div class="form-group" id="data_1">
        <div class="col-sm-5">
            <?php
            $paramRuta = 'lectura/' . $param['periodo'] . '/' . $param['sector'] . '/';
            $paramRutaFactu = 'facturas/' . $param['periodo'] . '/' . $param['sector'] . '/';

            ?>

            {!! link_to($paramRuta.'generar', 'Generar', $attributes=['class'=>'btn btn-primary btn-sm']) !!}
            {!! link_to($paramRuta.'validar', 'Validar', $attributes=['class'=>'btn btn-success btn-sm']) !!}
            {!! link_to($paramRuta.'aprobar', 'Aprobar', $attributes=['class'=>'btn btn-warning btn-sm']) !!}
            {{--{!! link_to($paramRuta.'imprimir', 'Imprimir', $attributes=['class'=>'btn btn-info btn-sm']) !!}--}}
            {!! link_to($paramRutaFactu.'facturar', 'Facturar', $attributes=['class'=>'btn btn-primary btn-sm']) !!}

        </div>
        <label for="fechaLec" class="form_label col-sm-2">FECHA DE LECTURA:</label>

        <div class="input-group date col-sm-2">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="fechaLec" type="text"
                                                                                        class="form-control">
        </div>

    </div>

    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

    <table class="table table-striped table-bordered table-hover table-condensed dataTables-example">
        <thead>
        <tr>
            <th>Secuencia</th>
            <th>Id</th>
            <th>Nombre del Cliente</th>
            <th>Medidor</th>
            <th>Anterior</th>
            <th>Actual</th>
            <th>Consumo</th>
            <th>Estado</th>
            <th>Fecha_Lectu</th>
            <th>Opcion</th>
        </tr>
        </thead>
        <tbody id="body">
        @foreach($datos as $dato)
            <tr>
                <td>
                    {{$dato->correlativo}}
                </td>
                <td class="conexion_id">
                    <input data-periodo="<?=$dato->periodo?>" data-conexion_id="<?=$dato->conexion_id  ?>"
                           data-medidor_id="<?=$dato->medidor_id?>" class="datainfo" type="hidden">
                    {{$dato->conexion_id}}
                </td>

                <td>
                    <div>
                        {{$dato->nombreCompleto}}
                    </div>
                </td>
                <td class="text-right">
                    {{$dato->medidor_id}}
                </td>
                <td class="text-right lec-ant">

                    {{ $dato->lecturaIni }}
                </td>

                <td>
                    <?php
                    unset($parametros);

                    $parametros['style'] = 'border-width:0; margin:0;';
                    $parametros['class'] = 'form-control text-right lectura';
                    $parametros['min'] = $dato->lecturaIni;
                    if ($dato->estado == 'F' || $dato->estado == 'A') {
                        $parametros['disabled'] = 'disabled';
                    }
                    ?>

                    {!! Form::number('lectura[]',$dato->lecturaFin, $parametros) !!}

                </td>
                <td class="text-right consumo">
                    {{ \myClass\librerias::calcuConsumo($dato->lecturaIni, $dato->lecturaFin)  }}
                </td>
                <td class="estadoss">
                    <span class="label label-success estado">{{ $estados[$dato->estado] }}</span>

                </td>
                <td class="fechaIngreso">
                    {{ \myClass\librerias::formatDateLocal( $dato->fechaFin) }}
                </td>
                <td>
                    <div class="btn-group">
                        <button data-toggle="dropdown" class="btn btn-primary btn-xs detalle dropdown-toggle"><i
                                    class="fa fa-list"></i> <span class="caret"></span></button>
                        <ul class="dropdown-menu">

                            <li><a href="#" class="font-bold">Validar</a></li>
                            <li><a href="#" class="modificar">Modificar</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Eliminar</a></li>
                        </ul>
                    </div>
                    {{--<button class="btn btn-primary btn-sm detalle "  tabindex="-1" value="Detalle"><i class="fa fa-list"></i></button>--}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endsection

    @section('script')


    {!! HTML::script('js/ajax/lecturas.js') !!}

    {!! HTML::script('js/plugins/dataTables/jquery.dataTables.js') !!}
    {!! HTML::script('js/plugins/dataTables/dataTables.bootstrap.js') !!}
    {!! HTML::script('js/plugins/dataTables/dataTables.responsive.js') !!}

    {!! HTML::script('js/project/datatable.js') !!}

    {!!Html::script('js/plugins/datapicker/bootstrap-datepicker.js')!!}

    {!!Html::script('js/project/datepicker.js')!!}

    <!-- Sweet alert -->
    {!!Html::script('js/plugins/sweetalert/sweetalert.min.js')!!}


@stop