<table class="table">
    <tbody>
        <tr>
          <th>Problema</th>
            <td><?php echo strtoupper($data->problema_salud) ?></td>

        </tr>
        <tr>
          <th>PACIENTE</th>
            <td><?php echo strtoupper($data->nombre_paciente) ?></td>
        </tr>
        <tr>
          <th>Especialidad agenda</th>
          <td><?php echo strtoupper($data->especialidad_agenda) ?></td>
        </tr>
      <tr>
          <th>Indicacion agenda ges</th>
            <td><?php echo strtoupper($data->indicacion_agenda_ges);  ?></td>
        </tr>
        <tr>
          <th>Fecha llamada</th>
            <td><?php echo strtoupper($data->fecha_llamada);  ?></td>
        </tr>
          <tr>
          <th>Identificador único de llamada</th>
            <td><?php echo strtoupper($data->call_unique_id);  ?></td>
        </tr>
    </tbody>
</table>

<?php echo form_open('registros/updatecalls',array('id' => 'form_update')); ?>

<div class="row">
	<div class="col-md-12">
		<select class="form-control selectpicker" data-live-search="true" name="id_estado" id="estado_select">
			<option value="">SELECCIONE ESTADO</option>
				<?php foreach ($estados as $row) { ?>
				<option value="<?php echo $row->id ?>" <?php echo ($row->id == $data->id_estado_llamada) ? 'selected' : ''; ?>><?php echo $row->estado; ?></option>
		<?php } ?>
		</select>
	
	</div>
</div>

<div class="row" id="otro_wrapper" <?php echo ($data->estado == 'OTRO' ) ? '' : 'style="display: none"';  ?>>
	<div class="col-md-12">
		<br>
		<div class="form-group">
			<input type="text" name="otro" value="<?php echo ($data->llamada_otro != NULL) ? $data->llamada_otro :'';  ?>" class="form-control" id="otro">
		</div>
	</div>
</div>

 <div class="row" id="confirmar_div" <?php echo ($data->id_estado_llamada == 4 ) ? '' : 'style="display: none"';   ?>>
      <br>
  

          <input type="hidden" value="<?php echo $data->id_tarea; ?>" name="tarea_id" id="tid" >
          <input type="hidden" value="<?php echo $data->id_subtarea; ?>" name="subtarea_id"  id="sid">
          <input type="hidden" value="<?php echo $data->numero; ?>" name="numero"  id="numero">
          <input type="hidden" value="<?php echo $data->id_registro; ?>" name="id_llamada"  id="llamada">


          <?php 
           $date = null;
              if($data->fecha_cita != null ){
              		$date = trim($data->fecha_cita);
    			$parts = explode('-', $date);
      			if(count($parts)>1){
                     $date = "$parts[2]/$parts[1]/$parts[0]";
                 }
              }
          	

				?>
      <div class="col-md-4">
             <div class="form-group">
				    <label for="">Fecha cita</label>
				           <div class="input-group">
				         <input type="text" class="form-control datepicker" name="fecha_cita" value="<?php echo $date; ?>" id="fecha_cita">
				         <span class="input-group-btn">
				              <button class="btn btn-success" type="button"><i class="fa fa-calendar"></i></button>
				         </span>
				    </div>
			 </div>
        </div> 
          
         <div class="col-md-4">
             <div class="form-group">
    <label for="">hora cita</label>
           <div class="input-group">
         <input type="text" class="form-control timepicker" name="hora_cita" id="hora_cita" value="<?php echo ($data->hora_cita != NULL) ? $data->hora_cita :'';  ?>">
         <span class="input-group-btn">
              <button class="btn btn-success" type="button"><i class="fa fa-clock-o"></i></button>
         </span>
    </div>
    </div>
          </div> 



       <div class="col-md-4 form-group">
            <label for="especialidad">ESPECIALIDAD</label>
            <select name="especialidad" class="form-control selectpicker" data-live-search="true" id="select-especialidad">
            <option value="">ESPECIALIDAD</option>
                <?php 
                  foreach($especialidades as $row){ ?>
                  <option value="<?php echo $row->id; ?>" <?php echo ($row->id== $data->id_especialidad) ? 'selected' : ''; ?>><?php echo $row->especialidad; ?></option>
                <?php
                  }
                ?>
                </select>
            </div>
         <div class="col-md-4 form-group">
            <label for="profesional">PROFESIONAL</label>
            <select name="profesional" class="form-control selectpicker" data-live-search="true" id="select-profesional">
            <option value="">PROFESIONAL</option>
               <?<?php 
                  foreach($profesionales as $row){ ?>
                  <option value="<?php echo $row->id; ?>" <?php echo ($row->id == $data->id_profesional) ? 'selected' : ''; ?>> <?php echo $row->profesional; ?></option>
                <?php
                  }
                ?>

                </select>
            </div>


<div class="col-md-4 form-group">
            <label for="lugar">Lugar</label>
            
              <select name="lugar"  class="form-control selectpicker"  data-live-search="true" style="float:right;">
                <option value="">LUGAR DE ATENCIÓN</option>
             <?php 
                  foreach($lugares as $row){ ?>
                  <option value="<?php echo $row->id; ?>" <?php echo ($row->id== $data->id_lugar) ? 'selected' : ''; ?>><?php echo $row->location; ?></option>
                <?php
                  }
                ?> 
              </select>
       </div> 
      

                   <div class="col-md-4">
				  
				    <label for="">Observaciones</label>
				      <textarea name="observaciones"  class="form-control" id="" cols="30" rows="5"><?php echo $data->observaciones_llamada; ?></textarea>
				     <input type="text" name="observaciones" class="form-control">
				  
			  </div> 
        

		

        </div>
        <div class="row">
        	      
        	<br>
            <div class="col-md-12">
            <button class="btn btn-success" type="submit">Actualizar</button>
            </div>
        </div>

  
</form>