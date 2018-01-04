<div class="col-md-12">

   
    <table id="email_table" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
              
                 <th>Fecha</th>                  
                <th>Asunto</th>
                <th>De</th>
                <th>Adjuntos</th>
                <th>Estado</th>
                <th>Acciones</th>
              

                
               
  
                
            </tr>
        </thead>
        <tfoot>
            <tr>
            
                <th>Fecha</th>
                <th>Asunto</th>
                <th>De</th>
                <th>Adjuntos</th>
                <th>Estado</th>
                <th>Acciones</th>
               
                
               
  

                
            </tr>
        </tfoot>
        <tbody>
           <?php foreach ($list as $row): ?>
                   <?php  

                   $email = $row['email']; 
                   $adjuntos = $row['adjuntos'];

                   ?>
               <tr>
               
                   <td><?php
                             echo $email->fecha_envio;
                   ?></td>
                   <td><?php echo $email->asunto; ?></td>
                   <td><a href="mailto:someone@example.com?Subject=Hello%20again" target="_top"><?php echo $email->enviado_por; ?></a></td>
                   <td>
                       <div class="attachments">
                            <?php 

                            if($adjuntos != false){
                                foreach ($adjuntos as $el) {
                                    $nombre = substr($el->nombre, 0,10);
                                  echo '<span class="label label-primary"><a style="color:white;"href="'.base_url().$el->ubicacion.'">'.$nombre.'</a></span><br />';
                                }
                            } 
                    ?>
                       </div>
                   </td>
                   <td>
                     
                              <?php if($email->estado_email =='PENDIENTE'): ?>
                                <span class="label label-default"><?php echo $email->estado_email; ?></span>
                              <?php elseif($email->estado_email =='ASIGNADO') : ?>
                                <span class="label label-primary"><?php echo $email->estado_email; ?></span>
                              <?php elseif($email->estado_email =='EN PROCESO') : ?>
                                <span class="label label-warning"><?php echo $email->estado_email; ?></span>
                              <?php elseif($email->estado_email =='ENTREGADO') : ?>
                                <span class="label label-success"><?php echo $email->estado_email; ?></span>
                            <?php endif; ?>

                   </td>

                   <td>
                      <div class="btn-group btn-group-xs">
 <button class="btn btn-xs btn-info btn-modal" data-idmail="<?php echo $email->id_email; ?>" data-toggle="modal" data-sender="<?php echo $email->enviado_por; ?>" data-subject="<?php echo $email->asunto; ?>" >&nbsp;<i class="fa fa-info">&nbsp;</i></button> <button class="btn btn-warning btn-xs btn-asignar" data-idmail="<?php echo $email->id_email; ?>" >&nbsp;<i class="fa fa-user"></i>&nbsp;</button>
                    <a class="btn btn-xs btn-success btn-files" href="<?php echo base_url().'tareas/adjuntos/'.$email->id_email; ?>"><i class="fa fa-files-o"></i></a>

                    <button class="btn btn-danger btn-xs btn-discard" data-toggle="confirmation" data-title="Está seguro?" data-btn-ok-label="Si" data-btn-cancel-label="No" data-btn-ok-class="btn-success" data-btn-cancel-class="btn-danger" data-placement="left" data-idmail="<?php echo $email->id_email; ?>" >&nbsp;<i class="fa fa-ban"></i>&nbsp;</button>
  </div>
                   
                   </td>

                  
               </tr>
           <?php endforeach ?>
        </tbody>
    </table>

</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalle de email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body" style="overflow-x:auto;">
                
                <form class="form-horizontal" role="form">
                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="email">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" 
                        id="email" readonly="readonly" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="subject">Asunto</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" 
                        id="subject" readonly="readonly" />
                    </div>
                  </div>
      

                  <div class="form-group">
                      <label class="col-sm-2 control-label"
                          for="message" >Mensaje</label>
                          <div class="col-sm-10">
                          <div class="timeline-panel" style="padding: 5px;" id="message"></div>
                           <textarea name="message" id="message" class="form-control" cols="30" rows="4" readonly="readonly" ></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                   <label class="col-sm-2 control-label"
                           >Adjuntos</label>
                      <div class="col-sm-10"  id="adjuntos">
                         
                      </div>
                  </div>
                </form>
                
                
                
                
                
                
            </div>
            
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="asignarModal" tabindex="-1" role="dialog" aria-labelledby="asignarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="asignarModalLabel">Gestionar</h5>
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
<div class="modal fade" id="historyModal" tabindex="-1" role="dialog" aria-labelledby="asignarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="historyModalLabel">Historial del documento</h5>
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
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalle de email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body"></div>
            
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>