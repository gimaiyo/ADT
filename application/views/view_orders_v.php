

<table id="pending_orders" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th width="80px">Order No</th>
			<th >Facility Name</th>
			<th>Beginning Period</th>
			<th>Ending Period</th>
			<th>Days pending <span style="<?php if($days_pending=="Approval"){ ?> color:rgb(255, 167, 11);  <?php } elseif ($days_pending=="Dispatched") { ?> color:green; <?php } elseif ($days_pending=="Resubmission") { ?> color:red; <?php } elseif ($days_pending=="Delivery") { ?> color:rgb(1, 167, 146); <?php } ?>">(<?php echo $days_pending ?>)</span></th>
			<th width="80px">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		foreach($orders as $order){
			$period_begin=$order->Period_Begin;
			$period_end=$order->Period_End;
			$startTimeStamp = $order->Updated;
			$endTimeStamp = strtotime("now");
			
			$timeDiff = abs($endTimeStamp - $startTimeStamp);
			$numberDays = $timeDiff/86400;  // 86400 seconds in one day
			// and you might want to convert to integer
			$numberDays = intval($numberDays);
			?>
			<tr>
				<td><?php echo $order->id;?></td>
				<td><?php echo $order->Facility_Object->name;?></td>
				<td><?php echo date('d-M-Y',strtotime($period_begin));?></td>
				<td><?php echo date('d-M-Y',strtotime($period_end));?></td>
				<td align="center"><?php echo $numberDays; ?> Day (s)</td>
				<td style="text-align: center"><button class="btn btn-small btn-info"><a href="<?php echo base_url()."order_rationalization/rationalize_order/".$order->id;?>">View</a></button></td>
				
			</tr>
		<?php }
		?>
	</tbody>
</table>