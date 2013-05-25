$(document).ready(inicializarPagina);

function inicializarPagina() { 
  
  $('#cerrar_sesion').click(function() {
        if (confirm('¿Desea salir de la aplicación?')) {
            //variable logout: se define en el layout home y contiene la ruta del metodo(funcion) logout
            $.ajax({
                type: 'POST',
                url: logout,
                dataType: 'json',
                success: function(dat){
                    //alert(dat.msg);
                    location.reload();
                }
            });
        }
    });
}


function CajaMensajes(msg, type){
    $("#CajaMensajes").attr('class', 'alert '+type);
    $("#CajaMensajes").show().delay(7000);
    $("#CajaMensajes").hide(3);
    $("#pMensaje").html(msg);		
}
