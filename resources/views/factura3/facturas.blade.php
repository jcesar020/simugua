<head>
@include('factura3.partials.style')
</head>
<body>
        @if(count($facturas)==1)
            <div class="page-break">
            </div>
        @endif
            <div class="header">
                @include('factura3.partials.topheader')
            </div>        


<?php
    $contador=0;
?>
@foreach($facturas as $factura)

    <?php $contador++; ?>



        @include('factura3.partials.header')

        @include('factura3.partials.lecturas')
        @include('factura3.partials.detalle')
        @include('factura3.partials.history')
        @include('factura3.partials.footer')
        <p><i>Copia - Contribuyente</i></p>

        <hr width="100%" align="center" style=" margin-top:20px;" class="barra">
        <br>
        @include('factura3.partials.header2')
        @include('factura3.partials.header')
        @include('factura3.partials.lecturas')
        @include('factura3.partials.detalle')
        @include('factura3.partials.code')
        <p><i>Copia - Alcaldia Municipal</i></p>

        @if($factura !== end($facturas))
        <div class="page-break">
        </div>
        @endif

@endforeach
        <script type="text/javascript">
            try {
                this.print();
            }
        </script>
</body>