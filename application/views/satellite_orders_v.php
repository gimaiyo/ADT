
<style>
#proceed{
	width:120px;
	height:40px;
	text-align:center;
	vertical-align:middle;
	font-size:14px;
	font-weight:bold;
}
table#table_new_central_facility_report{
	width:100%;
	margin:0 auto;
}
#error_message{
	display: none;
}

</style>
<div class="center-content">
	<div >
		<ul class="breadcrumb">
		  <li><a href="<?php echo site_url().'order_management' ?>">Orders</a> <span class="divider">/</span></li>
		  <li><a href="<?php echo site_url().'order_management/new_central_order' ?>"><?php echo $page_title; ?></a> <span class="divider">/</span></li>
		  	<?php
		  	if(isset($page_title)){
		  		?>
		  		 <li class="active" id="actual_page"><?php echo $page_title_1;?> </li>
		  		<?php
		  	}
		  	?>
		 
		</ul>
	</div>
<div id="error_message" class="alert-bootstrap alert-error"></div>
<div class="alert-bootstrap alert-info">
   <b>List of satellite orders submitted for the period starting from <span class="_green"><?php echo date("d-M-Y",strtotime($period_start_date)) ?></span> to <span class="_green"><?php echo date("d-M-Y",strtotime($period_end_date)) ?></span>. Tick on the ones you would like to be aggregated then click proceed.</b>
</div>

<form method="post" action="<?php echo site_url('order_management/combine_orders')?>" id="frmSubmitAggregated">
<table class="table table-bordered table-striped dataTables" id="table_new_central_facility_report">
	<input type="hidden" name="start_date" value="<?php echo $period_start_date;?>" />
	<input type="hidden" name="end_date" value="<?php echo $period_end_date;?>" />
	<thead>
		<tr>
			<th>Order No</th>
			<th>Satellite Facility</th>
			<th>Period Begining</th>
			<th>Period Ending</th>
			<th>Check</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		foreach($satellite_orders as $order){?>
			<tr>
				<td><?php echo $order->id;?></td>
				<td><?php echo $order->Facility_Object->name;?></td>
				<td><?php echo $order->Period_Begin;?></td>
				<td><?php echo $order->Period_End;?></td>
				<td><input name="order[]" type="checkbox" value="<?php echo $order->id;?>"/></td>
				
			</tr>
		<?php }
		?> 
		
	</tbody>
	<tfoot>
		<tr>
			<td colspan="5" align="center">
				<input type="submit" value="Proceed" id="proceed" class="btn btn-large"/>
			</td>
		</tr>
	</tfoot>
</table>
</form>
</div>
<script>
	$(document).ready(function(){
		$('#frmSubmitAggregated').submit(function(){
		    if(!$('#frmSubmitAggregated input[type="checkbox"]').is(':checked')){
		    	$("#error_message").html("");
		    	$("#error_message").fadeIn(1000,function(){
		    		setTimeout(function() {
					     $("#error_message").fadeOut(700);
					}, 3000);
		    	});
		    	$("#error_message").append("Please select atleast one order before proceeding !");
		      return false;
		    }
		});
	});
</script>
 