<?php
echo $this->Html->script(array('configuracion', 'jquery.dataTables','TableTools',
<<<<<<< HEAD
    //'dataTables.editor', 
=======
    'dataTables.editor', 
>>>>>>> 7c52a9a373655088ffea87bc895b8e2eb6fc9877
    'bootstrap.min',
    'dataTables.bootstrap',
    'dataTables.editor.bootstrap',
    'jquery.Rut' ));




echo $this->Html->css('demo_table');
echo $this->Html->css('dataTables.bootstrap');
?> 
<script type="text/javascript" language="javascript">
/*
    var url_mostrar_rondas = "<?php echo $this->Html->url(array("controller" => "Configuracion", "action" => "mostrarRondas")); ?>"; 
    var url_progreso= "<?php echo $this->Html->url(array("controller" => "Administracion", "action" => "progreso")); ?>";      
    var url_agregar_usuario_modal= "<?php echo $this->Html->url(array("controller" => "Configuracion", "action" => "agregarRondaModal")); ?>";      
    var url_eliminar_usuario = "<?php echo $this->Html->url(array("controller" => "Administracion", "action" => "eliminarUsuario")); ?>";     
    */
    var url_get_rondas = "<?php echo $this->Html->url(array("controller" => "configuracion", "action" => "mostrarRondas")); ?>";  
    var url_edit_rondas = "<?php echo $this->Html->url(array("controller" => "configuracion", "action" => "editarRondas")); ?>";           
</script>

<div class="container">
    <div class="row demo-tiles">
        <div id="tabs">
            <ul>
                <li><a href="#tabs-1">Rondas</a></li>
                <li><a href="#tabs-2">Puntos de control</a></li>
            </ul>
            <!-- Rondas -->
            <div id="tabs-1">              
<<<<<<< HEAD
               <table class="table table-striped table-bordered" id="examplerondas" width="100%">
                <thead>
                    <tr>
                        <th width="30%">Nombre</th>
                        <th width="60%">Observaciones</th>
                        <th width="10%">Accion</th>
=======
               <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="examplerondas" width="100%">
                <thead>
                    <tr>
                        <th width="30%">Nombre</th>
                        <th width="20%">Observaciones</th>
>>>>>>> 7c52a9a373655088ffea87bc895b8e2eb6fc9877
                     </tr>
                </thead>
            </table>           
                            
             
            </div>
            <!-- Roles -->
            <div id="tabs-2">
              
               
            </div>            
        </div>        
    </div>
</div> <!-- /container -->