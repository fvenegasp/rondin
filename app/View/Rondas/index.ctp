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
    var url_mostrar_usuarios = "<?php echo $this->Html->url(array("controller" => "rondas", "action" => "usuarios")); ?>";      
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
              <div id="usuarios"></div>
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
