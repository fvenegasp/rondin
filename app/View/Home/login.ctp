<script type="text/javascript" language="javascript">
    var url_home = "<?php echo $this->Html->url(array("controller" => "home", "action" => "home")); ?>"; 
    var url_validacion_usuario= "<?php echo $this->Html->url(array("controller" => "home", "action" => "checkUsuario")); ?>";      
</script>
<div class="body_login" >  
    <?php echo $this->Form->input("rut", array("label" => "Rut:", "value" => "", "placeholder" => "Ej.: 11111111-1")); ?>
    <?php echo $this->Form->input("password", array("label" => "Pass:", "value" => "")); ?>
    <div id="login_load" style="display: none"><?php echo $this->Html->image("cargando.gif"); ?></div>  
    <div id="login_ingresar" ><?php echo $this->Form->button("Ingresar", array("type" => "button", "id" => "btnIngresar", "class" => "btn btn-primary")); ?></div>
</div>