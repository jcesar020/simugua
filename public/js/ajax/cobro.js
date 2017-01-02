
var totales=0;
var cuenta=0;

$(function(){
    leerCobros();

    $('#factura_id').focus(); //Activa el control de lectura de factura

    $("#factura").submit(function(e){
        e.preventDefault();

        var factura=$("#factura_id").val();
        var fechalec= formattedDate( $("#fecha").val());
        var usuario=2;
        var route = "/cobros";
        var token = $("#token").val();

        $.ajax({
            url: route,
            headers: {'X-CSRF-TOKEN': token},
            type: 'POST',
            dataType: 'json',
            data:{factura_id: factura, usuario_id:usuario, fecha: fechalec},

            success:function(res){
                //alert("resultado");
                agregarItem(res);
            },
            error:function(msj){
                  //alert("Error");
                $("#msj").html(msj.responseJSON.diametro);
                $("#msj-error").fadeIn();
            }
        });

        $("#factura_id").val("");
        $("#factura_id").focus();
    });

   $("#procesar").click(function(){
       var r=confirm("Procesar las lecturas");
       if(r==true){

           //$(location).attr("href", "procesar");
          // $($location).attr("action","cobro/procesar").submit();
           location.replace('../cobro/procesar');
       }else{
           alert('Cancelada por el usuario');
       }
   });

});

function agregarItem(res){

    //alert (res[0].factura_id);
    if(res[0]) {
        var factura = res[0];

        if(factura.factura_id==-2 || factura.factura_id==-3 || factura.factura_id==-4){
            PlaySoundError();
            mensaje(factura.msg, "Error", 4);      
            

        }else if(factura.factura_id==-1){
            PlaySoundError();
            mensaje(factura.msg, "Advertencia", 3);      

        }else{
            PlaySound();
            $("#datos").prepend(" <tr><td class='negrita'>" + factura.factura_id + "</td><td>" + factura.conexion_id + "</td><td>" + formattedDate2(factura.fecha) + "</td><td>" + factura.cliente + "</td><td class='derecha'>$" + factura.valor + "</td><td><button value=" + factura.factura_id + " OnClick='Eliminar(this);' class='btn btn-sm btn-danger'><i class='fa fa-times'></i></button> </td></tr>");
            $("#contenido").scrollTop=0;
            totales += Number( factura.valor);
            cuenta++;
            mostrarTotal();

        }
    }
}

function leerCobros(){
    var tablaDatos=$("#datos");
    var route="/cobros";

    totales=0;
    cuenta=0;

    $("#datos").empty();
    $.get(route, function(res){
        $(res).each(function(key, value){
            tablaDatos.append(" <tr><td class='negrita'>"+ value.factura_id +"</td><td>"+ value.conexion_id +"</td><td>" + formattedDate2(value.fecha)+ "</td><td>"+ value.cliente +"</td><td class='derecha'>$"+ value.valor +"</td><td><button value="+ value.factura_id+" OnClick='Eliminar(this);' class='btn btn-sm btn-danger'><i class='fa fa-times'></i></button> </td></tr>");
            totales += Number( value.valor);
            cuenta++;

            mostrarTotal();

        });
    });

}

function mostrarTotal(){
    $("#total").html(totales.toFixed(2) + " ("+ cuenta + ")");
}
function Eliminar(btn){

    var route="/cobros/" + btn.value +"";
    var token=$("#token").val();

    $.ajax({
        url: route,
        headers:{'X-CSRF-TOKEN': token},
        type: 'DELETE',
        dataType: 'json',
        success: function(){
            leerCobros();
            $("#msj-success").fadeIn();
        }
    });

}

function formattedDate(date){


   /*

    //NO UTILIZADA
    var d = new Date(date || Date.now()),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;
   var x= new Date(date);

    return [year, day, month].join('/');
    */
   var t=date.split(/[/ :]/);

    return(t[2]+"-"+t[1]+"-"+ t[0]);

}

function formattedDate2(date) {

    //CONVERTIR FECHA DESDE MYSQL A FORMATO D/M/A
    // Split timestamp into [ Y, D, M, h, m, s ]
    var t = date.split(/[- :]/);

    return t[2]+"/"+t[1]+"/"+ t[0];
}

function PlaySound() {
    var sound = document.getElementById("audio");
    sound.play()
}
function PlaySoundError() {
    var sound = document.getElementById("audio_error");
    sound.play()
}