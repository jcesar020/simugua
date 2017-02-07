

<table  class="gridtable" style="font-size: 20px" width="100%">


    <tr>

        <td class="etiqueta" width="10%">Usuario:</td>
        <td colspan="3"><strong>{{$factura['encabezado']['conexion_id']}}</strong>-{{$factura['encabezado']['cliente']}}</td>
        <td class="etiqueta" style="font-family: "Times New Roman", serif" width="5%">No. </td>
        <td  width="5%" style="font-family: "Times New Roman", serif;  font-size: 15pt; font-weight: bold">{{  sprintf('%06d', $factura['encabezado']['factura_id'])}}  </td>
    </tr>

    <tr>

        <td class="etiqueta">Direccion:</td>
        <td colspan="3">{{$factura['encabezado']['direccion']}}</td>
        <td class="etiqueta" width="5%">Sec:</td>
        <td  width="5%">{{$factura['encabezado']['secuencia']}}</td>
    </tr>
</table>
