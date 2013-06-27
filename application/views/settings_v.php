<script>
	$(document).ready(function() {
		$('.dropdown-toggle').click(function() {
			$('.dropdown-menu').dropdown();
		});
		
		//so which link was clicked?
			  $('.dropdown-menu li').on('click',function(){
			  	var linkDomain=" ";
				link_id='#'+$(this).find('a').attr('id');
				alert(linkSub=$(this).find('a').attr('class'));
				linkIdUrl=link_id.substr(link_id.indexOf('#')+1,(link_id.indexOf('_li')-1));
				//load url based on the class and id returned
				switch(linkSub){
					case "regimens":
					linkDomain='regimen_management';
					break;
					case "regimen-drugs":
					linkDomain='regimen_drug_management';
					break;
					case "regimen-change":
					linkDomain='regimenchange_management';
					break;
				}/*close the case*/
				if(linkDomain)
				alert(linkDomain)
				$(".settings").load('<?php echo base_url();?>'+linkDomain+'/'+linkIdUrl);
				
				})/*end of which link was clicked*/
	
		
		
		
	
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
							<a href="#" class="regimens" id="index">View Regimens</a>
						</li>
						<li>
							<a href="#" class="regimen-drugs" id="index">Regimen Drugs</a>
						</li>
						<li>
							<a href="#" class="regimen-change" id="index">Regimen change reasons</a>
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
							<a href="<?php echo site_url("dose_management"); ?>" class="">Drug Doses</a>
						</li>
						<li>
							<a href="<?php echo site_url("indication_management"); ?>" class="">Drug Indications</a>
						</li>
						<li>
							<a href="<?php echo site_url("drugsource_management"); ?>" class="">Drug Sources</a>
						</li>
						<li>
							<a href="<?php echo site_url("drugdestination_management"); ?>" class="">Drug Destinations</a>
						</li>
					</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" role="button" data-toggle="dropdown" id="dLabel" href="#">Download<b class="caret"></b></a>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
						<li>
							<a href="<?php echo site_url("client_management"); ?>" class="">Client Sources</a>
						</li>
						<li>
							<a href="<?php echo site_url("client_support"); ?>" class="">Supported By</a>
						</li>
						<li>
							<a href="<?php echo site_url("nonadherence_management"); ?>" class="">Non Adherence reasons</a>
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
							<a href="<?php echo site_url("facility_management"); ?>" class="">Facility Info</a>
						</li>
						<li>
							<a href="<?php echo site_url("auto_management"); ?>" class="">Export Patient Master File</a>
						</li>
						<li>
							<a href="<?php echo site_url("upload_management"); ?>" class="">Import</a>
						</li>
						<li>
							<a href="<?php echo site_url("user_management"); ?>" class="">Users</a>
						</li>
					</ul>
				</li>

			</ul>

			<ul>

			</ul>
		</div>

	</div>

	<div class="settings well"></div>
</div>