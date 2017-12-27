<?php 
foreach ($profesionales as $row) { ?>
<option value="<?php echo $row->id; ?>"><?php echo $row->profesional; ?></option>
<?php } ?>