/**
 * Created by jcesa on 5/8/2016.
 */
$("#btnGenerar").click(function(){
   //var res=confirm('¿DESEA INICIAR EL PROCESO ?');
   if(confirm('¿DESEA INICIAR EL PROCESO ?')==true){
        generar();
   }
});

function generar(){

    var periodo=$("#periodo").val();
    var sector=$("#sector").val();
    var vencimiento=$("#fechaVen").val();
    var facturas=0;
    var servicios=0;
    var multas=0;
    var lecturas=0;

    if ( !validarFormatoFecha(vencimiento)){
        //Validamos que haya ingresado una fecha de lectura valida

        //alert('Debe ingresar una fecha de vencimiento');
        mensaje("Debe de ingresar una fecha de vencimiento", "Error", 4);

        $('#fechaVen').focus();

        }else{

        var route = "/facturas/" + periodo + "/"+ sector + "/"+ vencimiento+ "/generar";

        $.get(route, function(res){
            $(res).each(function(key, value){
                facturas=value.facturas;
                servicios=value.servicios;
                multas=value.multas;
                lecturas=value.lecturas;
                nulas=value.nulas;
            });

            var respuesta="<ul>" +
                "<li>Servicios: "+ servicios + "</li>" +
                "<li>Multas: "+ multas + "</li>" +
                "<li>Facturas: "+ facturas + "</li>" +
                "<li>Lecturas Actualizadas: "+ lecturas + "</li>" +
                "<li>Facturas Anuladas: "+ nulas + "</li>" +
                "</ul>";

            mensaje(respuesta, "Proces de generacion completada", 1);

            setTimeout(function(){ location.reload(); }, 3000);
        });
    }
}

function validarFormatoFecha(campo) {
    var RegExPattern = /^\d{1,2}\/\d{1,2}\/\d{2,4}$/;
    if ((campo.match(RegExPattern)) && (campo!='')) {
        return true;
    } else {
        return false;
    }
}