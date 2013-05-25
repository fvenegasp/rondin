$(document).ready(inicializarPagina);

function inicializarPagina() { 

    $('#rut').Rut({
        on_error: function(){ 
            CajaMensajes('Rut incorrecto', 'alerta'); 
            $('#btnIngresar').hide();
        }
        ,
        on_success: function(){ 
            $('#btnIngresar').show();
            $('#CajaMensajes').hide();
        } 
    });           
            
    $('#btnIngresar').click(validar);
}
          
function validar(){ 
                  
    var rut = $('#rut').attr('value');            
    var password = $('#password').attr('value');
        
    $.ajax({
        data: "rut="+rut+"&password="+password,
        type: "POST",
        url: url_validacion_usuario,
        dataType: 'json',
        success: function(dat){
            if(dat.estado == true){
                
                location.href = url_home;
            }else{
                CajaMensajes('Rut o Password no valida', 'alerta');
            }    
                        
        },
         beforeSend: function(){
            $("#login_load").show();
            $("#login_ingresar").hide(); 
            $("#CajaMensajes").hide();
        },
        complete: function(){
            $("#login_ingresar").show(); 
            $("#login_load").hide();
        },
        error: function(dat, textStatus, errorThrown){
             CajaMensajes("error:"+ textStatus + errorThrown, 'alerta');         
        },
        statusCode: {
            404: function() {
                alert("page not found ");
            },
            500: function() {
                alert("server error ");
            }
        }		
    });
    return false;
}	
       
function CajaMensajes(msg, type){
    $("#CajaMensajes").attr('class', 'alert '+type);
    $("#CajaMensajes").show().delay(7000);
    $("#CajaMensajes").hide(3);
    $("#pMensaje").html(msg);		
}

function overLoader(sw, msg){
    if(sw==1){
        $("#overLoader").show();
        $("#txtLoader").html(msg);		
    }else{
        $("#overLoader").hide();
    } 
}