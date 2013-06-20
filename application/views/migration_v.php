<html>
	<head>
		<title>webADT | Migration</title>
		<style type="text/css">
			#migration_facility{
				margin:0 auto;
				width:50%;
			}
			
		</style>
	</head>
	<body>
		<form method="post" action="<?php echo base_url().'upload_management/migrate';?>">
		<div title="Migration" id="migration_facility">
			<label>Choose Facility</label>
			<select name="facility">
				<?php
				foreach ($facilities as $facility) {
					echo "<option value='" . $facility['facilitycode'] . "'>" . $facility['name'] . "</option>";
				}
			?>
			</select>
			<input type="submit" value="Migrate" />
		</div>
		</form>
	</body>
</html>