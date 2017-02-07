
    <table width="100%">
        <tr>
            <td width="35%">&nbsp;</td>
            <td width="25%" class="centro">
                Ultima fecha de Pago:
                <div style="background-color: #006621; color: white; width: 80%; font-size: 20px; "  class="centro">
                    {{$factura['encabezado']['fechaPago']}}
                </div>

            </td>
            <td  width="40%" class="centro">

                @if($factura['encabezado']['estado']== 'P')
                    <div style="border:3px solid; font-size:250%; color:blue; ">
                        <strong>PAGADA</strong> 
                    </div>
                @elseif($factura['encabezado']['estado']== 'N')
                    <div style="border:3px solid; font-size:250%; color:red;">
                        <strong>ANULADA</strong> 
                    </div>
                @else 



                    {!! '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($factura['encabezado']['factura_id'], "C39") . '" alt="barcode"   />' !!}
                    <br>
                    <p style="font-size: 16pt; padding: 0; margin: 0">
                       {{$factura['encabezado']['factura_id']}}
                    </p>
                @endif
            </td>
        </tr>
    </table>

