<!-- CSS goes in the document HEAD or added to your external stylesheet -->
<head>
<style>
    .page-break {
        page-break-after: always;
    }
</style>

<style type="text/css">

    body {

        font-family: sans-serif;
        margin: 1.5cm 0 0 ;
        text-align: justify;
    }


    .header,
    .footer {
        position: fixed;
        left: 0;
        right: 0;
        color: #000;
        font-size: 0.9em;
    }

    .header {
        top: 0;
        height: 1.5cm;
        border-bottom: 0.1pt solid #aaa;
    }

    .footer {
        bottom: 0;
        border-top: 0.1pt solid #aaa;
    }

    .derecha{
        text-align: right;
    }

    table.gridtable {
        font-family: verdana,arial,sans-serif;
        font-size:11px;
        color:#333333;
        border-width: 1px;
        border-color: #666666;
        border-collapse: collapse;

    }
    table.gridtable th {
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #666666;
        background-color: #eee;

    }
    table.gridtable td {
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #666666;
        background-color: #ffffff;
    }

    .fondogris{
        background-color: #ff00FF;
    }

    .page-number {
        text-align: right;
    }

    .page-number:before {
        content: "Pagina " counter(page)   ;
    }
</style>
</head>
<body>
<!-- Table goes in the document BODY -->

<div class="footer">
    Impreso el {{ date('d/m/Y H:m:s')  }}
    <div class="page-number"> </div>

</div>

<div class="header" >
   <center> {{ $param['name'] }}
    <br>LISTADO USUARIOS PARA LA TOMA DE LECTURAS <br>
   </center>
    Periodo: {{ $param['periodo'] }} &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
    Sector: {{ $param['sector']. ' - ' . $param['sectorName']  }}


</div>
<table class="gridtable">

        <thead>
        <tr>
            <th width="5">Secuen</th>
            <th width="5">Id</th>
            <th width="5">Medidor</th>
            <th width="200">Nombre del Cliente</th>
            <th>Lectura  <br> Inicial</th>
            <th>Lectura <br> Actual</th>
            <th>Observaciones</th>
        </tr>
        </thead>


    <tbody>
    <?php $i = 0; ?>
    @foreach($datos as $dato)
 
        @if($dato->zona_id!=$i)

 
           <tr >
                <td style="background-color:lightgrey" colspan="7">
                    Zona: {{$dato->zona}}
                </td>
            </tr>
       @endif

            <tr>
                <td width="10">{{$dato->correlativo}}</td>
                <td width="10">
                    {{$dato->conexion_id}}
                </td>
                <td width="10" class="derecha">
                    {{$dato->medidor_id}}
                </td>
                <td>
                    {{$dato->nombreCompleto}}
                </td>
                <td class="derecha">
                    {{$dato->lecturaIni}}
                </td>
                <td class="derecha">
                    {{$dato->lecturaFin}}
                </td>
                <td width="150px">
                    &nbsp;
                </td>
            </tr>
 
        <?php $i = $dato->zona_id; ?>
    @endforeach
    </tbody>

</table>

<!--
<div class="page-break"></div>

<h1>Page 2</h1>
-->
</body>