<div class="col-md-12">
	<div class="row">
		<div class="col-md-12">
			<div class="well well-sm">
				Ingresado por : <?php echo $registro->usuario; ?> <br>
				Fecha: <?php echo $registro->fecha_registro; ?><br>
				Última modificación: <?php echo $registro->actualizada ; ?>
			</div>
		</div>
	</div>
	<?php echo form_open(base_url('registros/editarRegistro'), array('method' => 'POST', 'id' => 'edit-form')); ?>
     <div class="row">
     	<div class="form-group col-md-4" >
		<label for="especialidad">ESPECIALIDAD</label>
		<select name="especialidad" id="especialidad" class="selectpicker form-control" data-live-search="true" title="Seleccione una especialidad">
			<?php foreach($especialidades as $row): ?>
			<option value="<?php echo $row->id; ?>"   <?php echo ($row->id == $registro->id_especialidad ) ? 'selected' : ''; ?>><?php echo $row->especialidad; ?></option>
		<?php endforeach; ?>
		</select>
	</div>


	<div class="form-group col-md-4" >
		<label for="profesional">PROFESIONAL</label>
		<select name="profesional" id="profesionales" class="selectpicker form-control" data-live-search="true" title="Seleccione un profesional" required="required">
			<?php foreach($profesionales as $row): ?>
			<option value="<?php echo $row->id; ?>"   <?php echo ($row->id == $registro->id_profesional) ? 'selected' : ''; ?>><?php echo $row->profesional; ?></option>
		<?php endforeach; ?>
		</select>
	</div>


	</div>

	<div class="row">

		<div class="form-group col-md-4">
			<label for="fecha">Fecha cupos</label>
			<?php 
			$fecha = explode('-' , $registro->fecha);
			$fecha = $fecha[2].'/'.$fecha[1].'/'.$fecha[0]
			?>

		<input type="text" name="fecha" class="form-control datepicker" id="cupos" value="<?php echo $fecha; ?>">
		</div>

		<div class="form-group col-md-4">
			<label for="cupos">Cupos</label>
		<input type="text" name="cupos" class="form-control numbersOnly" id="cupos" value="<?php echo $registro->cupos; ?>">
		</div>
	</div>

	<div class="row">
		<div class="form-group  col-md-12">
			<textarea name="observaciones" id="observaciones" cols="30" rows="5" class="form-control"><?php echo $registro->observaciones; ?></textarea>
		</div>
	</div>


    <div class="row">
    	 <div class="form-group col-md-12">
      	<button type="submit" class="btn btn-warning"><i class="fa fa-edit"></i> Actualizar</button>
      	<a href="<?php echo base_url('registros/cupos'); ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Volver</a>
      </div>

    </div>
      <input type="hidden" name="tipo" value="cupos">
      <input type="hidden" name="registro_id" value="<?php echo $registro->id; ?>">


   </form>
</div>