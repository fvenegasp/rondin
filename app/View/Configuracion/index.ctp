<?php
echo $this->Html->script(array('configuracion', 'jquery.dataTables' ));
echo $this->Html->css('demo_table');
?> 
<script type="text/javascript" language="javascript">
    var url_mostrar_rondas = "<?php echo $this->Html->url(array("controller" => "Configuracion", "action" => "mostrarRondas")); ?>"; 
    var url_progreso= "<?php echo $this->Html->url(array("controller" => "Administracion", "action" => "progreso")); ?>";      
    var url_agregar_usuario_modal= "<?php echo $this->Html->url(array("controller" => "Configuracion", "action" => "agregarRondaModal")); ?>";      
    var url_eliminar_usuario = "<?php echo $this->Html->url(array("controller" => "Administracion", "action" => "eliminarUsuario")); ?>";      
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
              <center><div id="cargando"></div></center>
               <div id="resultado"></div>
               
               <br><br>
                

               <a id="agregar_usuario" class="btn btn-success" style="color:white;"><i class="icon-plus icon-white"></i> Agregar</a>                
            </div>
            <!-- Roles -->
            <div id="tabs-2">
            </div>            
        </div>        
    </div>
</div> <!-- /container -->


<!-- Modal Agregar Ronda-->
<div class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Cerrar sesión</h3>
  </div>
  <div class="modal-body">
    <p>¿Está seguro que desea salir de la aplicación?</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <button  id="btn_aceptar_cerrar_sesion" class="btn btn-primary">Aceptar</button>
  </div>
</div>

<!-- MODAL  -------------------------------------------------------------------------->
<div id="modal-background"></div>
<div id="modal-content"></div>​
<footer></footer>