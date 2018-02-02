<div class="col-md-12">
		<div class="row">
		<div class="col-md-12">
			<div class="well well-sm">
				Ingresado por : <?php echo $registro->usuario; ?> <br>
				Fecha: <?php echo $registro->fecha; ?><br>
				Última modificación: <?php echo $registro->actualizada ; ?>
			</div>
		</div>
	</div>
	<?php echo form_open(base_url('registros/editarRegistro'), array('method' => 'POST', 'id' => 'edit-form')); ?>
    <div class="row">
    	<div class="form-group col-md-4" >
		<label for="especialidad">Especialidad</label>
		<select name="especialidad" id="especialidad" class="selectpicker form-control" data-live-search="true" title="Seleccione una especialidad">
			<?php foreach($especialidades as $row): ?>
			<option value="<?php echo $row->id; ?>"   <?php echo ($row->id == $registro->id_especialidad ) ? 'selected' : ''; ?>><?php echo $row->especialidad; ?></option>
		<?php endforeach; ?>
		</select>
	</div>


	<div class="form-group col-md-4" >
		<label for="profesional">Profesional</label>
		<select name="profesional" id="profesionales" class="selectpicker form-control" data-live-search="true" title="Seleccione un profesional" required="required">
			<?php foreach($profesionales as $row): ?>
			<option value="<?php echo $row->id; ?>"   <?php echo ($row->id == $registro->id_medico ) ? 'selected' : ''; ?>><?php echo $row->profesional; ?></option>
		<?php endforeach; ?>
		</select>
	</div>

	<div class="form-group col-md-4" >
		<label for="prestacion">Prestación</label>
		<select name="prestacion" id="prestacion" class="selectpicker form-control numbersOnly" data-live-search="true" title="Seleccione una prestación" required="required">
			<?php foreach($prestaciones as $row): ?>
			<option value="<?php echo $row->id; ?>"   <?php echo ($row->id == $registro->id_prestacion ) ? 'selected' : ''; ?>><?php echo $row->prestacion; ?></option>
		<?php endforeach; ?>
		</select>
	</div>

    </div>

    <div class="row">
    		<div class="form-group col-md-3" >
		<label for="agendados">Nº PACIENTES AGENDADOS </label>
		<input type="text" class="form-control numbersOnly" name="agendados" value="<?php echo $registro->pacientes_agendados; ?>" required="required">
	</div>
	<div class="form-group col-md-3" >
		<label for="no_contestaron">NO CONTESTARON</label>
		<input type="text" class="form-control numbersOnly" name="no_contestaron" value="<?php echo $registro->no_contestaron; ?>" required="required">
	</div>
	<div class="form-group col-md-3" >
		<label for="rechazos">RECHAZOS / ANULACIONES </label>
		<input type="text" class="form-control numbersOnly" name="rechazos" value="<?php echo $registro->rechazo_anulaciones; ?>" required="required">
	</div>
	<div class="form-group col-md-3" >
		<label for="h_y_asignadas">HORAS YA ASIGNADAS </label>
		<input type="text" class="form-control numbersOnly" name="h_y_asignadas" value="<?php echo $registro->hora_ya_asignada; ?>" required="required">
	</div>
    </div>

    <div class="row">
    		<div class="form-group col-md-3" >
		<label for="erroneos">Nº ERRONEO / SIN NUMERO </label>
		<input type="text" class="form-control numbersOnly" name="erroneos" value="<?php echo $registro->n_erroneo; ?>" required="required">
	</div>
    </div>


    <div class="row">
    		  <div class="form-group col-md-12">
                                <label>OBSERVACIONES</label>
                                <textarea name="observaciones" class="form-control" rows="3" placeholder="Aquí sus Observaciones"><?php echo $registro->observaciones; ?></textarea>
                </div>
    </div>

    <div class="row">
    	  <div class="form-group col-md-12">
        	<button type="submit" class="btn btn-warning"><i class="fa fa-edit"></i> Actualizar</button>
      	<a href="<?php echo base_url('registros/agendamientos'); ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Volver</a>
      </div>

    </div>

      <input type="hidden" name="tipo" value="agendamientos">
      <input type="hidden" name="registro_id" value="<?php echo $registro->id; ?>">


   </form>
</div>