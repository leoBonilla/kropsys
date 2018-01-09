<?php echo form_open(base_url().'email/enviarcorreo' , array('role' => 'form','id' => 'form-send', 'class' => 'form-horizontal')); ?>

                   <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="to">Responder a :</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control"  name="to" id="to" value="<?php echo $email->enviado_por; ?>" required="required"/>
                    </div>
                  </div>
            
                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="subject">Asunto :</label>
                    <div class="col-sm-10">
                        <input type="text"  name="subject" class="form-control" id="subject" value="Respuesta a solicitud" required="required"/>
                    </div>
                  </div>
      

                  <div class="form-group">
                      <label class="col-sm-2 control-label"
                          for="message" >Mensaje :</label>
                          <div class="col-sm-10">
                          <textarea name="message" id="message" cols="30" rows="20" class="form-control" required="required"></textarea>
                         </div>
                  </div>

                     <div class="form-group">
                      <label class="col-sm-2 control-label"
                          for="message" >Documentos</label>
                          <div class="col-sm-10">

                                 <?php if($documento != false) :?>
                               <span class="label label-success"><?php echo $documento->nombre ?></span>
                              <input type="hidden" name="documento_id" value="<?php echo $documento->id ;?>">
                                <input type="hidden" name="email_id" value="<?php echo $email->id_email ;?>">
                                <input type="hidden" name="original" value="<?php echo $original->id ;?>">

                          <?php  endif; ?>
                    
                         </div>
                  </div>


                     <div class="form-group">
                     
                          <div class="col-sm-12">

                            <button class="btn btn-success btn-sm pull-right" id="bnt-send-email">Enviar <i class="fa fa-send"></i></button>
                    
                         </div>
                  </div>



</form>
             