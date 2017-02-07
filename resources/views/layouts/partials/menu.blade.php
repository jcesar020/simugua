<li>
    <a href="home"><i class="fa fa-th-large"></i> <span class="nav-label">Escritorio</span> </a>
</li>

@if(auth()->user()->admin)
    <li class="{{isset($menu['admin'])?'active' : ''}}" >
        <a href="#"><i class="fa fa-sliders""></i><span class="nav-label">Admin</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li class="{{isset($menu['admin'])? ($menu['admin']=='usuarios' ? 'active':''):''}}">
                <a href="{!! URL::to('/usuario') !!}">Usuarios</a></li>

        </ul>
    </li>
@endif
<li class="{{isset($menu['parametros'])?'active' : ''}}" >
    <a href="#"><i class="fa fa-sliders""></i><span class="nav-label">Parametros</span><span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li class="{{isset($menu['parametros'])? ($menu['parametros']=='diametro' ? 'active':''):''}}">
            <a href="{!! URL::to('/diametro') !!}">Diametros</a></li>
        <li class="{{isset($menu['parametros'])? ($menu['parametros']=='sector' ? 'active':''):''}}">
            <a href="{!! URL::to('/sector') !!}">Sectores</a></li>
        <li class="{{isset($menu['parametros'])? ($menu['parametros']=='zona' ? 'active':''):''}}">
            <a href="{!! URL::to('/zona') !!}">Zonas</a></li>
        <li class="{{isset($menu['parametros'])? ($menu['parametros']=='tarifa' ? 'active':''):''}}">
            <a href="{!! URL::to('/tarifa') !!}">Tarifas</a></li>

    </ul>
</li>
<li class="{{isset($menu['catalogos'])? 'active' : ''}}" >
    <a href="#"><i class="fa fa-table"></i><span class="nav-label">Catalogos</span><span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li class="{{isset($menu['catalogos'])? ($menu['catalogos']=='cliente' ? 'active':''):''}}">
            <a href="{!! URL::to('/cliente') !!}">Clientes</a>
        </li>
        <li class="{{isset($menu['catalogos'])? ($menu['catalogos']=='medidor' ? 'active':''):''}}">
            <a href="{!! URL::to('/medidor') !!}">Medidores</a></li>
        <li class="{{isset($menu['catalogos'])? ($menu['catalogos']=='conexion' ? 'active':''):''}}">
            <a href="{!! URL::to('/conexion') !!}">Conexiones</a></li>
    </ul>
</li>
<li class="{{isset($menu['facturacion'])? 'active' : ''}}">
    <a href="#"><i class="fa fa-dollar"></i><span class="nav-label">Facturacion</span><span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li><a href="{!! URL::to('/lectura') !!}">Lecturas y facturacion</a></li>
        <li><a href="{!! URL::to('/facturas/imprimir') !!}">Generar Facturas</a></li>
        <li><a href="{!! URL::to('/facturas/multas') !!}">Generar multas</a></li>
        <li><a href="{!! URL::to('/cobros/ingresar') !!}">Cobro</a></li>
    </ul>
</li>



<li class="{{isset($menu['Otros Servicios'])? 'active' : ''}}">
    <a href="#"><i class="fa fa-download"></i><span class="nav-label">Gestiones</span><span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li><a href="{!! URL::to('/lectura') !!}">Solicitudes</a></li>
        <li><a href="{!! URL::to('/facturas/listar') !!}">Suspensiones</a></li>
        <li><a href="{!! URL::to('/facturas/listar') !!}">Planes de pago</a></li>
        <li><a href="{!! URL::to('/cobro') !!}">Manten/Reparacion</a></li>
    </ul>
</li>

<li class="{{isset($menu['reportes'])? 'active' : ''}}">
    <a href="#"><i class="fa fa-print"></i><span class="nav-label">Reportes</span><span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="#"><i class="fa fa-print"></i><span class="nav-label">Ingresos</span><span class="fa arrow"></span></a>
            <ul class="nav nav-second-level nav-third-level">
                <li><a href="{!! URL::to('/reportes/diario') !!}">Diario</a></li>
                <li><a href="{!! URL::to('/facturas/listar') !!}">Mensual</a></li>
                <li><a href="{!! URL::to('/cobro') !!}">Anual</a></li>
            </ul>

        <li><a href="{!! URL::to('/facturas/listar') !!}">Facturacion</a></li>
        <li><a href="{!! URL::to('/cobro') !!}">Mora</a></li>
    </ul>
</li>
<li >
    <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Otras paginas</span><span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">

        <li><a href="500.html">500 Page</a></li>
        <li class="active"><a href="vacia.html">Empty page</a></li>
    </ul>
</li>