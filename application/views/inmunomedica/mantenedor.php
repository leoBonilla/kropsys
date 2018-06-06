<div class="col-md-12">

   <div class="row" >
   	  <div class="col-md-12" id="html">
       <?php echo form_open(base_url('examenes/create_convenio_next_step'),array('method' =>'post', 'id' => 'convenios_creation_first')); ?>
               <h3>Crear convenio</h3>
<div class="row">
  <div class="col-md-4">
   <input type="text" class="form-control" name="nombre" required="required" placeholder="nombre para convenio">
</div>
</div>
<hr>
<div class="row">
  <div class="col-md-4">
    <fieldset>
                  <select id="optgroup" class="ms" multiple="multiple" name="previsiones[]" ">
                             <optgroup label="">
                               
                                    <?php foreach ($previsiones as $prev) :?>
                                        <option value="<?php echo $prev->id ?>"><?php echo $prev->prevision; ?></option>
                                    <?php endforeach; ?>
                              </optgroup>
                              </select>
</fieldset>
  </div>
</div>
<hr>
<div class="row">
  <div class="col-md-12">
    <button class="btn btn-success">Siguiente</button>
  </div>
</div>

      <?php  echo form_close(); ?>
      </div>
          
   </div>
</div>