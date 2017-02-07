@include('alerts.errors')
@include('alerts.request')
<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.3/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Sep 2015 13:12:22 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ARCESOFT | Login</title>
    {!! HTML::style('css/bootstrap.min.css') !!}
    {!! HTML::style('font-awesome/css/font-awesome.css') !!}
    {!!Html::Style('css/plugins/toastr/toastr.min.css')!!}
    {!! HTML::style('css/animate.css') !!}
    {!! HTML::style('css/style.css') !!}


</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

            <h2 class="logo-name">SIMUAGUA</h2>

        </div>
        <h3>Bienvenido a SimuAgua</h3>
        <p>Software para la administracion de los sistemas de agua potable y alcalantarillado de la Alcaldia Municipal de San Jose Guayabal.
            <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
        </p>
        <p>Ingresa para comenzar a trabajar</p>

     {!! Form::open(['route'=>'login.store', 'method'=>'post', 'role'=>'form', 'class'=>'m-t']) !!}



            <div class="form-group">
                {{--{!!Form::label('Usuario:')!!}--}}
                {!!Form::text('usuario', null, ['class'=>'form-control', 'placeholder'=>'Usuario'])!!}
            </div>
        <div class="form-group">
            {{--{!!Form::label('Password:')!!}--}}
            {!!Form::password('password',  ['class'=>'form-control', 'placeholder'=>'Contraseña'])!!}
        </div>
            <!--
            <button type="submit" class="btn btn-primary block full-width m-b">Ingresar</button>

            <a href="/home" class="btn btn-primary block full-width m-b">Ingresar</a>
            -->
        {!! Form::submit('Ingresar',['class'=>'btn btn-primary']) !!}
        <br>
            <a href="#"><small>Olvido la contrase&ntilde;a?</small></a>

        {!! Form::close() !!}

    </div>
</div>

<!-- Mainly scripts -->
{!! HTML::script('js/jquery-2.1.1.js') !!}
{!! HTML::script('js/bootstrap.min.js') !!}

{!! Html::script('js/plugins/toastr/toastr.min.js') !!}
{!! Html::script('js/project/notify.js') !!}

</body>


</html>