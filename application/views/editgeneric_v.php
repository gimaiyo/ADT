<style type="text/css">
	#client_form {
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

<div id="client_form" title="Edit Generic Name">
	<?php
	$attributes = array('class' => 'input_form');
	echo form_open('genericname_management/update', $attributes);
	echo validation_errors('<p class="error">', '</p>');
	?>

<label>
<strong class="label">Generic Name</strong>
<input type="hidden" name="generic_id" id="generic_id" class="input" value="<?php echo $generics->id;?>" >
<input type="text" name="generic_name" id="generic_name" class="input" size="30" value="<?php echo $generics->Name;?>">
</label>


<p></p>
	<label>

	<input type="submit" value="Save" class="submit-button"/>
	</form>
</div>
