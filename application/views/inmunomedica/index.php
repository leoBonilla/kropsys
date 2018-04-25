<div class="col-md-12">
      <div class="row filtros">
  <div class="col-md-3">
       <div class="form-group">
         <input type="text" class="form-control" id="date-filter">
       </div>
      </div>

  <!--   <div class="col-md-3">
       <div class="form-group">
        <select name="state-filter" id="state-filter" class="selectpicker" title="MOSTRAR..." data-live-search="true">
          <option value="0" selected="selected">TODAS</option>
          <option value="1">CONFIRMADAS</option>
          <option value="2">SIN CONFIRMAR</option>
        </select>
       </div>
      </div> -->
   </div> 

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#por_confirmar">POR CONFIRMAR</a></li>
  <li><a data-toggle="tab" href="#confirmadas">CONFIRMADAS</a></li>
</ul>

<div class="tab-content">
  <div id="por_confirmar" class="tab-pane fade in active">
    <br>
    <table id="inmunomedica_table" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
               <th>FOLIO</th>
               
               <th>FECHA</th>
                <th>HORA</th>
                <th>RUT_PRESTADOR</th>
                <th>PRESTADOR</th>
                <th>SUCURSAL</th>
                <th>PACIENTE</th>
                <th>TELEFONO</th>
                <th>EMAIL</th>
                <th>EJECUTIVO</th>
                <th>FECHA_REALIZACION</th>
                <th>CELULAR</th>
                <th>PREVISION</th> 
                 <th>ACCIONES</th>

                

            </tr>
        </thead>

        <tbody>
        </tbody>
    </table>

  </div>
  <div id="confirmadas" class="tab-pane fade">
    <br>
      <table id="inmunomedica_confirmados_table" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
               <th>FOLIO</th>
               <th>FECHA</th>
                <th>HORA</th>
                <th>RUT_PRESTADOR</th>
                <th>PRESTADOR</th>
                <th>SUCURSAL</th>
                <th>PACIENTE</th>
                <th>TELEFONO</th>
                <th>EMAIL</th>
                <th>EJECUTIVO</th>
                <th>FECHA_REALIZACION</th>
                <th>CELULAR</th>
                <th>PREVISION</th>
                <th>FECHA CONFIRMACION</th>
                <th>CONFIRMADO POR</th>

                

            </tr>
        </thead>

        <tbody>
        </tbody>
    </table>
  </div>

</div>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="asignarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="historyModalLabel">Editar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
        
           <div style="height:200px">
                      <span id="searching_spinner_center" style="position: absolute;display: block;top: 50%;left: 50%;">
                          <i class="fa fa-refresh fa-spin" style="font-size:46px"></i>

                      </span>
                    </div>
        </div>
            
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>

</div>