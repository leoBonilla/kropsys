<table id="history_table" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
              
                 <th>Fecha</th>                  
                <th>Estado</th>
                <th>Avance</th>
                <th>Tiempo</th>
                <th>Observacion</th>
                <th></th>
                <th></th>
              

                
               
  
                
            </tr>
        </thead>
        <tfoot>
            <tr>
            
                <th>Fecha</th>
                <th>Estado</th>
                <th>Avance</th>
                <th>Tiempo</th>
                <th>Observacion</th>
                <th></th>
                <th></th>
               
                
               
  

                
            </tr>
        </tfoot>
        <tbody>
          <?php foreach($history as $row): ?>


                <tr>
                    <td><input type="hidden" name="start" class="start" value="<?php echo $row->fecha_cambio_estado; ?>">
                        <?php   echo $row->fecha_cambio_estado; ?>
                    </td>
                    <td><?php echo $row->h_estado; ?></td>
                    <td><div class="progress">
                      <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $row->porcentaje; ?>"
                      aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $row->porcentaje; ?>%">
                        <?php echo $row->porcentaje; ?>%
                      </div>
                    </div></td>
                    <td class="time-td">
                            <span class="time">
                                
                            </span>
                            <span>
                                <input type="hidden" name="inicio" class="inicio" value="<?php echo $row->fecha_inicio ?>">
                                <input type="hidden" name="fin"  class="fin" value="<?php echo $row->fecha_fin_estado ?>">
                            </span>
                        <?php echo ''?></td>
                    <td><?php echo $row->h_observaciones; ?></td>
                                        <td> <?php 
             if($row->adjunto == 1){

                              $doc = $model->findModificado($row->historial_id);
                              echo '<a class="btn btn-xs btn-success" href="'.base_url().$doc->ruta.'" download><i class="fa fa-download"></i></a>';

                        } ?>

                    </td>
                    <td>
                            <?php 


             if($row->h_estado === 'ENTREGADO'): ?>
                  <input type="checkbox" name="btn-cell-validate" id="btn-cell-validate" class="btn-cell-validate" data-on-color="success" data-off-color="danger" data-on-text="Si" data-off-text="No" data-size="mini">
             <?php endif; ?>
                    </td>

                </tr>
          <?php endforeach; ?>
        </tbody>
    </table>

    <?php //var_dump($history); ?>


<div id="revision" style="display:none;">
    
   <?php echo form_open('tareas/validar', array('id'=> 'form-validate' ,'method' => 'POST')); ?>
           <div class="form-group">
            <label for="btn-validate" class="control-label">Aceptar</label>
               <input type="checkbox" name="btn-validate" id="btn-validate" data-on-color="success" data-off-color="danger" data-on-text="Si" data-off-text="No" data-size="mini">
           </div>

           <input type="hidden" name="id_doc" value="<?php echo $id; ?>">

            <div class="form-group" id="obs" >
                <label for="" class="control-label">Observaciones</label>
               <textarea name="observaciones" id="observaciones" cols="30" rows="10" class="form-control" required="required"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" id="btn-submit" class="btn btn-primary btn-pull-right">Aplicar</button>
            </div>
   <?php echo form_close(); ?>
</div>


