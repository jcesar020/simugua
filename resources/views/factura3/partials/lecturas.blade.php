<div style="margin-bottom: 5px">
<table border="1" class="gridtable centro" >
    <tr>
        <th colspan="4">DETALLE LECTURA</th>
        <th colspan="2">PERIODO : {{$factura['lectura']['periodo']}}</th>
    </tr>
    <tr>
        <td class="color2">MEDIDOR</td>
        <td class="color2">ANTERIOR</td>
        <td class="color2">ACTUAL</td>
        <td class="color2">CONSUMO</td>
        <td class="color2">DESDE</td>
        <td class="color2">HASTA</td>
    </tr>
    <tr>
        <td>{{$factura['lectura']['medidor']}}</td>
        <td>{{$factura['lectura']['anterior']}}</td>
        <td>{{$factura['lectura']['actual']}}</td>
        <td>{{$factura['lectura']['consumo']}}</td>
        <td>{{$factura['lectura']['desde']}}</td>
        <td>{{$factura['lectura']['hasta']}}</td>
    </tr>
</table>
</div>