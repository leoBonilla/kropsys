<?php if ($data == false): ?>
	<p>SIN RESULTADOS</p>
<?php else : ?>
	<hr>
   <div class="panel panel-default">
   	<div class="panel-heading">Resultado de busqueda</div>
  <div class="panel-body">
      	   	<dl class="dl-horizontal">
  <dt>Examen</dt>
  <dd><?php echo $data->examen; ?></dd>
  <dt>Codigo</dt>
  <dd><?php echo $data->codigo; ?></dd>
  <dt>Tipo</dt>
  <dd><?php echo $data->tipo; ?></dd>
  <dt>Categoría</dt>
  <dd><?php echo $data->tipo_examen; ?></dd>
  <dt>Valor particular</dt>
  <dd><?php echo $data->valor_particular; ?></dd>
  <dt>Valor bono fonasa</dt>
  <dd><?php echo $data->valor_bono_fonasa; ?></dd>


</dl>

<hr>
<dl class="dl-horizontal">
      <dt>Plazo entrega</dt>
  <dd><?php echo $data->plazo_entrega; ?></dd>
        <dt>Muestra</dt>
  <dd><?php echo $data->muestra; ?></dd>
    <dt>Preparacion</dt>
  <dd><?php echo $data->preparacion; ?></dd>
   <dt>Indicaciones</dt>
  <dd><?php echo $data->indicaciones; ?></dd>
  <dt>Observaciones</dt>
  <dd><?php echo $data->observaciones; ?></dd>
</dl>
 <hr>

 <dl class="dl-horizontal">
      <dt>Agenda</dt>
  <dd><?php echo $data->agenda; ?></dd>
        <dt>Piso</dt>
  <dd><?php echo $data->piso; ?></dd>
   <dt>Lugar</dt>
  <dd><?php echo $data->lugar; ?></dd>
  <dt>Teléfono</dt>
  <dd><?php echo $data->telefono; ?></dd>
</dl>

<hr>

<h3>Convenios</h3>

   <table class="table table-striped table-condensed table-responsive table-bordered">
   	<thead>	</thead>
   	<tbody>	
		<tr>
			<th>PREVISION</th>
			<th>DIGITAL</th>
			<th>RUT BONO</th>
			<th>OBSERVACIONES</th>
		</tr>
		<?php 
			if($convenios!= false)		
			foreach ($convenios as $row) { ?>
			<tr>
				<td><?php 	echo $row->prevision ?></td>
				<td><?php 	echo ($row->digital == 1 ) ? 'SI' : 'NO';  ?></td>
				<td><?php 	echo $row->rut_bono ?></td>
				<td><?php 	echo $row->observaciones ?></td>
			</tr>
		<?php } ?>
   	<tfoot>	</tfoot>
   </table>

  </div>
  <div class="panel-footer"></div>
</div>

<?php endif ?>