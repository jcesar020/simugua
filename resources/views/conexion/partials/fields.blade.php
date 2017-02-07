
<div class="panel panel-default">
    <div class="panel-heading">
        INFORMACION GENERAL
    </div>
    <div class="panel-body">

        <div class="form-group">
            {!!Form::label('cliente_id','Cliente:',  ['class'=>'control-label col-sm-2'])!!}
            <div class="col-sm-6">
                {!! Form::select('cliente_id', $clientes, null, ['class'=>'chosen-select', 'placeholder'=>'Seleccione un cliente']) !!}

            </div>
        </div>
        <div class="form-group">
            {!!Form::label('sector_id','Sector:',  ['class'=>'control-label col-sm-2'])!!}
            <div class="col-sm-6">
                {!! Form::select('sector_id', $sectores, null, ['class'=>'chosen-select', 'placeholder'=>'Seleccione un sector', 'style'=>'width:350px;']) !!}
            </div>
        </div>
        <div class="form-group">
            {!!Form::label('zona_id','Zona:',  ['class'=>'control-label col-sm-2'])!!}
            <div class="col-sm-6">
                {!! Form::select('zona_id', $zonas, null, ['class'=>'chosen-select ', 'placeholder'=>'Seleccione una zona', 'style'=>'width:350px;']) !!}
            </div>
        </div>
        <div class="form-group">
            {!!Form::label('correlativo', 'Secuencia: ', ['class'=>'control-label col-sm-2'])!!}
            <div class="col-sm-3">

                {!! Form::number('correlativo', null, ['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!!Form::label('direccion', 'Direccion:',  ['class'=>'control-label col-sm-2'])!!}
            <div class="col-sm-10">
                {!!Form::text('direccion', null, ['class'=>'form-control col-sm-10', 'placeholder'=>'Ingrese la direccion'])!!}
            </div>
        </div>

    </div>

</div>
<div class="panel panel-default">
    <div class="panel-heading">
        DATOS DE LA INSTALACION
    </div>
    <div class="panel-body">
        <div class="form-group">
            {!!Form::label('medidor_id', 'Medidor:', ['class'=>'control-label col-sm-2'])!!}
            <div class="col-sm-2">
                {!! Form::select('medidor_id', $medidores, null, ['class'=>'chosen-select ', 'placeholder'=>'Seleccione un medidor disponible', 'style'=>'width:350px;']) !!}

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default ">
            <div class="panel-heading">
                SERVICIOS
            </div>
            <div class="panel-body">

                {!!Form::label('tipoCon', 'Servicios:', ['class'=>'control-label col-sm-2'])!!}
                <div>
                    <div class="checkbox checkbox-inline">
                        {!! Form::checkbox('sagua', 1, null,['id'=>'sagua']) !!}
                        {!! Form::label('sagua','AGUA POTABLE', ['class'=>'negrita']) !!}
                    </div>

                    <div class="checkbox checkbox-inline">
                        {!! Form::checkbox('salca', 1, null,['id'=>'salca']) !!}
                        {!! Form::label('salca','ALCANTARILLADO') !!}
                    </div>
                    <p></p>
                </div>
                <div class="form-group">
                    {!!Form::label('tipoCon', 'Tipo de Servicio:', ['class'=>'control-label col-sm-2'])!!}
                    <div class="col-sm-2">
                        {!! Form::select('tipoCon', $tipos, null, ['class'=>'chosen-select ', 'placeholder'=>'Tipo conexion', 'style'=>'width:350px;']) !!}
                    </div>
                </div>



                <div class="form-group">
                    {!!Form::label('gtarifa_id', 'Grupo de Tarifa:', ['class'=>'control-label col-sm-2'])!!}
                    <div class="col-sm-2">
                        {!! Form::select('gtarifa_id', $grupotarifas, null, ['class'=>'chosen-select ', 'placeholder'=>'Seleccione un grupo', 'style'=>'width:350px;']) !!}
                    </div>
                </div>




            </div>
        </div>
    </div>
</div>
<div class="col-sm-6" style="padding-left: 0">
    <div class="panel panel-default">
        <div class="panel-heading">
           DOCUMENTOS
        </div>
        <div class="panel-body">
            <div class="">
                <div class="checkbox checkbox-inline">

                    {!!  Form::checkbox('cDui', 1, null,['id'=>'cDui']) !!}
                    {!! Form::label('cDui','DUI') !!}
                </div>
                <div class="checkbox checkbox-inline">
                    {!! Form::checkbox('cNit', 1, null,['id'=>'cNit']) !!}
                    {!! Form::label('cNit','NIT') !!}
                </div>
                <div class="checkbox checkbox-inline">
                    {!! Form::checkbox('cEscritura', 1, null,['id'=>'cEscritura']) !!}
                    {!! Form::label('cEscritura','Escrituras') !!}
                </div>
                <div class="checkbox checkbox-inline">

                    {!! Form::checkbox('cSalud', 1, null,['id'=>'cSalud']) !!}
                    {!! Form::label('cSalud','Permiso Sanidad') !!}

                </div>
            </div>

        </div>
    </div>

</div>

<div class="col-sm-6"  style="padding-right: 0">
    <div class="panel panel-default ">
        <div class="panel-heading">
           FECHAS
        </div>
            <div class="panel-body">
                <div class="form-group" id="data_1">
                    {!!Form::label('fecha_instalacion', 'Instalacion:', ['class'=>'control-label col-sm-4'])!!}
                    <div class="input-group date col-sm-6 ">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        {!!Form::text('fecha_instalacion', null, ['class'=>'form-control ', 'placeholder'=>'Ingrese la fecha'])!!}
                    </div>
                </div>

                <div class="form-group" id="data_2">
                    {!!Form::label('fecha_inicio', 'Inicio Facturacion:', ['class'=>'control-label col-sm-4'])!!}
                    <div class="input-group date col-sm-6 ">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        {!!Form::text('fecha_inicio', null, ['class'=>'form-control ', 'placeholder'=>'Ingrese la fecha'])!!}
                    </div>
                </div>
                <div class="form-group" id="data_2">
                    {!!Form::label('fecha_baja', 'Dado de baja:', ['class'=>'control-label col-sm-4'])!!}
                    <div class="input-group date col-sm-6 ">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        {!!Form::text('fecha_baja', null, ['class'=>'form-control ', 'placeholder'=>'Fecha de Baja'])!!}
                    </div>
                </div>
            </div>

    </div>
</div>



<div class="jumbotron ">
    <div class="form-group">
        {!!Form::label('observacion', 'Comentario:',  ['class'=>'control-label col-sm-2'])!!}
        <div class="col-sm-10">
            {!!Form::textarea('observacion', null, ['class'=>'form-control col-sm-10','rows'=>'2', 'placeholder'=>'Puede a�adir un comentario'])!!}
        </div>
    </div>
</div>




