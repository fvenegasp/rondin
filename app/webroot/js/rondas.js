
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
            { "mData": "acciones", "sTitle": "Acciones", "sWidth": "10%" }  
        ]
    } );
    
  
    
     $("#tabs").tabs();
    
} );


  
function modalCrearRonda(rut){
    alert(url_progreso);
    $('#modal-content').load(url_progreso,{},function(){
        $.ajax({
            data: 'rut='+rut,
            type: 'post',
            url: url_agregar_usuario_modal,
            success: function(data){
                $('#modal-content').html(data);
                $("#modal-background").toggleClass("active");
                $("#modal-content").toggleClass("active");
            },
            complete: function() {
                overLoader(0);
            },
             beforeSend: function() {
               overLoader(1,'Cargando...');
            }
        });
    }); 
}

function selectRonda(idronda){
    alert("Eliminar ronda con id: " + idronda)
}