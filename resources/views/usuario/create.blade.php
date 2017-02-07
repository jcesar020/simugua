@extends('layouts.admin')
@section('content')
@include('alerts.request')
    {!! AppForm::open(['route'=>'usuario.store', 'method'=>'POST']) !!}
    <div class="col-sm-4 col-sm-offset-4">
    @include('usuario.forms.user')
    {!! AppForm::submit('Registrar',['class'=>'btn btn-primary']) !!}
    </div>
    {!! AppForm::close() !!}

@endsection