<!--INICIO AGENDAMIENTO -->
<h4>AGENDAMIENTOS</h4>
<br>
      <?php echo form_open(base_url('agendamiento/processagendamiento'),array('role' => 'form', 'method' => 'post', 'id' => 'form_agendamiento')); ?>
<div class="row">
                <div class="col-md-4 form-group">
                                <label for="especialidad">ESPECIALIDAD</label>
                                <select name="especialidad" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" id="select-especialidad-agendamiento" required="required">
                                                <option value=""></option>
                                                <?php  foreach($espec as $row) :?>
                                                <option value="<?php echo $row->id ?>">
                                                                <?php echo $row->especialidad; ?>
                                                </option>
                                                <?php endforeach; ?>
                                </select>
                </div>
                <div class="col-md-4 form-group">
                                <label for="doctor">PROFESIONAL</label>
                                <select name="profesional" class="form-control selectpicker select-profesional" data-show-subtext="true" data-live-search="true" id="select-profesional-agendamiento" required="required">
                                                <option value=""></option>
                                </select>
                </div>
                <div class="col-md-4 form-group">
                                <label for="doctor">PRESTACIÓN</label>
                                <select name="prestacion" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" required="required">
                                                <option value=""></option>
                                                <?php  foreach($prestaciones as $row) :?>
                                                <option value="<?php echo $row->id ?>">
                                                                <?php echo $row->prestacion; ?>
                                                </option>
                                                <?php endforeach; ?>
                                </select>
                </div>
</div>
<div class="row">
                <div class="col-md-3 form-group">
                                <label for="p_agendados">Nº PACIENTES AGENDADOS</label>
                                <input type="text" name="p_agendados" class="form-control numbersOnly" placeholder="0" required="required">
                </div>
                <div class="col-md-3 form-group">
                                <label for="no_contestaron">NO CONTESTARON</label>
                                <input type="text" name="no_contestaron" class="form-control numbersOnly" placeholder="0" required="required">
                </div>
                <div class="col-md-3 form-group">
                                <label for="rechazos_anulacions">RECHAZOS / ANULACIONES</label>
                                <input type="text" name="rechazos_anulaciones" class="form-control numbersOnly" placeholder="0" required="required">
                </div>
                <div class="col-md-3 form-group">
                                <label for="hora_ya_asignada">HORAS YA ASIGNADAS</label>
                                <input type="text" name="hora_ya_asignada" class="form-control numbersOnly" placeholder="0" required="required">
                </div>

                   <div class="col-md-3 form-group">
                                <label for="erroneos">NRO ERRONEO / SIN NUMERO</label>
                                <input type="text" name="erroneos" class="form-control numbersOnly" placeholder="0" required="required">
                </div>
</div>
<div class="row">
                <div class="form-group col-md-12">
                                <label>OBSERVACIONES</label>
                                <textarea name="observaciones" class="form-control" rows="3" placeholder="Aquí sus Observaciones"></textarea>
                </div>
</div>
<div class="row">
                <div class="col-md-3 form-group">
                              <!--   <button class="btn btn-primary">Guardar</button> -->
                              <input type="submit" value="Guardar" class="btn btn-primary btn-submit" />
                </div>
</div>
</form>

<!--FIN AGENDAMIENTO -->