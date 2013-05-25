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
               $('#cargando').prepend('<img src="img/window_loader.gif" />')
            },
            complete: function() {
               $('#cargando').remove();
            },
            success: function(a) {
                $("#resultado").append(a);
            }
        }); // fin peticion ajax  
}

function modalAgregarUsuario(){
    $('#modal-content').load(url_progreso,{},function(){
        $.ajax({
            type: 'post',
            url: url_agregar_usuario,
            success: function(data){
                $('#modal-content').html(data);
                $("#modal-background").toggleClass("active");
                $("#modal-content").toggleClass("active");
            }
        });
    }); 
}