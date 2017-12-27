<?php echo form_open('tareas/asignar', array('role' => 'form', 'id' => 'form-asignar', 'class' => 'form-horizontal', 'method' => 'post')); ?>

                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="email">Usuario</label>
                    <div class="col-sm-10"> 
                           
                        <select name="usuario" id="usuarios" class="form-control selectpicker" title="Seleccione usuario"  required="required">

                        <?php foreach ($users as $user) :?>
                               <option value="<?php echo $user->user_id; ?>"><?php  echo $user->nombre; ?></option>
                        <?php endforeach; ?>

                        </select>
                    </div>


                  </div>

                  <div class="form-group">
                        <label  class="col-sm-2 control-label"
                              for="observaciones">Observaciones</label>
                    <div class="col-sm-10"> 
                           
                       <textarea name="observaciones" id="observaciones" cols="30" rows="5" class="form-control" required="required"></textarea>
                    </div>

                  </div>
                  <div class="form-group">
                   <label class="col-sm-2 control-label"
                           >Adjuntos</label>
                      <div class="col-sm-10"  id="adjuntos">



                      <?php 

                
                      if($documentos != false):
                      foreach($documentos as $doc): ?>

                

                      <input type="hidden" value="<?php echo $doc->id_email ?>" name="id_email">
                           
                                           
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="archivos[]" value="<?php echo $doc->id; ?>" required="required"><?php echo $doc->nombre; ?>
                                                </label>
                                            </div>
                                            
                                                     

                      <?php endforeach; ?>

                    <?php else : ?>

                      <div class="alert alert-warning">
                        <p>Todos los documentos fueron asignados</p>
                      </div>

                    <?php endif; ?>



                

                         
                      </div>
                  </div>

                    <div class="form-group">
                  
                    <div class="col-sm-12"> 
                           
                       <?php if($documentos != false) : ?>
                         <button class="btn btn-success pull-right" id="btn-asignar">Asignar</button>
                       <?php else: ?>
                          <button class="btn btn-success pull-right" disabled="disabled">Asignar</button>
                       <?php endif; ?>
                    </div>
                  </div>

                </form>