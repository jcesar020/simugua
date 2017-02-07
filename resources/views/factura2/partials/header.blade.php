<p></p>

<table  class="gridtable" style="font-size: 20px" width="100%">
    <tr>
        <td width="10%" ></td>
        <td class="etiqueta" width="15%">ID:</td>
        <td  width="25%" style="font-size: 22px; font-weight: bold">{{$factura['encabezado']['conexion_id']}}</td>
        <td class="etiqueta" width="20%">Secuencia:</td>
        <td  width="10%">{{$factura['encabezado']['secuencia']}}</td>

        <td width="50px"></td>

        <td width="10%" ></td>
        <td class="etiqueta" width="15%">ID:</td>
        <td  width="25%" style="font-size: 22px; font-weight: bold">{{$factura['encabezado']['conexion_id']}}</td>
        <td class="etiqueta" width="20%">Secuencia:</td>
        <td  width="10%">{{$factura['encabezado']['secuencia']}}</td>


    </tr>
    <tr>
        <td class="etiqueta" width="10%">Cliente:</td>
        <td colspan="4">{{$factura['encabezado']['cliente']}}</td>

        <td width="50px"></td>

        <td class="etiqueta" width="10%">Cliente:</td>
        <td colspan="4">{{$factura['encabezado']['cliente']}}</td>
    </tr>
    <tr>
        <td class="etiqueta">Direccion:</td>
        <td colspan="4">{{$factura['encabezado']['direccion']}}</td>

        <td width="50px"></td>

        <td class="etiqueta">Direccion:</td>
        <td colspan="4">{{$factura['encabezado']['direccion']}}</td>
    </tr>
</table>
