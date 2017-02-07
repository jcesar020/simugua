<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.3/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Sep 2015 13:12:22 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ARCESOFT | Login</title>
    {!! HTML::style('css/bootstrap.min.css') !!}
    {!! HTML::style('font-awesome/css/font-awesome.css') !!}
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

        {!! Form::open('route'=>) !!}


        <form class="m-t" role="form" action="http://webapplayers.com/inspinia_admin-v2.3/index.html">
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Nombre de usuario" required="">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Contrase&ntilde;a" required="">
            </div>
            <!--
            <button type="submit" class="btn btn-primary block full-width m-b">Ingresar</button>
            -->
            <a href="/home" class="btn btn-primary block full-width m-b">Ingresar</a>

            <a href="#"><small>Olvido la contrase&ntilde;a?</small></a>

        </form>

    </div>
</div>

<!-- Mainly scripts -->
    {!! HTML::script('js/jquery-2.1.1.js') !!}
    {!! HTML::script('js/bootstrap.min.js') !!}


</body>


</html>
