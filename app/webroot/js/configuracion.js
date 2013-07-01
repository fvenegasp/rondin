var editor;
$(document).ready(inicializarPagina);

function inicializarPagina() { 
    $("#tabs").tabs();
    $("li").removeClass("active");
    $("#li_configuracion").addClass("active");

     $('#configuracion_tbl').dataTable( {
        //"sDom": "<'row-fluid'<'span6'T><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
        "sAjaxSource": url_get_rondas,
        /*'iDisplayLength': 20,
                        'bLengthChange': false,*/
        "aoColumns": [
            { "mData": "nombre", "sTitle": "Nombre", "sWidth": "20%" },
            { "mData": "observaciones", "sTitle": "Observaciones", "sWidth": "20%" },
            { "mData": "dias", "sTitle": "Días", "sWidth": "10%" },
            { "mData": "horas", "sTitle": "Horas", "sWidth": "10%" },
            { "mData": "pcontrol", "sTitle": "Puntos de control", "sWidth": "20%" },
            { "mData": "acciones", "sTitle": "Acciones", "sWidth": "10%" }            
        ]
    } );

}

function modalCrearRonda(idronda){
    alert("Editar ronda con id: " + idronda)
}

function selectRonda(idronda){
    alert("Eliminar ronda con id: " + idronda)
}

