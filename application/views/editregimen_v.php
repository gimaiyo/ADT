<style type="text/css">
	#client_form {
		width: 300px;
		height: 400px;
		margin-top: 5px;
		border: 1px solid #DDD;
		padding: 20px;
		margin-left: 500px;
		margin-right: 200px;
	}

</style>
<script type="text/javascript">
	$(document).ready(function() {
     $("#category").attr("value","<?php echo $regimens['Category'];?>");
     $("#type_of_service").attr("value","<?php echo $regimens['Type_Of_Service'];?>");
	});

</script>
<div id="client_form" title="Edit Regimen">
	<?php
	$attributes = array('class' => 'input_form');
	echo form_open('regimen_management/update', $attributes);
	echo validation_errors('<p class="error">', '</p>');
	?>

	<label> <strong class="label">Regimen Code</strong>
		<input type="hidden" name="regimen_id" id="regimen_id" class="input" value="<?php echo $regimens['id'];?>" >
		<input type="text" name="regimen_code" id="regimen_code" class="input" value="<?php echo $regimens['Regimen_Code']; ?>">
	</label>
	<label> <strong class="label">Description</strong>
		<input type="text" name="regimen_desc" id="regimen_desc" class="input" value="<?php echo $regimens['Regimen_Desc']; ?>">
	</label>
	<label> <strong class="label">Category</strong>
		<select class="input" id="category" name="category">
			<?php
foreach($regimen_categories as $regimen_category){
			?>
			<option value="<?php echo $regimen_category -> id;?>"><?php echo $regimen_category -> Name;?></option>
			<?php }?>
		</select> </label>
	<label> <strong class="label">Line</strong>
		<input type="text" name="line" id="line" class="input" value="<?php echo $regimens['Line']; ?>">
	</label>
	<label> <strong class="label">Type of Service</strong>
		<select class="input" id="type_of_service" name="type_of_service">
			<?php
foreach($regimen_service_types as $regimen_service_type){
			?>
			<option value="<?php echo $regimen_service_type -> id;?>"><?php echo $regimen_service_type -> Name;?></option>
			<?php }?>
		</select> </label>
	<label> <strong class="label">Remarks</strong> 		
		<textarea name="remarks" id="remarks" class="input">
			<?php echo $regimens['Remarks']; ?>
		</textarea> </label>
	<p></p>
	<label>
		<input type="submit" value="Save" class="submit-button"/>
		</form>
</div>
