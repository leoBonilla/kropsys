
<!-- <button class="btn btn-success btn-xs">Editar</button> <button class="btn btn-danger btn-xs">Eliminar</button> -->
<p></p>
<table class="table">

    <tbody>
        <tr>
          <th>Rut</th>
            <td><?php echo $user->rut; ?></td>
           
        </tr>
        <tr>
          <th>Nombre</th>
            <td><a href="#" class="xeditable" id="nombre" data-type="text" data-pk="<?php echo $user->user_id; ?>" data-url="<?php echo base_url('users/editable') ?>" data-title="Ingrese nombre"><?php echo $user->nombre; ?></a></td>
            
        <tr>
          <th>Apellido</th>
            <td><a href="#" class="xeditable" id="apellido" data-type="text" data-pk="<?php echo $user->user_id; ?>" data-url="<?php echo base_url('users/editable') ?>" data-title="Ingrese apellido"><?php echo $user->apellido; ?></a></td>
        
        </tr>
      <tr>
          <th>Email</th>
            <td><a href="#" class="xeditable" id="email" data-type="text" data-pk="<?php echo $user->user_id; ?>" data-url="<?php echo base_url('users/editable') ?>" data-title="Ingrese email"><?php echo $user->email; ?></a></td>
       
        </tr>
       <tr>
          <th>Username</th>
            <td><a href="#" class="xeditable" id="username" data-type="text" data-pk="<?php echo $user->user_id; ?>" data-url="<?php echo base_url('users/editable') ?>" data-title="Ingrese apellido"><?php echo $user->username; ?></a></td>
        
        </tr>
         <tr>
          <th>Numero</th>
            <td><a href="#" class="xeditable" id="number" data-type="text" data-pk="<?php echo $user->user_id; ?>" data-url="<?php echo base_url('users/editable') ?>" data-title="Ingrese apellido"><?php echo $user->number; ?></a></td>
        
        </tr>

         <tr>
          <th>Extension</th>
            <td><a href="#" class="xeditablext"  data-type="select2" id="extension_id" data-pk="<?php echo $user->user_id; ?>" data-value="<?php echo $user->extension_id; ?>" data-url="<?php echo base_url('users/editable') ?>" ><?php echo $user->anexo; ?></a></td>
        
        </tr>

         <tr>
          <th>Habilitado</th>
            <td><a href="#" class="editable-active"  data-type="select2" id="banned" data-pk="<?php echo $user->user_id; ?>" data-value="<?php echo $user->banned; ?>" data-url="<?php echo base_url('users/editable') ?>" ><?php echo ($user->banned == 0  ) ?  'Activo' : 'Inactivo'; ?></a></td>
        
        </tr>

        <tr>
          <th>Fecha nacimiento</th>
          <td>
            <a href="#" id="fecha_nac" data-type="combodate" data-pk="<?php echo $user->user_id; ?>" data-url="<?php echo base_url('users/editable') ?>" data-value="<?php echo $user->fecha_nac; ?>" data-title="Select date"></a>
          </td>
        </tr>
    </tbody>
</table>