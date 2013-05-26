
<script>
  $('#example').dataTable( {
        "bJQueryUI": false,
        //"sPaginationType": "full_numbers",
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
<table id="example" width="100%" style="margin-top: 20px;">
    <thead>
        <tr style="border-bottom: 1px SOLID #000000;">
            <td width="15%"><b><center>Rut</center></b></td>
            <td width="30%"><b><center>Nombre</center></b></td>
            <td width="25%"><b><center>Ap. Paterno</center></b></td>
            <td width="13%"><b><center>Ap. Materno</center></b></td>
            <td class="span2_Tab_Lugares" width="12%"><b><center>Acci&oacute;n</center></b></td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td class="span3"><center><?php echo $usuario['Users']['rut'] . "-" . $usuario['Users']['dv']; ?></center></td>
    <td class="span3"><?php echo $usuario['Users']['nombre']; ?></td>
    <td class="span3"><?php echo $usuario['Users']['ap_paterno']; ?></td>
    <td class="span3"><?php echo $usuario['Users']['ap_materno']; ?></td>
    <td class="span2_Tab_Lugares">
    <center>
           <img style="cursor: pointer;" src="../../img/edit2.png" height="25px" width="25px"/>                                         
        <?php
        $this->Html->image('/img/delete2.png', array('width' => '25px', 'height' => '25px'));
        ?>
    </center>
    </td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>