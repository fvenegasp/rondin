$(document).ready(inicializarPagina);

var rut = "";

function inicializarPagina() { 
     $('#administracion').dataTable( {
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
    $("#btn_aceptar_eliminar_usuario").click(function(){
        eliminarUsuario(rut);
     });
    
    $("#tabs").tabs();
     
    $("li").removeClass("active");
    $("#li_administracion").addClass("active");
      
    $("#agregar_usuario").click(AgregarUsuario);
}


function selectRut(r){
    rut = r;
}

function AgregarUsuario(){
    modalAgregarUsuario('');
}

function modalAgregarUsuario(rut){
          
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

function eliminarUsuario(rut){
            $.ajax({
                type: 'POST',
                data: "rut="+rut,
                url: url_eliminar_usuario,
                dataType: 'json',
                success: function(dat){
                    if(dat.estado==true){
                       $('#eliminar_usuario').modal('toggle')
                      
                    }
                },
                complete: function() {
                   // overLoader(0);
                },
                 beforeSend: function() {
                  // overLoader(1,'Eliminando...');
                }
            });
        
}

function overLoader(sw, msg){
    if(sw==1){
        $("#overLoader").show();
        $("#txtLoader").html(msg);		
    }else{
        $("#overLoader").hide();
    } 
}