<?php
echo $this->Html->script(array(
    'jquery.dataTables', 
    'TableTools',
    'dataTables.editor', 
    'bootstrap.min',
    'dataTables.bootstrap',
    'dataTables.editor.bootstrap',
    'jquery.Rut',
    'rondas'
    ));
echo $this->Html->css('home');
echo $this->Html->css('dataTables.bootstrap');
?> 
<script type="text/javascript" language="javascript">
    var url_data_test = "<?php echo $this->Html->url(array("controller" => "rondas", "action" => "mostrarUsuarios")); ?>";      
    var url_data_edit = "<?php echo $this->Html->url(array("controller" => "rondas", "action" => "editarUsuarios")); ?>";      
    var url_progreso= "<?php echo $this->Html->url(array("controller" => "Administracion", "action" => "progreso")); ?>";      
    var url_agregar_usuario_modal= "<?php echo $this->Html->url(array("controller" => "Administracion", "action" => "agregarUsuarioModal")); ?>";      
</script>
<div class="container">
    <div class="row demo-tiles">
        <div id="tabs">
            <ul>
                <li><a href="#tabs-1">Usuarios</a></li>
                <li><a href="#tabs-2">Privilegios</a></li>
                
            </ul>
            <!-- Ususarios ------------------------------------------------------------------------------------------>
            <div id="tabs-1">
              <center><div id="cargando"></div></center>
               <div id="resultado"></div>
               
              <a id="agregar_usuario" class="btn btn-success" style="color:white;"><i class="icon-plus icon-white"></i> Agregar</a>
              <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example" width="100%">  
               </table>
                
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
            </div>
            <!-- Privilegios -------------------------------------------------------------------------------------------->
            <div id="tabs-2">
            </div>
        </div>
        
    </div>
</div> <!-- /container -->
<!-- MODAL  -------------------------------------------------------------------------->
<div id="modal-background"></div>
<div id="modal-content"></div>​
<footer></footer>
