@extends('layouts.admin')
@section('content')

    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <h3 class="font-bold no-margins">
                    Facturas Generadas
                </h3>
                <div class="">
                    <table class="table table-hover margin bottom">
                        <thead>
                        <tr>
                            <th class="text-center"><strong>No.</strong></th>
                            <th class="text-center">Periodo</th>
                            <th class="text-center">Vencimiento</th>
                            <th class="text-center">Pago</th>
                            <th class="text-center">Monto</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center"></th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--@foreach($facturas as $factura)--}}

                            <tr>
                                <td class="text-center"><strong>id</strong></td>
                                <td class="text-center small"></td>
                                <td class="text-center small"></td>
                                <td class="text-center small"></td>
                                <td class="text-right small">$</td>
                                <td class="text-center"><span class="label " ></span></td>
                                <td>

                                    <div class="btn-group">
                                        <button data-toggle="dropdown" class="btn btn-primary btn-xs detalle dropdown-toggle"><i
                                                    class="fa fa-list"></i> <span class="caret"></span></button>
                                        <ul class="dropdown-menu">

                                            <li><a href="#" class="font-bold"><i class="fa fa-eye">   Mostrar</i></a></li>
                                            <li><a href="#" class=""><i class="fa fa-edit">   Editar</i></a></li>
                                            <li class="divider"></li>
                                            <li><a href="#"><i class="fa fa-print">  Imprimir</i> </a></li>
                                        </ul>
                                    </div>

                                    {{--{!! link_to_action('LecturaconController@listar', $title="Mostrar Lecturas", $parameters=$conexion[0]->id, $attributes=['class'=>'btn btn-xs btn-default']) !!}--}}

                                    {{--<a href="" class="btn btn-xs btn-primary"><i class="fa fa-print">Imprimir</i></a>--}}
                                    {{--<a href="" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>--}}

                                </td>

                            </tr>
                        {{--@endforeach--}}

                        </tbody>
                    </table>
                </div>


                <div class="m-t-md">
                    <small class="pull-right">
                    </small>
                    <button class="btn btn-xs btn-default">Mostrar todas</button>
                </div>
            </div>
        </div>
    </div>

    @endsection
