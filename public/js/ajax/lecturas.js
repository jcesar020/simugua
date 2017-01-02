/**
 * Created by jcesa on 22/03/2016.
 * Script para administrar el ingreso  de las lecturas
 */
$(function(){
    var estadoIng='<span class="label label-success">Ingresado</span>' ;

    $('#body').delegate('.lectura','focusout', function(){
        var tr=$(this).parent().parent();
        if(validarLectura(tr)) {
            updateDB(tr);
        }
    });

    $('.detalle').tabIndex=-1;
});

function validarLectura(tr){
    //var estadoIng='<span class="label label-success">Ingresado</span>' ;
    var estadoIng='INGRESADO' ;
    var respuesta=false;
    var lecAnt=tr.find('.lec-ant').html()-0;
    var lecAct=tr.find('.lectura').val();

    var fechaLectura= $('#fechaLec').val();
    if ( !validarFormatoFecha(fechaLectura)){
        //Validamos que haya ingresado una fecha de lectura valida
        tr.find('.consumo').html("");
        tr.find('.estado').html("");
        tr.find('.lectura').html("");
        mensaje("Debe de ingresar una fecha de lectura", "Error", 4);
        $('#fechaLec').focus();
    }else if (lecAct.length>0){
        lecAct=lecAct*1;
        if (lecAct<lecAnt) {
            //alert("La lectura actual no puede ser menor a la anterior");
            PlaySoundError();
            mensaje("La lectura actual no puede ser menor a la anterior", "Error de lectura", 4)
            tr.find('.lectura').focus();
            tr.find('.consumo').html("");
        }else{
            PlaySound();
            tr.find('.consumo').html("");
            var consumo=lecAct-lecAnt;
            tr.find('.consumo').html(consumo);
            tr.find('.estado').html('INGRESADO');
            tr.find('.fechaIngreso').html(fechaLectura);
            respuesta=true;
        }
    }else{
        tr.find('.consumo').html("");
        tr.find('.estado').html("CREADA");
        tr.find('.fechaIngreso').html("");
        respuesta=true
    }
    return respuesta;
}

function updateDB(tr) {

    //Propiedades de la lecturas
    var fechaLectura= $('#fechaLec').val();
    var estado="I";

    var lecAct=tr.find('.lectura').val();

   // alert(lecAct.length);
    if (lecAct.length==0){
        lecAct=null;
        estado="C";
        fechaLectura=null;
    }

    var lecAct = tr.find('.lectura').val();
    var periodo = tr.find('.datainfo').attr('data-periodo');
    var conexion_id = tr.find('.datainfo').attr('data-conexion_id');
    var medidor_id = tr.find('.datainfo').attr('data-medidor_id');
    var datos = {"periodo": periodo,
                "conexion_id": conexion_id,
                "medidor_id": medidor_id,
                "lecturafin": lecAct,
                "estado":estado,
                "fechafin": fechaLectura
                };


    //Preparando ajax
    var route="/lectura/"+ conexion_id + "";
    var token=$("#token").val();

    $.ajax({
        url: route,
        headers:{'X-CSRF-TOKEN': token},
        type:'PUT',
        dataType: 'json',
        data:datos,
        success: function(){
            console.log("Ajax completado");
        }
        });
    //console.log("objetos %0", datos);
}

function validarFormatoFecha(campo) {
    var RegExPattern = /^\d{1,2}\/\d{1,2}\/\d{2,4}$/;
    if ((campo.match(RegExPattern)) && (campo!='')) {
        return true;
    } else {
        return false;
    }
}
function formattedDate(date) {

    //NO UTILIZADA
    var d = new Date(date || Date.now()),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year,month , day].join('/');
}

function PlaySound() {
    var sound = document.getElementById("audio");
    sound.play()
}
function PlaySoundError() {
    var sound = document.getElementById("audio_error");
    sound.play()
}
