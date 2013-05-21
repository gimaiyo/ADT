<<<<<<< HEAD
<div class="view_content">
	<?php
	$attributes = array('id' => 'entry_form');
	echo form_open('drugcode_management/save', $attributes);
	echo validation_errors('
<p class="error">', '</p>
');
?>
	<table>
		<tr>
			<td>Generic Drug Name</td><td>
			<select class="input" id="genericname" name="genericname">
				<?php foreach($generic_names as $generic_name){
				?>
				<option value="<?php echo $generic_name['id'];?>"><?php echo $generic_name['Name'];?></option>
				<?php }?>
			</select>
			</td>
		</tr>
		<tr>
			<td>Drug Code Name</td><td>
			<input type="text" class="input" name="drugname" size="40"/>
			</td>
		</tr>
		<tr>
			<td>Drug Unit</td><td>
			<select class="input" id="drugunit" name="drugunit">
				<?php foreach($drug_units as $drug_unit){
				?>
				<option value="<?php echo $drug_unit->id;?>"><?php echo $drug_unit->Name;?></option>
				<?php }?>
			</select>
			</td>
		</tr>
		<tr>
			<td>Pack Size</td><td>
			<input type="text" class="input" name="packsize"/>
			</td>
		</tr>
		<tr>
			<td>Dose (Strength)</td><td>
			<select name="dose_strength" id="dose_strength">
				<option value="1">mg</option>
				<option value="2">g</option>
				<option value="3">ml</option>
				<option value="4">l</option>
			</select>
			</td>
		</tr>
		<tr>
			<td>Duration</td><td>
			<input type="text" class="input" name="duration"/>
			</td>
		</tr>
		<tr>
			<td>Quantity</td><td>
			<input type="text" class="input" name="quantity"/>
			</td>
		</tr>
		<tr>
			<td>Safety Quantity</td><td>
			<input type="text" class="input" name="safety_quantity"/>
			</td>
		</tr>
		<tr>
			<td>Dosage (Frequency)</td><td>
			<select class="input" id="dose_frequency" name="dose_frequency">
				<?php foreach($doses as $dose){
				?>
				<option value="<?php echo $dose->Name;?>"><?php echo $dose->Name;?></option>
				<?php }?>
			</select>
			</td>
		</tr>
		<tr>
			<td>Supported By</td><td>
			<select class="input" id="supported_by" name="supported_by">
				<option value="0">None</option>
				<option value="1">GOK</option>
				<option value="2">PEPFAR</option>
			</select>
			</td>
		</tr>
		<tr>
			<td>None ARV Drug</td><td>
			<select class="input" id="none_arv" name="none_arv">
				<option value="T">True</option>
				<option value="F">False</option>
			</select>
			</td>
		</tr>
		
		<tr>
			<td>TB Drug</td><td>
			<select class="input" id="tb_drug" name="tb_drug">
				<option value="T">True</option>
				<option value="F">False</option>
			</select>
			</td>
		</tr>
		
		<tr>
			<td>Drug in Use</td><td>
			<select class="input" id="drug_in_use" name="drug_in_use">
				<option value="T">True</option>
				<option value="F">False</option>
			</select>
			</td>
		</tr>
		
		<tr>
			<td>Supply Program</td><td>
			<select name="supply" id="supply">
				<option value="1">ART</option>
				<option value="0">Non ART</option>
			</select>
			</td>
		</tr>
		<tr>
			<td>Comment</td><td>
			<textarea rows="4" cols="30" name="comments">
				
			</textarea>
			</td>
		</tr>
		<tr>
			<td></td><td>
			<input type="submit" value="Save" name="submit" class="submit-button"/>
			</td>
		</tr>
	</table>
	</form>
=======
<div class="view_content">
	<?php
	$attributes = array('id' => 'entry_form');
	echo form_open('drugcode_management/save', $attributes);
	echo validation_errors('
<p class="error">', '</p>
');
?>
	<table>
		<tr>
			<td>Generic Drug Name</td><td>
			<select class="input" id="genericname" name="genericname">
				<?php foreach($generic_names as $generic_name){
				?>
				<option value="<?php echo $generic_name['id'];?>"><?php echo $generic_name['Name'];?></option>
				<?php }?>
			</select>
			</td>
		</tr>
		<tr>
			<td>Drug Code Name</td><td>
			<input type="text" class="input" name="drugname" size="40"/>
			</td>
		</tr>
		<tr>
			<td>Drug Unit</td><td>
			<select class="input" id="drugunit" name="drugunit">
				<?php foreach($drug_units as $drug_unit){
				?>
				<option value="<?php echo $drug_unit->id;?>"><?php echo $drug_unit->Name;?></option>
				<?php }?>
			</select>
			</td>
		</tr>
		<tr>
			<td>Pack Size</td><td>
			<input type="text" class="input" name="packsize"/>
			</td>
		</tr>
		<tr>
			<td>Dose (Strength)</td><td>
			<select name="dose_strength" id="dose_strength">
				<option value="1">mg</option>
				<option value="2">g</option>
				<option value="3">ml</option>
				<option value="4">l</option>
			</select>
			</td>
		</tr>
		<tr>
			<td>Duration</td><td>
			<input type="text" class="input" name="duration"/>
			</td>
		</tr>
		<tr>
			<td>Quantity</td><td>
			<input type="text" class="input" name="quantity"/>
			</td>
		</tr>
		<tr>
			<td>Safety Quantity</td><td>
			<input type="text" class="input" name="safety_quantity"/>
			</td>
		</tr>
		<tr>
			<td>Dosage (Frequency)</td><td>
			<select class="input" id="dose_frequency" name="dose_frequency">
				<?php foreach($doses as $dose){
				?>
				<option value="<?php echo $dose->Name;?>"><?php echo $dose->Name;?></option>
				<?php }?>
			</select>
			</td>
		</tr>
		<tr>
			<td>Supported By</td><td>
			<select class="input" id="supported_by" name="supported_by">
				<option value="0">None</option>
				<option value="1">GOK</option>
				<option value="2">PEPFAR</option>
			</select>
			</td>
		</tr>
		<tr>
			<td>None ARV Drug</td><td>
			<select class="input" id="none_arv" name="none_arv">
				<option value="T">True</option>
				<option value="F">False</option>
			</select>
			</td>
		</tr>
		
		<tr>
			<td>TB Drug</td><td>
			<select class="input" id="tb_drug" name="tb_drug">
				<option value="T">True</option>
				<option value="F">False</option>
			</select>
			</td>
		</tr>
		
		<tr>
			<td>Drug in Use</td><td>
			<select class="input" id="drug_in_use" name="drug_in_use">
				<option value="T">True</option>
				<option value="F">False</option>
			</select>
			</td>
		</tr>
		
		<tr>
			<td>Supply Program</td><td>
			<select name="supply" id="supply">
				<option value="1">ART</option>
				<option value="0">Non ART</option>
			</select>
			</td>
		</tr>
		<tr>
			<td>Comment</td><td>
			<textarea rows="4" cols="30" name="comments">
				
			</textarea>
			</td>
		</tr>
		<tr>
			<td></td><td>
			<input type="submit" value="Save" name="submit" class="submit-button"/>
			</td>
		</tr>
	</table>
	</form>
>>>>>>> c959eeb2fed050f5ee1654716903038493730d25
</div>