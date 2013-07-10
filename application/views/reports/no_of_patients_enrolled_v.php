<div id="wrapperd">
			
	<div id="patient_enrolled_content" class="full-content">
		<?php $this->load->view("reports/reports_top_menus_v") ?>
		
		
		<h4 style="text-align: center">Listing of Patients enrolled in the period from <span class="green"><?php echo $from; ?></span> to <span class="green"><?php echo $to; ?></span></h4>
		<hr size="1" style="width:80%">
		<table align='center'  width='20%' style="font-size:16px; margin-bottom: 20px">
			<tr>
				<td colspan="2"><h5 class="report_title" style="text-align:center;font-size:14px;">Number of patients: <span id="whole_total"><?php echo $overall_total; ?></span></h5></td>
			</tr>
		</table>
		<table id="top_enrollments_panel" align="center">
			<tr class="category_title">
				<td colspan="2">Adults</td>
			</tr>
			<tr class="subcategory_title">
				<td>Male</td><td>Female</td>
			</tr></br>
			<tr>
				<td>
				<table class="male" width="100%"   cellpadding="1" style="border-collapse:collapse;">
					<tr>
						<th>Source</th>
						<th>ART</th>
						<th>PEP</th>
						<th>OI</th>
						<th>Total</th>
					</tr>
					<tr>
						<td><b>Outpatient</b></td>
						<td align='center' id="adult_male_art_outpatient"><?php echo $adult_male_art_outpatient;?></td>
						<td align='center' id="adult_male_pep_outpatient"><?php echo $adult_male_pep_outpatient;?></td>
						<td align='center' id="adult_male_oi_outpatient"><?php echo $adult_male_oi_outpatient;?></td>
						<td align='center' id="adult_male_outpatient_total"><?php echo $total_adult_male_outpatient;?></td>
					</tr>
					<tr>
						<td><b>Inpatient</b></td>
						<td align='center' id="adult_male_art_inpatient"><?php echo $adult_male_art_inpatient;?></td>
						<td  align='center' id="adult_male_pep_inpatient"><?php echo $adult_male_pep_inpatient;?></td>
						<td align='center' id="adult_male_oi_inpatient"><?php echo $adult_male_oi_inpatient;?></td>
						<td align='center' id="adult_male_inpatient_total"><?php echo $total_adult_male_inpatient;?></td>
					</tr>
					<tr>
						<td><b>Transfer In</b></td>
						<td  align='center' id="adult_male_art_transferin"><?php echo $adult_male_art_transferin;?></td>
						<td  align='center' id="adult_male_pep_transferin"><?php echo $adult_male_pep_transferin;?></td>
						<td  align='center' id="adult_male_oi_transferin"><?php echo $adult_male_oi_transferin;?></td>
						<td align='center' id="adult_male_transferin_total"><?php echo $total_adult_male_transferin;?></td>
					</tr>
					<tr>
						<td><b>Casualty</b></td>
						<td align='center' id="adult_male_art_casualty"><?php echo $adult_male_art_casualty;?></td>
						<td align='center'  id="adult_male_pep_casualty"><?php echo $adult_male_pep_casualty;?></td>
						<td  align='center' id="adult_male_oi_casualty"><?php echo $adult_male_oi_casualty;?></td>
						<td align='center' id="adult_male_casualty_total"><?php echo $total_adult_male_casualty;?></td>
					</tr>
					<tr>
						<td><b>Transit</b></td>
						<td align='center' id="adult_male_art_transit"><?php echo $adult_male_art_transit;?></td>
						<td align='center' id="adult_male_pep_transit"><?php echo $adult_male_pep_transit;?></td>
						<td align='center' id="adult_male_oi_transit"><?php echo $adult_male_oi_transit;?></td>
						<td align='center' id="adult_male_transit_total"><?php echo $total_adult_male_transit;?></td>
					</tr>
					<tr>
						<td><b>HTC</b></td>
						<td align='center' id="adult_male_art_htc"><?php echo $adult_male_art_htc;?></td>
						<td align='center' id="adult_male_pep_htc"><?php echo $adult_male_pep_htc;?></td>
						<td align='center' id="adult_male_oi_htc"><?php echo $adult_male_oi_htc;?></td>
						<td align='center' id="adult_male_htc_total"><?php echo $total_adult_male_htc;?></td>
					</tr>
					<tr>
						<td><b>Other</b></td>
						<td align='center' id="adult_male_art_other"><?php echo $adult_male_art_other;?></td>
						<td align='center' id="adult_male_pep_other"><?php echo $adult_male_pep_other;?></td>
						<td align='center' id="adult_male_oi_other"><?php echo $adult_male_oi_other;?></td>
						<td align='center' id="adult_male_other_total"><?php echo $total_adult_male_other;?></td>
					</tr>
					<tr style="background:#DDD;">
						<td><b>Overall Total</b></td>
						<td align='center' id="overall_adult_male_art_total"><?php echo $total_adult_male_art;?></td>
						<td align='center' id="overall_adult_male_pep_total"><?php echo $total_adult_male_pep;?></td>
						<td align='center' id="overall_adult_male_oi_total"><?php echo $total_adult_male_oi;?></td>
						<td align='center' id="overall_adult_male_total"><?php echo $overall_line_adult_male;?></td>
					</tr>
				</table></td>
				<td>
				<table class="female" width="100%"   cellpadding="1" style="border-collapse:collapse;">
					<tr>
						<th>Source</th>
						<th>ART</th>
						<th>PEP</th>
						<th>PMTCT</th>
						<th>OI</th>
						<th>Total</th>
					</tr>
					<tr>
						<td><b>Outpatient</b></td>
						<td align='center' id="adult_female_art_outpatient"><?php echo $adult_female_art_outpatient;?></td>
						<td align='center' id="adult_female_pep_outpatient"><?php echo $adult_female_pep_outpatient;?></td>
						<td align='center' id="adult_female_pmtct_outpatient"><?php echo $adult_female_pmtct_outpatient;?></td>
						<td align='center' id="adult_female_oi_outpatient"><?php echo $adult_female_oi_outpatient;?></td>
						<td align='center' id="adult_female_outpatient_total"><?php echo $total_adult_female_outpatient;?></td>
					</tr>
					<tr>
						<td><b>Inpatient</b></td>
						<td align='center' id="adult_female_art_inpatient"><?php echo $adult_female_art_inpatient;?></td>
						<td  align='center' id="adult_female_pep_inpatient"><?php echo $adult_male_pep_inpatient;?></td>
						<td align='center' id="adult_female_pmtct_inpatient"><?php echo $adult_female_pmtct_inpatient;?></td>
						<td align='center' id="adult_female_oi_inpatient"><?php echo $adult_male_oi_inpatient;?></td>
						<td align='center' id="adult_female_inpatient_total"><?php echo $total_adult_female_inpatient;?></td>
					</tr>
					<tr>
						<td><b>Transfer In</b></td>
						<td  align='center' id="adult_female_art_transferin"><?php echo $adult_female_art_transferin;?></td>
						<td  align='center' id="adult_female_pep_transferin"><?php echo $adult_female_pep_transferin;?></td>
						<td align='center' id="adult_female_pmtct_transferin"><?php echo $adult_female_pmtct_transferin;?></td>
						<td  align='center' id="adult_female_oi_transferin"><?php echo $adult_female_pep_transferin;?></td>
						<td align='center' id="adult_female_transitin_total"><?php echo $total_adult_female_transferin;?></td>
					</tr>
					<tr>
						<td><b>Casualty</b></td>
						<td align='center' id="adult_female_art_casualty"><?php echo $adult_female_art_casualty;?></td>
						<td align='center'  id="adult_female_pep_casualty"><?php echo $adult_female_pep_casualty;?></td>
						<td align='center'  id="adult_female_pmtct_casualty"><?php echo $adult_female_pmtct_casualty;?></td>
						<td  align='center' id="adult_female_oi_casualty"><?php echo $adult_female_oi_casualty;?></td>
						<td align='center' id="adult_female_casualty_total"><?php echo $total_adult_female_casualty;?></td>
					</tr>
					<tr>
						<td><b>Transit</b></td>
						<td align='center' id="adult_female_art_transit"><?php echo $adult_female_art_transit;?></td>
						<td align='center' id="adult_female_pep_transit"><?php echo $adult_female_pep_transit;?></td>
						<td align='center'  id="adult_female_pmtct_transit"><?php echo $adult_female_pmtct_transit;?></td>
						<td align='center' id="adult_female_oi_transit"><?php echo $adult_female_oi_transit;?></td>
						<td align='center' id="adult_female_transit_total"><?php echo $total_adult_female_transit;?></td>
					</tr>
					<tr>
						<td><b>HTC</b></td>
						<td align='center' id="adult_female_art_htc"><?php echo $adult_female_art_htc;?></td>
						<td align='center' id="adult_female_pep_htc"><?php echo $adult_female_pep_htc;?></td>
						<td align='center' id="adult_female_pmtct_htc"><?php echo $adult_female_pmtct_htc;?></td>
						<td align='center' id="adult_female_oi_htc"><?php echo $adult_female_oi_htc;?></td>
						<td align='center' id="adult_female_htc_total"><?php echo $total_adult_female_htc;?></td>
					</tr>
					<tr>
						<td><b>Other</b></td>
						<td align='center' id="adult_female_art_other"><?php echo $adult_female_art_other;?></td>
						<td align='center' id="adult_female_pep_other"><?php echo $adult_female_pep_other;?></td>
						<td align='center' id="adult_female_pmtct_other"><?php echo $adult_female_pmtct_other;?></td>
						<td align='center' id="adult_female_oi_other"><?php echo $adult_female_oi_other;?></td>
						<td align='center' id="adult_female_other_total"><?php echo $total_adult_female_other;?></td>
					</tr>
					<tr style="background:#DDD;">
						<td><b>Overall Total</b></td>
						<td align='center' id="overall_adult_female_art_total"><?php echo $total_adult_female_art;?></td>
						<td align='center' id="overall_adult_female_pep_total"><?php echo $total_adult_female_pep;?></td>
						<td align='center' id="overall_adult_female_pep_total"><?php echo $total_adult_female_pmtct;?></td>
						<td align='center' id="overall_adult_female_oi_total"><?php echo $total_adult_female_oi;?></td>
						<td align='center' id="overall_adult_female_total"><?php echo $overall_line_adult_female;?></td>
					</tr>
				</table></td>
			</tr>
			<tr class="category_title">
				<td colspan="2">Children</td>
			</tr>
			<tr class="subcategory_title">
				<td>Male</td><td>Female</td>
			</tr></br>
			<tr>
				<td>
				<table class="male" width="100%"   cellpadding="1" style="border-collapse:collapse;">
					<tr>
						<th>Source</th>
						<th>ART</th>
						<th>PEP</th>
						<th>PMTCT</th>
						<th>OI</th>
						<th>Total</th>
					</tr>
					<tr>
						<td><b>Outpatient</b></td>
						<td align='center' id="child_male_art_outpatient"><?php echo $child_male_art_outpatient;?></td>
						<td align='center' id="child_male_pep_outpatient"><?php echo $child_male_pep_outpatient; ?></td>
						<td align='center' id="child_male_pmtct_outpatient"><?php echo $child_male_pmtct_outpatient; ?></td>
						<td align='center' id="child_male_oi_outpatient"><?php echo $child_male_oi_outpatient; ?></td>
						<td align='center' id="child_male_outpatient_total"><?php echo $total_child_male_outpatient;?></td>
					</tr>
					<tr>
						<td><b>Inpatient</b></td>
						<td align='center' id="child_male_art_inpatient"><?php echo $child_male_art_inpatient;?></td>
						<td  align='center' id="child_male_pep_inpatient"><?php echo $child_male_pep_inpatient;?></td>
						<td align='center' id="child_male_pmtct_inpatient"><?php echo $child_male_pmtct_inpatient;?></td>
						<td align='center' id="child_male_oi_inpatient"><?php echo $child_male_oi_inpatient;?></td>
						<td align='center' id="child_male_inpatient_total"><?php echo $total_child_male_inpatient;?></td>
					</tr>
					<tr>
						<td><b>Transfer In</b></td>
						<td  align='center' id="child_male_art_transferin"><?php echo $child_male_art_transferin;?></td>
						<td  align='center' id="child_male_pep_transferin"><?php echo $child_male_pep_transferin;?></td>
						<td align='center' id="child_male_pmtct_transferin"><?php echo $child_male_pmtct_transferin;?></td>
						<td  align='center' id="child_male_oi_transferin"><?php echo $child_male_oi_transferin;?></td>
						<td align='center' id="child_male_transitin_total"><?php echo $total_child_male_transferin;?></td>
					</tr>
					<tr>
						<td><b>Casualty</b></td>
						<td align='center' id="child_male_art_casualty"><?php echo $child_male_art_casualty;?></td>
						<td align='center'  id="child_male_pep_casualty"><?php echo $child_male_pep_casualty;?></td>
						<td align='center' id="child_male_pmtct_casualty"><?php echo $child_male_pmtct_casualty;?></td>
						<td  align='center' id="child_male_oi_casualty"><?php echo $child_male_oi_casualty;?></td>
						<td align='center' id="child_male_casualty_total"><?php echo $total_child_male_casualty;?></td>
					</tr>
					<tr>
						<td><b>Transit</b></td>
						<td align='center' id="child_male_art_transit"><?php echo $child_male_art_transit;?></td>
						<td align='center' id="child_male_pep_transit"><?php echo $child_male_pep_transit;?></td>
						<td align='center' id="child_male_pmtct_transit"><?php echo $child_male_pmtct_transit;?></td>
						<td align='center' id="child_male_oi_transit"><?php echo $child_male_oi_transit;?></td>
						<td align='center' id="child_male_transit_total"><?php echo $total_child_male_transit;?></td>
					</tr>
					<tr>
						<td><b>HTC</b></td>
						<td align='center' id="child_male_art_htc"><?php echo $child_male_art_htc;?></td>
						<td align='center' id="child_male_pep_htc"><?php echo $child_male_pep_htc;?></td>
						<td align='center' id="child_male_pmtct_htc"><?php echo $child_male_pmtct_htc;?></td>
						<td align='center' id="child_male_oi_htc"><?php echo $child_male_oi_htc;?></td>
						<td align='center' id="child_male_htc_total"><?php echo $total_child_male_htc;?></td>
					</tr>
					<tr>
						<td><b>Other</b></td>
						<td align='center' id="child_male_art_other"><?php echo $child_male_art_other;?></td>
						<td align='center' id="child_male_pep_other"><?php echo $child_male_pep_other;?></td>
						<td align='center' id="child_male_pmtct_other"><?php echo $child_male_pmtct_other;?></td>
						<td align='center' id="child_male_oi_other"><?php echo $child_male_oi_other;?></td>
						<td align='center' id="child_male_other_total"><?php echo $total_child_male_other;?></td>
					</tr>
					<tr style="background:#DDD;">
						<td><b>Overall Total</b></td>
						<td align='center' id="overall_child_male_art_total"><?php echo $total_child_male_art;?></td>
						<td align='center' id="overall_child_male_pep_total"><?php echo $total_child_male_pep;?></td>
						<td align='center' id="overall_child_male_pmtct_total"><?php echo $total_child_male_pmtct;?></td>
						<td align='center' id="overall_child_male_oi_total"><?php echo $total_child_male_oi;?></td>
						<td align='center' id="overall_child_male_total"><?php echo $overall_line_child_male;?></td>
					</tr>
				</table></td>
				<td>
				<table class="female" width="100%"   cellpadding="1" style="border-collapse:collapse;">
					<tr>
						<th>Source</th>
						<th>ART</th>
						<th>PEP</th>
						<th>PMTCT</th>
						<th>OI</th>
						<th>Total</th>
					</tr>
					<tr>
						<td><b>Outpatient</b></td>
						<td align='center' id="child_female_art_outpatient"><?php echo $child_female_art_outpatient;?></td>
						<td align='center' id="child_female_pep_outpatient"><?php echo $child_female_pep_outpatient;?></td>
						<td align='center' id="child_female_pmtct_outpatient"><?php echo $child_female_pmtct_outpatient;?></td>
						<td align='center' id="child_female_oi_outpatient"><?php echo $child_female_oi_outpatient;?></td>
						<td align='center' id="child_female_outpatient_total"><?php echo $total_child_female_outpatient;?></td>
					</tr>
					<tr>
						<td><b>Inpatient</b></td>
						<td align='center' id="child_female_art_inpatient"><?php echo $child_female_art_inpatient;?></td>
						<td  align='center' id="child_female_pep_inpatient"><?php echo $child_female_pep_inpatient;?></td>
						<td align='center' id="child_female_pmtct_inpatient"><?php echo $child_female_pmtct_inpatient;?></td>
						<td align='center' id="child_female_oi_inpatient"><?php echo $child_female_oi_inpatient;?></td>
						<td align='center' id="child_female_inpatient_total"><?php echo $total_child_female_inpatient;?></td>
					</tr>
					<tr>
						<td><b>Transfer In</b></td>
						<td  align='center' id="child_female_art_transferin"><?php echo $child_female_art_transferin;?></td>
						<td  align='center' id="child_female_pep_transferin"><?php echo $child_female_pep_transferin;?></td>
						<td align='center' id="child_female_pmtct_transferin"><?php echo $child_female_pmtct_transferin;?></td>
						<td  align='center' id="child_female_oi_transferin"><?php echo $child_female_oi_transferin;?></td>
						<td align='center' id="child_female_transitin_total"><?php echo $total_child_female_transferin;?></td>
					</tr>
					<tr>
						<td><b>Casualty</b></td>
						<td align='center' id="child_female_art_casualty"><?php echo $child_female_art_casualty;?></td>
						<td align='center'  id="child_female_pep_casualty"><?php echo $child_female_pep_casualty;?></td>
						<td align='center' id="child_female_pmtct_casualty"><?php echo $child_female_pmtct_casualty;?></td>
						<td  align='center' id="child_female_oi_casualty"><?php echo $child_female_oi_casualty;?></td>
						<td align='center' id="child_female_casualty_total"><?php echo $total_child_female_transferin;?></td>
					</tr>
					<tr>
						<td><b>Transit</b></td>
						<td align='center' id="child_female_art_transit"><?php echo $child_female_art_transit;?></td>
						<td align='center' id="child_female_pep_transit"><?php echo $child_female_pep_transit;?></td>
						<td align='center' id="child_female_pmtct_transit"><?php echo $child_female_pmtct_transit;?></td>
						<td align='center' id="child_female_oi_transit"><?php echo $child_female_oi_transit;?></td>
						<td align='center' id="child_female_transit_total"><?php echo $total_child_female_transit;?></td>
					</tr>
					<tr>
						<td><b>HTC</b></td>
						<td align='center' id="child_female_art_htc"><?php echo $child_female_art_htc;?></td>
						<td align='center' id="child_female_pep_htc"><?php echo $child_female_pep_htc;?></td>
						<td align='center' id="child_female_pmtct_htc"><?php echo $child_female_pmtct_htc;?></td>
						<td align='center' id="child_female_oi_htc"><?php echo $child_female_oi_htc;?></td>
						<td align='center' id="child_female_htc_total"><?php echo $total_child_female_htc;?></td>
					</tr>
					<tr>
						<td><b>Other</b></td>
						<td align='center' id="child_female_art_other"><?php echo $child_female_art_other;?></td>
						<td align='center' id="child_female_pep_other"><?php echo $child_female_pep_other;?></td>
						<td align='center' id="child_female_pmtct_other"><?php echo $child_female_pmtct_other;?></td>
						<td align='center' id="child_female_oi_other"><?php echo $child_female_oi_other;?></td>
						<td align='center' id="child_female_other_total"><?php echo $total_child_female_other;?></td>
					</tr>
					<tr style="background:#DDD;">
						<td><b>Overall Total</b></td>
						<td align='center' id="overall_child_female_art_total"><?php echo $total_child_female_art;?></td>
						<td align='center' id="overall_child_female_pep_total"><?php echo $total_child_female_pep;?></td>
						<td align='center' id="overall_child_female_pmtct_total"><?php echo $total_child_female_pmtct;?></td>
						<td align='center' id="overall_child_female_oi_total"><?php echo $total_child_female_oi;?></td>
						<td align='center' id="overall_child_female_total"><?php echo $overall_line_child_female;?></td>
					</tr>
				</table></td>
			</tr>
		</table>
	</div>
</div>



<!-- Pop up Window -->
		<div class="result"></div>
		<!-- Pop up Window end-->
		