<?php 	echo form_open('registros/edit_agendamiento_ajax', array('id' => 'form_edit', 'role' => 'form')); ?>
<table class="table">
	
	<tr><th>Especialidad</th><td><select class="form-control selectpicker" id="especialidad" name="especialidad" data-live-search="true" title="Seleccione especialidad" required="required">
		<?php 	foreach ($especialidades as $row) :?>
			<option value="<?php 	echo $row->id;  ?>" <?php echo ($row->id == $registro->id ) ? 'selected' : '' ?> ><?php 	echo $row->especialidad; ?></option>
		<?php 	endforeach; ?>
	</select></td></tr>
	<tr><th>Profesional</th><td><select class="form-control selectpicker" name="profesional" id="profesionales" data-live-search="true" title="Seleccione profesional" required="required">
				<?php 	foreach ($profesionales as $row) :?>
			<option value="<?php 	echo $row->id;  ?>" <?php echo ($row->id == $registro->id_medico ) ? 'selected' : ''; ?> ><?php 	echo $row->profesional; ?></option>
		<?php 	endforeach; ?>
	</select></td></tr>
	<tr><th>Prestación</th><td> <select class="form-control selectpickerct" name="prestacion" data-live-search="true" title="Seleccione prestacion" required="required">
		<?php foreach ($prestaciones as $row) :?>
				<option value="<?php 	echo $row->id;  ?>" <?php echo ($row->id == $registro->id_prestacion ) ? 'selected' : ''; ?> ><?php 	echo $row->prestacion; ?></option>
	    <?php endforeach; ?>
	</select></td></tr>
	<tr><th>Pacientes agendados</th><td><input type="text" name="p_agendados" class="form-control col-md-1" value="<?php echo $registro->pacientes_agendados; ?>" required="required"></td></tr>
	<tr><th>No contestaron</th><td><input type="text" name="no_contestaron" class="form-control col-md-1" value="<?php echo $registro->no_contestaron; ?>" required="required"></td></tr>
	<tr><th>Rechazos / Anulaciones</th><td><input type="text" name="rechazos" class="form-control col-md-1" value="<?php echo $registro->rechazo_anulaciones; ?>" required="required"></td></tr>
	<tr><th>Horas ya asignadas</th><td><input type="text" name="ya_asignadas" class="form-control col-md-1" value="<?php echo $registro->hora_ya_asignada; ?>" required="required"></td></tr>
	<tr><th>Número erroneo / sin numero</th><td><input type="text" name="erroneo" class="form-control col-md-1" value="<?php echo $registro->n_erroneo; ?>" required="required"> <input type="hidden" name="id" value="<?php echo $registro->id ?>" ></td></tr>
	<tr><th>observaciones</th><td><textarea name="observaciones" class="form-control"><?php echo $registro->observaciones; ?></textarea></td></tr>
		<tr><th></th><td><button class="btn btn-success" type="submit">Actualizar</button> </td></tr>
</table>

<?php 	echo form_close(); ?>