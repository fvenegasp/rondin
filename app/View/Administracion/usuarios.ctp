<?php echo $this->Html->script('jquery.dataTables'); ?>
<script>
    $('#tabla_usuarios').dataTable( {
        "bJQueryUI": false,
        "sPaginationType": "full_numbers",
        "oLanguage": {
            "sSearch":"Buscar", 
            "sLengthMenu": "Mostrar _MENU_ registros por pagina",
            "sZeroRecords": "No se encontró nada",
            "sInfo": "Mostrar _START_ a _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrar 0 a 0 de 0 registros",
            "sInfoFiltered": "(Filtrado de _MAX_ registros totales)",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            }
        }
    } );
</script>
<table id="tabla_usuarios" width="100%" style="margin-top: 20px;">
    <thead>
        <tr style="border-bottom: 1px SOLID #000000;">
            <td width="15%"><b><center>Rut</center></b></td>
            <td width="20%"><b><center>Nombre</center></b></td>
            <td width="20%"><b><center>Ap. Paterno</center></b></td>
            <td width="15%"><b><center>Ap. Materno</center></b></td>
            <td width="15%"><b><center>Rol</center></b></td>
            <td width="15%"><b><center>Acci&oacute;n</center></b></td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <?php
                 $rut = $usuario['Users']['rut'] . "-" . $usuario['Users']['dv'];
                 ?>
                <td class="span3"><center><?php echo $rut; ?></center></td>
                <td class="span3"><?php echo $usuario['Users']['nombre']; ?></td>
                <td class="span3"><?php echo $usuario['Users']['ap_paterno']; ?></td>
                <td class="span3"><?php echo $usuario['Users']['ap_materno']; ?></td>
                <td class="span3"><?php echo $usuario['r']['descripcion']; ?></td>
    <td class="span2">
    <center>
                                         
       
        <a id="agregar_usuario2" class="btn btn-warning" style="color:white;"  onclick="modalAgregarUsuario('<?php echo $rut;?>')"><i class="icon-edit icon-white"></i></a>
        <a class="btn btn-danger" style="color:white;" href="#eliminar_usuario" data-toggle="modal" onclick="selectRut('<?php echo $rut;?>')"><i class="icon-minus icon-white"></i></a> 
    </center>
    </td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>