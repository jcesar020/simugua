@extends('layouts.admin')
@section('title')
    {{'Creando conexion'}}
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
    {!! AppForm::open(['route'=>'conexion.store', 'method'=>'POST', 'class'=>'form-horizontal']) !!}

    <p></p>
    @include('conexion.partials.fields')

    {!! AppForm::submit('Registrar') !!}

    {!!AppForm::close() !!}
@endsection
@section('script')
    {!!Html::script('js/plugins/datapicker/bootstrap-datepicker.js')!!}
    {!!Html::script('js/project/datepicker.js')!!}

    {!!Html::script('js/plugins/chosen/chosen.jquery.js')!!}
    {!!Html::script('js/project/chosenSelect.js')!!}
@endsection