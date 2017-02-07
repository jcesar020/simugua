@extends('layouts.admin')
@section('title')
    {{'Editando zona'}}
    <?php $menu['parametros']='zona'; ?>
@endsection
@section('content')
    @include('alerts.request')
    {!! link_to('/zona','Regresar al listado', ['class'=>'btn btn-info'], null) !!}
    {!! AppForm::open(['model'=>$zona, 'update'=>'zona.update', 'method'=>'PUT']) !!}

    @include('zona.partials.fields')
    <div class="col-md-2 ">
        {!! AppForm::submit('Actualizar') !!}
    </div>
    {!!AppForm::close() !!}
    <div class="col-md-2 col-md-offset-8">
        {!! Form::open(['route'=>['zona.destroy', $zona], 'method'=>'DELETE']) !!}
        {!! Form::submit('Eliminar', ['class'=>'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
@endsection