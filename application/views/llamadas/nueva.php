<?php 	echo form_open(base_url('llamadas/generar'),array('method' => 'POST', 'role' => 'form' , 'id' => 'form-llamada')); ?>
<div class="col-md-12">
	 <div class="row"> 
		 <div class="col-md-12">
		 	<div class="form-group">

			<input type="text" name="telefono" class="form-control numbersOnly" placeholder="951332672" style="padding:20px;font-size:50px;height:90px;" required="required">
		</div>
		</div>
		 </div>
		<div class="row">
			<div class="col-md-12">
				
				<div class="form-group">
				<label for="extension">Anexo</label>
				<select name="extension" id="extension"  class="form-control selectpicker" data-live-search="true" required="required" >
			   <?php foreach ($anexos as $row) { ?>
	
				   	<option value="<?php echo $row->anexo ?>"  <?php if($row->anexo == $anexo->anexo){ echo 'selected';}  ?>><?php echo $row->anexo; ?></option>
				  <?php } ?>
				    
				</select>
			</div>
			</div>

		</div>
		<div class="row">
			<div class="col-md-6"><div class="form-group">
				<label for="paciente">Paciente</label>
				<input type="text" class="form-control" name="paciente" required="required">
			</div></div>
			<div class="col-md-6">
				<div class="form-group">
				<label for="paciente">Prestacion</label>
				<select name="prestacion" id="prestacion" class="form-control selectpicker" data-live-search="true" title="Seleccione una prestación" required="required">
					<?php 	foreach($prestaciones as $row) :?>
						<option value="<?php 	echo $row->id; ?>"><?php 	echo $row->prestacion; ?></option>
					<?php 	endforeach; ?>
				</select>
			</div>
			</div>
		</div>
		<div class="row">

			<div class="col-md-6">
				<div class="form-group">
				<label for="especialidad">Especialidad</label>
				<select name="especialidad" id="especialidad" class="form-control selectpicker" data-live-search="true" required="required" title="Seleccione una especialidad">
					<?php 	foreach ($especialidades as $row) :?>
						<option value="<?php 	echo $row->id; ?>"><?php echo $row->especialidad; ?></option>
					<?php 	endforeach; ?>
				</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				<label for="profesional">Profesional</label>
				<select name="profesional" id="profesional" class="form-control selectpicker" data-live-search="true" required="required" title="Seleccione un profesional">
				</select>
				</div>
			</div>
		</div>
		<div class="">
			<br>	
			<button type="button" class="btn btn-success btn-block btn-lg btn-generate-call"><i class="fa fa-phone"></i>&nbsp;Generar llamada</button>
		</div>

</div>

</form>
