$(document).ready(inicializarPagina);

function inicializarPagina() { 
    $("#tabs").tabs();
    cargarUsuarios();
    
    $("#agregar_usuario").click(modalAgregarUsuario);
}

function cargarUsuarios(){
    $.ajax({
            type: "POST",
            url: url_mostrar_usuarios, // llamado al controlador
            beforeSend: function() {
               $('#resultado').empty();
               $('#cargando').prepend('<img src="img/window_loader.gif" />')
            },
            complete: function() {
               $('#cargando').empty();
            },
            success: function(a) {
                  $('#cargando').empty();
                $("#resultado").append(a);
            }
        }); // fin peticion ajax  
}

function modalAgregarUsuario(){
    $('#modal-content').load(url_progreso,{},function(){
        $.ajax({
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

function overLoader(sw, msg){
    if(sw==1){
        $("#overLoader").show();
        $("#txtLoader").html(msg);		
    }else{
        $("#overLoader").hide();
    } 
}