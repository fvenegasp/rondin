$(document).ready(inicializarPagina);



function inicializarPagina() { 


$("#btn_aceptar_cerrar_sesion").click(function(){
    $.ajax({
                type: 'POST',
                url: logout,
                dataType: 'json',
                success: function(dat){
                    //alert(dat.msg);
                    location.reload();
                }
            });

    });
}


function CajaMensajes(msg, type){
    $("#CajaMensajes").attr('class', 'alert '+type);
    $("#CajaMensajes").show().delay(7000);
    $("#CajaMensajes").hide(3);
    $("#pMensaje").html(msg);		
}
