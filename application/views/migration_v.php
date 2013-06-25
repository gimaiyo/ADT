<html>
	<head>
		<script type="text/javascript" src="<?php echo base_url() . 'Scripts/jquery.js';?>"></script>
		<title>webADT | Migration</title>
		<script type="text/javascript">
			$(document).ready(function() {
				var base_url="<?php echo base_url(); ?>";
				$("#migrate").click(function() {
					var facility = $("#facility").val();
					var link = base_url + "upload_management/migrate/" + facility;
					$.ajax({
						url : link,
						type : 'POST',
						success : function(data) {
							$("#output").html(data);
						}
					});
				});
			});

		</script>
		<style type="text/css">
			#migration_facility {
				margin: 0 auto;
				width: 50%;
				padding:10px;
			}
			#output{
				margin: 0 auto;
				width:100%;
				height:50%;
				background:#DDD;
			}

		</style>
	</head>
	<body>
			<div title="Migration" id="migration_facility">
				<label>Choose Facility</label>
				<select name="facility" id="facility">
					<?php
					foreach ($facilities as $facility) {
						echo "<option value='" . $facility['facilitycode'] . "'>" . $facility['name'] . "</option>";
					}
					?>
				</select>
				<input type="submit" value="Migrate"  id='migrate'"/>
			</div>
			<textarea id="output" disabled="disabled">
				
			</textarea>
	</body>
</html>
