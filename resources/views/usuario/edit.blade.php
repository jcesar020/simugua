@extends('layouts.admin')
    @include('alerts.success')
    @section('content')
        <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
        {!! Form::model($user,['route'=>['usuario.update',$user->id], 'method'=>'put']) !!}

            @include('usuario.forms.user')

        </div>
        </div>


        <div class="row">
            <div class="row col-md-2 ">
                {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>

            <div class="col-md-2 col-sm-offset-8">
                {!! Form::open(['route'=>['usuario.destroy', $user], 'method'=>'DELETE']) !!}
                {!! Form::submit('Eliminar', ['class'=>'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    @endsection

    @section('script')
    @endsection