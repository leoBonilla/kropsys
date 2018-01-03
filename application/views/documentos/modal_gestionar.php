<form class="form-horizontal" role="form">
                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="email">Gestionar tarea</label>
                    <div class="col-sm-10">
                        <input type="checkbox" name="chk-gestion" data-size="small" data-on-text="SI" data-off-text="NO">

                        <input type="hidden" name="id_email" value="<?php echo $data->id_email; ?>" id="id_email">
                        <hr>
                       <div class="row">
                         <div class="col-md-12">
                             <table class="table table-striped table-responsive">
                                  <tr>
                                    <th>Asunto</th>
                                    <td><?php echo utf8_decode($data->asunto); ?></td>
                                  </tr>
                                  <tr>
                                    <th>Observaciones</th>
                                    <td><?php echo utf8_decode($data->o_documento); ?></td>
                                  </tr>
                             
                                  <tr>
                                    <th>Mensaje:</th>
                                    <td><?php echo utf8_decode($data->mensaje); ?></td>
                                  </tr>

                                  <tr>
                                    <th>Fecha asignacion:</th>
                                    <td><?php echo $data->fecha_asignacion; ?></td>
                                  </tr>
                             </table>
                         </div>
                       </div>
                    </div>

                     
                  </div>
            
                  <div class="form-group" style="display: none;" id="div-archivo">
                  <label  class="col-sm-2 control-label"
                              for="">Información</label>
                     <div class="col-sm-10">
                        <?php if($data->es_archivo == '1'): ?>
                                   <table class="table table-striped ">
                                       <tr>
                                    <th>Archivo:</th>
                                    <td><a href="<?php echo base_url().$data->ubicacion; ?>" download>Descargar<a></td>
                                  </tr>
                                   </table>

                                <?php  endif; ?>
                     </div>
                  </div>
             
</form>
