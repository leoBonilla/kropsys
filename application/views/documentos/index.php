<div class="col-md-12">
<input type="hidden" name="userid" id="userid" value="<?php echo $auth_user_id ; ?>">
<table id="documentos_table" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
              
                <th>Fecha</th>                  
                <th>Observaciones</th>
                <th>Estado</th>
                <th>Acciones</th>
               
              

                
               
  
                
            </tr>
        </thead>
        <tbody>
            <?php 
            if($documentos)
            foreach($documentos as $row): ?>


                <tr>
                    <td><?php echo $row->fecha_asignacion; ?></td>
                    <td><?php echo $row->o_documento; ?></td>
                  
                    <td><span class="label label-info"><?php echo $row->estado; ?></span>

                    </td>
                    <td><button class="btn btn-primary btn-xs btn-modal" data-toggle="modal" data-id="<?php echo $row->id ?>" data-id_email="<?php echo $row->id_email; ?>"><i data-toggle="tooltip" title="REVISAR Y GESTIONAR LA TAREA" class="fa fa-rocket  " ></i></button>
                        <button class="btn btn-success btn-xs btn-call" data-toggle="modal"  data-id="<?php echo $row->id ?>" data-target="#modalCall"><i data-toggle="tooltip" title="REALIZAR UNA LLAMADA" class="fa fa-phone"></i></button>

                        <button class="btn btn-warning btn-xs btn-history" data-toggle="modal"  data-id="<?php echo $row->id ?>"><i data-toggle="tooltip" title="VER EL HISTORIAL DE LA TAREA" class="fa fa-history"></i></button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
            
                <th>Fecha</th>
                <th>Observaciones</th>
                <th>Estado</th>
                <th>Acciones</th>
        </tr>
        </tfoot>

        </table>
</div>



<!-- Modal -->
<div id="modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Gestionar</h4>
      </div>
      <div class="modal-body" style="overflow-x:auto;">
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>





<!-- Modal -->
<div id="modalCall" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <h4 class="modal-title">Llamado</h4>
      </div>
      <div class="modal-body">
              <?php echo form_open('documentos/guardarllamada', array('method' => 'POST', 'id' => 'form-save')); ?>
                  <div class="form-group">
                    <label for="numero">Numero a llamar</label>
                      <input type="text" class="form-control numbersOnly"
                      id="numero" name="numero" placeholder="912232345" required="required" />
                  </div>

                  <button type="button" class="btn btn-success " id="btn-make-call"><i class="fa fa-phone"></i> Realizar llamada</button>

                  <input type="hidden" name="anexo" value="<?php echo $anexo->anexo; ?>">
                  <input type="hidden" name="doc_id" value="">

                 <div id="call-options" style="display: none;">
                    <div class="form-group">
                    <label for="numero">Estado de la llamada</label>
                    <select name="estado" class="form-control selectpicker" data-live-search="true" data-title="Seleccione un estado" id="estado" required="required">
                      <?php foreach ($estados as $row): ?>
                        <option value="<?php echo $row->id; ?>"><?php echo $row->estado; ?></option>
                      <?php  endforeach; ?>
                    </select>
                  </div>

                  <input type="hidden" name="uniqueId" id="uniqueId" value="">

                  <div class="form-group">
                    <label for="numero">Observaciones</label>
                    <textarea name="observaciones" id="observaciones" class="form-control" cols="30" rows="10"></textarea>
                  </div>


                  <div class="form-group">
                    <button type="submit" class="btn btn-primary " id="btn_save_call">Guardar llamada</button>
                  </div>
                 </div>
                        
                  
                </form>
                
      </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>


<!-- Modal -->
<div id="modalHistory" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Historial</h4>
      </div>
      <div class="modal-body">
           
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>