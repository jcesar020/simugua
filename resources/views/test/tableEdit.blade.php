@extends('layouts.admin')
@section('content')
<h2>Pruebas de toma de lecturas</h2>

<table class="table table-striped table-bordered table-hover table-condensed">
    <thead>
    <tr>
        <th>Correlativo</th>
        <th>Id</th>
        <th>Cliente</th>
        <th>Medidor</th>
        <th>Lectura Anterior</th>
        <th>Lectura Actual</th>
        <th>Consumo</th>
        <th>Estado</th>
    </tr>
    </thead>
    <tbody id="body">
        <?php  $a=200; ?>
        @for ($i=0; $i<10;$i++)
            <?php  $a+=10;  ?>

            <tr>
                <td>
                    {{$a}}

                </td>
                <td>
                    {{$i}}
                </td>

                <td>
                    {{str_random(40)}}
                </td>
                <td class="text-right">
                    {{random_int(10000,90000)}}
                </td>
                <td class="text-right lec-ant">

                    {{  $ant=random_int(1,1000) }}
                </td>

                <td>
                    {!! Form::number('lectura['.$i .']',null, ['id'=>'lectura[]' , 'style'=>'border-width:0; margin:0;', 'class'=>'form-control text-right lectura', 'min'=> $ant]) !!}
                </td>
                <td class="text-right consumo">

                </td>
                <td class="estado">

                </td>
            </tr>
        @endfor
    </tbody>
</table>
@endsection

@section('script')
    <script>
        $(function(){
            var estadoIng='<span class="label label-success">Ingresado</span>' ;

            $('#body').delegate('.lectura','focusout', function(){
               var tr=$(this).parent().parent();
                var lecAnt=tr.find('.lec-ant').html()-0;
                var lecAct=tr.find('.lectura').val();

                //alert(tr.find('.lectura').val().length)
                if (lecAct.length>0){
                    lecAct=lecAct-0;
                    if (lecAct<lecAnt) {
                        alert("La lectura actual no puede ser mayor a la anterior");
                        tr.find('.lectura').focus();
                        tr.find('.consumo').html("");
                    }else{
                        tr.find('.consumo').html("");
                        var consumo=lecAct-lecAnt;
                        tr.find('.consumo').html(consumo);
                        tr.find('.estado').html(estadoIng);
                    }
                }else{
                    tr.find('.consumo').html("");
                    tr.find('.estado').html("");
                }
            });
        });
    </script>
    @endsection