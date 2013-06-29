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
            {
                "sTitle": "Acciones", "sWidth": "10%", "mData": "Buttons", "mRender": function (rowIndex) {
                    edit_btn = "<a id='agregar_usuario2' class='btn btn-warning' style='color:white;'  onclick='alert(\"8==B\")'><i class='icon-edit icon-white'></i></a>";
                    del_btn =  "<a class='btn btn-danger' style='color:white;' href='#eliminar_usuario' data-toggle='modal' onclick='alert(\"(.)(.)\")'><i class='icon-minus icon-white'></i></a>";
                    return edit_btn + "&nbsp;" + del_btn;
                }
            }
        ]
    } );

}


