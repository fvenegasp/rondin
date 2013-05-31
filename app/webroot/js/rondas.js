
var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        "ajaxUrl": url_data_edit,
        "domTable": "#example",
        "fields": [ {
                "label": "Rut:",
                "name": "rut",
                "id":"rut"
            }, {
                "label": "Nombre:",
                "name": "nombre"
            }, {
                "label": "Ap. Paterno:",
                "name": "ap_paterno"
            }, {
                "label": "Ap_Materno:",
                "name": "ap_materno"
            }, {
                "label": "Rol:",
                "name": "rol"
            }, {
                "label": "Password:",
                "name": "password"
            }
        ]
    } );
 
    $('#example').dataTable( {
        "sDom": "<'row-fluid'<'span6'T><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
        "sAjaxSource": url_data_test,
        "aoColumns": [
            { "mData": "rut" },
            { "mData": "nombre" },
            { "mData": "ap_paterno" },
            { "mData": "ap_materno", "sClass": "center" },
            { "mData": "rol", "sClass": "center" }
        ],
        "oTableTools": {
            "sRowSelect": "multi",
            "aButtons": [
                { "sExtends": "editor_create", "editor": editor },
                { "sExtends": "editor_edit",   "editor": editor },
                { "sExtends": "editor_remove", "editor": editor }
            ]
        }
    } );
    
} );