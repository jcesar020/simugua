<!-- CSS goes in the document HEAD or added to your external stylesheet -->
<head>
    @include('reportes.partials.style')
</head>
<body>
<!-- Table goes in the document BODY -->

<div class="footer">
    Impreso el {{ date('d/m/Y H:m:s')  }}
    <div class="page-number"></div>

</div>

<div class="header centro" >
    <img src="img/escudo.jpg" width="85px;" style="position: absolute " alt="">
    <h4 style="font-family:Verdana, Arial, sans-serif">
    Alcaldia Municipal de San Jose Guayabal <br>
    Departamento de Cuscatlan <br>
    Reporte de ingresos por servicios de agua del dia: {{$fecha}} </h4>
</div>
<table class="gridtable" width="100%">

    <thead>
    <tr>
        <th width="10%">Factura</th>
        <th width="60%" colspan="3">Concepto</th>

        <th width="30%">Valor</th>

    </tr>
    </thead>


    <tbody>
    <?php $gtotal = 0.0;
    $gCuenta=0;?>
    @foreach($datos as $dato)

        <tr>
            <td class="centro"><strong>{{$dato['id']}}</strong></td>

            <td colspan="4">{{$dato['nombre']}}</td>
        </tr>

        @foreach($dato['detalle'] as $det)
            <tr>
                <td width="10%"></td>
                <td width="10"></td>
                <td class="centro" width="10">{{$det['cod']}}</td>
                <td style="padding-left: 5px" width="65%">{{$det['concepto']}}</td>
                <td width="20%" class="derecha"> {{number_format($det['valor'], 2 )}}</td>


            </tr>
        @endforeach
        <tr>
            <td></td>
            <td class="centro" colspan="3">Subtotal</td>
            <td class="derecha" style="border-top: 0.1pt solid #aaa; font-weight: bold">{{ number_format( $dato['total'],2)}}</td>
        </tr>
        <tr>
            <td colspan="4"></td>
        </tr>

        <?php $gtotal += $dato['total'];
            $gCuenta+=1;
        ?>
    @endforeach

    <tr >
        <td colspan="4" class="centro border-t" style="font-weight: bold; ">TOTAL ({{$gCuenta}})</td>
        <td class="derecha border-2">{{number_format( $gtotal,2)}}</td>
    </tr>
    </tbody>

</table>

<!--
<div class="page-break"></div>

<h1>Page 2</h1>
-->
</body>