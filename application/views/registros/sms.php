<div class="col-md-12">

      <div class="row filtros">
<div class="col-md-4">
       <div class="row">
          <div class="input-group input-daterange col-md-12" style="margin-bottom:5px;">
            <input type="text" class="form-control " name="fecha_inicio" id="fecha_inicio" value="" placeholder="01/10/2017">
            <div class="input-group-addon">hasta</div>
            <input type="text" class="form-control " name="fecha_limite" id="fecha_limite" value="" placeholder="01/10/2017">
          </div>
       </div>
      </div>
<?php if($auth_level >= ADMIN_LEVEL ) :?>
      <div class="col-md-4">
          <select class="form-control selectpicker" name="userId" id="userId" data-show-subtext="true" data-live-search="true" multiple data-actions-box="true" data-select-all-text="Seleccionar todos" data-deselect-all-text="Deseleccionar todos" title="Filtrar usuarios">
            <?php if($users != false) :?>
              <?php foreach ($users as $row) :?>
                <option value="<?php echo $row->user_id; ?>"><?php echo $row->nombre;  ?></option>
              <?php endforeach; ?>
            <?php endif; ?>
          </select>
      </div>
    
  <?php endif; ?>


       <!--</form> -->
   </div> 
 </div>
	<table id="sms_table" class="table table-striped table-bordered " cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Especialidad</th>
                <th>Profesional</th>
                <th>Paciente</th>
                <th>fecha envio</th>
                <th>Número</th>
                <th>Lugar</th>
                <th>Hora citación</th>
                <th>Fecha citación</th>
                <th>Enviado por</th>
                <th class="none">Mensaje</th>
                

                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Especialidad</th>
                <th>Profesional</th>
                <th>Paciente</th>
                <th>fecha envio</th>
                <th>Número</th>
                <th>Mensaje</th>
                <th>Lugar</th>
                <th>Hora citación</th>
                <th>Fecha citación</th>
                <th>Enviado por</th>
                

                
            </tr>
        </tfoot>
        <tbody>
        </tbody>
    </table>
