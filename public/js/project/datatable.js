$(document).ready(function() {
    $('.dataTables-example').DataTable({
        "autoWidth": true,
        "ordering":true,
    });

    $('.dataTables-noorder').DataTable({
        "autoWidth": true,
        "ordering":false,
    });

    /*
$('.dataTables-example').DataTable({"paging": true,

    //"ordering": true,
    //"info": true,
    "autoWidth": true
});*/
});
