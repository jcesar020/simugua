<br>
<table  width="100%" >
    <tr>
        <td width="25%" class="centro">
            Ultima fecha de Pago:
            <div style="background-color: #006621; color: white; width: 100%; font-size: 23px; "  class="centro">
                {{$factura['encabezado']['fechaPago']}}
            </div>
            <di>
                <br>
                {!! '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($factura['encabezado']['factura_id'], "C128",4,40) . '" alt="barcode"   />' !!}
                <br>
                {{$factura['encabezado']['factura_id']}}
            </di>
        </td>
        <td width="10%"></td>
        <td>
            <div style=" border: 2px solid brown;  ; color: brown ; padding: 5px; font-weight: bold; " class="centro">  HISTORIAL DE CONSUMO     </div>
            <br>

            <table  class="gridtable centro historial" style="width: 100%">

                <tbody>
                <tr>
                    <th class="color3"></th>
                    @foreach($factura['historico'] as $history)
                        <th class="color2">{{$history['mes']}}</th>
                    @endforeach

                </tr>
                <tr>
                    <td>CONSUMO</td>
                    @foreach($factura['historico'] as $history)
                        <td>{{$history['consumo']}}</td>
                    @endforeach
                </tr>
                <tr>

                    <td>VALOR $</td>
                    @foreach($factura['historico'] as $history)
                        <td>{{ number_format($history['valor'],2) }} </td>
                    @endforeach

                </tr>
                </tbody>
            </table>

        </td>
    </tr>

</table>


