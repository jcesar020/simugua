/**
 * Created by jcesa on 3/8/2016.
 */
var periodo;
var sector;
//sector=0;
$(function(){
  getFacturas();
});
$("#periodo").change(function(){
    //periodo= $(this).val();
    getFacturas();

});
$("#sector_id").change(function(){
    //sector= $(this).val();
    getFacturas();

});

function getFacturas(){
    //alert ("getfacturas");

    periodo= $("#periodo").val() * 1;
    sector= $("#sector_id").val();


 if ((periodo * 1) != 0 && (periodo * 1) != 0){
     getDatos();
     //llenarCombo();

 } else {
    // alert('no ha seleccionado nada');
 }

  $("#datos").html('periodo: ' + periodo * 1 + ' sector: '+ sector * 1);
}


function getDatos(){

    var route = "/facturas/" + periodo + "/"+ sector + "/listado";

    $.get(route, function(res){
        $("#desde").empty();
        $("#hasta").empty();

        $(res).each(function(key, value){

            $("#desde").append("<option value ='"+ value.id +"'>"+ value.factura +"</option>");
            if (key == res.length-1){
                $("#hasta").append("<option value ='"+ value.id +"' selected>"+ value.factura +"</option>");
            }else{
                $("#hasta").append("<option value ='"+ value.id +"'>"+ value.factura +"</option>");
            }

        });
        $("#desde").trigger("chosen:updated");
        $("#hasta").trigger("chosen:updated");
    });

}

