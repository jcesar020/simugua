
$(function () {
    if(typeof (message_request)!="undefined"){
       mensaje(message_request, 'Campos requeridos',3);
    }
    if(typeof (message)!="undefined"){
        mensaje(message, 'Proceso completado',1);
    }
    if(typeof (message_error)!="undefined"){
        mensaje(message_error, 'Se presento un error',4);
    }
});

function mensaje(msg, title, tipo ){
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "progressBar": true,
        "preventDuplicates": false,
        "positionClass": "toast-top-right",
        "showDuration": "400",
        "hideDuration": "1000",
        "timeOut": "7000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    switch (tipo){
        case 1: //succes
            toastr.success(msg,title);
            break;
        case 2:  //info
            toastr.info(msg,title);
            break;
        case 3:  //warning
            toastr.warning(msg, title);
            break;
        case 4:  //Error
            toastr.error(msg, title);
            break;
    }
}

