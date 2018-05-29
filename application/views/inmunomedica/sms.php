<div class="col-md-12">
      <div class="row filtros">
<div class="col-md-4">
       <div class="form-group">
         <input type="text" class="form-control" id="date-filter">
       </div>
      </div>
<div class="col-md-2">
         <div class="form-group">
         <select name="motivo" id="motivo" class="form-control selectpicker">
           <option value="TODOS">TODOS</option>
           <option value="AGENDADO">AGENDADO</option>
           <option value="RECORDATORIO">RECORDATORIO</option>
         </select>
       </div>
</div>
   </div> 
    <table id="sms_table" class="table table-striped table-bordered table-condensed nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                  <th>Estado</th>
                <th>Numero</th>
                <th>Fecha envio</th>
                <th>Motivo</th>
                <th>Fecha cita</th>
                <th>Hora cita</th>
                <th>Mensaje</th>
              

                

                
            </tr>
        </thead>

        <tbody>
        </tbody>
    </table>
</div>