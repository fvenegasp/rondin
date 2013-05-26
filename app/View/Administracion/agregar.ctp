<?php
echo $this->Html->script(array('jquery-1.8.3', 'jquery.Rut', 'usuarios'));
?> 
<script type="text/javascript" language="javascript">
    var url_checkUsuario = "<?php echo $this->Html->url(array("controller" => "Administracion", "action" => "checkUsuario")); ?>"; 
    var url_modificarUsuario = "<?php echo $this->Html->url(array("controller" => "Administracion", "action" => "modificarUsuario")); ?>"; 
    var url_agregarUsuario = "<?php echo $this->Html->url(array("controller" => "Administracion", "action" => "agregarUsuario")); ?>"; 
</script>
<legend>Usuario</legend>
<form id="form1">
    <div class="row">
        <div class="span2">
            <label>Rut</label>
            <?php $rut = (isset($rut))? $rut : '';?>
            <input type="text" id="rut" name="rut" size="12" maxlength="12" value="<?php echo $rut; ?>" />
        </div>
        <div class="span2 offset2">
            <label>Nombre</label>
            <input  type="text" id="nombre" name="nombre" size="50" maxlength="50" value="<?php echo (isset($nombre))? $nombre : '';?>"/>

        </div>                    
    </div>
    <div class="row">
        <div class="span2">
            <label>Ap. Paterno</label>
            <input type="text" id="ap_paterno" name="ap_paterno" size="12" maxlength="12" value="<?php echo (isset($ap_paterno))? $ap_paterno: '';?>" />
        </div>
        <div class="span2 offset2">
            <label>Ap. Materno</label>
            <input type="text" id="ap_materno" name="ap_materno" size="50" maxlength="50" value="<?php echo (isset($ap_materno))? $ap_materno: '';?>"/>

        </div>                    
    </div>
    <div class="row">
        <div class="span2">
            <label>Rol</label>
            <select id="rol" name="rol" style="width: 180px;">
                <option value="">Seleccione Rol...</option>
            <?php 
                $id_rol = (isset($id_rol))? $id_rol : '';
                foreach($roles as $rol){ 
                $selected = ($rol['Roles']['id_rol']==$id_rol)? "selected" : "";
               ?>
                <option value="<?php echo $rol['Roles']['id_rol'] ?>" <?php echo $selected;?> ><?php echo $rol['Roles']['descripcion']?></option>
            <?php }?>
            </select>
        </div>
        
        
        <div id="div_password" class="span2 offset2" <?php echo ($rut)? 'style="display: none"' : '';?> >
            <label>Password</label>
            <input type="password" id="password" name="password" size="50" maxlength="50"/>

        </div>     
        
    </div>

    <div class="row">
        <div class="span4">
            <input type="button" id="modal-close" value="Cancelar"></button>
        </div>
        <div class="span4 offset1">
            <?php 
                  if($rut){
                      $agregar = 'style="display: none"';
                      $modificar = '';
                  }else{
                      $agregar = '';
                      $modificar = 'style="display: none"';
                  }
            ?>
            <input type="button" id="agregar" value="Agregar" <?php echo $agregar?> />
            <input type="button" id="modificar" value="Modificar" <?php echo $modificar?> />
            
        </div>

    </div>
</form>