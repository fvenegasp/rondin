<?php
echo $this->Html->script(array('jquery-1.8.3', 'jquery.Rut', 'usuarios'));
?> 
<script type="text/javascript" language="javascript">
    var url_checkUsuario = "<?php echo $this->Html->url(array("controller" => "Administracion", "action" => "checkUsuario")); ?>"; 
</script>
<legend>Agregar Usuario</legend>
<form id="form1">
    <div class="row">
        <div class="span2">
            <label>Rut</label>
            <input type="text" id="rut" name="rut" size="12" maxlength="12"/>
        </div>
        <div class="span2 offset2">
            <label>Nombre</label>
            <input  type="text" id="nombre" name="nombre" size="50" maxlength="50"/>

        </div>                    
    </div>
    <div class="row">
        <div class="span2">
            <label>Ap. Paterno</label>
            <input type="text" id="ap_paterno"   name="ap_paterno" size="12" maxlength="12"/>
        </div>
        <div class="span2 offset2">
            <label>Ap. Materno</label>
            <input type="text" id="ap_materno" name="ap_materno" size="50" maxlength="50"/>

        </div>                    
    </div>
    <div class="row">
        <div class="span2">
            <label>Rol</label>
            <select id="rol" name="rol" style="width: 180px;">
                <option value="">Seleccione Rol...</option>
            <?php foreach($roles as $rol){?>
                <option value="<?php echo $rol['Roles']['id_rol'] ?>"><?php echo $rol['Roles']['descripcion']?></option>
            <?php }?>
            </select>    
        </div>
        <div id="div_password" class="span2 offset2">
            <label>Password</label>
            <input type="password" id="password" name="password" size="50" maxlength="50"/>

        </div>     
    </div>

    <div class="row">
        <div class="span4">
            <input type="button" id="modal-close" value="Cancelar"></button>
        </div>
        <div class="span4 offset1">
            <input type="button" id="agregar" value="Agregar" />
            <input type="button" id="modificar" value="Modificar" style="display: none" />
        </div>

    </div>
</form>