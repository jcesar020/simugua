<div style="margin-bottom: 5px; margin-top: 0px;">
<table  width="100%" >
    <tr>
        <td width="25%" class="centro">

            Ultima fecha de Pago:
            <div style="background-color: #006621; color: white; width: 100%; font-size: 30px; "  class="centro">
                {{$factura['encabezado']['fechaPago']}}
            </div>

        </td>
        <td width="10%"></td>
        <td>
            <!--
            <div style=" border: 2px solid brown;  ; color: brown ; padding: 5px; margin-bottom: 10px; font-weight: bold; " class="centro">
                HISTORIAL DE CONSUMO
            </div>
            -->

            <table  class="gridtable centro historial" style="width: 100%">

                <tbody>
                <tr>
                    <th >HISTORICO</th>
                    @foreach($factura['historico'] as $history)
                        <th class="color2">{{$history['mes']}}</th>
                    @endforeach

                </tr>
                <tr>
                    <td>CONSUMO</td>
                    @foreach($factura['historico'] as $history)
                        @if($history['mes']=='PRO')
                                <td><strong>{{$history['consumo']}}</strong></td>
                        @else
                                <td>{{$history['consumo']}}</td>
                        @endif

                    @endforeach
                </tr>
                <tr>

                    <td>VALOR $</td>
                    @foreach($factura['historico'] as $history)

                        @if($history['mes']=='PRO')
                            <td><strong>{{ number_format($history['valor'],2) }}</strong></td>
                        @else
                            <td>{{ number_format($history['valor'],2) }}</td>
                        @endif

                    @endforeach

                </tr>
                </tbody>
            </table>

        </td>
    </tr>

</table>
</div>

