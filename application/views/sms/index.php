  <form action="<?php echo base_url('api/sendsms') ?>" role="form" class="" method="post" id="form">
            
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
<!-- 
                <div class="col-md-4 form-group">
            <label for="doctor">Médico</label>
                <input type="text" name="doctor" class="form-control" required="required" placeholder="Pedro Gonzalez">
            </div>
                -->
            <div class="col-md-2 form-group">
            <label for="fecha">Fecha</label>
                <input type="text" name="fecha" class="form-control datepicker" data-date-start-date="0d" required="required" placeholder="19/11/2017">
            </div>

                <div class="col-md-2 form-group">
            <label for="hora">Hora</label>
                <input type="text" name="hora" class="form-control timepicker" placeholder="10:30" required="required">

            </div>
            </div>

            <div class="row">
                    <div class="col-md-4 form-group">
            <label for="paciente">Paciente</label>
                <input type="text" name="paciente" class="form-control" required="required" placeholder="Juan Pérez">
            </div>

            <div class="col-md-4 form-group">
            <label for="lugar">Lugar</label>
                <!-- <input type="text" name="lugar" class="form-control" required="required"> -->
              <select name="lugar" id="" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" required="required">
                <option value="">LUGAR DE ATENCIÓN</option>
                <?php 
                  foreach($locations as $row){ ?>
                  <option value="<?php echo $row->id; ?>"><?php echo $row->location; ?></option>
                <?php
                  }
                ?>
              </select>
            </div>

            <div class="col-md-4 form-group">
            <label for="celular">Celular</label>
                <input type="text" id="celular" name="celular" class="form-control numbersOnly" required="required" placeholder="955423534" data-toggle="tooltip" title="Número celular con 9 digitos">
            </div>

            <div class="col-md-4 form-group">
                <button type="submit" class="btn btn-success" id="submit-btn">Enviar</button>  <input type="reset" class="btn btn-default" value="Limpiar" />
            </div>
            </div>

          </form>
       