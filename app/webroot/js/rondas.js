
var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
   
 
    $('#example').dataTable( {
       // "sDom": "<'row-fluid'<'span6'T><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
        "sAjaxSource": url_data_test,
        "aoColumns": [
            { "mData": "rut" },
            { "mData": "nombre" },
            { "mData": "ap_paterno" },
            { "mData": "ap_materno", "sClass": "center" },
            { "mData": "rol", "sClass": "center" }
        ]
    } );
    
} );