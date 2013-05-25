$(document).ready(inicializarPagina);

function inicializarPagina() { 
   
    $("#modal-launcher").click(function(){
        $("#modal-background").toggleClass("active");
        $("#modal-content").toggleClass("active");
    });

    $("#modal-background, #modal-close").click(function(){
        $("#modal-background").toggleClass("active");
        $("#modal-content").toggleClass("active");
    });
    
   
    $("#agregar").click(agregarUsuario);
    $("#modificar").click(modificarUsuario);
    
    $('#rut').Rut({
        on_error: function(){alert('Rut Invalido');$("#agregar").hide();},
        on_success: function(){ $("#agregar").show(); checkUsuario();} 
    });           
    
 
}


function agregarUsuario(){
    var rut = $("#rut").attr('value');
    var nombre = $("#nombre").attr('value');
    var ap_paterno = $("#ap_paterno").attr('value');
    var ap_materno = $("#").attr('value');
    var rol = $("#rol").attr('value');
    
    if($.trim(rut)=='') alert('debe ingresar rut');
      
}

function modificarUsuario(){
    var rut = $("#rut").attr('value');
    var nombre = $("#nombre").attr('value');
    var ap_paterno = $("#ap_paterno").attr('value');
    var ap_materno = $("#").attr('value');
    var rol = $("#rol").attr('value');
    
    alert(rut+'-'+nombre+'-'+ap_paterno);
      
}

function checkUsuario(){
    var rut = $("#rut").attr('value');
    if(rut=='1-9'){
       $("#agregar").hide();
       $("#modificar").hide();  
       $("#form1 :input").attr("disabled", true);
       $("#rut").attr("disabled", false);
        alert('Rut Invalido');
        return false;        
    }
    
    $.ajax({
        data: "rut="+rut,
        type: "POST",
        url: url_checkUsuario,
        dataType: 'json',
        success: function(dat){
            
           if(dat.estado==true){
               $("#nombre").attr('value', dat.nombre);
               $("#ap_paterno").attr('value', dat.ap_paterno);
               $("#ap_materno").attr('value', dat.ap_materno);
               $("#rol").attr('value', dat.id_rol);
               $("#div_password").hide();
               $("#modificar").show();
           }else{
               $("#nombre").attr('value', '');
               $("#ap_paterno").attr('value', '');
               $("#ap_materno").attr('value', '');
               $("#rol").attr('value', '');
               $("#div_password").show();
               $("#agregar").show();
           }
                        
        },
         beforeSend: function(){
           $("#form1 :input").attr("disabled", true);
           $("#agregar").hide();
           $("#modificar").hide();
        },
        complete: function(){
           $("#form1 :input").attr("disabled", false);
        }           
    });		
}