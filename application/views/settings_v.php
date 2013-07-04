<script>
	
	$(document).ready(function() {
		setTimeout(function(){
			$(".message").fadeOut("2000");
		},6000);
		//What happens when editing/updating/disabling/enabling
		<?php
		if($this->session->userdata('link_id') and $this->session->userdata('linkSub')){
		?>
		$(".settings").css("display","none");
		$("#loadingDiv").css("display","block");
		link_id='#'+'<?php echo $this->session->userdata('link_id')?>';
		linkSub='<?php echo $this->session->userdata('linkSub')?>';
		linkIdUrl=link_id.substr(link_id.indexOf('#')+1,(link_id.indexOf('_li')-1));
		$(".settings").load('<?php echo base_url();?>'+linkSub+'/'+linkIdUrl,function(){
			$("#loadingDiv").css("display","none");
			$(".settings").css("display","block");
				if(linkSub=="regimen_drug_management"){
						$('#brand_name_table').dataTable({
		    			"sScrollY": "240px",
		    			"bLengthChange": false,
		                "bPaginate": false,
		                "bJQueryUI": true,
		            	"bDestroy":true})
		    	        .rowGrouping({
		                    bExpandableGrouping: true,
		                    bExpandSingleGroup: false,
		                    iExpandGroupOffset: -1,
		                    asExpandedGroups: [""],
		                    
		                });
		        GridRowCount();
				function GridRowCount() {
			        $('span.rowCount-grid').remove();
			        $('input.expandedOrCollapsedGroup').remove();
			
			        $('.dataTables_wrapper').find('[id|=group-id]').each(function () {
			            var rowCount = $(this).nextUntil('[id|=group-id]').length;
			            $(this).find('td').append($('<span />', { 'class': 'rowCount-grid' }).append($('<b />', { 'text': '('+rowCount+')' })));
			        });
			
			        $('.dataTables_wrapper').find('.dataTables_filter').append($('<input />', { 'type': 'button', 'class': 'expandedOrCollapsedGroup collapsed', 'value': 'Expanded All Group' }));
			
			        $('.expandedOrCollapsedGroup').live('click', function () {
			            if ($(this).hasClass('collapsed')) {
			                $(this).addClass('expanded').removeClass('collapsed').val('Collapse All Group').parents('.dataTables_wrapper').find('.collapsed-group').trigger('click');
			            }
			            else {
			                $(this).addClass('collapsed').removeClass('expanded').val('Expanded All Group').parents('.dataTables_wrapper').find('.expanded-group').trigger('click');
			            }
		        	});
		        };
				}
				else{
					oTable = $('.setting_table').dataTable({
						"sScrollY" : "240px",
						"bJQueryUI" : true,
						"sPaginationType" : "full_numbers",
						"bDestroy":true
					});
				}
				
		});
		<?php
		$this->session->unset_userdata('link_id');
		$this->session->unset_userdata('linkSub');
		}
		?>
		//What happens when editing/updating/disabling/enabling -- end
		
		$('.dropdown-toggle').click(function() {
			$('.setting_menus').dropdown();
		});
		
		//so which link was clicked?
			  $('.setting_menus li').on('click',function(){
			  	$(".settings").css("display","none");
			  	$("#loadingDiv").css("display","block");
			  	var linkDomain=" ";
				link_id='#'+$(this).find('a').attr('id');
				linkSub=$(this).find('a').attr('class');
				linkIdUrl=link_id.substr(link_id.indexOf('#')+1,(link_id.indexOf('_li')-1));
				
				$(".settings").load('<?php echo base_url();?>'+linkSub+'/'+linkIdUrl,function(){
					$("#loadingDiv").css("display","none");
					$(".settings").css("display","block");
						if(linkSub=="regimen_drug_management"){
								$('#brand_name_table').dataTable({
				    			"sScrollY": "240px",
				    			"bLengthChange": false,
				                "bPaginate": false,
				                "bJQueryUI": true,
				            	"bDestroy":true})
				    	.rowGrouping({
				                    bExpandableGrouping: true,
				                    bExpandSingleGroup: false,
				                    iExpandGroupOffset: -1,
				                    asExpandedGroups: [""],
				                    
				                });
				        GridRowCount();
						function GridRowCount() {
					        $('span.rowCount-grid').remove();
					        $('input.expandedOrCollapsedGroup').remove();
					
					        $('.dataTables_wrapper').find('[id|=group-id]').each(function () {
					            var rowCount = $(this).nextUntil('[id|=group-id]').length;
					            $(this).find('td').append($('<span />', { 'class': 'rowCount-grid' }).append($('<b />', { 'text': '('+rowCount+')' })));
					        });
					
					        $('.dataTables_wrapper').find('.dataTables_filter').append($('<input />', { 'type': 'button', 'class': 'expandedOrCollapsedGroup collapsed', 'value': 'Expanded All Group' }));
					
					        $('.expandedOrCollapsedGroup').live('click', function () {
					            if ($(this).hasClass('collapsed')) {
					                $(this).addClass('expanded').removeClass('collapsed').val('Collapse All Group').parents('.dataTables_wrapper').find('.collapsed-group').trigger('click');
					            }
					            else {
					                $(this).addClass('collapsed').removeClass('expanded').val('Expanded All Group').parents('.dataTables_wrapper').find('.expanded-group').trigger('click');
					            }
				        	});
				        };
						}
						else{
							oTable = $('.setting_table').dataTable({
								"sScrollY" : "240px",
								"bJQueryUI" : true,
								"sPaginationType" : "full_numbers",
								"bDestroy":true
							});
						}
						
				});
				
				
				
				})/*end of which link was clicked*/
	
		
		
		
	
	}); 
</script>

<div class="center-content">
	<?php
  	if($this->session->userdata("msg_success")){
  		?>
  		<span class="message success"><?php echo $this->session->userdata("msg_success")  ?></span>
  	<?php
  	$this->session->unset_userdata("msg_success");
	}
  		
  	elseif($this->session->userdata("msg_error")){
  		?>
  		<span class="message error"></span>
  	<?php
  	$this->session->unset_userdata("msg_error");
  	}
  	?>
	<div class="navbar">
		<div class="navbar-inner">
			<ul class="nav">
				<li class="dropdown">
					<a class="dropdown-toggle" role="button" data-toggle="dropdown" id="dLabel" href="#">Regimens<b class="caret"></b></a>
					<ul class="dropdown-menu setting_menus" role="menu" aria-labelledby="dLabel">
						<li>
							<a href="#" class="regimen_management" id="index">View Regimens</a>
						</li>
						<li>
							<a href="#" class="regimen_drug_management" id="index">Regimen Drugs</a>
						</li>
						<li>
							<a href="#" class="regimenchange_management" id="index">Regimen change reasons</a>
						</li>
					</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" role="button" data-toggle="dropdown" id="dLabel" href="#">Drugs<b class="caret"></b></a>
					<ul class="dropdown-menu setting_menus" role="menu" aria-labelledby="dLabel">
						<li>
							<a href="#" class="drugcode_management">Drug Codes</a>
						</li>
						<li>
							<a href="#" class="dose_management">Drug Doses</a>
						</li>
						<li>
							<a href="#" class="indication_management">Drug Indications</a>
						</li>
						<li>
							<a href="#" class="drugsource_management">Drug Sources</a>
						</li>
						<li>
							<a href="#" class="drugdestination_management">Drug Destinations</a>
						</li>
					</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" role="button" data-toggle="dropdown" id="dLabel" href="#">Download<b class="caret"></b></a>
					<ul class="dropdown-menu setting_menus" role="menu" aria-labelledby="dLabel">
						<li>
							<a href="#" class="client_management">Client Sources</a>
						</li>
						<li>
							<a href="#" class="client_support">Supported By</a>
						</li>
						<li>
							<a href="#" class="nonadherence_management">Non Adherence reasons</a>
						</li>
					</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" role="button" data-toggle="dropdown" id="dLabel" href="#">Names<b class="caret"></b></a>
					<ul class="dropdown-menu setting_menus" role="menu" aria-labelledby="dLabel">
						<li>
							<a href="#" class="genericname_management" >Generic Names</a>
						</li>
						<li>
							<a href="#" class="brandname_management">Brand Names</a>
						</li>
					</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" role="button" data-toggle="dropdown" id="dLabel" href="#">Facility<b class="caret"></b></a>
					<ul class="dropdown-menu setting_menus" role="menu" aria-labelledby="dLabel">
						<li>
							<a href="#" class="facility_management">Facility Info</a>
						</li>
						<li>
							<a href="#" class="auto_management">Export Patient Master File</a>
						</li>
						<li>
							<a href="#" class="upload_management">Import</a>
						</li>
						<li>
							<a href="#" class="user_management">Users</a>
						</li>
					</ul>
				</li>

			</ul>

			<ul>

			</ul>
		</div>
	</div>

	<div class="settings well"></div>
	<div id="loadingDiv" style="display: none"><img style="width: 30px" src="<?php echo base_url().'Images/loading_spin.gif' ?>"</div>
</div>