<?php
echo $this->Html->script(array('usuarios_rondas'));
?> 
<script type="text/javascript" language="javascript">
    var url_data_test = "<?php echo $this->Html->url(array("controller" => "rondas", "action" => "mostrarUsuarios")); ?>";      
    var url_agregarUsuario = "<?php echo $this->Html->url(array("controller" => "Administracion", "action" => "agregarUsuario")); ?>"; 
    var url_checkUsuario = "<?php echo $this->Html->url(array("controller" => "Administracion", "action" => "checkUsuario")); ?>"; 
    var url_modificarUsuario = "<?php echo $this->Html->url(array("controller" => "Administracion", "action" => "modificarUsuario")); ?>"; 
    var url_eliminar_usuario = "<?php echo $this->Html->url(array("controller" => "Administracion", "action" => "eliminarUsuario")); ?>";      
</script>
<a id="agregar_usuario" class="btn btn-success" href="#myModal" data-toggle='modal' style="color:white;"><i class="icon-plus icon-white"></i> Agregar</a>

<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="usuarios_rondas" width="100%">  
</table>

<!-- Modal Eliminar -->
<div id="eliminar_usuario" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Eliminar Usuario</h3>
    </div>
    <div class="modal-body">
        <p>¿Desea eliminar el usuario?</p>
        <center><div id="cargando_eliminar"></div></center>
    </div>
    <div class="modal-footer">
        <button id="btn_cancelar_eliminar_usuario" class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
        <button id="btn_aceptar_eliminar_usuario" class="btn btn-primary">Aceptar</button>
    </div>
</div>



<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Usuarios</h3>
    </div>
    <div class="modal-body">
        <div class="alert " id="CajaMensajes" style="position: fixed; top: 1%; left: 15%; width: 70%;display: none ">            
                      
            <p id="pMensaje" ></p>
        </div>
        <form id="form1">
            <table>
                <tr>
                    <td>
                        <label>Rut</label> 
                        <input type="text" id="rut" name="rut" size="12" maxlength="12" />
                    </td>
                    <td>
                        <label>Nombre</label>
                        <input  type="text" id="nombre" name="nombre" size="50" maxlength="50" />
                    </td>
                </tr>
                <tr>
                    <td>     
                        <label>Ap. Paterno</label>
                        <input type="text" id="ap_paterno" name="ap_paterno" size="12" maxlength="12" />
                    </td>
                    <td>
                        <label>Ap. Materno</label>
                        <input type="text" id="ap_materno" name="ap_materno" size="50" maxlength="50"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Rol</label>
                        <select id="rol" name="rol" style="width: 180px;">
                            <option value="">Seleccione Rol...</option>
                            <?php
                            $id_rol = (isset($id_rol)) ? $id_rol : '';
                            foreach ($roles as $rol) {
                                $selected = ($rol['Roles']['id_rol'] == $id_rol) ? "selected" : "";
                                ?>
                                <option value="<?php echo $rol['Roles']['id_rol'] ?>" <?php echo $selected; ?> ><?php echo $rol['Roles']['descripcion'] ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <div id="div_password">
                            <label>Password</label>
                            <input type="password" id="password" name="password" size="50" maxlength="50"/>
                        </div>
                    </td>
                </tr>
            </table>    
        </form>    
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
        <button class="btn btn-primary" id="agregar">Agregar</button>
        <button class="btn btn-primary" id="modificar" style="display: none">Modificar</button>
    </div>
</div>