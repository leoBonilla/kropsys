<table id="calls_table" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
              
                <th>Fecha</th>                  
                <th>Numero</th>
                <th>Id</th>
                <th>Usuario</th>

              

                
               
  
                
            </tr>
        </thead>
        <tfoot>
            <tr>
            
                 <th>Fecha</th>                  
                <th>Numero</th>
                <th>Id</th>
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
                <td><?php echo $row->unique_id; ?></td>
                <td><?php echo $row->usuario; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
    </table>