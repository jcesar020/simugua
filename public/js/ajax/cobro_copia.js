/**
 * Created by jcesa on 6/7/2016.
 */


$(function(){
    leerCobros();

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

            success:function(){
                 //alert("Correcto");
                $("#msj-success").fadeIn();
            },
            error:function(msj){
                  //alert("Error");
                $("#msj").html(msj.responseJSON.diametro);
                $("#msj-error").fadeIn();
            }
        });

      // leerCobro();

        agregarItem(factura);
        //alert("INGRESO UNA FACTURA " + factura_id );

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

function agregarItem(value){


    $("#datos").empty();
    tablaDatos.prepend(" <tr><td class='negrita'>"+ value.factura_id +"</td><td>"+ value.conexion_id +"</td><td>" + formattedDate2(value.fecha)+ "</td><td>"+ value.cliente +"</td><td class='derecha'>$"+ value.valor +"</td><td><button value="+ value.factura_id+" OnClick='Eliminar(this);' class='btn btn-sm btn-danger'><i class='fa fa-times'></i></button> </td></tr>");



}


function leerCobros(){
    var tablaDatos=$("#datos");
    var route="/cobros";
    var totales=0;
    var cuenta=0;

    $("#datos").empty();
    $.get(route, function(res){
        $(res).each(function(key, value){
            tablaDatos.append(" <tr><td class='negrita'>"+ value.factura_id +"</td><td>"+ value.conexion_id +"</td><td>" + formattedDate2(value.fecha)+ "</td><td>"+ value.cliente +"</td><td class='derecha'>$"+ value.valor +"</td><td><button value="+ value.factura_id+" OnClick='Eliminar(this);' class='btn btn-sm btn-danger'><i class='fa fa-times'></i></button> </td></tr>");
            totales += Number( value.valor);
            cuenta++;

            $("#total").html(totales.toFixed(2) + " ("+ cuenta + ")");
            // tablaDatos.append("<tr><td>" + value.diametro + "</td><td> <button value="+ value.id+" OnClick='Mostrar(this);' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Editar</button>&nbsp;<button value="+ value.id+" OnClick='Eliminar(this);' class='btn btn-danger'>Eliminar</button> </td></th>");
        });
    });



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