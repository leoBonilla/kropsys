<?php 	
$ingreso_reasig = $dist_reasignaciones_bar[0];
$examen_reasig = $dist_reasignaciones_bar[1];
$control_reasig = $dist_reasignaciones_bar[2];
$procedimiento_reasig = $dist_reasignaciones_bar[3];

$ingreso_agend = $dist_agendamientos_bar[0];
$examen_agend = $dist_agendamientos_bar[1];
$control_agend = $dist_agendamientos_bar[2];
$procedimiento_agend = $dist_agendamientos_bar[3];
		
		
 ?>


<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
   <li><a data-toggle="tab" href="#agendamientos"><i class="fa fa-book"></i> Agendamientos</a></li>
  <li><a data-toggle="tab" href="#reasignaciones"><i class="fa fa-exchange"></i> Reasignaciones</a></li>
  <li><a data-toggle="tab" href="#confirmaciones"><i class="fa  fa-thumbs-o-up"></i> Confirmaciones</a></li>
  <li><a data-toggle="tab" href="#otros"><i class="fa  fa-asterisk"></i> Otros</a></li>
  <li><a data-toggle="tab" href="#menu1">Tablas</a></li>
  
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




<script>
	 function drawChart() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', '');
        data.addColumn('number', '');
        data.addRows([
          ['Pacientes agendados', <?php echo $ag_pacientes_agendados->total; ?>],
          ['No contestaron', <?php echo $ag_no_contestaron->total; ?>],
          ['Rechazos / Anulaciones', <?php echo $ag_rechazos_anulaciones->total; ?>],
          ['Numeros erroneos', <?php echo $ag_n_erroneos->total; ?>],
          ['Horas ya asignadas', <?php echo $ag_horas_ya_asignadas->total; ?>]
        ]);
        var agendamientos_piechart = new google.visualization.PieChart(document.getElementById('agendamientos_chart'));

       agendamientos_piechart.draw(data,  {title:'Agendamientos',
                       width:400,
                       height:300,
                       is3D:true
                   		});

        var data2 = new google.visualization.DataTable();
        data2.addColumn('string', '');
        data2.addColumn('number', '');
        data2.addRows([
          ['Pacientes agendados', <?php echo $re_pacientes_agendados->total; ?>],
          ['No contestaron', <?php echo $re_no_contestaron->total; ?>],
          ['Rechazos / Anulaciones', <?php echo $re_rechazos_anulaciones->total; ?>],
          ['Numeros erroneos', <?php echo $re_n_erroneos->total; ?>],
          ['Horas ya asignadas', <?php echo $re_horas_ya_asignadas->total; ?>],
          ['Sin cupo', <?php echo $re_sin_cupo->total; ?>]
        ]);

        var reasignaciones_piechart = new google.visualization.PieChart(document.getElementById('reasignaciones_chart'));
        reasignaciones_piechart.draw(data2,  {title:'Reasignaciones',
                       width:400,
                       height:300,
                       is3D:true
                   		});

        var confirmaciones = new google.visualization.DataTable();
        confirmaciones.addColumn('string', '');
        confirmaciones.addColumn('number', '');
        confirmaciones.addRows([
        	['No contestaron', <?php echo $conf_no_contestaron->total; ?>],
        	['Rechazos / Anulaciones', <?php echo $conf_rechazos_anulaciones->total; ?>],
        	['Erroneos', <?php echo $conf_n_erroneo->total; ?>],
        	['Horas ya asignadas', <?php echo $conf_horas_ya_asignadas->total; ?>],
        	['Confirmadas ', <?php echo $conf_confirmadas->total; ?>],
        	['Reasignadas ', <?php echo $conf_reasignadas->total; ?>]

        	]);

        var confirmaciones_piechart = new google.visualization.PieChart(document.getElementById('confirmaciones_chart'));
       	confirmaciones_piechart.draw(confirmaciones,  {   title:'Confirmaciones',
										                       width:400,
										                       height:300,
										                       is3D:true});


        var otros = new google.visualization.DataTable();
        otros.addColumn('string', '');
        otros.addColumn('number', '');
        otros.addRows([
        	['No contestaron', <?php echo $otros_no_contestaron->total; ?>],
        	['Rechazos / Anulaciones', <?php echo $otros_rechazos_anulaciones->total; ?>],
        	['Erroneos', <?php echo $otros_n_erroneo->total; ?>],
        	['Horas ya asignadas', <?php echo $otros_horas_ya_asignadas->total; ?>],
        	['Confirmadas ', <?php echo $otros_confirmadas->total; ?>],
        	['Reasignadas ', <?php echo $otros_reasignadas->total; ?>]

        	]);

         var otros_piechart = new google.visualization.PieChart(document.getElementById('otros_chart'));
       	otros_piechart.draw(otros,  {   title:'otros', width:400,
										                       height:300,
										                       is3D:true});




       	//graficos tab agendamientos


        var dist_agendamientos = new google.visualization.DataTable();
        dist_agendamientos.addColumn('string', '');
        dist_agendamientos.addColumn('number', '');
        dist_agendamientos.addRows([<?php 
              $count = 0;
             foreach($dist_agendamientos as $row) : ?>
             	[<?php echo "'".$row->prestacion ."' ,". $row->total; ?>]<?php if($count < 3) :?>,<?php endif; ?><?php $count++; ?><?php endforeach; ?>
        ]);

        var dist_agendamientos_piechart = new google.visualization.PieChart(document.getElementById('dist_agendamientos_chart'));
        dist_agendamientos_piechart.draw(dist_agendamientos,  {title:'Distribucion de agendamientos',
                       width:400,
                       height:300,
                       pieHole:0.4
                   		});


        var data_agendamientos_examen = new google.visualization.DataTable();
        data_agendamientos_examen.addColumn('string', '');
        data_agendamientos_examen.addColumn('number', '');
        data_agendamientos_examen.addRows([
            ['Numero erroneo', <?php 	echo $examen_agend->n_erroneo; ?>],
            ['Hora ya asignada', <?php 	echo $examen_agend->hora_ya_asignada; ?>],
            ['Rechazo / anulaciones', <?php 	echo $examen_agend->rechazo_anulaciones; ?>],
            ['No contestaron', <?php 	echo $examen_agend->no_contestaron; ?>]
        	]);

        var dist_agendamientos_barchart_examen = new google.visualization.BarChart(document.getElementById('dist_agendamientos_examen_chart'));
        dist_agendamientos_barchart_examen.draw(data_agendamientos_examen,  {title:'Distribucion de agendamientos por examen',
        	chartArea: {width: '35%'},
       				   width:400,
                       height:300
                   		});

         var data_agendamientos_ingreso = new google.visualization.DataTable();
        data_agendamientos_ingreso.addColumn('string', '');
        data_agendamientos_ingreso.addColumn('number', '');
        data_agendamientos_ingreso.addRows([
            ['Numero erroneo', <?php 	echo $ingreso_agend->n_erroneo; ?>],
            ['Hora ya asignada', <?php 	echo $ingreso_agend->hora_ya_asignada; ?>],
            ['Rechazo / anulaciones', <?php 	echo $ingreso_agend->rechazo_anulaciones; ?>],
            ['No contestaron', <?php 	echo $ingreso_agend->no_contestaron; ?>]
        	]);

        var dist_agendamientos_barchart_ingreso = new google.visualization.BarChart(document.getElementById('dist_agendamientos_ingreso_chart'));
        dist_agendamientos_barchart_ingreso.draw(data_agendamientos_ingreso,  {title:'Distribucion de agendamientos por ingreso',
        	chartArea: {width: '35%'},
       				   width:400,
                       height:300
                   		});



         var data_agendamientos_control = new google.visualization.DataTable();
        data_agendamientos_control.addColumn('string', '');
        data_agendamientos_control.addColumn('number', '');
        data_agendamientos_control.addRows([
            ['Numero erroneo', <?php 	echo $control_agend->n_erroneo; ?>],
            ['Hora ya asignada', <?php 	echo $control_agend->hora_ya_asignada; ?>],
            ['Rechazo / anulaciones', <?php 	echo $control_agend->rechazo_anulaciones; ?>],
            ['No contestaron', <?php 	echo $control_agend->no_contestaron; ?>],
            ['Pacientes agendados', <?php 	echo $control_agend->pacientes_agendados; ?>],
        	]);

        var dist_agendamientos_barchart_control = new google.visualization.BarChart(document.getElementById('dist_agendamientos_control_chart'));
        dist_agendamientos_barchart_control.draw(data_agendamientos_control,  {title:'Distribucion de agendamientos por control',
        	chartArea: {width: '35%'},
       				   width:400,
                       height:300
                   		});



       // graficos tab reasignaciones

        var data3 = new google.visualization.DataTable();
        data3.addColumn('string', '');
        data3.addColumn('number', '');
        data3.addRows([<?php 
              $count = 0;
             foreach($dist_reasignaciones as $row) : ?>
             	[<?php echo "'".$row->prestacion ."' ,". $row->total; ?>]<?php if($count < 3) :?>,<?php endif; ?><?php $count++; ?><?php endforeach; ?>
        ]);

        var dist_reasignaciones_piechart = new google.visualization.PieChart(document.getElementById('dist_reasignaciones_chart'));
        dist_reasignaciones_piechart.draw(data3,  {title:'Distribucion de reasignaciones',
                       width:400,
                       height:300,
                       pieHole:0.4
                   		});


        var data_reasignaciones_examen = new google.visualization.DataTable();
        data_reasignaciones_examen.addColumn('string', '');
        data_reasignaciones_examen.addColumn('number', '');
        data_reasignaciones_examen.addRows([
        	['Sin_cupo', <?php 	echo $examen_reasig->sin_cupo; ?>],
            ['Numero erroneo', <?php 	echo $examen_reasig->n_erroneo; ?>],
            ['Hora ya asignada', <?php 	echo $examen_reasig->hora_ya_asignada; ?>],
            ['Rechazo / anulaciones', <?php 	echo $examen_reasig->rechazo_anulaciones; ?>],
            ['No contestaron', <?php 	echo $examen_reasig->no_contestaron; ?>],
            ['Pacientes agendados', <?php 	echo $examen_reasig->pacientes_agendados; ?>],
        	]);

        var dist_reasignaciones_barchart_exaamen = new google.visualization.BarChart(document.getElementById('dist_reasignaciones_examen_chart'));
        dist_reasignaciones_barchart_exaamen.draw(data_reasignaciones_examen,  {title:'Distribucion de reasignaciones por examen',
        	chartArea: {width: '35%'},
       				   width:400,
                       height:300
                   		});

         var data_reasignaciones_ingreso = new google.visualization.DataTable();
        data_reasignaciones_ingreso.addColumn('string', '');
        data_reasignaciones_ingreso.addColumn('number', '');
        data_reasignaciones_ingreso.addRows([
        	['Sin_cupo', <?php 	echo $ingreso_reasig->sin_cupo; ?>],
            ['Numero erroneo', <?php 	echo $ingreso_reasig->n_erroneo; ?>],
            ['Hora ya asignada', <?php 	echo $ingreso_reasig->hora_ya_asignada; ?>],
            ['Rechazo / anulaciones', <?php 	echo $ingreso_reasig->rechazo_anulaciones; ?>],
            ['No contestaron', <?php 	echo $ingreso_reasig->no_contestaron; ?>],
            ['Pacientes agendados', <?php 	echo $ingreso_reasig->pacientes_agendados; ?>],
        	]);

        var dist_reasignaciones_barchart_ingreso = new google.visualization.BarChart(document.getElementById('dist_reasignaciones_ingreso_chart'));
        dist_reasignaciones_barchart_ingreso.draw(data_reasignaciones_ingreso,  {title:'Distribucion de reasignaciones por ingreso',
        	chartArea: {width: '35%'},
       				   width:400,
                       height:300
                   		});



         var data_reasignaciones_control = new google.visualization.DataTable();
        data_reasignaciones_control.addColumn('string', '');
        data_reasignaciones_control.addColumn('number', '');
        data_reasignaciones_control.addRows([
        	['Sin_cupo', <?php 	echo $control_reasig->sin_cupo; ?>],
            ['Numero erroneo', <?php 	echo $control_reasig->n_erroneo; ?>],
            ['Hora ya asignada', <?php 	echo $control_reasig->hora_ya_asignada; ?>],
            ['Rechazo / anulaciones', <?php 	echo $control_reasig->rechazo_anulaciones; ?>],
            ['No contestaron', <?php 	echo $control_reasig->no_contestaron; ?>],
            ['Pacientes agendados', <?php 	echo $control_reasig->pacientes_agendados; ?>],
        	]);

        var dist_reasignaciones_barchart_control = new google.visualization.BarChart(document.getElementById('dist_reasignaciones_control_chart'));
        dist_reasignaciones_barchart_control.draw(data_reasignaciones_control,  {title:'Distribucion de reasignaciones por control',
        	chartArea: {width: '35%'},
       				   width:400,
                       height:300
                   		});
 
 
        //graficos para confirmaciones 
        
        var $dist_confirmaciones = new google.visualization.DataTable();
        $dist_confirmaciones.addColumn('string', '');
        $dist_confirmaciones.addColumn('number', '');
        $dist_confirmaciones.addRows([<?php 
              $count = 0;
             foreach($dist_reasignaciones as $row) : ?>
             	[<?php echo "'".$row->prestacion ."' ,". $row->total; ?>]<?php if($count < 3) :?>,<?php endif; ?><?php $count++; ?><?php endforeach; ?>
        ]);

        var dist_confirmaciones_piechart = new google.visualization.PieChart(document.getElementById('dist_confirmaciones_chart'));
        dist_confirmaciones_piechart.draw($dist_confirmaciones,  {title:'Distribucion de confirmaciones',
                       width:400,
                       height:300,
                       pieHole:0.4
                   		});

        



      }
</script>

<!-- <h1>Pacientes agendados</h1>

<ul>
<li>Total Registros: <?php echo $ag_pacientes_agendados->total + $ag_no_contestaron->total + $ag_rechazos_anulaciones->total + $ag_n_erroneos->total + $ag_horas_ya_asignadas->total; ?></li>
<li>Pacientes agendados : <?php echo $ag_pacientes_agendados->total; ?></li>
<li>No contestaron : <?php echo $ag_no_contestaron->total; ?></li>
<li>Rechazos anulaciones : <?php echo $ag_rechazos_anulaciones->total; ?></li>
<li>Erroneos : <?php echo $ag_n_erroneos->total; ?></li>
<li>Horas ya asignadas : <?php echo $ag_horas_ya_asignadas->total; ?></li>

</ul>


<h1>Pacientes gestionados reasigaciones</h1>

<ul>
<li>Total Registros: <?php echo $re_pacientes_agendados->total + $re_no_contestaron->total + $re_rechazos_anulaciones->total + $re_n_erroneos->total + $re_horas_ya_asignadas->total +$re_sin_cupo->total ; ?></li>
<li>Pacientes agendados : <?php echo $re_pacientes_agendados->total; ?></li>
<li>No contestaron : <?php echo $re_no_contestaron->total; ?></li>
<li>Rechazos anulaciones : <?php echo $re_rechazos_anulaciones->total; ?></li>
<li>Erroneos : <?php echo $re_n_erroneos->total; ?></li>
<li>Horas ya asignadas : <?php echo $re_horas_ya_asignadas->total; ?></li>
<li>Sin Cupo : <?php echo $re_sin_cupo->total; ?></li>
</ul>


<h1>Distribucion pacientes reasignados</h1>

<ul>
<?php foreach ($dist_reasignaciones as $row) { ?>
	<li><?php echo $row->prestacion ." : ".$row->total; ?></li>
<?php } ?>
</ul> -->