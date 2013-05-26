<?php
echo $this->Html->script(array('administracion', 'jquery.dataTables' ));
echo $this->Html->css('demo_table');
?> 
<script type="text/javascript" language="javascript">
    var url_mostrar_usuarios = "<?php echo $this->Html->url(array("controller" => "Administracion", "action" => "mostrarUsuarios")); ?>"; 
    var url_progreso= "<?php echo $this->Html->url(array("controller" => "Administracion", "action" => "progreso")); ?>";      
    var url_agregar_usuario_modal= "<?php echo $this->Html->url(array("controller" => "Administracion", "action" => "agregarUsuarioModal")); ?>";      
</script>

<div class="container">
    <div class="row demo-tiles">
        <div id="tabs">
            <ul>
                <li><a href="#tabs-1">Usuarios</a></li>
                <li><a href="#tabs-2">Roles</a></li>
                <li><a href="#tabs-3">Recursos</a></li>
                <li><a href="#tabs-4">Menu</a></li>
            </ul>
            <!-- Ususarios ------------------------------------------------------------------------------------------>
            <div id="tabs-1">
              <center><div id="cargando"></div></center>
               <div id="resultado"></div>
               
               <br>
               <div id="Actions_Tab_Lugares"class='row' style='margin-top: 20px;'>
                   <a id="agregar_usuario" style="width: 120px; float: right; color: #FFFFFF;" class="btn btn-large btn-block btn-info">Agregar</a>
               </div>    
                
            </div>
            <!-- Roles -------------------------------------------------------------------------------------------->
            <div id="tabs-2">
            </div>
            <!-- Recursos  -------------------------------------------------------------------------------------------->
            <div id="tabs-3">
            </div>
            <!-- Menu -------------------------------------------------------------------------------------------->
            <div id="tabs-4">
            </div>
        </div>
        <div style="float: left; margin: 10px;">
            <a onClick="history.go( -1 );return true;" style="width: 100px; float: right; color: #FFFFFF;" class="btn btn-large btn-block btn-info">Volver</a>
        </div>
    </div>
</div> <!-- /container -->
<!-- MODAL  -------------------------------------------------------------------------->
<div id="modal-background"></div>
<div id="modal-content"></div>​
<footer></footer>