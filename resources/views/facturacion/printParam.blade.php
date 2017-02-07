@extends('layouts.admin')
@section('style')

    {!!Html::style("css/plugins/chosen/chosen.css")!!}

@stop


@section('content')
    @include('alerts.request')
<h3>IMPRESION DE FACTURAS</h3>

<div class="ibox">
    <div class="ibox-title">
        <h3>Parametros de impresion</h3>
    </div>
    <div class="ibox-content">

        {!! AppForm::open(['route'=>'facturar.store', 'method'=>'POST']) !!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

        <div class="row">
        <div class="form-group">
            {!!Form::label('periodo','Periodo:',  ['class'=>'control-label col-sm-2'])!!}
            <div class="col-sm-6">
                {!! Form::select('periodo', $periodos, null, ['class'=>'chosen-select control', 'placeholder'=>'Seleccione un periodo']) !!}

            </div>
        </div>
        </div>
        <div class="row">
            <div class="form-group ">
                {!!Form::label('sector_id','Sector:',  ['class'=>'control-label col-sm-2'])!!}
                <div class="col-sm-6">
                    {!! Form::select('sector_id', $sectores, null, ['class'=>'chosen-select', 'placeholder'=>'Seleccione un sector', 'style'=>'width:350px;']) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                {!!Form::label('desde','Desde:',  ['class'=>'control-label col-sm-2'])!!}
                <div class="col-sm-6">

                    {!! Form::select('desde',[], null, ['class'=>'chosen-select control', 'style'=>'width:500px;',  'placeholder'=>'Seleccione una factura']) !!}

                </div>
            </div>
        </div>



        <div class="row">
            <div class="form-group">
                {!!Form::label('hasta','Hasta:',  ['class'=>'control-label col-sm-2'])!!}
                <div class="col-sm-6">

                        {!! Form::select('hasta',[], null, ['class'=>'chosen-select control', 'style'=>'width:500px;',  'placeholder'=>'Seleccione una factura']) !!}

                    </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="form-gruop">
                {!!Form::label('mensaje','Mensaje:',  ['class'=>'control-label col-sm-2'])!!}
                <div class="col-sm-8">
                    <?php $mensaje='!!LOS SERVICIOS CON TRES O MAS MESES EN MORA SE SUSPENDERAN, DESPUES DE LA FECHA DE VENCIMIENTO, ACERCATE A LA ALCALDIA PARA REALIZAR TU PAGO!!';  ?>
                    {!! Form::textarea('mensaje', $mensaje , ['class'=>'form-control','rows'=>'3','maxlength'=>'200' , 'placeholder'=>'Ingrese un comentario para las facturas' ]) !!}
                </div>
            </div>

        </div>

        <br>
        {!! AppForm::submit('Imprimir', ['class'=>'btn btn-primary']) !!}

    </div>
</div>

{!! AppForm::close() !!}
    @endsection

@section('script')

    {!!Html::script('js/plugins/chosen/chosen.jquery.js')!!}
    {!!Html::script('js/project/chosenSelect.js')!!}
    {!!Html::script('js/ajax/facturas.js')!!}

@endsection