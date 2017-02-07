<div style="margin: 5px 0 5px 0">
<table   class="gridtable detalle" >
    <thead>
    <tr>
        <th width="10%">COD</th>
        <th width="10%">CANT</th>
        <th width="55%">CONCEPTO</th>
        <th width="15%">PRECIO $</th>
        <th width="15%">VALOR $</th>
    </tr>
    </thead>
    <tbody class="sin2lineas" style="border: 1px solid black">
    @foreach($factura['detalle'] as $detalle)
        <tr>
            <td class="centro">{{$detalle['catal_id']}}</td>
            <td class="centro">{{$detalle['cantidad']}}</td>
            <td>{{$detalle['concepto']}}</td>
            <td class="derecha">
            <?php
                if ($detalle['precio']*1 != 0){
                    echo   number_format($detalle['precio'], 2 );
                }
            ?>
            </td>

            <td class="derecha">{{number_format($detalle['valor'], 2 )}}</td>
        </tr>
    @endforeach

    @for($i=1; $i<6-count($factura['detalle']); $i++)
        <tr><td>&nbsp;</td><td></td><td></td><td></td><td></td></tr>
    @endfor
    <tr><td class="lineainf" >&nbsp;</td><td class="lineainf" ></td><td class="lineainf"></td><td class="lineainf"></td><td class="lineainf"></td></tr>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4" class="derecha" style="font-weight: bold; ">
                TOTAL A PAGAR:
            </th>

            <th class="derecha color2 " style="font-weight: bold; font-size: 20px;">
                ${{number_format( $factura['encabezado']['monto'],2)}}
            </th>
        </tr>
    </tfoot>
</table>
</div>