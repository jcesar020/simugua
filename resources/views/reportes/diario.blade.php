@extends('layouts.admin')
@section('style')
    {!!Html::style("css/plugins/datapicker/datepicker3.css")!!}

    {!!Html::style("css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css")!!}
    {!!Html::style("css/plugins/iCheck/custom.css")!!}
@endsection
@section('content')
    @include('alerts.errors')
    {!! AppForm::open(['route'=>'reportes.store', 'method'=>'POST']) !!}
    <input type="hidden" name="tipo" value="diario">
    <div class="ibox">
        <div class="ibox-title">
            <h3>Reporte de ingresos diarios</h3>
        </div>
        <div class="ibox-content">
            <div class="form-group" id="data_1">
                <label for="fechaLec" class="form_label col-sm-2">FECHA:</label>
                <div class="input-group date col-sm-2">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="fecha" name="fecha" type="text" class="form-control" >
                </div>
            </div>
        </div>
        <div>
            <div class="col-sm-10">

                <div class="i-checks"><label> <input type="radio" checked="" value="1" name="detalle"> <i></i> Detalle </label></div>
                <div class="i-checks"><label> <input type="radio"  value="2" name="detalle"> <i></i> Resumen</label></div>

            </div>
        </div>
        <div class="row">
            <div class="form-group">
{{--
            {!! AppForm::radio('tipo','Detalle', 1, null, ['class'=>'i-checks']) !!}
            {!! AppForm::radio('tipo','Resumen', 2, null) !!}--}}
            </div>




        </div>

        <div class="row">
            {!! Form::submit('Imprimir', ['class'=>'btn btn-primary']) !!}

        </div>
    </div>
   {!! AppForm::close() !!}


@endsection

@section('script')


    {!!Html::script('js/plugins/datapicker/bootstrap-datepicker.js')!!}
    {!!Html::script('js/project/datepicker.js')!!}
    {!!Html::script('js/plugins/iCheck/icheck.min.js')!!}
@stop