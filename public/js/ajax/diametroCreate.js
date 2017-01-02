$("#registro").click(function(){
    var dato = $("#diametro").val();
    var route = "/diametro";
    var token = $("#token").val();


    $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'POST',
        dataType: 'json',
        data:{diametro: dato},

        success:function(){
         //   alert("Correcto");
            $("#msj-success").fadeIn();
        },
        error:function(msj){
         //   alert("Error");
            $("#msj").html(msj.responseJSON.diametro);
            $("#msj-error").fadeIn();
        }
    });
});