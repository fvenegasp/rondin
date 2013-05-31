<?php echo $this->Html->script('jquery.dataTables'); ?>
<script>
    $('#tabla_rondas').dataTable( {
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
<table id="tabla_rondas" width="100%" style="margin-top: 20px;">
    <thead>
        <tr style="border-bottom: 1px SOLID #000000;">
            <td width="15%"><b><center>Nombre</center></b></td>
            <td width="15%"><b><center>Repeticiones</center></b></td>
            <td width="15%"><b><center>Horarios</center></b></td>
            <td width="15%"><b><center>Puntos de control</center></b></td>
            <td width="20%"><b><center>Observaciones</center></b></td>
            
            
            <td width="15%"><b><center>Acci&oacute;n</center></b></td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rondas as $ronda): ?>
            <tr>                
                <?php $dias = str_replace(array('1','2','3','4','5','6','7'), array('Lun','Mar','Mie','Jue','Vie','Sab','Dom'), $ronda[0]['dias']); ?>
                <td class="span3"><?php echo $ronda['Rondas']['nombre']; ?></td>
                <td class="span3"><?php echo $dias; ?></td>
                <td class="span3"><?php echo str_replace(',', '<br>', $ronda[0]['horas']); ?></td>    
                <td class="span3"><?php echo str_replace(',', '<br>', $ronda[0]['puntoscontrol']); ?></td>                            
                <td class="span3"><?php echo $ronda['Rondas']['observaciones']; ?></td>
                
                
                                
    <td class="span2">
    <center>
                                         
        <?php
        echo $this->Html->image("edit2.png", 
                array( 'id' => 'modificar_usuario', 'url' => '#', 'onclick' => "modalAgregarUsuario('')" ) 
        );
         echo $this->Html->image("delete2.png", 
                array('url' => '#', 'onclick' => "eliminarUsuario('')" ) 
        );
        ?>
    </center>
    </td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>