
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="">
                <div class="col-md-6">

                    <div class="profile-info no-margins">

                        <div>
                            <h2 class="no-margins">
                                {{$conexion[0]->id}} | {{$conexion[0]->cliente}}

                            </h2>
                            <h4>{{$conexion[0]->direccion}} | ({{ $estados[$conexion[0]->estadoCon]}})</h4>
                            <p>
                                <strong> Secuencia: </strong>  {{$conexion[0]->correlativo}}
                            </p>
                            <p>
                                <strong> Medidor: </strong>  {{$conexion[0]->medidor_id}}
                            </p>
                            <p>
                                <strong> Tipo: </strong>  {{$tipoCon[$conexion[0]->tipoCon]}}
                            </p>

                            <small>
                                {{ $conexion[0]->observacion}}
                            </small>
                        </div>

                    </div>
                </div>

                <div class="col-md-6">
                    <table class="table small m-b-xs">
                        <tbody>
                        <tr>
                            <td>
                                <strong>Zona:</strong> {{$conexion[0]->zona}}
                            </td>
                            <td>
                                <strong>Instalacion:</strong> {{$conexion[0]->fecha_instalacion}}
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <strong>Sector:</strong> {{$conexion[0]->sector}}
                            </td>
                            <td>
                                <strong>Inicio:</strong> {{$conexion[0]->fecha_inicio}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Tarifa:</strong> {{$conexion[0]->grupo}}
                            </td>
                            <td>
                                <strong>Baja:</strong> {{$conexion[0]->fecha_baja}}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
