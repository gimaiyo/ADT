<script>
	$(document).ready(function() {
		$('.dropdown-toggle').click(function() {
			$('.dropdown-menu').dropdown();
		});
		
		$('.regimens-view').click(function() {
			$('.settings').load('<?php echo base_url().'facilityadmin_dashboard_management/getOrders/approved'?>');
		});
		
		
		
	
	}); 
</script>

<div class="center-content">
	<div class="navbar">
		<div class="navbar-inner">
			<ul class="nav">
				<li class="dropdown">
					<a class="dropdown-toggle" role="button" data-toggle="dropdown" id="dLabel" href="#">Regimens<b class="caret"></b></a>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
						<li>
							<a href="<?php echo site_url("regimen_management"); ?>" class="regimens-view">View Regimens</a>
						</li>
						<li>
							<a href="<?php echo site_url("regimen_drug_management"); ?>" class="regimens-view">Regimen Drugs</a>
						</li>
						<li>
							<a href="<?php echo site_url("regimenchange_management"); ?>" class="regimens-view">Regimen change reasons</a>
						</li>
					</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" role="button" data-toggle="dropdown" id="dLabel" href="#">Drugs<b class="caret"></b></a>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
						<li>
							<a href="<?php echo site_url("drugcode_management"); ?>">Drug Codes</a>
						</li>
						<li>
							<a href="<?php echo site_url("dose_management"); ?>" class="regimens-view">Drug Doses</a>
						</li>
						<li>
							<a href="<?php echo site_url("indication_management"); ?>" class="regimens-view">Drug Indications</a>
						</li>
						<li>
							<a href="<?php echo site_url("drugsource_management"); ?>" class="regimens-view">Drug Sources</a>
						</li>
						<li>
							<a href="<?php echo site_url("drugdestination_management"); ?>" class="regimens-view">Drug Destinations</a>
						</li>
					</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" role="button" data-toggle="dropdown" id="dLabel" href="#">Download<b class="caret"></b></a>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
						<li>
							<a href="<?php echo site_url("client_management"); ?>" class="regimens-view">Client Sources</a>
						</li>
						<li>
							<a href="<?php echo site_url("client_support"); ?>" class="regimens-view">Supported By</a>
						</li>
						<li>
							<a href="<?php echo site_url("nonadherence_management"); ?>" class="regimens-view">Non Adherence reasons</a>
						</li>
					</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" role="button" data-toggle="dropdown" id="dLabel" href="#">Names<b class="caret"></b></a>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
						<li>
							<a href="<?php echo site_url("pipeline_management"); ?>" >Generic Names</a>
						</li>
						<li>
							<a href="<?php echo site_url("fcdrr_management"); ?>" >Brand Names</a>
						</li>
					</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" role="button" data-toggle="dropdown" id="dLabel" href="#">Facility<b class="caret"></b></a>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
						<li>
							<a href="<?php echo site_url("facility_management"); ?>" class="regimens-view">Facility Info</a>
						</li>
						<li>
							<a href="<?php echo site_url("auto_management"); ?>" class="regimens-view">Export Patient Master File</a>
						</li>
						<li>
							<a href="<?php echo site_url("upload_management"); ?>" class="regimens-view">Import</a>
						</li>
						<li>
							<a href="<?php echo site_url("user_management"); ?>" class="regimens-view">Users</a>
						</li>
					</ul>
				</li>

			</ul>

			<ul>

			</ul>
		</div>

	</div>

	<!-- Modal -->
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
				X
			</button>
			<h4 id="myModalLabel">Modal header</h4>
		</div>
		<div class="modal-body">
			<p>
				One fine body…
			</p>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">
				Close
			</button>
			<button class="btn btn-primary">
				Save changes
			</button>
		</div>
	</div>
</div>