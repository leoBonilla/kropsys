<div class="col-md-12">
          <form action="<?php echo base_url('profesionales/create') ?>" role="form" class="" method="post" id="form">
            
            <div class="row">
                   <div class="col-md-3 form-group">
            <label for="profesional">PROFESIONAL</label>
                 <input type="text" name="profesional" class="form-control" placeholder="PEDRO PEREZ" required="required">
            </div>
                <div class="col-md-3 form-group">
            <label for="nombre_agenda">NOMBRE AGENDA</label>
                <input type="text" name="nombre_agenda" class="form-control" required="required" placeholder="DR. PEDRO PEREZ">
            </div>

                         <div class="col-md-3 form-group">
            <label for="tipo">ESPECIALIDAD</label>
               <select name="especialidad" id="especialidad" class="form-control selectpicker" data-title="SELECCIONE ESPECIALIDAD" data-show-subtext="true" data-live-search="true" required="required">
                               <?php foreach ($especialidades as $row): ?>
                    <option value="<?php echo $row->id ?>"><?php echo $row->especialidad; ?></option>
                <?php endforeach ?>
              </select>
            </div>

            </div>



            <div class="row">
                            <div class="col-md-4 form-group">
                <input type="submit" value="Guardar" class="btn btn-success" id="submit-btn" /> <input type="reset" class="btn btn-default" value="Limpiar" />
            </div>
            </div>

          </form>
</div>