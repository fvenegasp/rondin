var sSearch = "Buscar:";
var sLengthMenu = "Mostrar _MENU_ registros por página";
var sZeroRecords = "No se encontró nada";
var sInfo = "Mostrar _START_ a _END_ de _TOTAL_ registros";
var sInfoEmpty = "Mostrar 0 a 0 de 0 registros";
var sInfoFiltered = "(Filtrado de _MAX_ registros totales)";
var sFirst = "Primero";
var sLast = "Último";
var sNext = "Siguiente";
var sPrevious = "Anterior";


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
    $("#CajaMensajes").show().delay(6000);
    $("#CajaMensajes").hide(3);
    $("#pMensaje").html(msg);		
}
