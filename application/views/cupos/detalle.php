<div class="col-md-12">
	<table id="cupos_detalle_table" class="table table-striped table-bordered " cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Especialidad</th>
            <th>Profesional</th>
            <th>Cupos</th>
            <th>observaciones</th>
        

                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Especialidad</th>
                 <th>Profesional</th>
                 <th>Cupos</th>
                 <th>observaciones</th>

                
            </tr>
        </tfoot>
        <tbody>
        	<?php 
        	if ($detalles != false)
        	foreach ($detalles as $row) : ?>
        		<tr>
        			<td><?php echo $row->especialidad ?></td>
        			<td><?php echo $row->profesional ?></td>
        			<td><?php echo $row->cupos ?></td>
        			<td><?php echo $row->observaciones ?></td>
        		</tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>