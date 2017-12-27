<div class="col-md-12">
    <table id="detalle_table" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
        <thead>
            <tr><th><input type="checkbox" name="select_all" value="1" id="select-all"</th>
                             <th>Id</th>
                 <th>Problema de salud</th>
                <th>Fecha inicio</th>
                <th>Fecha limite</th>

            </tr>
        </thead>
        <tfoot>
            <tr><th></th>
            <th>Id</th>
                <th>Problema de salud</th>
                <th>Fecha inicio</th>
                <th>Fecha limite</th>

			</tr>
        </tfoot>
        <tbody>

        <?php 
        if($data != false)
        foreach ($data as $row) { ?>

        	<tr>
          <td></td>
          <td><?php echo $row->id;?></td>
          <td><?php echo $row->problema_salud; ?></td>

        	<td><?php echo $row->fecha_inicio; ?></td>
        	<td><?php echo $row->fecha_limite; ?></td>
        	</tr>
        <?php } ?>
        </tbody>
    </table>
</div>


<!-- Modal -->
<div id="detalleModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detalle de subtarea</h4>
      </div>
      <div class="modal-body">
   <table class="table table-bordered"style="width:100%">
  <tr>
    <th>Responsable:</th>
    <td>JUAN PEREZ</td>
  </tr>
   <tr>
    <th>Avance</th>
    <td><div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="70"
  aria-valuemin="0" aria-valuemax="100" style="width:70%">
    70%
  </div>
</div></td>

      </tr>
     <tr>
    <th>Tarea</th>
    <td>Catarátas Proceso de Diagnóstico {decreto nº 228}</td>
  </tr>
  </tr>
     <tr>
    <th>Dias restantes</th>
    <td>3</td>
  </tr>
   </tr>
     <tr>
    <th>Fecha inicio</th>
    <td>28/10/2017</td>
  </tr>
   </tr>
     <tr>
    <th>Fecha limite</th>
    <td>10/11/2017</td>
  </tr>

  <tr>
    <th>Llamado 1</th>
    <td>945433456</td>
  </tr>

   <tr>
    <th>Llamado 2</th>
    <td>945433456</td>
  </tr>

   <tr>
    <th>Llamado 3</th>
    <td>EN ESPERA</td>
  </tr>
<tr>
    <th>Estado cita</th>
    <td></td>
  </tr>
  <tr>
    <th>Fecha citacion</th>
    <td></td>
  </tr>
<tr>
    <th>Observacion llamado</th>
    <td></td>
  </tr>







</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>



<!-- Modal -->
<div id="asignarModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Asignar responsable</h4>
      </div>
      <div class="modal-body">
        
        <?php echo form_open('tareas/asignarusuarios',array('method' => 'post', 'id' => 'form_asignar')); ?>
        	<div class="row">
        			<div class="col-md-8">
        				<select name="user_selection" id="user_selection" class="form-control selectpicker" data-live-search="true" required="required">
        				    <option value="">SELECCIONE USUARIO</option>
        				    <?php foreach ($users as $row) { ?>
        				    	<option value="<?php echo $row->user_id; ?>"><?php echo $row->nombre; ?></option>
        				   <?php  } ?>
        				</select>
        			</div>
        			<div class="col-md-4"><button  id="btn-enviar" class="btn btn-primary" >Asignar</button></div>
        	</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>