<?php 	
$ingreso_reasig = $dist_reasignaciones_bar[0];
$examen_reasig = $dist_reasignaciones_bar[1];
$control_reasig = $dist_reasignaciones_bar[2];
$procedimiento_reasig = $dist_reasignaciones_bar[3];

$ingreso_agend = $dist_agendamientos_bar[0];
$examen_agend = $dist_agendamientos_bar[1];
$control_agend = $dist_agendamientos_bar[2];
$procedimiento_agend = $dist_agendamientos_bar[3];

$info_r_ingreso = $dist_reasignaciones[0];
$info_r_examen = $dist_reasignaciones[1];
$info_r_control = $dist_reasignaciones[2];
$info_r_proced = $dist_reasignaciones[3];
		
		
 ?>
<style>
	.chart{
		text-align: center;
	}
	.chart img{
		margin:auto;
		text-align: center;
	}

	.chart-explanation{
		 text-align: justify;
    	 text-justify: inter-word;
    	  text-indent: 3em;
	}

</style>

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
   <li><a data-toggle="tab" href="#agendamientos"><i class="fa fa-book"></i> Agendamientos</a></li>
  <li><a data-toggle="tab" href="#reasignaciones"><i class="fa fa-exchange"></i> Reasignaciones</a></li>
<!--   <li><a data-toggle="tab" href="#confirmaciones"><i class="fa  fa-thumbs-o-up"></i> Confirmaciones</a></li>
  <li><a data-toggle="tab" href="#otros"><i class="fa  fa-asterisk"></i> Otros</a></li> -->
  <li><a data-toggle="tab" href="#menu1">Tablas</a></li>
   <li><a data-toggle="tab" href="#informe">Informe</a></li>
  
</ul>
<div class="tab-content">
	  <div id="home" class="tab-pane fade in active">
	  	<h3>Gráficos</h3>
				<div class="row">
	<div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Pacientes gestionados agendadamientos
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div id="agendamientos_chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
</div>

<div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Pacientes gestionados reasignaciones
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div id="reasignaciones_chart">
                           	
                           </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
</div>
</div>

<div class="row">
	<div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Pacientes gestionados confirmaciones
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div id="confirmaciones_chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
</div>

<div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Pacientes gestionados otros
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div id="otros_chart">
                           	
                           </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
</div>
</div>






      </div>

       <div id="menu1" class="tab-pane fade in" >

       <div class="row">
<div class="col-md-12">
		<h2>Tablas de distribución</h2>
		<hr>
		<h3>Distribucion de agendamientos</h3>
		<table class="table table-bordered table-hover table-condensed">
		<thead>
				<tr><th>Prestacion</th>
				<th>Hora ya asignada</th>
				<th>Erroneos</th>
				<th>Rechazos / anulaciones</th>
				<th>No contestaron</th>
				<th>Pacientes agendados</th>
			</tr>
		</thead>
			<tbody>
				<?php foreach ($dist_agendamientos_bar as $row) : ?>
					<tr><td>
						<?php echo $row->prestacion; ?></td>
						<td><?php echo $row->hora_ya_asignada; ?></td>
						<td><?php echo $row->n_erroneo; ?></td>
						<td><?php echo $row->rechazo_anulaciones; ?></td>
						<td><?php echo $row->no_contestaron; ?></td>
						<td><?php echo $row->pacientes_agendados; ?></td>


					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>


<div class="row">
<div class="col-md-12">
		<hr>
		<h3>Distribucion de reasignaciones</h3>
		<table class="table table-bordered table-hover table-condensed">
		<thead>
				<tr><th>Prestacion</th>
				<th>Sin Cupo</th>
				<th>Hora ya asignada</th>
				<th>Erroneos</th>
				<th>Rechazos / anulaciones</th>
				<th>No contestaron</th>
				<th>Pacientes agendados</th>
				<th>Total</th>
			</tr>
		</thead>
			<tbody>
				<?php foreach ($dist_reasignaciones_bar as $row) : ?>
					<tr><td>
						<?php echo $row->prestacion; ?></td>
						<td><?php echo $row->sin_cupo; ?></td>
						<td><?php echo $row->hora_ya_asignada; ?></td>
						<td><?php echo $row->n_erroneo; ?></td>
						<td><?php echo $row->rechazo_anulaciones; ?></td>
						<td><?php echo $row->no_contestaron; ?></td>
						<td><?php echo $row->pacientes_agendados; ?></td>
						<td><?php echo $row->pacientes; ?></td>

					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>


<div class="row">
			<div class="col-md-12">
		<hr>
		<h3>Distribucion de confirmaciones</h3>
		<table class="table table-bordered table-hover table-condensed">
		<thead>
				<tr>
				<th>Prestacion</th>
				<th>confirmadas</th>
				<th>Hora ya asignada</th>
				<th>Erroneos</th>
				<th>Rechazos / anulaciones</th>
				<th>No contestaron</th>
				<th>Total</th>
			</tr>
		</thead>
			<tbody>
				<?php foreach ($dist_confirmaciones_bar as $row) : ?>
					<tr><td>
						<?php echo $row->prestacion; ?></td>
						<td><?php echo $row->confirmadas; ?></td>
						<td><?php echo $row->hora_ya_asignada; ?></td>
						<td><?php echo $row->n_erroneo; ?></td>
						<td><?php echo $row->rechazo_anulaciones; ?></td>
						<td><?php echo $row->no_contestaron; ?></td>

						<td><?php echo $row->pacientes; ?></td>

					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<div class="row">
			<div class="col-md-12">
		<hr>
		<h3>Distribucion de otros</h3>
		<table class="table table-bordered table-hover table-condensed">
		<thead>
				<tr>
				<th>Prestacion</th>
				<th>confirmadas</th>
				<th>Hora ya asignada</th>
				<th>Erroneos</th>
				<th>Rechazos / anulaciones</th>
				<th>No contestaron</th>
				<th>Total</th>
			</tr>
		</thead>
			<tbody>
				<?php foreach ($dist_otros_bar as $row) : ?>
					<tr><td>
						<?php echo $row->prestacion; ?></td>
						<td><?php echo $row->confirmadas; ?></td>
						<td><?php echo $row->hora_ya_asignada; ?></td>
						<td><?php echo $row->n_erroneo; ?></td>
						<td><?php echo $row->rechazo_anulaciones; ?></td>
						<td><?php echo $row->no_contestaron; ?></td>

						<td><?php echo $row->pacientes; ?></td>

					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<h2>Top Profesionales</h2>
		<hr>

		<div class="row">
			<div class="col-md-6">
						<h3>Reasignaciones</h3>
				<table class="table table-bordered table-hover table-condensed">
		<thead>
				<tr>
				<th>Profesional</th>
				<th>Pacientes</th>
			</tr>
		</thead>
			<tbody>
				<?php foreach ($top_p_rea as $row) : ?>
					<tr><td>
						<?php echo $row->profesional; ?></td>
						<td><?php echo $row->total; ?></td>
					

					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
			</div>

			<div class="col-md-6">
						<h3>Confirmaciones</h3>
				<table class="table table-bordered table-hover table-condensed">
		<thead>
				<tr>
				<th>Profesional</th>
				<th>Pacientes</th>
			</tr>
		</thead>
			<tbody>
				<?php foreach ($top_p_conf as $row) : ?>
					<tr><td>
						<?php echo $row->profesional; ?></td>
						<td><?php echo $row->total; ?></td>
					

					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
			</div>
		</div>

		<div class="row">
					<div class="col-md-6">
						<h3>Agendamientos</h3>
				<table class="table table-bordered table-hover table-condensed">
		<thead>
				<tr>
				<th>Profesional</th>
				<th>Pacientes</th>
			</tr>
		</thead>
			<tbody>
				<?php foreach ($top_p_ag as $row) : ?>
					<tr><td>
						<?php echo $row->profesional; ?></td>
						<td><?php echo $row->total; ?></td>
					

					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
			</div>

						<div class="col-md-6">
						<h3>Otros</h3>
				<table class="table table-bordered table-hover table-condensed">
		<thead>
				<tr>
				<th>Profesional</th>
				<th>Pacientes</th>
			</tr>
		</thead>
			<tbody>
				<?php foreach ($top_p_otros as $row) : ?>
					<tr><td>
						<?php echo $row->profesional; ?></td>
						<td><?php echo $row->total; ?></td>
					

					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
			</div>
		</div>
	</div>

<div class="row">
	<div class="col-md-12">
		<hr>
		<h3>Reasignaciones por especialidad</h3>
					<table class="table table-bordered table-hover table-condensed">
		<thead>
				<tr>
				<th>Especialidad</th>
				<th>Pacientes</th>
			</tr>
		</thead>
			<tbody>
				<?php foreach ($rea_por_especialidad as $row) : ?>
					<tr><td>
						<?php echo $row->especialidad; ?></td>
						<td><?php echo $row->total; ?></td>
					

					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>


<div class="row">
	<div class="col-md-12">
		<hr>
		<h3>Reasignaciones por profesional</h3>
					<table class="table table-bordered table-hover table-condensed">
		<thead>
				<tr>
				<th>Profesional</th>
				<th>Pacientes</th>
			</tr>
		</thead>
			<tbody>
				<?php foreach ($rea_por_profesional as $row) : ?>
					<tr><td>
						<?php echo $row->profesional; ?></td>
						<td><?php echo $row->total; ?></td>
					

					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>


</div>
</div>
    <div id="agendamientos" class="tab-pane fade in" >
    	     	<br>	
     	<div class="row">
	<div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Distribución de reasignaciones
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div id="dist_agendamientos_chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
</div>


	<div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Distribución por Examen
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div id="dist_agendamientos_examen_chart" style="display: block;margin:0 auto;"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
</div>
</div>

     	<div class="row">
	<div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Distribución por control
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div id="dist_agendamientos_control_chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
</div>


	<div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Distribución por ingreso
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div id="dist_agendamientos_ingreso_chart" style="display: block;margin:0 auto;"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
</div>
</div>
    </div>
     <div id="reasignaciones" class="tab-pane fade in" >
     	<br>	
     	<div class="row">
	<div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Distribución de reasignaciones
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div id="dist_reasignaciones_chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
</div>


	<div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Distribución por Examen
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div id="dist_reasignaciones_examen_chart" style="display: block;margin:0 auto;"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
</div>
</div>


<div class="row">
	<div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Distribucion por control
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div id="dist_reasignaciones_control_chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
</div>


	<div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Distribución por ingreso
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div id="dist_reasignaciones_ingreso_chart" "></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
</div>


</div>

     </div>

     <div id="confirmaciones" class="tab-pane fade in" ></div>
     <div id="otros" class="tab-pane fade in" ></div>
      <div id="informe" class="tab-pane fade in" >

      	      	<div class="row">
      	      		<br>	
      		<div class="col-md-12">	
				<button class="btn btn-success" id="convert">Descargar <i class="fa fa-download">	</i></button>
  				<div id="download-area"></div>
      		</div>
      	</div>
      	<hr>	

      	<div id="content">
<!-- 
      				<table style="border-collapse: collapse;border:1px solid black;width: 100%;">
		<thead>
				<tr>
				<th  td style="border:1px solid #ddd;height: 20px;padding-left: 5px;background-color: #4CAF50;color: white;">Profesional</th>
				<th  td style="border:1px solid #ddd;height: 20px;padding-left: 5px;background-color: #4CAF50;color: white;">Profesional</th>

			</tr>
		</thead>
			<tbody>
				<?php foreach ($top_p_rea as $row) : ?>
					<tr><td  td style="border:1px solid #ddd;height: 20px;font-size:11px; padding-right:5px; padding-left: 5px;">
						<?php echo $row->profesional; ?></td>
						<td td style="border:1px solid #ddd;height: 20px;font-size:11px; padding-right:5px; padding-left: 5px;"><?php echo $row->total; ?></td>
					

					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
      		 -->

      		<div class="row">
      			<div class="col-md-8 col-md-offset-2">
      				<h2 style="color: #5E527C; font-family: arial black;margin-bottom:100px;">Informe Operación Call Center Hospital Clínico Metropolitano La Florida <?php echo $periodo; ?> </h2>
      			<div style="text-align: center;">
      				
      				<img  class="img-responsive img-thumbnail" src="<?php echo base_url('assets/word/img_portada_.jpg'); ?>" alt="" >
      			</div>
      			<div  style="text-align:right;margin-top:280px;">
      				<p style="text-align:right;font-family:arial;font-size:20px;color:#5E527C;padding:0px;margin:0px;">Sergio Ulloa Valdevenito</p>
      				<p style="text-align:right;font-family:arial;font-size:20px;color:#5E527C;padding:0px;margin:0px;">Gerente General</p>
      				<!-- <ul style="float: right;list-style-type: none;">
      					<li style="list-style-type: none;">Sergio Ulloa Valdebenito</li>
      					<li style="list-style-type: none;">Gerente General</li>
      				</ul> -->
      			</div>
      			</div>
      		</div> 
      	<div class="row" >
      		      		<div class="col-md-8 col-md-offset-2" >
      			<h3 style="font-family: arial black; color: #5E527C;">Agendamientos</h3>
      			<div id="info_agendamientos_chart" class="chart" style="text-align: center;"></div>
      			<div class="chart-explanation" style="padding-top:5px;text-align: justify; text-justify:inter-word;text-indent: 3em;">
				<?php 	$ag_total = $ag_no_contestaron->total + $ag_rechazos_anulaciones->total + $ag_n_erroneos->total + $ag_horas_ya_asignadas->total +$ag_pacientes_agendados->total; ?>
      			Durante el periodo , se agendaron un total de <?= $ag_pacientes_agendados->total; ?> pacientes, mientras que <?= $ag_no_contestaron->total; ?> pacientes no contestaron el llamado telefónico, pese a que a lo menos se realizaron 3 llamados a cada número disponible, <?= $ag_rechazos_anulaciones->total; ?> personas rechazaron o anularon su hora y <?= $ag_horas_ya_asignadas->total; ?> personas señalaron que ya tenían  hora asignada. En el período hubo <?= $ag_n_erroneos->total; ?> números erróneos.
      		</div>
      		</div>
      	</div>
     
      	<div class="row">
      		<div class="col-md-8 col-md-offset-2" >
      			<h3 style="font-family: arial black; color: #5E527C;">Reasignaciones</h3>
      			<div id="info_reasignaciones_chart" class="chart" style="text-align: center;"></div>
      			<div class="chart-explanation" style="padding-top:5px;text-align: justify; text-justify:inter-word;text-indent: 3em;">
      			<?php 	$re_total = $re_no_contestaron->total + $re_rechazos_anulaciones->total + $re_n_erroneos->total + $re_horas_ya_asignadas->total +$re_pacientes_agendados->total + $re_sin_cupo->total; ?>
      			En relación a los pacientes reasignados , se gestionaron <?= $re_total; ?> pacientes, de los cuales, se agendaron <?= $re_pacientes_agendados->total; ?> pacientes, mientras que <?= $re_no_contestaron->total; ?> no contestaron el llamado telefónico, <?= $re_rechazos_anulaciones->total; ?> pacientes rechazaron o anularon la hora y <?= $re_horas_ya_asignadas->total; ?> pacientes ya tenían su hora agendada. Aquí se genera una diferencia de <?= $re_sin_cupo->total; ?> pacientes sobre los cuales no se realiza gestión por no haber disponibilidad de cupos. En el período hubo <?= $re_n_erroneos->total; ?> números telefónicos errados.
      		</div>

      	
      			<h3 style="font-family: arial black; color: #5E527C;">Distribución de reasignaciones</h3>
      			<div id="info_dist_reasignaciones_chart" class="chart" style="text-align: center;"></div>
      		
      		<div class="chart-explanation" style="padding-top:5px;text-align: justify; text-justify:inter-word;text-indent: 3em;">
      			En relación a los <?= $re_pacientes_agendados->total; ?> pacientes reasignados , <?= $info_r_control->total; ?>   correspondió a Controles, <?= $info_r_examen->total; ?>  a Exámenes, <?= $info_r_ingreso->total; ?> a ingresos y <?= $info_r_proced->total; ?> a Procedimientos.
      		</div>
      		</div>	
      	</div> 



    	<div class="row">
      		<div class="col-md-8 col-md-offset-2" >
      			<h3 style="font-family: arial black; color: #5E527C;">Distribución de reasignaciones por control</h3>
      			<div id="info_dist_reasignaciones_control_chart" class="chart" style="text-align: center;"></div>
      				<div class="chart-explanation" style="padding-top:5px;text-align: justify; text-justify:inter-word;text-indent: 3em;">
      			En relación a los <?= $info_r_control->total; ?>  pacientes de reasignación de Controles ,  <?php 	echo $control_reasig->pacientes_agendados; ?> fueron agendados,  <?php 	echo $control_reasig->no_contestaron; ?> pacientes no contestaron el llamado telefónico,  <?php 	echo $control_reasig->rechazo_anulaciones; ?> pacientes rechazaron o anularon la hora, y  <?php 	echo $control_reasig->hora_ya_asignada; ?> pacientes señalaron tener una hora ya asignada. Había  <?php 	echo $control_reasig->n_erroneo; ?> números telefónicos errados.
Por otra parte, hubo  <?php 	echo $control_reasig->sin_cupo; ?> pacientes sobre los cuales no se realizó gestión, debido a que no se disponía de cupo. 
				
      			<h3 style="font-family: arial black; color: #5E527C;">Distribución de reasignaciones por ingreso</h3>
      			<div id="info_dist_reasignaciones_ingreso_chart" class="chart" style="text-align: center;"></div>
      		

      			<div class="chart-explanation" style="padding-top:5px;text-align: justify; text-justify:inter-word;text-indent: 3em;">
      			<?php $total_ingreso_r_control = $ingreso_reasig->pacientes_agendados + $ingreso_reasig->no_contestaron + $ingreso_reasig->rechazo_anulaciones + $ingreso_reasig->hora_ya_asignada + $ingreso_reasig->n_erroneo +$ingreso_reasig->sin_cupo;  ?>
      			En relación a los <?php echo $total_ingreso_r_control ?> pacientes reasignados de Ingresos , <?php 	echo $ingreso_reasig->pacientes_agendados; ?> fueron agendados, <?php 	echo $ingreso_reasig->no_contestaron; ?>  pacientes no contestaron el llamado telefónico, hubo <?php 	echo $ingreso_reasig->rechazo_anulaciones; ?>  pacientes que rechazaron o anularon la hora, <?php 	echo $ingreso_reasig->hora_ya_asignada; ?>  pacientes que señalaron tener una hora ya asignada. Había <?php 	echo $ingreso_reasig->n_erroneo; ?>  números telefónicos errados. Existe una falta de <?php 	echo $ingreso_reasig->sin_cupo; ?>  pacientes sobre los cuales no se realizó gestión, producto que no se disponía de cupo
      		</div>
      		</div>
      		</div>
      	</div>  

      	<div class="row">
      		<div class="col-md-8 col-md-offset-2" >
      			<h3 style="font-family: arial black; color: #5E527C;">Distribución de reasignaciones por exámen</h3>
      			<div id="info_dist_reasignaciones_examen_chart" class="chart" style="text-align: center;"></div>
      			<div class="chart-explanation" style="padding-top:5px;text-align: justify; text-justify:inter-word;text-indent: 3em;">
      			<?php 	$total_ingreso_r_examen = $examen_reasig->pacientes_agendados + $examen_reasig->no_contestaron + $examen_reasig->rechazo_anulaciones + $examen_reasig->hora_ya_asignada + $examen_reasig->n_erroneo + $examen_reasig->sin_cupo ; ?>
      			En cuanto a los <?php 	echo $total_ingreso_r_examen; ?> pacientes reasignados de exámenes , <?php 	echo $examen_reasig->pacientes_agendados; ?> fueron agendados, <?php 	echo $examen_reasig->no_contestaron; ?> no contestaron el llamado telefónico. Hubo <?php 	echo $examen_reasig->rechazo_anulaciones; ?> pacientes que rechazaran o anularan la hora y  hubo <?php 	echo $examen_reasig->hora_ya_asignada; ?> pacientes que señalaran tener ya una hora asignada. Había <?php 	echo $examen_reasig->n_erroneo; ?> números telefónicos errados. Hubo un total de <?php 	echo $examen_reasig->sin_cupo; ?> pacientes sobre los cuales no se realizó gestión, producto que no se disponía de cupo.
      		</div>

      			<h3 style="font-family: arial black; color: #5E527C;">Confirmaciones</h3>
      			<div id="info_confirmaciones_chart" class="chart" style="text-align: center;"></div>
      	
      		<?php 	
      				$conf_total = $conf_no_contestaron->total + $conf_rechazos_anulaciones->total + $conf_n_erroneo->total + $conf_horas_ya_asignadas->total +$conf_confirmadas->total
      				+ $conf_reasignadas->total; 
      		?>
      		<div class="chart-explanation" style="padding-top:5px;text-align: justify; text-justify:inter-word;text-indent: 3em;">
      			En relación a las confirmaciones, de un total de <?php 	echo $conf_total; ?> gestiones realizadas, dio como resultado <?php echo $conf_confirmadas->total; ?> pacientes confirmados, <?php echo $conf_rechazos_anulaciones->total; ?>  pacientes que anularon o rechazaron la hora, <?php echo $conf_reasignadas->total; ?>  pacientes con la hora reasignada y <?php echo $conf_no_contestaron->total; ?>  pacientes que no contestaron el llamado telefónico. Se detectaron <?php echo $conf_n_erroneo->total; ?>  números telefónicos erróneos.
      		</div>
      		</div>
      		
      	</div> 

    <div class="row">
    	<div class="col-md-8 col-md-offset-2" >
    		<div id="reasignaciones_por_especialidad">
    			<h3 style="font-family: arial black; color: #5E527C;">Reasignaciones según Especialidad</h3>
    	<table style="border-collapse: collapse;border:1px solid black;width: 100%;">
		<thead>
				<tr>
				<th  td style="border:1px solid #ddd;height: 20px;padding-left: 5px;background-color: #4CAF50;color: white;">Profesional</th>
				<th  td style="border:1px solid #ddd;height: 20px;padding-left: 5px;background-color: #4CAF50;color: white;">Nº Pacientes</th>

			</tr>
		</thead>
			<tbody>
				<?php foreach ($rea_por_especialidad as $row) : ?>
					<tr><td  td style="border:1px solid #ddd;height: 20px;font-size:11px; padding-right:5px; padding-left: 5px;">
						<?php echo $row->especialidad; ?></td>
						<td td style="border:1px solid #ddd;height: 20px;font-size:11px; padding-right:5px; padding-left: 5px;"><?php echo $row->total; ?></td>

					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<br>
		<p>En este cuadro se muestran todas las reasignaciones realizadas en las distintas especialidades durante el período</p>
    		</div>
    	</div>
    </div>

  	<div class="row">
      		<div class="col-md-8 col-md-offset-2">
      			<div id="top_profesionales_reasignacion">
      				<h3 style="font-family: arial black; color: #5E527C;">Top ten profesionales con reasignaciones</h3>
				<table style="border-collapse: collapse;border:1px solid black;width: 100%;">
		<thead>
				<tr>
				<th  td style="border:1px solid #ddd;height: 20px;padding-left: 5px;background-color: #4CAF50;color: white;">Profesional</th>
				<th  td style="border:1px solid #ddd;height: 20px;padding-left: 5px;background-color: #4CAF50;color: white;">Nº Pacientes</th>

			</tr>
		</thead>
			<tbody>
				<?php foreach ($top_p_rea as $row) : ?>
					<tr><td  td style="border:1px solid #ddd;height: 20px;font-size:11px; padding-right:5px; padding-left: 5px;">
						<?php echo $row->profesional; ?></td>
						<td td style="border:1px solid #ddd;height: 20px;font-size:11px; padding-right:5px; padding-left: 5px;"><?php echo $row->total; ?></td>
					

					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<br>
		<p>En este cuadro se presentan los diez profesionales con mayor cantidad de reasignaciones en el período</p>


      			</div>
      		</div>
      	</div>

         <div class="row">
    	<div class="col-md-8 col-md-offset-2" >
    		<div id="reasignaciones_por_profesional">
    			<h3 style="font-family: arial black; color: #5E527C;">Reasignaciones según Profesionales</h3>
    	<table style="border-collapse: collapse;border:1px solid black;width: 100%;">
		<thead>
				<tr>
				<th  td style="border:1px solid #ddd;height: 20px;padding-left: 5px;background-color: #4CAF50;color: white;">Profesional</th>
				<th  td style="border:1px solid #ddd;height: 20px;padding-left: 5px;background-color: #4CAF50;color: white;">Nº Pacientes</th>

			</tr>
		</thead>
			<tbody>
				<?php foreach ($rea_por_profesional as $row) : ?>
					<tr><td  td style="border:1px solid #ddd;height: 20px;font-size:11px; padding-right:5px; padding-left: 5px;">
						<?php echo $row->profesional; ?></td>
						<td td style="border:1px solid #ddd;height: 20px;font-size:11px; padding-right:5px; padding-left: 5px;"><?php echo $row->total; ?></td>

					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<br>
		<p>En estos cuadros se muestran la totalidad de profesionales, ordenados de mayor a menor según la cantidad de reasignaciones realizadas en el período</p>
    		</div>
    	</div>
    </div>


      </div>



      </div>




<script>
	 function drawChart() {
	 	var list = [];

	 	var options = {
	 		           title: '',
	 				   width:'100%',
                       height:300,
                       is3D:true,
                        titleTextStyle: {
	       						color: '#23527C',    // any HTML string color ('red', '#cc00cc')
	        					fontName: 'Calibri', // i.e. 'Times New Roman'
	        					fontSize: 22, // 12, 18 whatever you want (don't specify px)
	       						bold: true,    // true or false
	       						italic: false   // true of false
   					 },
   					 chartArea:{left:'0%',top:'20%',width:"100%",height:"60%"},
                       tooltip: {
                       			text : 'value'
                       },
                       legend: {
        			  	        position: 'right',
        			  			alignment:'top',
	      						textStyle: {
	        						fontName: 'monospace',
	        						fontSize: 12
	      						}						
	   						 },
	   				 	pieSliceText: 'value',
	   				 	pieSliceTextStyle: {
	   				 	fontSize:12
	   				 				}

	   				 			};
	   		var barOptions = {
	   							title: '', 
	   							titlePosition:'right',
	   							titleTextStyle: {
	       						color: '#23527C',    // any HTML string color ('red', '#cc00cc')
	        					fontName: 'Calibri', // i.e. 'Times New Roman'
	        					fontSize: 18, // 12, 18 whatever you want (don't specify px)
	       						bold: true,    // true or false
	       						italic: false   // true of false
   					 			},
	   							width: '100%',
                				height:300,
                				bar: {groupWidth: '50%'},
                				chartArea:{left:'32%',top:'20%', right:'22%'},
                				hAxis: {title: 'Cantidad de pacientes', titleTextStyle: {color: '#FF0000'}},
                				vAxis: {
                						title: '', 
                						titleTextStyle: {
                							color: '#FF0000',
                							fontSize:14
                						},
                						
                					 	textPosition: 'out'
                					 	
                					 }

       
                			};

        var data = new google.visualization.DataTable();
        data.addColumn('string', '');
        data.addColumn('number', '');
        data.addRows([
           [<?php echo "'Agendados (".$ag_pacientes_agendados->total.")'"; ?>,<?php echo $ag_pacientes_agendados->total; ?>],
            [<?php echo "'No contestaron (".$ag_no_contestaron->total.")'"; ?>,<?php echo $ag_no_contestaron->total; ?>],
             [<?php echo "'Rechazos/Anul (".$ag_rechazos_anulaciones->total.")'"; ?>,<?php echo $ag_rechazos_anulaciones->total; ?>],
              [<?php echo "'Num erróneos (".$ag_n_erroneos->total.")'"; ?>,<?php echo $ag_n_erroneos->total; ?>],
               [<?php echo "'h ya asignadas (".$ag_horas_ya_asignadas->total.")'"; ?>,<?php echo $ag_horas_ya_asignadas->total; ?>]
        ]);
        var agendamientos_piechart = new google.visualization.PieChart(document.getElementById('agendamientos_chart'));
         google.visualization.events.addListener(agendamientos_piechart, 'ready', function () {
     	    document.getElementById('info_agendamientos_chart').innerHTML = '<img class="img-responsive" src="' + agendamientos_piechart.getImageURI() + '">';
    		});
       options.title ="Agendamientos";
       agendamientos_piechart.draw(data, options);
       

        var data2 = new google.visualization.DataTable();
        data2.addColumn('string', '');
        data2.addColumn('number', '');
        data2.addRows([
          [<?php echo "'Agendados (".$re_pacientes_agendados->total.")'"; ?>,<?php echo $re_pacientes_agendados->total; ?>],
          [<?php echo "'No contestaron (".$re_no_contestaron->total.")'"; ?>,<?php echo $re_no_contestaron->total; ?>],
          [<?php echo "'Rechazos/Anulaciones (".$re_rechazos_anulaciones->total.")'"; ?>,<?php echo $re_rechazos_anulaciones->total; ?>],
           [<?php echo "'Num erróneos (".$re_n_erroneos->total.")'"; ?>,<?php echo $re_n_erroneos->total; ?>],
            [<?php echo "'Horas ya asignadas (".$re_horas_ya_asignadas->total.")'"; ?>,<?php echo $re_horas_ya_asignadas->total; ?>],
            	 [<?php echo "'Sin cupo (".$re_sin_cupo->total.")'"; ?>,<?php echo $re_sin_cupo->total; ?>]
        ]);

        var reasignaciones_piechart = new google.visualization.PieChart(document.getElementById('reasignaciones_chart'));
        google.visualization.events.addListener(reasignaciones_piechart, 'ready', function () {
     	    document.getElementById('info_reasignaciones_chart').innerHTML = '<img class="img-responsive" src="' + reasignaciones_piechart.getImageURI() + '">';
    		});
        options.title="Reasignaciones";
        reasignaciones_piechart.draw(data2, options);

        var confirmaciones = new google.visualization.DataTable();
        confirmaciones.addColumn('string', '');
        confirmaciones.addColumn('number', '');
        confirmaciones.addRows([
        	[<?php echo "'No contestaron (".$conf_no_contestaron->total.")'"; ?>,<?php echo $conf_no_contestaron->total; ?>],
 			[<?php echo "'Rechazos/Anulaciones (".$conf_rechazos_anulaciones->total.")'"; ?>,<?php echo $conf_rechazos_anulaciones->total; ?>],
 			[<?php echo "'Erroneos (".$conf_n_erroneo->total.")'"; ?>,<?php echo $conf_n_erroneo->total; ?>],
 			[<?php echo "'Horas ya asignadas (".$conf_horas_ya_asignadas->total.")'"; ?>,<?php echo $conf_horas_ya_asignadas->total; ?>],
 			[<?php echo "'Confirmadas (".$conf_confirmadas->total.")'"; ?>,<?php echo $conf_confirmadas->total; ?>],
        	[<?php echo "'Reasignadas (".$conf_reasignadas->total.")'"; ?>,<?php echo $conf_reasignadas->total; ?>],

        	]);

         var confirmaciones_piechart = new google.visualization.PieChart(document.getElementById('confirmaciones_chart'));
         google.visualization.events.addListener(confirmaciones_piechart, 'ready', function () {
     	    document.getElementById('info_confirmaciones_chart').innerHTML = '<img class="img-responsive" src="' + confirmaciones_piechart.getImageURI() + '">';
    		});
        options.title = 'Confirmaciones';
       	confirmaciones_piechart.draw(confirmaciones, options);


        var otros = new google.visualization.DataTable();
        otros.addColumn('string', '');
        otros.addColumn('number', '');
        otros.addRows([
        	[<?php echo "'No contestaron (".$otros_no_contestaron->total.")'"; ?>,<?php echo $otros_no_contestaron->total; ?>],
 			[<?php echo "'Rechazos/Anulaciones (".$otros_rechazos_anulaciones->total.")'"; ?>,<?php echo $otros_rechazos_anulaciones->total; ?>],
 			[<?php echo "'Erroneos (".$otros_n_erroneo->total.")'"; ?>,<?php echo $otros_n_erroneo->total; ?>],
 			[<?php echo "'Horas ya asignadas (".$otros_horas_ya_asignadas->total.")'"; ?>,<?php echo $otros_horas_ya_asignadas->total; ?>],
 			[<?php echo "'Confirmadas (".$otros_confirmadas->total.")'"; ?>,<?php echo $otros_confirmadas->total; ?>],
        	[<?php echo "'Reasignadas (".$otros_reasignadas->total.")'"; ?>,<?php echo $otros_reasignadas->total; ?>]

        	]);

         var otros_piechart = new google.visualization.PieChart(document.getElementById('otros_chart'));
        options.title ="Otros";
       	otros_piechart.draw(otros, options);




       	//graficos tab agendamientos


        var dist_agendamientos = new google.visualization.DataTable();
        dist_agendamientos.addColumn('string', '');
        dist_agendamientos.addColumn('number', '');
        dist_agendamientos.addRows([<?php 
              $count = 0;
             foreach($dist_agendamientos as $row) : ?>
             	[<?php echo "'".$row->prestacion . "(".$row->total.")"."' ,". $row->total; ?>]<?php if($count < 3) :?>,<?php endif; ?><?php $count++; ?><?php endforeach; ?>
        ]);

        var dist_agendamientos_piechart = new google.visualization.PieChart(document.getElementById('dist_agendamientos_chart'));
        options.title = "Distribución de agendamientos";
        options.is3D = false;
        options.pieHole = 0.4;
        dist_agendamientos_piechart.draw(dist_agendamientos, options);


        var data_agendamientos_examen = new google.visualization.DataTable();
        data_agendamientos_examen.addColumn('string', 'Nombre');
        data_agendamientos_examen.addColumn('number', 'Pacientes');
        data_agendamientos_examen.addColumn({type: 'string', role:'annotation'});
        data_agendamientos_examen.addRows([ 
            ['Numero erroneo', <?php 	echo $examen_agend->n_erroneo; ?>, <?php 	echo "'".$examen_agend->n_erroneo."'"; ?>],
            ['Hora ya asignada', <?php 	echo $examen_agend->hora_ya_asignada; ?>, <?php 	echo "'".$examen_agend->hora_ya_asignada."'"; ?>],
            ['Rechazo / anulaciones', <?php 	echo $examen_agend->rechazo_anulaciones; ?>, <?php 	echo "'".$examen_agend->rechazo_anulaciones."'"; ?>],
            ['No contestaron', <?php 	echo $examen_agend->no_contestaron; ?>, <?php 	echo "'".$examen_agend->no_contestaron."'"; ?>],
            ['Agendados', <?php 	echo $examen_agend->pacientes_agendados; ?>, <?php 	echo "'".$examen_agend->pacientes_agendados."'"; ?>]
        	]);
        barOptions.title= "Agendamientos por exámen";
        var dist_agendamientos_barchart_examen = new google.visualization.BarChart(document.getElementById('dist_agendamientos_examen_chart'));
        dist_agendamientos_barchart_examen.draw(data_agendamientos_examen, barOptions);

         var data_agendamientos_ingreso = new google.visualization.DataTable();
        data_agendamientos_ingreso.addColumn('string', 'Nombre');
        data_agendamientos_ingreso.addColumn('number', 'Pacientes');
        data_agendamientos_ingreso.addColumn({type: 'string', role:'annotation'});
        data_agendamientos_ingreso.addRows([
            ['Numero erroneo', <?php 	echo $ingreso_agend->n_erroneo; ?>, <?php 	echo "'".$ingreso_agend->n_erroneo."'"; ?>],
            ['Hora ya asignada', <?php 	echo $ingreso_agend->hora_ya_asignada; ?>, <?php 	echo "'".$ingreso_agend->hora_ya_asignada."'"; ?>],
            ['Rechazo / anulaciones', <?php 	echo $ingreso_agend->rechazo_anulaciones; ?>,<?php 	echo "'".$ingreso_agend->rechazo_anulaciones."'"; ?>],
            ['No contestaron', <?php 	echo $ingreso_agend->no_contestaron; ?>,<?php 	echo "'".$ingreso_agend->no_contestaron."'"; ?>],
            ['Agendados', <?php 	echo $ingreso_agend->pacientes_agendados; ?>, <?php 	echo "'".$ingreso_agend->pacientes_agendados."'"; ?>]
        	]);

        var dist_agendamientos_barchart_ingreso = new google.visualization.BarChart(document.getElementById('dist_agendamientos_ingreso_chart'));
        barOptions.title= "Agendamientos por ingreso";
        dist_agendamientos_barchart_ingreso.draw(data_agendamientos_ingreso, barOptions);



         var data_agendamientos_control = new google.visualization.DataTable();
        data_agendamientos_control.addColumn('string', 'Nombre');
        data_agendamientos_control.addColumn('number', 'Pacientes');
        data_agendamientos_control.addColumn({type: 'string', role:'annotation'});
        data_agendamientos_control.addRows([
            ['Numero erroneo', <?php 	echo $control_agend->n_erroneo; ?>, <?php 	echo "'".$control_agend->n_erroneo."'"; ?>],
            ['Hora ya asignada', <?php 	echo $control_agend->hora_ya_asignada; ?>, <?php 	echo "'".$control_agend->hora_ya_asignada."'"; ?>],
            ['Rechazo / anulaciones', <?php 	echo $control_agend->rechazo_anulaciones; ?>, <?php 	echo "'".$control_agend->rechazo_anulaciones."'"; ?>],
            ['No contestaron', <?php 	echo $control_agend->no_contestaron; ?>, <?php 	echo "'".$control_agend->no_contestaron."'"; ?>],
            ['Pacientes agendados', <?php 	echo $control_agend->pacientes_agendados; ?>, <?php 	echo "'".$control_agend->pacientes_agendados."'"; ?>],
        	]);
        barOptions.title = "Agendamientos por control";
        var dist_agendamientos_barchart_control = new google.visualization.BarChart(document.getElementById('dist_agendamientos_control_chart'));
        dist_agendamientos_barchart_control.draw(data_agendamientos_control,  barOptions);



       // graficos tab reasignaciones

        var data3 = new google.visualization.DataTable();
        data3.addColumn('string', '');
        data3.addColumn('number', '');
        data3.addRows([<?php 
              $count = 0;
             foreach($dist_reasignaciones as $row) : ?>
             	[<?php echo "'".$row->prestacion . "(".$row->total.")"."' ,". $row->total; ?>]<?php if($count < 3) :?>,<?php endif; ?><?php $count++; ?><?php endforeach; ?>
        ]);

        var dist_reasignaciones_piechart = new google.visualization.PieChart(document.getElementById('dist_reasignaciones_chart'));
         google.visualization.events.addListener(dist_reasignaciones_piechart, 'ready', function () {
     	    document.getElementById('info_dist_reasignaciones_chart').innerHTML = '<img class="img-responsive" src="' + dist_reasignaciones_piechart.getImageURI() + '">';
    		});
         options.title = "Distribución de reasignaciones";
         options.is3D = false;
         options.pieHole = 0.4;
        dist_reasignaciones_piechart.draw(data3, options);


        var data_reasignaciones_examen = new google.visualization.DataTable();
        data_reasignaciones_examen.addColumn('string', 'Nombre');
        data_reasignaciones_examen.addColumn('number', 'Pacientes');
        data_reasignaciones_examen.addColumn({type:'string', role:'annotation'});
        data_reasignaciones_examen.addRows([
        	['Sin_cupo', <?php 	echo $examen_reasig->sin_cupo; ?>, <?php 	echo "'".$examen_reasig->sin_cupo."'"; ?>],
            ['Numero erroneo', <?php 	echo $examen_reasig->n_erroneo; ?>, <?php 	echo "'".$examen_reasig->n_erroneo."'"; ?>],
            ['Hora ya asignada', <?php 	echo $examen_reasig->hora_ya_asignada; ?>, <?php 	echo "'".$examen_reasig->hora_ya_asignada."'"; ?>],
            ['Rechazo / anulaciones', <?php 	echo $examen_reasig->rechazo_anulaciones; ?>, <?php 	echo "'".$examen_reasig->rechazo_anulaciones."'"; ?>],
            ['No contestaron', <?php 	echo $examen_reasig->no_contestaron; ?>, <?php 	echo "'".$examen_reasig->no_contestaron."'"; ?>],
            ['Pacientes agendados', <?php 	echo $examen_reasig->pacientes_agendados; ?>, <?php 	echo "'".$examen_reasig->pacientes_agendados."'"; ?>],
        	]);

        var dist_reasignaciones_barchart_exaamen = new google.visualization.BarChart(document.getElementById('dist_reasignaciones_examen_chart'));
         google.visualization.events.addListener(dist_reasignaciones_barchart_exaamen, 'ready', function () {
     	    document.getElementById('info_dist_reasignaciones_examen_chart').innerHTML = '<img class="img-responsive" src="' + dist_reasignaciones_barchart_exaamen.getImageURI() + '">';
    		});
         barOptions.title="Reasignaciones por exámen";
        dist_reasignaciones_barchart_exaamen.draw(data_reasignaciones_examen,  barOptions);

         var data_reasignaciones_ingreso = new google.visualization.DataTable();
        data_reasignaciones_ingreso.addColumn('string', 'Nombre');
        data_reasignaciones_ingreso.addColumn('number', 'Pacientes');
        data_reasignaciones_ingreso.addColumn({type:'string', role:'annotation'});
        data_reasignaciones_ingreso.addRows([
        	['Sin_cupo', <?php 	echo $ingreso_reasig->sin_cupo; ?>, <?php 	echo "'".$ingreso_reasig->sin_cupo."'"; ?>],
            ['Numero erroneo', <?php 	echo $ingreso_reasig->n_erroneo; ?>, <?php 	echo "'".$ingreso_reasig->n_erroneo."'"; ?>],
            ['Hora ya asignada', <?php 	echo $ingreso_reasig->hora_ya_asignada; ?>, <?php 	echo "'".$ingreso_reasig->hora_ya_asignada."'"; ?>],
            ['Rechazo / anulaciones', <?php 	echo $ingreso_reasig->rechazo_anulaciones; ?>, <?php 	echo "'".$ingreso_reasig->rechazo_anulaciones."'"; ?>],
            ['No contestaron', <?php 	echo $ingreso_reasig->no_contestaron; ?>, <?php 	echo "'".$ingreso_reasig->no_contestaron."'"; ?>],
            ['Pacientes agendados', <?php 	echo $ingreso_reasig->pacientes_agendados; ?>, <?php 	echo "'".$ingreso_reasig->pacientes_agendados."'"; ?>],
        	]);

        var dist_reasignaciones_barchart_ingreso = new google.visualization.BarChart(document.getElementById('dist_reasignaciones_ingreso_chart'));
         google.visualization.events.addListener(dist_reasignaciones_barchart_ingreso, 'ready', function () {
     	    document.getElementById('info_dist_reasignaciones_ingreso_chart').innerHTML = '<img class="img-responsive" src="' + dist_reasignaciones_barchart_ingreso.getImageURI() + '">';
    		});
         barOptions.title="Reasignaciones por ingreso";
        dist_reasignaciones_barchart_ingreso.draw(data_reasignaciones_ingreso, barOptions);



         var data_reasignaciones_control = new google.visualization.DataTable();
        data_reasignaciones_control.addColumn('string', 'Nombre');
        data_reasignaciones_control.addColumn('number', 'Pacientes');
        data_reasignaciones_control.addColumn({type:'string', role:'annotation'});
        data_reasignaciones_control.addRows([
        	['Sin_cupo', <?php 	echo $control_reasig->sin_cupo; ?>,  <?php 	echo "'".$control_reasig->sin_cupo."'"; ?>],
            ['Numero erroneo', <?php 	echo $control_reasig->n_erroneo; ?>,  <?php 	echo "'".$control_reasig->n_erroneo."'"; ?>],
            ['Hora ya asignada', <?php 	echo $control_reasig->hora_ya_asignada; ?>,  <?php 	echo "'".$control_reasig->hora_ya_asignada."'"; ?>],
            ['Rechazo / anulaciones', <?php 	echo $control_reasig->rechazo_anulaciones; ?>,  <?php 	echo "'".$control_reasig->rechazo_anulaciones."'"; ?>],
            ['No contestaron', <?php 	echo $control_reasig->no_contestaron; ?>,  <?php 	echo "'".$control_reasig->no_contestaron."'"; ?>],
            ['Pacientes agendados', <?php 	echo $control_reasig->pacientes_agendados; ?>,  <?php 	echo "'".$control_reasig->pacientes_agendados."'"; ?>],
        	]);

        var dist_reasignaciones_barchart_control = new google.visualization.BarChart(document.getElementById('dist_reasignaciones_control_chart'));
         google.visualization.events.addListener(dist_reasignaciones_barchart_control, 'ready', function () {
     	    document.getElementById('info_dist_reasignaciones_control_chart').innerHTML = '<img class="img-responsive" src="' + dist_reasignaciones_barchart_control.getImageURI() + '">';
    		});
        barOptions.title="Reasignaciones por control";
        dist_reasignaciones_barchart_control.draw(data_reasignaciones_control, barOptions);
 
 



      }

        document.getElementById('convert').addEventListener('click', function(e) {
        console.log($('#date-picker').val());
      e.preventDefault();
      convertImagesToBase64()
      var contentDocument = document.getElementById('content');
      //console.log(contentDocument.outerHTML);
      var content = '<!DOCTYPE html><html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head><body id="body">' + contentDocument.outerHTML +'<body></html>';
     // var orientation = document.querySelector('.page-orientation input:checked').value;
      var converted = htmlDocx.asBlob(content, {orientation: 'portrait'});
      var range = $('#date-picker').val();
      range = range.replace("/", "_");
      var filename = 'reporte_informe_operacional_kropsys_' + range +'.docx';
      saveAs(converted, filename);
      var link = document.createElement('a');
      link.href = URL.createObjectURL(converted);
      link.download = 'document.docx';
      link.appendChild(
        document.createTextNode('Click aqui si no se descarga el archivo automaticamente'));
      var downloadArea = document.getElementById('download-area');
      downloadArea.innerHTML = '';
      downloadArea.appendChild(link);
    });
    function convertImagesToBase64 () {
      contentDocument = document.getElementById('content');
      var regularImages = contentDocument.querySelectorAll("img");
      var canvas = document.createElement('canvas');
      var ctx = canvas.getContext('2d');
      [].forEach.call(regularImages, function (imgElement) {
        // preparing canvas for drawing
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        canvas.width = imgElement.width;
        canvas.height = imgElement.height;
        ctx.drawImage(imgElement, 0, 0);

        var dataURL = canvas.toDataURL();
        imgElement.setAttribute('src', dataURL);
      })
      canvas.remove();
    }
</script>
