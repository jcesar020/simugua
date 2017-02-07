@extends('layouts.admin')
@section('title')
    {{'Editando conexion'}}
    <?php $menu['catalogos']='conexion'; ?>
@endsection
@section('style')
    {!!Html::style("css/plugins/datapicker/datepicker3.css")!!}
    {!!Html::style("css/plugins/chosen/chosen.css")!!}
    {!!Html::style("css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css")!!}
@stop
@section('content')
    @include('alerts.request')
    {!! link_to('/conexion','Regresar al listado', ['class'=>'btn btn-info'], null) !!}
    {!! AppForm::open(['model'=>$conexion, 'update'=>'conexion.update', 'method'=>'PUT']) !!}

    <p></p>
    @include('conexion.partials.fieldsHead')

    @include('conexion.partials.fields')
    <div class="row wrapper">
        <div class="col-md-2 col-sm-2">
            {!! AppForm::submit('Actualizar') !!}
        </div>
        {!!AppForm::close() !!}
        <div class="col-md-2 col-md-offset-8 col-sm-2 col-sm-8">
            {!! Form::open(['route'=>['conexion.destroy', $conexion], 'method'=>'DELETE']) !!}
            {!! Form::submit('Eliminar', ['class'=>'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('script')
    {!!Html::script('js/plugins/datapicker/bootstrap-datepicker.js')!!}
    {!!Html::script('js/project/datepicker.js')!!}

    {!!Html::script('js/plugins/chosen/chosen.jquery.js')!!}
    {!!Html::script('js/project/chosenSelect.js')!!}
@endsection