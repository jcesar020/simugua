@extends('layouts.admin')
@section('style')
    {!! HTML::style('css/plugins/dataTables/dataTables.bootstrap.css') !!}
    {!! HTML::style('css/plugins/dataTables/dataTables.responsive.css') !!}
    {!! HTML::style('css/plugins/datapicker/datepicker3.css')!!}

    @endsection

@section('content')



    <input id="periodo" type="hidden" value="{{$param['periodo']}}">
    <input id="sector" type="hidden" value="{{$param['sector']}}">



    <div class="ibox">
        <div class="ibox-title">
            <h3>Generacion de facturacion</h3>
        </div>

        <div class="ibox-content">

            <div class="col-sm-6">

                <h4>Sector:{{$param['sectorName']}}</h4>
                 LOS SIGUIENTES CONEXIONES ESTAN LISTAS PARA EL PROCESO.
                <br>
                <button class="btn btn-primary" id="btnGenerar">Generar</button>

            </div>
            <div class="form-group" id="data_1">
                <label for="fechaVen" class="form_label col-sm-2">FECHA DE VENCIMIENTO:</label>
                <div class="input-group date col-sm-2">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="fechaVen" type="text" class="form-control" >
                </div>
            </div>
            <div class="row"></div>

        </div>
    </div>

    <table class="table table-striped table-bordered table-hover table-condensed dataTables-example">
        <thead>
        <tr>
            <th>Secuencia</th>
            <th>Conexion_id</th>
            <th>Cliente</th>
            <th>Consumo</th>
        </tr>
        </thead>
        <tbody>

    @foreach($datos as $dato)
        <tr>
            <td>
                {{$dato->secuencia}}
            </td>
            <td>
                {{$dato->conexion_id}}
            </td>
            <td>
                {{$dato->cliente}}
            </td>
            <td>
                {{$dato->consumo}}
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
    {!! Html::script('js/plugins/datapicker/bootstrap-datepicker.js')!!}

    {!! Html::script('js/project/datepicker.js')!!}

    {!! HTML::script('js/ajax/genfacturas.js') !!}
    @stop