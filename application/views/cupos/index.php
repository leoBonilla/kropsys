<div class="col-md-12">
          <form action="<?php echo base_url('cupos/processcupos') ?>" role="form" class="" method="post" id="form">
            
            <div class="row">
             <div class="col-md-4 form-group">
            <label for="especialidad">ESPECIALIDAD</label>
            <select name="especialidad" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" required="required" id="select-especialidad">
            <option value="">ESPECIALIDAD</option>
                <?php 
                  foreach($specialties as $row){ ?>
                  <option value="<?php echo $row->id; ?>"><?php echo $row->especialidad; ?></option>
                <?php
                  }
                ?>
                </select>
            </div>

              <div class="col-md-4 form-group">
            <label for="profesional">PROFESIONAL</label>
            <select name="profesional" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" required="required" id="select-profesional">
            <option value="">PROFESIONAL</option>

                </select>
            </div>

            <div class="col-md-2 form-group">
            <label for="fecha">Fecha</label>
                <input type="text" name="fecha" class="form-control datepicker" data-date-start-date="0d" required="required" placeholder="19/11/2017">
            </div>

             <div class="col-md-2 form-group">
            <label for="fecha">Cupos</label>
                <input type="text" name="cupos" class="form-control" required="required" placeholder="0">
            </div>



            </div>

            <div class="row">
                <div class="form-group col-md-12">
                                <label>OBSERVACIONES</label>
                                <textarea name="observaciones" class="form-control" rows="3" placeholder="Aquí sus Observaciones"></textarea>
                </div>
          </div>

            <div class="row">
          
            <div class="col-md-4 form-group">
                <button type="submit" class="btn btn-success" id="submit-btn">Guardar</button>  <input type="reset" class="btn btn-default" value="Limpiar" />
            </div>
            </div>

          </form>
       
   </div>