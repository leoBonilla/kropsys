
<!-- <button class="btn btn-success btn-xs">Editar</button> <button class="btn btn-danger btn-xs">Eliminar</button> -->
<p></p>
<table class="table table-striped table-condensed table-responsive">

    <tbody>

        <tr>
          <th>Profesional</th>
            <td><a href="#" class="xeditable" id="profesional" data-type="text" data-pk="<?php echo $prof->id; ?>" data-url="<?php echo base_url('profesionales/editable') ?>" data-title="Ingrese nombre"><?php echo $prof->profesional; ?></a></td>
            
        <tr>
          <th>Nombre agenda</th>
            <td><a href="#" class="xeditable" id="nombre_agenda" data-type="text" data-pk="<?php echo $prof->id; ?>" data-url="<?php echo base_url('profesionales/editable') ?>" data-title="Ingrese nombre agenda"><?php echo $prof->nombre_agenda; ?></a></td>
        
        </tr>
            <tr>
          <th>Especialidad</th>
            <td><a href="#" class="xeditablext"  data-type="select2" id="id_especialidad" data-pk="<?php echo $prof->id; ?>" data-value="<?php echo $prof->id_especialidad; ?>" data-url="<?php echo base_url('profesionales/editable') ?>" ><?php echo $prof->especialidad; ?></a></td>
        
        </tr>
      <tr>

           <tr>
          <th>Habilitado</th>
            <td><a href="#" class="editable-active"  data-type="select2" id="disabled" data-pk="<?php echo $prof->id; ?>" data-value="<?php echo $prof->disabled; ?>" data-url="<?php echo base_url('profesionales/editable') ?>" ><?php echo ($prof->disabled == 0  ) ?  'Activo' : 'Inactivo'; ?></a></td>
        
        </tr>

    </tbody>
</table>