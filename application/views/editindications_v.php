<style type="text/css">
	#indication_form {
		width: 300px;
		height:150px;
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

<div id="indication_form" title="Edit User">
	<?php
	$attributes = array('class' => 'input_form');
	echo form_open('indication_management/update', $attributes);
	echo validation_errors('<p class="error">', '</p>');
	?>

<label>
<strong class="label">Indication Name</strong>
<input type="hidden" name="indication_id" id="indication_id" class="input" value="<?php echo $indications->id;?>" >
<input type="text" name="indication_name" id="indication_name" class="input" size="30" value="<?php echo $indications->Name;?>">
</label>


<p></p>
	<label>

	<input type="submit" value="Save" class="submit-button"/>
	</form>
</div>
