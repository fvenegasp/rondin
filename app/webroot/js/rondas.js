
$(document).ready(function() {
   
    $('#example').dataTable( {
        "oLanguage": {
            "sSearch": sSearch, 
            "sLengthMenu": sLengthMenu,
            "sZeroRecords": sZeroRecords,
            "sInfo": sInfo,
            "sInfoEmpty": sInfoEmpty,
            "sInfoFiltered": sInfoFiltered,
            "oPaginate": {
                "sFirst": sFirst,
                "sLast": sLast,
                "sNext": sNext,
                "sPrevious": sPrevious
            }
        },
       // "sDom": "<'row-fluid'<'span6'T><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
        "sAjaxSource": url_data_test,
        "aoColumns": [
            { "mData": "rut", "sTitle": "Rut" },
            { "mData": "nombre", "sTitle": "Nombre" },
            { "mData": "ap_paterno", "sTitle": "Ap. Paterno" },
            { "mData": "ap_materno", "sTitle": "Ap. Materno" },
            { "mData": "rol", "sTitle": "Rol" },
            { "mData": "acciones", "sTitle": "Acciones", "sWidth": "10%", "mRender": function (rowIndex) {
                   edit_btn = "<a id='agregar_usuario2' class='btn btn-warning' style='color:white;'  onclick='alert(\"8==B\")'><i class='icon-edit icon-white'></i></a>";
                   del_btn =  "<a class='btn btn-danger' style='color:white;' href='#eliminar_usuario' data-toggle='modal'><i class='icon-minus icon-white'></i></a>";
                   return edit_btn + " " + del_btn;
               }
            }   
        ]
    } );
    
     $("#tabs").tabs();
    
} );