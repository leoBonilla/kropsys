<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#history">HISTORIAL</a></li>
  <li><a data-toggle="tab" href="#calls">LLAMADAS</a></li>

</ul>
<div class="tab-content">
  <div id="history" class="tab-pane fade in active">
<table id="history_table" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
              
                 <th>Fecha</th>                  
                <th>Estado</th>
                <th>Avance</th>
                <th>Tiempo</th>
                <th>Observacion</th>
           
              

                
               
  
                
            </tr>
        </thead>
        <tfoot>
            <tr>
            
                <th>Fecha</th>
                <th>Estado</th>
                <th>Avance</th>
                <th>Tiempo</th>
                <th>Observacion</th>
          
               
                
               
  

                
            </tr>
        </tfoot>
        <tbody>
          <?php foreach($history as $row): ?>


                <tr>
                    <td><input type="hidden" name="start" class="start" value="<?php echo $row->fecha_cambio_estado; ?>">
                        <?php   echo $row->fecha_cambio_estado; ?>
                    </td>
                    <td><?php echo $row->h_estado; ?></td>
                    <td><div class="progress">
                      <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $row->porcentaje; ?>"
                      aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $row->porcentaje; ?>%">
                        <?php echo $row->porcentaje; ?>%
                      </div>
                    </div></td>
                    <td class="time-td">
                            <span class="time">
                                
                            </span>
                            <span>
                                <input type="hidden" name="inicio" class="inicio" value="<?php echo $row->fecha_inicio ?>">
                                <input type="hidden" name="fin"  class="fin" value="<?php echo $row->fecha_fin_estado ?>">
                            </span>
                        <?php echo ''?></td>
                    <td><?php echo $row->h_observaciones; ?></td>
                

                </tr>
          <?php endforeach; ?>
        </tbody>
    </table>

</div>
 <div id="calls" class="tab-pane fade in ">
  <table id="calls_table" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
              
                <th>Fecha</th>                  
                <th>Numero</th>
                 <th>Observaciones</th>
                 <th>Estado</th>
                <th>Usuario</th>
     
            </tr>
        </thead>
        <tfoot>
            <tr>
            
                 <th>Fecha</th>                  
                <th>Numero</th>
                 <th>Observaciones</th>
                 <th>Estado</th>
                <th>Usuario</th>
               
                
               
  

                
            </tr>
        </tfoot>
        <tbody>
          <?php 


          if($llamadas != false) 
          foreach($llamadas as $row): ?>
            <tr>
                <td><?php echo $row->fecha; ?></td>
                <td><?php echo $row->telefono ; ?></td>
                <td><?php echo $row->observaciones; ?></td>
                <td><?php echo $row->estado; ?></td>
                <td><?php echo $row->usuario; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
    </table>
 </div>
</div>