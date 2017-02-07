    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <div>
                    <span class="pull-right text-right">
                    <small>Promedio en los ultimos {{$lectura['cuenta']}} meses</small>
                        <br/>
                        Consumo total: {{$lectura['suma']}} m3
                    </span>
                    <h3 class="font-bold no-margins">
                        Consumo de los ultimos meses
                    </h3>
                    <small>En metros cubicos</small>
                </div>

                <div class="m-t-sm">

                    <div class="row">
                        <div class="col-md-8">
                            <div>
                                <canvas id="barChart" height="114"></canvas>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <ul class="stat-list m-t-lg">
                                <li>
                                    <h2 class="no-margins">{{$lectura['promedio']}} m3</h2>
                                    <small>Consumo promedio</small>
                                    {{--<div class="progress progress-mini">--}}
                                        {{--<div class="progress-bar" style="width: 48%;"></div>--}}
                                    {{--</div>--}}
                                </li>
                                <li>
                                    <h2 class="no-margins ">${{$lectura['promedioMonto']}}</h2>
                                    <small>Monto promedio</small>
                                    {{--<div class="progress progress-mini">--}}
                                        {{--<div class="progress-bar" style="width: 60%;"></div>--}}
                                    {{--</div>--}}
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="m-t-md">
                    <small class="pull-right">
                        <i class="fa fa-clock-o"> </i>
                        Ultima lectura 16.07.2015
                    </small>
                    {!! link_to_action('LecturaconController@listar', $title="Mostrar Lecturas", $parameters=$conexion[0]->id, $attributes=['class'=>'btn btn-xs btn-default']) !!}

                </div>

            </div>
        </div>
    </div>


