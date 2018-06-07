<?php if ($data == false): ?>
	<p>SIN RESULTADOS</p>
<?php else : ?>

	<?php $instructivo = (is_null($data->instructivo) or $data->instructivo == '0' ) ? false : true; ?>
    <hr>
	<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Datos del exámen</a></li>
  <li><a data-toggle="tab" href="#menu1">Instructivo</a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">

   <div class="panel panel-default">
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
 <!--  <dt>Instructivo</dt>
  <dd><?php echo "<a href='".base_url('files/inmunomedica/'.$data->archivo)."' target='_blank'>".$data->archivo."</a>" ?></dd> -->
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
  </div>
  <div id="menu1" class="tab-pane fade">

<?php if($instructivo): ?>
	<div id="pdfviewer" style="height:1000px;"></div>
	<script>PDFObject.embed("<?php echo base_url('files/inmunomedica/'.$data->archivo) ?>", "#pdfviewer");</script>
<?php else : ?>
	<br>
	<p>NINGUN INSTRUCTIVO ASOCIADO</p>
<?php endif; ?>

  </div>

</div>




	

<?php endif ?>