var editor;
$(document).ready(inicializarPagina);

function inicializarPagina() { 
    $("#tabs").tabs();
    $("li").removeClass("active");
    $("#li_configuracion").addClass("active");

   


    $('#examplerondas').dataTable( {
            "sDom": "<'row-fluid'<'span6'T><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
            "sAjaxSource": url_get_rondas,
            "oLanguage": {
              "sSearch": "Buscar:",
              "sInfo": "Mostrando _TOTAL_ rondas de (_START_ a _END_)",
              "oPaginate": {
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
              }
            },
            "aoColumns": [
                { "mData": "nombre" },
                { "mData": "observaciones" },
                { "mData": "acciones" }
            ],
            "oTableTools": {
                //"sRowSelect": "multi",
                "aButtons": [
                   
                ]
            }
    } );
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
    if (confirm('¿Desea eliminar el usuario?')) {
            $.ajax({
                type: 'POST',
                data: "rut="+rut,
                url: url_eliminar_usuario,
                dataType: 'json',
                success: function(dat){
                    if(dat.estado==true){
                        cargarUsuarios();
                    }
                },
                complete: function() {
                    overLoader(0);
                },
                 beforeSend: function() {
                   overLoader(1,'Eliminando...');
                }
            });
        }
}

function overLoader(sw, msg){
    if(sw==1){
        $("#overLoader").show();
        $("#txtLoader").html(msg);		
    }else{
        $("#overLoader").hide();
    } 
}