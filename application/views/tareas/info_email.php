          <form class="form-horizontal" role="form">
                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="email">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" 
                        id="email" value=" <?php echo $email->enviado_por; ?>"  readonly="readonly" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="subject">Asunto</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" 
                        id="subject" value=" <?php echo $email->asunto; ?>" readonly="readonly" />
                    </div>
                  </div>
      

                  <div class="form-group">
                      <label class="col-sm-2 control-label"
                          for="message" >Mensaje</label>
                          <div class="col-sm-10">
                          <div class="timeline-panel" style="padding: 5px;" id="message"></div>
                           <div class="mensaje">
                             <?php echo $email->mensaje; ?>
                           </div>
                    </div>
                  </div>


                </form>
                