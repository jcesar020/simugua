@extends('layouts.admin')
@section('style')
    {!! HTML::style('css/plugins/dataTables/dataTables.bootstrap.css') !!}
    {!! HTML::style('css/plugins/dataTables/dataTables.responsive.css') !!}
{{--    {!! HTML::style('css/plugins/datapicker/datepicker3.css')!!}--}}

    @endsection

@section('content')



{{--    <input id="periodo" type="hidden" value="{{$param['periodo']}}">
    <input id="sector" type="hidden" value="{{$param['sector']}}">--}}



    <div class="ibox">
        <div class="ibox-title">
            <h3>Generacion de multas</h3>
        </div>

        <div class="ibox-content">


                 <p>LOS SIGUIENTES FACTURAS SE ENCUENTRAN VENCIDAS Y SE GENERA LA MULTA ESTABLECIDA.</p>

            {!! link_to( "facturas/multas/generar", 'Generar', $attributes=['class'=>'btn btn-primary']) !!}


        </div>
        <div class="row">&nbsp;</div>
    </div>

    <table class="table table-striped table-bordered table-hover table-condensed dataTables-example">
        <thead>
        <tr>
            <th>Factura</th>
            <th>Id</th>
            <th>Nombre</th>
            <th>Vencimiento</th>
        </tr>
        </thead>
        <tbody>

    @foreach($datos as $dato)
        <tr>
            <td>
                {{$dato->id}}
            </td>
            <td>
                {{$dato->conexion_id}}
            </td>
            <td>
                {{$dato->nombre}}
            </td>
            <td>
                {{$dato->fecha_vencimiento}}
            </td>

        </tr>



        @endforeach
        </tbody>
    </table>

    @endsection

@section('script')
    {!! HTML::script('js/plugins/dataTables/jquery.dataTables.js') !!}
    {!! HTML::script('js/plugins/dataTables/dataTables.bootstrap.js') !!}
    {!! HTML::script('js/plugins/dataTables/dataTables.responsive.js') !!}

    {!! HTML::script('js/project/datatable.js') !!}
{{--    {!! Html::script('js/plugins/datapicker/bootstrap-datepicker.js')!!}

    {!! Html::script('js/project/datepicker.js')!!}

    {!! HTML::script('js/ajax/genfacturas.js') !!}--}}
    @stop