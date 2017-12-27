<div class="row">
  <div class="col-md-12">
  <table class="table">
    <tbody>
        <tr>
          <tr>
          <th>DESCRIPCION</th>
            <td><?php echo strtoupper($data->descripcion); ?></td>

          </tr>
          <tr>
          <th>TIPO</th>
            <td><?php echo strtoupper($data->tipo); ?></td>

        </tr>
          <th>PROBLEMA</th>
            <td><?php echo strtoupper($data->problema_salud); ?></td>

        </tr>
        <tr>
          <th>NOMBRE</th>
            <td><?php echo strtoupper($data->nombre); ?></td>
  
        </tr>
        <tr>
          <th>RUT</th>
            <td><?php echo strtoupper($data->rut_completo); ?></td>

        </tr>
      <tr>
          <th>EPECIALIDAD AGENDA</th>
            <td><?php echo strtoupper($data->especialidad_agenda); ?></td>

        </tr>
      <tr>
          <th>INDICACION AGENDA GES</th>
            <td><?php echo strtoupper($data->indicacion_agenda_ges); ?></td>

        </tr>
      <tr>
          <th>FECHA INICIO</th>
            <td><?php echo strtoupper($data->fecha_inicio); ?></td>

        </tr>
      <tr>
          <th>FECHA LIMITE</th>
            <td><?php echo strtoupper($data->fecha_limite); ?></td>

        </tr>

    </tbody>


</table>
    <input type="hidden" name="sub_id" class="sub_id" id="sub_id" value="<?php echo $data->id; ?>">
    <input type="hidden" name="anexo" class="anexo" id="anexo" value="<?php echo $anexo->anexo; ?>">
    <input type="hidden" name="task_id" class="task_id" id="task_id" value="<?php echo $data->id_tarea; ?>">


  <div class="row" >
    <div class="form-group col-md-12" >
    <label for="">Numero a llamar</label>
           <div class="input-group">
         <input type="text" class="form-control llamada numbersOnly" id="llamada_1" name="llamada_1">
         <span class="input-group-btn">
              <button class="btn btn-danger btn-call" type="button" disabled="disabled"><i class="fa fa-phone"></i></button>
         </span>
    </div>
    </div>

  </div>

<div class="row">
<div class="col-md-12">
     <div class="panel-group">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1"><i class="fa fa-history"></i> Registros</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
               <div class="panel-body">
                        <?php if($history) : ?>
                        <!--   Fecha  -  numero  - Id de llamada
                             <ul class="list-group">
                 <?php foreach($history as $row) : ?>
                  <li class="list-group-item"><?php echo $row->fecha.' | '. $row->numero. ' | ' . $row->call_id ?></li>
                 <?php endforeach; ?>
              </ul> -->

              <table class="table table-striped table-condensed table-bordered">
                <thead>
                  <tr>
                    <th>Numero</th> <th>Fecha</th><th>Estado</th><td>Descripcion</th><th>Id llamada</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($history as $row) : ?>
                  <tr>
                    <td><?php echo $row->numero; ?></td>
                    
                    
                    <td><?php echo $row->fecha; ?></td>
                    <td><?php echo $row->estado; ?></td>
                    <td><?php echo $row->otro; ?></td>
                    <td><?php echo $row->call_id; ?></td>
                  </tr>

                 <?php endforeach; ?>
                </tbody>
                
              </table>
<!-- <?php echo form_open(base_url('apicall/closesubtask'), array('id' => 'main_form' ,'method' => 'post')); ?>
              <div class="row">
    <div class="col-md-12">
      <div class="form-group col-md-6">
    <label for="">Fecha cita</label>
           <div class="input-group">
         <input type="text" class="form-control datepicker" name="fecha_cita">
         <span class="input-group-btn">
              <button class="btn btn-success" type="button"><i class="fa fa-calendar"></i></button>
         </span>
    </div>
    </div>
    <div class="form-group col-md-6">
    <label for="">hora cita</label>
           <div class="input-group">
         <input type="text" class="form-control timepicker" name="hora_cita">
         <span class="input-group-btn">
              <button class="btn btn-success" type="button"><i class="fa fa-clock-o"></i></button>
         </span>
    </div>
    </div>
    </div>
 </div>

  <div class="row">
  <div class="col-md-12">
      <div class="form-group col-md-12">
    <label for="">Observaciones</label>
      <textarea name="observaciones"  class="form-control" id="" cols="30" rows="5"></textarea>
    </div>
  </div>
  
  </div>



  <div class="form-row">
    <div class="col-md-12">
          <button class="btn btn-danger" data-toggle="confirmation" data-title="Está seguro?">Guardar y finalizar</button>
    </div>
  </div>
</form> -->

  <!-- FIN FORMULARIO -->




                        <?php else : ?>
                          <p>Sin intentos</p>
                        <?php endif; ?>

                
        <div class="panel-footer"></div>
      </div>
    </div>
  </div>
</div>
</div>



  </div>
</div>


<!-- Modal -->
<div id="callModal" class="modal fade" role="dialog" >
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
     <!--    <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <h4 class="modal-title"> <i class="fa fa-phone-square fa-spin"></i> LLamada en curso... <span  class="" id="numero_telef"></span></h4>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-condensed">
    <tbody>
        <tr>
          <tr>
          <th>DESCRIPCION</th>
            <td><?php echo strtoupper($data->descripcion); ?></td>

          </tr>
          <tr>
          <th>TIPO</th>
            <td><?php echo strtoupper($data->tipo); ?></td>

        </tr>
          <th>PROBLEMA</th>
            <td><?php echo strtoupper($data->problema_salud); ?></td>

        </tr>
        <tr>
          <th>NOMBRE</th>
            <td><?php echo strtoupper($data->nombre); ?></td>
  
        </tr>
        <tr>
          <th>RUT</th>
            <td><?php echo strtoupper($data->rut_completo); ?></td>

        </tr>
      <tr>
          <th>EPECIALIDAD AGENDA</th>
            <td><?php echo strtoupper($data->especialidad_agenda); ?></td>

        </tr>
      <tr>
          <th>INDICACION AGENDA GES</th>
            <td><?php echo strtoupper($data->indicacion_agenda_ges); ?></td>

        </tr>
      <tr>
          <th>FECHA INICIO</th>
            <td><?php echo strtoupper($data->fecha_inicio); ?></td>

        </tr>
      <tr>
          <th>FECHA LIMITE</th>
            <td><?php echo strtoupper($data->fecha_limite); ?></td>

        </tr>

    </tbody>


</table>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
               <?php echo form_open(base_url('apicall/calllog'), array('method' => 'post', 'id' => 'call_form')); ?>
      <div class="row">
      <div class="col-md-8"><select name="estado_llamada" id="estado_select" data-live-search="true" class="form-control selectpicker" required="required">
      <option value="">SELECCIONE</option>
      <?php foreach ($states as $row) : ?>
               <option value="<?php echo $row->id ?>"><?php echo $row->estado ?></option>
      <?php endforeach; ?>

    </select></div>

    <input type="hidden" name="subtask_id" id="sub_id" value="<?php echo $data->id; ?>">
    <input type="hidden" name="anexo" id="anexo" value="<?php echo $anexo->anexo; ?>">
    <input type="hidden" name="task_id" id="task_id" value="<?php echo $data->id_tarea; ?>">
    <input type="hidden" name="numero" id="numero_form" value="">
    <input type="hidden" name="call_id" id="call_id_form" value="">
      <div class="col-md-4">
        <button type="submit" id="btn-state" class="btn btn-primary">Aceptar</button>
      </div>
        
      </div> 
      <div class="row " id="otro_wrapper" style="display:none">
      <p></p>
        <div class="col-md-12">
          <input type="text" value="" name="otro" class="form-control">
        </div>
      </div>
     </form>
        </div>
      </div>
  
      <div class="row" id="confirmar_div" style="display:none">
      <br>
   
          <?php echo form_open(base_url('apicall/closesubtask'), array('id' => 'main_form' ,'method' => 'post')); ?>

          <input type="hidden" value="<?php echo $data->id_tarea; ?>" name="tarea_id" id="tid" >
          <input type="hidden" value="<?php echo $data->id; ?>" name="subtarea_id"  id="sid">
          <input type="hidden" value="" name="numero_telef" id="numt" >
          <input type="hidden" value="" name="uniqueId"  id="uqid">
          <input type="hidden" name="popup" value="1">
      <div class="col-md-2">
             <div class="form-group">
    <label for="">Fecha cita</label>
           <div class="input-group">
         <input type="text" class="form-control datepicker" name="fecha_cita" required="required">
         <span class="input-group-btn">
              <button class="btn btn-success" type="button"><i class="fa fa-calendar"></i></button>
         </span>
    </div>
    </div>
          </div>
          
          <div class="col-md-2">
             <div class="form-group">
    <label for="">hora cita</label>
           <div class="input-group">
         <input type="text" class="form-control timepicker" name="hora_cita" required="required">
         <span class="input-group-btn">
              <button class="btn btn-success" type="button"><i class="fa fa-clock-o"></i></button>
         </span>
    </div>
    </div>
          </div>

       <div class="col-md-4 form-group">
            <label for="especialidad">ESPECIALIDAD</label>
            <select name="especialidad" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" required="required" id="select-especialidad">
            <option value="">ESPECIALIDAD</option>
                <?php 
                  foreach($specialties as $row){ ?>
                  <option value="<?php echo $row->id; ?>"><?php echo $row->especialidad; ?></option>
                <?php
                  }
                ?>
                </select>
            </div>
                <div class="col-md-4 form-group">
            <label for="profesional">PROFESIONAL</label>
            <select name="profesional" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" required="required" id="select-profesional">
            <option value="">PROFESIONAL</option>

                </select>
            </div>
           <div class="col-md-4 form-group">
            <label for="lugar">Lugar</label>
                <!-- <input type="text" name="lugar" class="form-control" required="required"> -->
              <select name="lugar" id="" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" required="required">
                <option value="">LUGAR DE ATENCIÓN</option>
                <?php 
                  foreach($locations as $row){ ?>
                  <option value="<?php echo $row->id; ?>"><?php echo $row->location; ?></option>
                <?php
                  }
                ?>
              </select>
            </div>

          <div class="row">
            <div class="col-md-12">
              <div class="col-md-12">
      <div class="form-group">
    <label for="">Observaciones</label>
      <textarea name="observaciones"  class="form-control" id="" cols="30" rows="5"></textarea>
    </div>
  </div>
            </div>
          </div>

       <div class="form_row">
    <div class="col-md-12">
          <button class="btn btn-danger" style="float:right;" data-toggle="confirmation" data-title="Está seguro?">Guardar y finalizar</button>
    </div>
  </div>
   
      </form>
        </div>
      </div>

      </div>
      <div class="modal-footer">
       <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
             
      </div>
    </div>

  </div>
</div>

