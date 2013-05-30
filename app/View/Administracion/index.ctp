<?php
echo $this->Html->script(array('administracion', 'jquery.dataTables' ));
echo $this->Html->css('demo_table');
?> 
<script type="text/javascript" language="javascript">
    var url_mostrar_usuarios = "<?php echo $this->Html->url(array("controller" => "Administracion", "action" => "mostrarUsuarios")); ?>"; 
    var url_progreso= "<?php echo $this->Html->url(array("controller" => "Administracion", "action" => "progreso")); ?>";      
    var url_agregar_usuario_modal= "<?php echo $this->Html->url(array("controller" => "Administracion", "action" => "agregarUsuarioModal")); ?>";      
    var url_eliminar_usuario = "<?php echo $this->Html->url(array("controller" => "Administracion", "action" => "eliminarUsuario")); ?>";      
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
                
               <!-- Modal -->
                <div id="eliminar_usuario" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 id="myModalLabel">Eliminar Usuario</h3>
                    </div>
                    <div class="modal-body">
                        <p>¿Desea eliminar el usuario?</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                        <button  id="btn_aceptar_eliminar_usuario" class="btn btn-primary">Aceptar</button>
                    </div>
                </div>
               
               <br><br>
               <a id="agregar_usuario" class="btn btn-success" style="color:white;"><i class="icon-plus icon-white"></i> Agregar</a>
               <!-- 
               <a id="agregar_usuario2" class="btn btn-warning" style="color:white;"><i class="icon-edit icon-white"></i> Modificar</a>
                <a id="agregar_usuario3" class="btn btn-danger" style="color:white;"><i class="icon-minus icon-white"></i> Eliminar</a>   
                -->
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
        
    </div>
</div> <!-- /container -->
<!-- MODAL  -------------------------------------------------------------------------->
<div id="modal-background"></div>
<div id="modal-content"></div>​
<footer></footer>