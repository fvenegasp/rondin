$(document).ready(inicializarPagina);

var rut = "";
var oTable;

function inicializarPagina() { 
    
    cargarTabla();
     $('#rut').Rut({
        on_error: function(){
            CajaMensajes('Rut Invalido', 'alerta');
            $("#agregar").hide();
            $("#modificar").hide();},
        on_success: function(){
            checkUsuario($("#rut").attr('value'));
        } 
    }); 
      $("#agregar").click(agregarUsuario);
      $("#agregar_usuario").click(limpiarFormulario);
      $("#modificar").click(modificarUsuario); 
      $("#btn_aceptar_eliminar_usuario").click(function(){
        eliminarUsuario(rut);
     });
}

function limpiarFormulario(){
    $("#rut").attr('value','');
    $("#nombre").attr('value', '');
    $("#ap_paterno").attr('value', '');
    $("#ap_materno").attr('value', '');
    $("#rol").attr('value', '');
    $("#password").attr('value', '');
    $("#div_password").show();
    $("#modificar").hide();
    $("#agregar").show();
    $("#CajaMensajes").hide();
}

function selectRut(r){
    $("#btn_cancelar_eliminar_usuario").show();
    $("#btn_aceptar_eliminar_usuario").show();  
    rut = r;
    
}

function destrTabla(){
     oTable.fnDestroy();
}

function cargarTabla(){
   oTable = $('#usuarios_rondas').dataTable( {
        "sAjaxSource": url_data_test,
        "aoColumns": [
            { "mData": "rut", "sTitle": "Rut" },
            { "mData": "nombre", "sTitle": "Nombre" },
            { "mData": "ap_paterno", "sTitle": "Ap. Paterno" },
            { "mData": "ap_materno", "sTitle": "Ap. Materno" },
            { "mData": "rol", "sTitle": "Rol" },
            { "mData": "acciones", "sTitle": "Acciones", "sWidth": "10%" }  
        ]
    } ); 
}


function agregarUsuario(){
    var rut = $("#rut").attr('value');
    var nombre = $("#nombre").attr('value');
    var ap_paterno = $("#ap_paterno").attr('value');
    var ap_materno = $("#ap_materno").attr('value');
    var rol = $("#rol").attr('value');
    var password = $("#password").attr('value');
    
    if($.trim(rut)==''){ CajaMensajes('debe ingresar rut', 'alerta'); return false}
    if($.trim(nombre)==''){ CajaMensajes('debe ingresar nombre', 'alerta'); return false;}
    if($.trim(ap_paterno)==''){ CajaMensajes('debe ingresar apellido paterno', 'alerta'); return false;}
    if($.trim(rol)==''){ CajaMensajes('debe seleccionar rol', 'alerta'); return false;}
    if($.trim(password)==''){ CajaMensajes('debe ingresar password', 'alerta'); return false;}
    
     $.ajax({
        data: "rut="+rut+"&nombre="+nombre+"&ap_paterno="+ap_paterno+"&ap_materno="+ap_materno+"&rol="+rol+"&password="+password,
        type: "POST",
        url: url_agregarUsuario,
        dataType: 'json',
        success: function(dat){
            if(dat.estado){
                $('#myModal').modal('hide');
                destrTabla();
                cargarTabla();
                limpiarFormulario();
            }else{
                CajaMensajes('Error al agregar', 'alerta'); 
            }  
        },
         beforeSend: function(){
           $("#form1 :input").attr("disabled", true);
           $("#agregar").hide();
        },
        complete: function(){
           $("#form1 :input").attr("disabled", false);
        }       
       });	
}


function checkUsuario(rut){
    if(rut=='1-9'){
       $("#agregar").hide();
       $("#modificar").hide();  
       $("#form1 :input").attr("disabled", true);
       $("#rut").attr("disabled", false);
        CajaMensajes('Rut Invalido', 'alerta');
        return false;        
    }
    
    $.ajax({
        data: "rut="+rut,
        type: "POST",
        url: url_checkUsuario,
        dataType: 'json',
        success: function(dat){         
           if(dat.estado==true){
               $("#rut").attr('value', rut);
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

function modificarUsuario(){
    var rut = $("#rut").attr('value');
    var nombre = $("#nombre").attr('value');
    var ap_paterno = $("#ap_paterno").attr('value');
    var ap_materno = $("#ap_materno").attr('value');
    var rol = $("#rol").attr('value');
    
    if($.trim(rut)==''){ CajaMensajes('debe ingresar rut', 'alerta'); return false}
    if($.trim(nombre)==''){ CajaMensajes('debe ingresar nombre', 'alerta'); return false;}
    if($.trim(ap_paterno)==''){ CajaMensajes('debe ingresar apellido paterno', 'alerta'); return false;}
    if($.trim(rol)==''){ CajaMensajes('debe seleccionar rol', 'alerta'); return false;}
    
    $.ajax({
        data: "rut="+rut+"&nombre="+nombre+"&ap_paterno="+ap_paterno+"&ap_materno="+ap_materno+"&rol="+rol,
        type: "POST",
        url: url_modificarUsuario,
        dataType: 'json',
        success: function(dat){
            if(dat.estado){
                $('#myModal').modal('hide');
                destrTabla();
                cargarTabla();
                limpiarFormulario();
            }else{
                CajaMensajes('Error al modificar', 'alerta');
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

function eliminarUsuario(rut){
    $.ajax({
        type: 'POST',
        data: "rut="+rut,
        url: url_eliminar_usuario,
        dataType: 'json',
        success: function(dat){
            if(dat.estado==true){
               $('#eliminar_usuario').modal('toggle');
               destrTabla();
               cargarTabla();
               limpiarFormulario();
            }
        },
        complete: function() {
          $('#cargando_eliminar').empty();
        },
        beforeSend: function() {
          $("#btn_cancelar_eliminar_usuario").hide();
          $("#btn_aceptar_eliminar_usuario").hide();  
          $('#cargando_eliminar').prepend('<img src="img/window_loader.gif" />');
        }
    });    
}

function modalAgregarUsuario(rut){
    checkUsuario(rut);
}