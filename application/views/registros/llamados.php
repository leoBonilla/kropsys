<div class="col-md-12">
      <div class="row filtros">
<div class="col-md-4">
       <div class="form-group">
         <input type="text" class="form-control" id="date-filter">
       </div>
      </div>
<?php if($auth_level >= ADMIN_LEVEL ) :?>
    <!--   <div class="col-md-4">
          <select class="form-control selectpicker" name="userId" id="userId" data-show-subtext="true" data-live-search="true" multiple data-actions-box="true" data-select-all-text="Seleccionar todos" data-deselect-all-text="Deseleccionar todos" title="Filtrar usuarios">
            <?php if($users != false) :?>
              <?php foreach ($users as $row) :?>
                <option value="<?php echo $row->user_id; ?>"><?php echo $row->nombre;  ?></option>
              <?php endforeach; ?>
            <?php endif; ?>
          </select>
      </div> -->
    
  <?php endif; ?>
   </div> 

   <div class="row">
  <div class="col-md-12">
        <table id="llamadas_table" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
              <td>Fecha</td>
              <td>Numero</td>
              <td>Estado</td>
              <td>Anexo</td>

              <td>Reproducir</td>

                
            </tr>
        </thead>
        <tfoot>
            <tr>
              <td>Fecha</td>
              <td>Numero</td>
              <td>Estado</td>
              <td>Anexo</td>
              <td>Reproducir</td>


                
            </tr>
        </tfoot>
        <tbody>
        </tbody>
    </table>


  </div>
</div>
 </div>
