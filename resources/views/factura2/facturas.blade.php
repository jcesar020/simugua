<head>
@include('factura2.partials.style')
</head>
<body>
<div class="header">
    @include('factura2.partials.topheader')
</div>
<?php
    $contador=0;
?>
@foreach($facturas as $factura)

    <?php $contador++; ?>

    @if($contador>1 && $contador<10)


                @include('factura2.partials.header')

                @include('factura2.partials.lecturas')
                @include('factura2.partials.detalle')
                @include('factura2.partials.history')
                @include('factura2.partials.footer')


        @if($factura !== end($facturas))
        <div class="page-break">
        </div>
        @endif
    @endif
@endforeach

</body>