@extends('layouts.admin')
@section('title')
    {{'Editando medidor'}}
    <?php $menu['catalogos']='medidor'; ?>
@endsection
@section('style')
    {!!Html::style("css/plugins/datapicker/datepicker3.css")!!}
    @endsection
@section('content')
    @include('alerts.request')
    {!! link_to('/medidor','Regresar', ['class'=>'btn btn-info'], null) !!}
    {!! AppForm::open(['model'=>$medidor, 'update'=>'medidor.update', 'method'=>'PUT']) !!}

        <div class="form-group">
            {!!Form::label('id','Serie ID:', ['class'=>'control-label col-sm-2'])!!}
            <div class="col-sm-2">
                {!!Form::text('id', null, ['class'=>'form-control', 'readonly'=>'readonly'])!!}
            </div>
        </div>

        @include('medidor.partials.fields')
    <div class="col-md-2 ">
        {!! AppForm::submit('Actualizar') !!}
    </div>
         {!!AppForm::close() !!}
    <div class="col-md-2 col-md-offset-8">
        {!! Form::open(['route'=>['medidor.destroy', $medidor], 'method'=>'DELETE']) !!}
        {!! Form::submit('Eliminar', ['class'=>'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>

@endsection

@section('script')
    {!!Html::script('js/plugins/datapicker/bootstrap-datepicker.js')!!}
    {!!Html::script('js/project/datepicker.js')!!}
    @stop