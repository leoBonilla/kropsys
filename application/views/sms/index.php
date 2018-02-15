<div class="col-md-12">
<?php echo form_open(base_url('api/sendsms'), array('method' => 'post', 'id' => 'form-sms')); ?> 
<div id="smartwizard">
    <ul>
     <!--    <li><a href="#step-1"><i class="fa fa-user fa-2x"></i></a></li>
        <li><a href="#step-2"><i class="fa fa-medkit fa-2x"></i></a></li>
        <li><a href="#step-3"><i class="fa fa-calendar fa-2x"></i></a></li>
        <li><a href="#step-4"><i class="fa fa-check fa-2x"></i></a></li> -->
                <li><a href="#step-1"><i class="fa fa-user fa-2x"></i><br /><small>Información de contacto</small></a></li>
                <li><a href="#step-2"><i class="fa fa-medkit fa-2x"></i><br /><small>Información del profesional</small></a></li>
                <li><a href="#step-3"><i class="fa fa-calendar fa-2x"></i><br /><small>Información de la citación</small></a></li>
               <li><a href="#step-4"><i class="fa fa-check fa-2x"></i><br /><small>Detalle</small></a></li>
    </ul>
 
    <div>
        <div id="step-1" class="">
          <div class="row" style="margin-top: 10px;" id="form-step-0" role="form" data-toggle="validator">
                    <div class="col-md-4 form-group">
                  <label for="paciente">Nombre del Paciente</label>
                <input type="text" name="paciente" class="form-control" required="required" placeholder="Juan Pérez">
            </div>
            <div class="col-md-4 form-group">
            <label for="celular">Celular</label>
                <input type="text" id="celular" name="celular" class="form-control numbersOnly" required="required" placeholder="955423534" data-toggle="tooltip" title="Número celular con 9 digitos" data-minlength="9">
            </div>
         </div>
          </div>
        <div id="step-2" class="">
            <div class="row" style="margin-top: 10px;" id="form-step-1" role="form" data-toggle="validator">

                 <div class="col-md-4 form-group">
            <label for="especialidad">ESPECIALIDAD</label>
            <select name="especialidad" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" required="required" id="select-especialidad" data-title="seleccione especialidad">
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
            <select name="profesional" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" required="required" id="select-profesional" data-title="seleccione profesional">
                </select>
            </div>
            </div>
        </div>
        <div id="step-3" class="">
            <div class="row" style="margin-top: 10px;" id="form-step-2" role="form" data-toggle="validator">
                 <div class="col-md-2 form-group">
            <label for="fecha">Fecha</label>
                <input type="text" name="fecha" class="form-control singleDatePicker" required="required" placeholder="19/11/2017">
            </div>

                <div class="col-md-2 form-group">
            <label for="hora">Hora</label>
                <input type="text" name="hora" class="form-control timepicker" placeholder="10:30" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]"  required="required">

            </div>

                        <div class="col-md-4 form-group">
            <label for="lugar">Lugar</label>

              <select name="lugar" id="lugar" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" required="required">
                <option value="">LUGAR DE ATENCIÓN</option>
                <?php 
                  foreach($locations as $row){ ?>
                  <option value="<?php echo $row->id; ?>"><?php echo $row->location; ?></option>
                <?php
                  }
                ?>
              </select>
            </div>
            </div>
        </div>
        <div id="step-4" class="">
           <div class="col-md-12">
            <h3>Resumen:</h3>
           <ul class="list-group">

  <li class="list-group-item">Paciente : <span id="item-1"></span></li>
  <li class="list-group-item">Celular : <span id="item-2"></span></li>
  <li class="list-group-item">Para especialidad: <span id="item-3"></span></li>
  <li class="list-group-item">Con profesional : <span id="item-4"></span></li>
  <li class="list-group-item">Fecha citacion : <span id="item-5"></span></li>
  <li class="list-group-item">Lugar citacion : <span id="item-6"></span></li>
      </ul>
           </div>
        </div>
    </div>
</div>

  <?php form_close(); ?>
</div>
