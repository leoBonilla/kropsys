<div class="row">
	<div class="col-md-12">
		<div class="alert alert-danger">
  			<strong>No se pudo completar la operacion </span>.
		</div>

		<div>
			<?php if(isset($error)) {
			foreach ($error  as $e) {
				echo $e;
			}
			}?>
		</div>

	</div>

</div>