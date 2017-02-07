@extends('layouts.admin_simple')
<?php $menu['admin']='usuarios'; ?>
@include('alerts.success')
@section('content')
    <table class="table">
        <thead>
        <th>Usuario</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Operacion</th>
        </thead>

        @foreach($users as $user)
            <tbody>
                <td>{{$user->usuario}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>

                <td>
                    {!! link_to_route('usuario.edit', $title='Editar', $parameters=$user, $attributes=['class'=>'btn btn-primary'])!!}
                </td>
            </tbody>
        @endforeach

    </table>
@endsection

@section('script')
@endsection