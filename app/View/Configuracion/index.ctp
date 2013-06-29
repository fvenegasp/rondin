<?php
echo $this->Html->script(array('configuracion',
    'jquery.dataTables', 
    'TableTools',
    'dataTables.editor', 
    'bootstrap.min',
    'dataTables.bootstrap',
    'dataTables.editor.bootstrap',
    'jquery.Rut'
    
    
    ));




echo $this->Html->css('home');
echo $this->Html->css('dataTables.bootstrap');
?> 
<script type="text/javascript" language="javascript">
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
                <a id="agregar_ronda_btn" class="btn btn-success"><i class="icon-plus icon-white"></i> Agregar</a>
                <table class="table table-striped table-bordered" id="configuracion_tbl" width="100%">
                
            </table>           
                            
             
            </div>
            <!-- Roles -->
            <div id="tabs-2">
              
               
            </div>            
        </div>        
    </div>
</div> <!-- /container -->