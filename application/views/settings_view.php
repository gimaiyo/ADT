<?php
if (!isset($quick_link)) {
	$quick_link = null;
}
?>
<script>
	$(document).ready(function(){
		$("#regimen_btn").click(function(){
			$("#regimens").toggle();
		})
		$("#drugs_btn").click(function(){
			$("#drugs").toggle();
		})
		$("#clients_btn").click(function(){
			$("#clients").toggle();
		})
		$("#facility_btn").click(function(){
			$("#facility").toggle();
		})
	})
</script>

<div class="container-fluid">

	<div class="span4 well" >
		<div class="btn-toolbar ">
			<div class="btn-group">
				<button id="regimen_btn"  class="btn dropdown-toggle btn-xlarge " data-toggle="dropdown" style="font-size:1.3em" >
					Regimens <span class="caret">
				</button>
				<ul id="regimens" class="dropdown-menu" style=" font-size:1em">
					<li>
						<a href="<?php echo site_url("regimen_management"); ?>" class="<?php
						if ($quick_link == "regimen") {echo "top_menu_active";
						}
					?>">View Regimens</a>
					</li>
					<li>
						<a href="<?php echo site_url("regimen_drug_management"); ?>" class="<?php
						if ($quick_link == "regimen_drug") {echo "top_menu_active";
						}
					?>">Regimen Drugs</a>
					</li>
					<li>
						<a href="<?php echo site_url("regimenchange_management"); ?>" class="<?php
						if ($quick_link == "regimen_change_reason") {echo "top_menu_active";
						}
					?>">Regimen change reasons</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="btn-toolbar ">
			<div class="btn-group">
				<button id="drugs_btn"  class="btn dropdown-toggle btn-xlarge " data-toggle="dropdown" style="font-size:1.3em" >
					Drugs <span class="caret">
				</button>
				<ul id="drugs" class="dropdown-menu" style="font-size:1em">
					<li>
						<a href="<?php echo site_url("drugcode_management"); ?>">Drug Codes</a>
					</li>
					<li>
						<a href="<?php echo site_url("dose_management"); ?>" class="<?php
						if ($quick_link == "dose") {echo "top_menu_active";
						}
					?>">Drug Doses</a>
					</li>
					<li>
						<a href="<?php echo site_url("indication_management"); ?>" class="<?php
						if ($quick_link == "indications") {echo "top_menu_active";
						}
					?>">Drug Indications</a>
					</li>
					<li>
						<a href="<?php echo site_url("drugsource_management"); ?>" class="<?php
						if ($quick_link == "drug_sources") {echo "top_menu_active";
						}
					?>">Drug Sources</a>
					</li>
					<li>
						<a href="<?php echo site_url("drugdestination_management"); ?>" class="<?php
						if ($quick_link == "drug_destination") {echo "top_menu_active";
						}
					?>">Drug Destinations</a>
					</li>
				</ul>
			</div>

		</div>

		<div class="btn-toolbar ">
			<div class="btn-group">
				<button id="clients_btn" class="btn dropdown-toggle btn-xlarge " data-toggle="dropdown" style="font-size:1.3em" >
					Clients <span class="caret">
				</button>
				<ul id="clients" class="dropdown-menu" style="font-size:1em">
					<li>
						<a href="<?php echo site_url("client_management"); ?>" class="<?php
						if ($quick_link == "client_sources") {echo "top_menu_active";
						}
					?>">Client Sources</a>
					</li>
					<li>
						<a href="<?php echo site_url("client_support"); ?>" class="<?php
						if ($quick_link == "client_supports") {echo "top_menu_active";
						}
					?>">Supported By</a>
					</li>
					<li>
						<a href="<?php echo site_url("nonadherence_management"); ?>" class="<?php
						if ($quick_link == "non_adherence_reason") {echo "top_menu_active";
						}
					?>">Non Adherence reasons</a>
					</li>
				</ul>
			</div>

		</div>

	</div>

	<div class="span4 well" style="margin-right:0px">
		<div class="btn-toolbar">
			<a href="<?php echo site_url('genericname_management'); ?>" class="<?php
			if ($quick_link == "generic") {echo "top_menu_active";
			}
		?>">
			<button class="btn btn-xlarge">
				Generic Names
			</button></a>
		</div>
		<div class="btn-toolbar">
			<a href="<?php echo site_url("brandname_management"); ?>" class="<?php
			if ($quick_link == "brand") {echo "top_menu_active";
			}
		?>">
			<button class="btn btn-xlarge">
				Brand Names
			</button></a>
		</div>
		<div class="btn-toolbar">
			<div class="btn-group">
				<button id="facility_btn" class="btn dropdown-toggle btn-xlarge " data-toggle="dropdown" style="font-size:1.3em" >
					Facility <span class="caret">
				</button>
				<ul id="facility" class="dropdown-menu" style="font-size:1em">
					<li>
						<a href="<?php echo site_url("facility_management"); ?>" class="<?php
						if ($quick_link == "facility_info") {echo "top_menu_active";
						}
					?>">Facility Info</a>
					</li>
					<li>
						<a href="<?php echo site_url("auto_management"); ?>" class="<?php
						if ($quick_link == "export") {echo "top_menu_active";
						}
					?>">Export Patient Master File</a>
					</li>
				</ul>
			</div>

		</div>
	</div>
</div>
