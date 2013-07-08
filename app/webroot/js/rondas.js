
$(document).ready(function() {    
     $("#tabs").tabs();
     cargarUsuarios();
} );

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
                $("#usuarios").append(a);
            }
        }); // fin peticion ajax  
}
