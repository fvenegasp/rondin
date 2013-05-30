<?php
echo $this->Html->script(array(
    'jquery-1.8.3',
    'jquery.dataTables', 
    'TableTools',
    'dataTables.editor', 
    'bootstrap.min',
    'dataTables.bootstrap',
    'dataTables.editor.bootstrap',
    'jquery.Rut',
    'rondas'
    
    ));

echo $this->Html->css('bootstrap');
echo $this->Html->css('dataTables.bootstrap');

?> 

<script type="text/javascript" language="javascript">
    var url_data_test = "<?php echo $this->Html->url(array("controller" => "rondas", "action" => "mostrarUsuarios")); ?>";      
    var url_data_edit = "<?php echo $this->Html->url(array("controller" => "rondas", "action" => "editarUsuarios")); ?>";      
</script>
<style type="text/css">
    #container {
        padding-top: 60px !important;
        width: 960px !important;
    }
    #dt_example .big {
        font-size: 1.3em;
        line-height: 1.45em;
        color: #111;
        margin-left: -10px;
        margin-right: -10px;
        font-weight: normal;
    }
    #dt_example {
        font: 95%/1.45em "Lucida Grande", Verdana, Arial, Helvetica, sans-serif;
        color: #111;
    }
    div.dataTables_wrapper, table {
        font: 13px/1.45em "Lucida Grande", Verdana, Arial, Helvetica, sans-serif;
    }
    #dt_example h1 {
        font-size: 16px !important;
        color: #111;
    }
    #footer {
        line-height: 1.45em;
    }
    div.examples {
        padding-top: 1em !important;
    }
    div.examples ul {
        padding-top: 1em !important;
        padding-left: 1em !important;
        color: #111;
    }
</style>
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example" width="100%">
    <thead>
        <tr>
            <th width="30%">Rut</th>
            <th width="20%">Nombre</th>
            <th width="18%">Ap. Paterno</th>
            <th width="20%">Ap. Materno</th>
            <th width="12%">Rol</th>
        </tr>
    </thead>
    <tfoot>
       <tr>
            <th>Rut</th>
            <th>Nombre</th>
            <th>Ap. Paterno</th>
            <th>Ap. Materno</th>
            <th>Rol</th>
        </tr>
    </tfoot>
</table>
