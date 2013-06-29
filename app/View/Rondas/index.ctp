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
echo $this->Html->css('dataTables.bootstrap');
?> 
<script type="text/javascript" language="javascript">
    var url_data_test = "<?php echo $this->Html->url(array("controller" => "rondas", "action" => "mostrarUsuarios")); ?>";      
    var url_data_edit = "<?php echo $this->Html->url(array("controller" => "rondas", "action" => "editarUsuarios")); ?>";      
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
               
               <br><br>
               <a id="agregar_usuario" class="btn btn-success" style="color:white;"><i class="icon-plus icon-white"></i> Agregar</a>
               <!-- 
               <a id="agregar_usuario2" class="btn btn-warning" style="color:white;"><i class="icon-edit icon-white"></i> Modificar</a>
                <a id="agregar_usuario3" class="btn btn-danger" style="color:white;"><i class="icon-minus icon-white"></i> Eliminar</a>   
                -->
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
