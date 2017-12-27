<?php echo form_open_multipart("documentos/completartarea", array('role' => 'form', 'class'=> 'form-horizontal', 'id' => 'form_gestionar' , 'novalidate')); ?>
              <div   id="div-archivo">
             <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="table">Datos de la tarea</label>
                     <div class="col-sm-10">
                        <table  id="table" class="table table-striped">
                                  <tr>
                                    <th>Asunto</th>
                                    <td><?php echo $data->asunto; ?></td>
                                  </tr>
                                  <tr>
                                    <th>Observaciones</th>
                                    <td><?php echo $data->o_documento; ?></td>
                                  </tr>
                             
                                  <tr>
                                    <th>Mensaje:</th>
                                    <td><?php echo $data->mensaje; ?></td>
                                  </tr>

                                  <tr>
                                    <th>Fecha asignacion:</th>
                                    <td><?php echo $data->fecha_asignacion; ?></td>
                                  </tr>
                                  <?php if($data->es_archivo== 1) :?>
                                    <tr>
                                    <th>Archivo:</th>
                                    <td><a href="<?php echo base_url().$data->ubicacion; ?>" download>Descargar<a></td>
                                  </tr>
                                  <?php endif; ?>


                                   <tr>
                                    <th>Estado:</th>
                                    <td><?php echo $data->estado; ?></td>
                                  </tr>
                                   <tr>
                                    <th>Ultima modificacion:</th>
                                    <td><?php echo $data->fecha_modificacion; ?></td>
                                  </tr>
                                   <tr>
                                    <th>Ultima observacion:</th>
                                    <td><?php echo $historial->observaciones; ?></td>
                                  </tr>


                        </table>
                     </div>
             </div>
                  <div class="form-group">
                     <label class="col-sm-2 control-label">Adjuntar documento</label>
                     <div class="col-sm-2">
                       <input type="checkbox" name="chk-file" data-size="small" data-on-text="SI" data-off-text="NO" checked>
                       <input type="hidden" name="file_required" id="file_required" value="1">
                     </div>
                       <div class="col-sm-8 file-control-div">
                       <div class="form-grup">
                         <input type="file" name="userfile" class="form-control" required="required">
                       </div>
                     </div>
                  </div>


                  
                   

                     


                 <div class="form-group">
                    <label class="col-sm-2  control-label" for="observaciones" >Observaciones</label>
                     <div class="col-sm-10">
                       <div class="form-grup">
                         <textarea name="observaciones" class="form-control" id="observaciones" cols="30" rows="5"></textarea>
                       </div>
                     </div>
                 </div>
                    

                <input type="hidden" name="email_id" value="<?php echo $data->id_email; ?>"> 
                 <input type="hidden" name="doc_id" value="<?php echo $data->id; ?>">  
                  
           

                <div class="form-group">
                   <div class="col-sm-12"><button class="btn btn-success pull-right">Enviar</button></div>
                </div>
                  </div>
             
</form>
