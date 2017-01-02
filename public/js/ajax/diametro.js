$(document).ready(function(){
    Carga();
});

function Carga(){
    var tablaDatos=$("#datos");
    var route="/diametros";

    $("#datos").empty();
    $.get(route, function(res){
       $(res).each(function(key, value){
           tablaDatos.append("<tr><td>" + value.diametro + "</td><td> <button value="+ value.id+" OnClick='Mostrar(this);' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Editar</button>&nbsp;<button value="+ value.id+" OnClick='Eliminar(this);' class='btn btn-danger'>Eliminar</button> </td></th>");
       });
    });

}

function Eliminar(btn){

        var route="/diametro/" + btn.value +"";
        var token=$("#token").val();

        $.ajax({
            url: route,
            headers:{'X-CSRF-TOKEN': token},
            type: 'DELETE',
            dataType: 'json',
            success: function(){
                Carga();
                $("#msj-success").fadeIn();
            }
    });

}
function Mostrar(btn){
    //console.log(btn.value);
    var route="/diametro/" + btn.value + "/edit";

    $.get(route, function(res){
        $("#diametro").val(res.diametro);
        $("#id").val(res.id);
    });
}

$("#actualizar").click(function(){

    var value=$("#id").val();
    var dato=$("#diametro").val();

    var route="/diametro/" + value +"";
    var token=$("#token").val();

    $.ajax({
        url: route,
        headers:{'X-CSRF-TOKEN': token},
        type: 'PUT',
        dataType: 'json',
        data:{diametro:dato},
        success: function(){
            Carga();
            $("#myModal").modal('toggle');
            $("#msj-success").fadeIn();
        }
    });

});