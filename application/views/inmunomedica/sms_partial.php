<hr>
<h5>Sms enviados</h5>
<table class="table table-striped table-condensed table-bordered teable-responsive">
<thead>
		<tr>
		<th>Enviados por agendamiento</th>
		<th>Enviados por recordatorios</th>
		<th>Total enviados</th>

	</tr>
</thead>
	<tbody>
		<tr>
			<td><?php echo $data->agendados; ?></td>
			<td><?php echo $data->recordatorios; ?></td>
			<td><?php echo $data->total; ?></td>

		</tr>
	</tbody>
</table>
