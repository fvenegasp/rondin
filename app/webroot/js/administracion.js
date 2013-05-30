$(document).ready(inicializarPagina);

function inicializarPagina() { 
    
    $("#btn_aceptar_eliminar_usuario").click(function(){
        
        alert('das');
        alert($(this).parents('tr')[0]);
    
    });
    
    $("#tabs").tabs();
     
    $("li").removeClass("active");
    $("#li_administracion").addClass("active");

    cargarUsuarios();
        
    $("#agregar_usuario").click(AgregarUsuario);
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