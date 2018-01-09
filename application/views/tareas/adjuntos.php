<div class="col-md-12">
<table id="adjuntos_table" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
              
                <th>Ultima modificación</th>                  
                <th>Asunto</th>
                <th>Estado</th>
                <th>Responsable</th>
                <th>Acciones</th>
              

                
               
  
                
            </tr>
        </thead>
        <tfoot>
            <tr>
            
                <th>Ultima modificación</th>
                <th>Asunto</th>
                <th>Estado</th>
                <th>Responsable</th>

                <th>Acciones</th>
               
                
               
  

                
            </tr>
        </tfoot>
        <tbody>


                	<?php
                	if($list != false)
                	foreach($list as $l) :?>


        		<tr>
        			<td><input type="hidden" name="inicio" id="#inicio" val=""><?php echo $l->fecha_modificacion; ?></td>
        			<td><?php echo utf8_encode($l->asunto); ?></td>
        			<td><span class="label label-success"><?php echo $l->estado; ?></span></td>
        	
        			<td><?php echo $l->asignado_nombre; ?></td>
        			
        			<td><button class="btn btn-xs btn-primary btn-history" data-id="<?php echo $l->id; ?>"><i class="fa fa-history"></i></button> <button data-id="<?php echo $l->id; ?>" class="btn btn-default btn-xs btn-calls"><i class="fa fa-phone"></i></button>
             <button class="btn btn-xs btn-success btn-despachar" data-id="<?php echo $l->id;?>"><i class="fa fa-send"></i></button>
              </td>
        		</tr>
        	<?php endforeach; ?>
        </tbody>
        </table>
</div>



<!-- Modal -->
<div class="modal fade" id="historyModal" tabindex="-1" role="dialog" aria-labelledby="asignarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="historyModalLabel">Historial</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
        
           <div style="height:200px">
                      <span id="searching_spinner_center" style="position: absolute;display: block;top: 50%;left: 50%;">
                          <i class="fa fa-refresh fa-spin" style="font-size:46px"></i>

                      </span>
                    </div>
        </div>
            
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="llamadasModal" tabindex="-1" role="dialog" aria-labelledby="llamadasModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="historyModalLabel">Historial de llamadas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
        
           <div style="height:200px">
                      <span id="searching_spinner_center" style="position: absolute;display: block;top: 50%;left: 50%;">
                          <i class="fa fa-refresh fa-spin" style="font-size:46px"></i>

                      </span>
           </div>
        </div>
            
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>





<!-- Modal -->
<div class="modal fade" id="modalDespachar" tabindex="-1" role="dialog" aria-labelledby="modalDespacharLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="historyModalLabel">Despachar email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
        
           <div style="height:200px">
                      <span id="searching_spinner_center" style="position: absolute;display: block;top: 50%;left: 50%;">
                          <i class="fa fa-refresh fa-spin" style="font-size:46px"></i>

                      </span>
           </div>
        </div>
            
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>