@extends('layouts.admin')
@section('title')
    {{'Creando diametros'}}
    <?php $menu['parametros']='diametro'; ?>
@endsection
@section('content')
    @include('alerts.request')

    <div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
        <strong> Registro agregado correctamente.</strong>
    </div>

    <div id="msj-error" class="alert alert-danger alert-dismissible" role="alert" style="display:none">
        <strong id="msj"></strong>
    </div>
    {!! link_to('/diametro','Regresar', ['class'=>'btn btn-info'], null) !!}
    <div class="">
    {!!AppForm::open()!!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
    @include('diametro.partials.field')
    <div class="col-sm-2"></div>
    <div class="col-sm-4">
        {!!link_to('#', $title='Registrar', $attributes = ['id'=>'registro', 'class'=>'btn btn-primary'], $secure = null)!!}
    </div>
    {!!AppForm::close()!!}

    </div>
@endsection
@section('script')
    {!!Html::script('js/ajax/diametroCreate.js')!!}
@endsection