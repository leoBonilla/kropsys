<div class="col-md-12">
  <div class="row">
  <div class="col-md-1">
    <a href="<?php echo base_url('profesionales/nuevo'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-user-plus"></i> Agregar profesional </a > 
  </div>

</div>
<p></p>
<table id="profesionales_table" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
               <th>Profesional</th>
               <th>Nombre Agenda</th>
               <th>Especialidad</th>
                <th>Estado</th>
                <th>Acciones</th>

                
            </tr>
        </thead>
        <tfoot>
            <tr>
               <th>Profesional</th>
               <th>Nombre Agenda</th>
               <th>Especialidad</th>
                <th>Estado</th>
                <th>Acciones</th>


                
            </tr>
        </tfoot>
        <tbody>
        </tbody>
    </table>

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