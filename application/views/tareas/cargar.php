<?php echo form_open_multipart('tareas/uploadexcel'); ?>
   <div class="row">

    <div class="col-md-3 form-group">
    	<label for="tipo">Tipo</label>
    	<select name="tipo" id="" class="form-control selectpicker" data-live-search="true" required="required">
    		<option value="">SELECCIONE OPCIÓN</option>
    		<option value="1">AGENDAMIENTO</option>
    		<option value="2">REASIGNACIÓN</option>
    		<option value="3">CONFIRMACIÓN</option>
    	</select>
    </div>
	<div class="col-md-3 form-group">
	<label for="descripcion">Descripcion</label>
		<input type="text" name="descripcion" class="form-control" value="" required="required">
	</div>
	<div class="col-md-3 form-group">
	<label for="fecha">Fecha</label>
		<input type="text" name="fecha" class="form-control datepicker" id="datepicker" data-date-start-date="0d" required="required" placeholder="19/11/2017" value="">
	</div>

		<div class="col-md-3 form-group">
	<label for="Hora">Hora</label>
		<input type="text" name="hora" id="timepicker" class="form-control" value="" placeholder="10:30" required="required">
	</div>
</div>
<div class="row">
		<div class="col-md-6">
	<label for="archivo">Archivo</label>
		<input type="file" name="excel" class="form-control" value="" required="required">
	</div>

</div>
<div class="row">
<br>
		<div class="col-md-3 form-group">

		<input type="submit" class="btn btn-primary" name="cargar" value="Cargar" >
	</div>
</div>


    <?php echo form_close(); ?>

