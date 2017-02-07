<?php
        function espacios($espacios){
           return \myClass\librerias::espacios($espacios);
        }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Impresion de Recibo</title>
    @include('recibo.partial.style')

</head>
<body >
<br> <br>


<table border="0" class="seccion">
    <tr>
        <td width="50%" style="padding-left: 60px; padding-right: 20px">
            <table border="0"  class="seccion">
                <tr>
                    <td colspan="2" width="90%">
                        <table  class="seccion" >
                            <tr>
                                <td width="85%"><?= espacios(27)?>SAN JOSE
                                    <br>
                                    <?=espacios(14)?>GUAYABAL
                                    <br>
                                   04/04/2016<?=espacios(10)?>CUSCATLAN

                                </td>
                                <td width="15%" class="derecha">
                                    4324
                                    <br>
                                    <br>
                                    201601
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>
                <tr >
                    <td colspan="2" style="padding-top: 12px;">
                       <?= espacios(18) ?> JAVIER ANTONIO SANTAMARIA MELENDEZ
                    </td>
                </tr>
                <tr>
                    <td colspan="2">SECTOR:NAO SAN JOSE</td>
                </tr>
                <tr>
                    <td><?= espacios(6) ?> NAO SAN JOSE, POL. 10 PJE. 2</td>
                    <td width="10%">1</td>
                </tr>
                <!-- DETALLE DE COBROS -->
                <tr>
                    <td colspan="2" style="padding-top: 20px;">
                        <table class="seccion" border="0">
                            <!-- DETALLE LECTURAS-->
                            <tr>
                                <td colspan="2" width="76%">
                                    <table class="seccion centro">
                                        <tr>
                                            <td colspan="3">DETALLE DE LECTURAS</td>
                                            <td colspan="2">PERIODO</td>
                                        </tr>
                                        <tr>
                                            <td>ANTES</td><td>ACTUAL</td><td>CONSUMO</td><td>DESDE</td><td>HASTA</td>
                                        </tr>
                                        <tr>
                                            <td>965</td><td>990</td><td>35</td><td>05/04/2016</td><td>05/05/2016</td>
                                        </tr>
                                    </table>

                                </td>
                                <td width="2%"></td>
                                <td width="25%"></td>
                            </tr>
                            <!-- DETALLE DE COBROS -->
                            <tr>
                                <td colspan="4"> <?= str_repeat('=',49) ?></td>
                            </tr>
                            <tr>
                                <td width="16%"></td>
                                <td width="60%">SALDO ANTERIOR</td>
                                <td width="3%" class="derecha">$</td>
                                <td class="derecha">45.25</td>
                            </tr>
                            <tr>
                                <td >54202101</td>
                                <td >SERVICIOS DE AGUA M3</td>
                                <td  class="derecha">$</td>
                                <td class="derecha">4.00</td>
                            </tr>
                            <tr>
                                <td >54202102</td>
                                <td >SERVICIO ALCANTARILLADO MENSUAL</td>
                                <td class="derecha">$</td>
                                <td class="derecha">0.80</td>
                            </tr>
                            <tr>
                                <td >54202102</td>
                                <td >CONVENIO MORA (CUOTA 1 DE 10)</td>
                                <td class="derecha">$</td>
                                <td class="derecha">9.90</td>
                            </tr>
                            <tr>
                                <td >55799301</td>
                                <td >VENTA DE MEDIDOR (CUOTA 1 DE 5)</td>
                                <td class="derecha">$</td>
                                <td class="derecha">5.00</td>
                            </tr>
                            <tr>
                                <td >53443701</td>
                                <td >MULTA POR PAGO EXTENPORANEO</td>
                                <td class="derecha">$</td>
                                <td class="derecha">1.00</td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table>
        </td>








        <td width="50%">


        </td>
    </tr>

</table>

<script type="text/javascript">

    window.print();

</script>


</body>
</html>








