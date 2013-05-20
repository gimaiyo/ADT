<style type="text/css">
	#client_form {
		width: 300px;
		height:300px;
		margin-top: 5px;
		border:1px solid #DDD;
		padding:20px;
		margin-left:500px;
		margin-right:200px;
	}
	

</style>
<script type="text/javascript">
	$(document).ready(function() {
     
	});

</script>

<div id="client_form" title="Edit Drug Dose">
	<?php
	$attributes = array('class' => 'input_form');
	echo form_open('dose_management/update', $attributes);
	echo validation_errors('<p class="error">', '</p>');
	?>

<label>
<strong class="label">Dose Name</strong>
<input type="hidden" name="dose_id" id="dose_id" class="input" value="<?php echo $doses->id;?>" >
<input type="text" name="dose_name" id="dose_name" class="input" size="30" value="<?php echo $doses->Name; ?>">
</label>
<label>
<strong class="label">Dose Value</strong>
<input type="text" name="dose_value" id="dose_value" class="input" size="30" value="<?php echo $doses->Value; ?>">
</label>
<label>
<strong class="label">Dose Frequency</strong>
<input type="text" name="dose_frequency" id="dose_frequency" class="input" size="30" value="<?php echo $doses->Frequency; ?>">
</label>



<p></p>
	<label>

	<input type="submit" value="Save" class="submit-button"/>
	</form>
</div>
