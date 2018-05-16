<?php if($obj != false && $obj != null) :?>


    <ul class="nav nav-pills">
          <li class="active"><a data-toggle="pill" href="#home">Datos de la cita</a></li>
          <li><a data-toggle="pill" href="#menu1">Administrar</a></li>
        </ul>


    <div class="tab-content">
         <div id="home" class="tab-pane fade in active">
            <br>
                 <div class="row">
        <div class="form-group col-md-6">
                        <label for="paciente">PACIENTE</label>
                        <input type="text" class="form-control" id="paciente" value="<?php echo $obj->PACIENTE; ?>" readonly="readonly" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail">ESPECIALIDAD</label>
                        <input type="text" class="form-control" id="especialidad" value="<?php echo $obj->ESPECIALIDAD; ?>" readonly="readonly" />
                    </div>
         </div>
    <div class="row">
          <div class="form-group col-md-3">
                        <label for="fecha">FECHA</label>
                        <input type="text" class="form-control" id="fecha" value="<?php echo $obj->FECHA; ?>" readonly="readonly" />
                    </div>
                    <div class="form-group col-md-2">
                        <label for="hora">HORA</label>
                        <input type="text" class="form-control" id="hora" value="<?php echo $obj->HORA; ?>" readonly="readonly" />
                    </div>

                      <div class="form-group col-md-7">
                        <label for="prestador">PROFESIONAL</label>
                        <input type="text" class="form-control" id="prestador" value="<?php echo $obj->PRESTADOR; ?>" readonly="readonly" />
                    </div>
         </div>

         <div class="row">
          <div class="form-group col-md-6">
                        <label for="lugar">LUGAR</label>
                        <input type="text" class="form-control" id="lugar" value="<?php echo $obj->SUCURSAL; ?>" readonly="readonly" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="hora">PREVISION</label>
                        <input type="text" class="form-control" id="prevision" value="<?php echo $obj->PREVISION; ?>" readonly="readonly" />
                    </div>



         </div>

         <div class="row">
             <div class="form-group col-md-4">
                        <label for="celular">CELULAR</label>
                        <input type="text" class="form-control" id="celular" value="<?php echo $obj->CELULAR; ?>" readonly="readonly" />
                    </div>
              <div class="form-group col-md-4">
                        <label for="hora">TELEFONO</label>
                        <input type="text" class="form-control" id="telefono" value="<?php echo $obj->TELEFONO; ?>" readonly="readonly" />
                    </div>
            <div class="form-group col-md-4">
                        <label for="hora">EMAIL</label>
                        <input type="text" class="form-control" id="email" value="<?php echo $obj->EMAIL; ?>" readonly="readonly" />
                    </div>

         </div>

         <div class="row">
             <div class="form-group col-md-4">
                        <label for="tocall">Numero a llamar</label>
                        <input type="text" class="form-control" id="tocall" value="<?php echo $obj->CELULAR; ?>" />
                    </div>
         </div>

         <div class="row">
             <div class="form-group col-md-12">
                 <button type="btn" class="btn btn-primary " id="btn-call" data-id="<?php echo $obj->FOLIO; ?>" data-anexo="4040" ><i class="fa fa-phone "></i> LLamar</button>

                 <!-- <input type="checkbox" name="btn-confirm" id="btn-confirm" style="display:none"> -->
             </div>
         </div>


         </div>
         <div id="menu1" class="tab-pane fade in">
            <br>

            <?php echo form_open(base_url('inmunomedica/confirm'), array('method' => 'post', 'id' => 'confirmar_form')); ?>
                     <div class="row">
                  <div class="form-group col-md-4">
                    <label for="unique_id">ID LLAMADA</label>
                     <input type="text" class="form-control" value="" readonly="readonly" id="unique_id">
                 </div>
                 <div class="form-group col-md-4">
                    <label for="estado">ESTADO</label>
                     <select name="estado" id="estado" class="form-control">
                         <option value="CONFIRMADO">CONFIRMA</option>
                         <option value="CONFIRMA TERCERO">CONFIRMA TERCERO</option>
                         <option value="NO CONTESTA">NO CONTESTA</option>
                         <option value="NO ASISTIRA">NO ASISTIRA</option>
                         <option value="NUMERO EQUIVOCADO">NUMERO EQUIVOCADO</option>
                         <option value="OTRO">OTRO</option>
                     </select>
                 </div>
             </div>

             <div class="row">
                 <div class="form-group col-md-12">
                    <label for="estado">OBSERVACIONES</label>
                     <textarea class="form-control" name="observaciones" id="observaciones" cols="30" rows=""></textarea>
                 </div>
             </div>
              <div class="row">
                 <div class="form-group col-md-12">
                   
                     <button type="button" class="btn btn-success" id="btn-save"><i class="fa fa-save"></i>&nbsp;Guardar Estado</button>
                 </div>
             </div>
            </form>
        
         </div>
    </div>


<?php else : ?>
    Hubo un error, no se encontraron los datos que solicitaba
<?php endif; ?>

