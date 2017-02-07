@extends('layouts.admin')
@section('title')
    {{'Editando sector'}}
    <?php $menu['parametros']='sector'; ?>
@endsection
@section('content')
    @include('alerts.request')
    {!! link_to('/sector','Regresar al listado', ['class'=>'btn btn-info'], null) !!}
    {!! AppForm::open(['model'=>$sector, 'update'=>'sector.update', 'method'=>'PUT']) !!}

    @include('sector.partials.fields')
    <div class="col-md-2 ">
        {!! AppForm::submit('Actualizar') !!}
    </div>
    {!!AppForm::close() !!}
    <div class="col-md-2 col-md-offset-8">
        {!! Form::open(['route'=>['sector.destroy', $sector], 'method'=>'DELETE']) !!}
        {!! Form::submit('Eliminar', ['class'=>'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>

@endsection