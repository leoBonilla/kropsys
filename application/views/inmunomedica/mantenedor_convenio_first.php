<?php echo form_open(base_url('examenes/confirm_convenio'), array('id' => 'confirm_convenio')); ?>
	
	<?php foreach ($prevs as $row) { ?>

<div class="form-group">

	<div class="col-md-3">
		<label for="prevision[]">Prevision</label>
		<input type="text" name="prevision[]" value="<?php echo $row->prevision; ?>" readonly="readonly" class="form-control">
		<input type="hidden" name="id[]" value="<?php echo $row->id; ?>">
	</div>

	<div class="col-md-1">
			<label for="digital[]">Digital</label>
		<input type="checkbox" onclick="$(this).next().val(this.checked?1:0)" >
		<input type="hidden" name="digital[]"/>
	</div>
	<div class="col-md-3">
		<label for="rut[]">Rut </label>
		<input type="text" name="rut[]" value=""  class="form-control">
	</div>
	<div class="col-md-5">
			<label for="observaciones[]">Observacion</label>
		<input type="text" name="observaciones[]" value=""  class="form-control">
	</div>

</div>

<input type="hidden" name="convenio" value="<?php echo $nombre; ?>">


 <hr>


<?php } ?>

<p></p>
<div class="form-group">
	<div class="col-md-12">
		<br>
		<button class="btn btn-success">Confirmar y guardar</button>
	</div>
</div>
</form>



	
	
