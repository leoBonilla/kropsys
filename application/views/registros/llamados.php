<div class="col-md-12">

       <div class="row filtros">
      <!-- <form action="" id="form-filter"> -->
   <!--       <div class="col-md-2 col-sm-4 col-xs-4">
         <input type="text" name="fecha_inicio" placeholder="01/10/2017" id="fecha_inicio" class="form-control" data-toggle="tooltip" title="Fecha inicial para filtrar resultados">
      </div>
      <div class="col-md-2 col-sm-4 col-xs-4">
          <input type="text" name="fecha_limite" placeholder="01/11/2017" id="fecha_limite" class="form-control" data-toggle="tooltip" title="Fecha final para filtrar resultados">
      </div>
      <div class="col-md-2">
          <button type="button" class="btn btn-success" id="btn-filter"><i class="fa fa-filter"></i></button>
      </div> -->

              <div class="input-group input-daterange col-md-4" style="margin-bottom:5px;">
    <input type="text" class="form-control " name="fecha_inicio" id="fecha_inicio" value="" placeholder="01/10/2017">
    <div class="input-group-addon">hasta</div>
    <input type="text" class="form-control " name="fecha_limite" id="fecha_limite" value="" placeholder="01/10/2017">
      </div>
       <!--</form> -->
   </div> 
 </div>   
    <table id="llamadas_table" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id registro</th>
                <th>Id problema</th>
                <th>Fecha llamada</th>
                <th>Paciente</th>
                <th>Rut</th>
                <th>Problema salud</th>
                <th>Profesional</th>
                <th>Especialidad</th>
                <th>Lugar</th>
                <th>Numero</th>
                <th>Estado</th>
                <th>Fecha cita</th>
                <th>Hora cita</th>
                <th>Observaciones</th>
                <th>Responsable</th>
                <th>Id unico de llamada</th>

                <th>Acciones</th>


                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Id registro</th>
                <th>Id problema</th>
                <th>Fecha llamada</th>
                <th>Paciente</th>
                <th>Rut</th>
                <th>Problema salud</th>
                <th>Profesional</th>
                <th>Especialidad</th>
                <th>Lugar</th>
                <th>Numero</th>
                <th>Estado</th>
                <th>Fecha cita</th>
                <th>Hora cita</th>
                <th>Observaciones</th>
                <th>Responsable</th>
                <th>Id unico de llamada</th>

                <th>Acciones</th>
          
                
            </tr>
        </tfoot>
        <tbody>
        </tbody>
    </table>
