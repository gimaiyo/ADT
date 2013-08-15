<?php
class Inventory_Management extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function index() {
		$this -> listing();
	} 
	
	public function listing($stock_type=1){
		
		$data['active']="";
		//Make pharmacy inventory active
		if($stock_type==2){
			$data['active']='pharmacy_btn';
		}
		//Make store inventory active
		else{
			$data['active']='store_btn';
		}
		$data['content_view'] = "inventory_listing_v";
		$this -> base_params($data);
	}
	
	public function main_store_stock(){
		$facility_code = $this -> session -> userdata('facility');
		$data = array();
		/* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
		$aColumns = array('drug','unit','pack_size');
		
		$iDisplayStart = $this->input->get_post('iDisplayStart', true);
        $iDisplayLength = $this->input->get_post('iDisplayLength', true);
        $iSortCol_0 = $this->input->get_post('iSortCol_0', true);
        $iSortingCols = $this->input->get_post('iSortingCols', true);
        $sSearch = $this->input->get_post('sSearch', true);
        $sEcho = $this->input->get_post('sEcho', true);
		
		// Paging
        if(isset($iDisplayStart) && $iDisplayLength != '-1')
        {
            $this->db->limit($this->db->escape_str($iDisplayLength), $this->db->escape_str($iDisplayStart));
        }
		
		 // Ordering
        if(isset($iSortCol_0))
        {
            for($i=0; $i<intval($iSortingCols); $i++)
            {
                $iSortCol = $this->input->get_post('iSortCol_'.$i, true);
                $bSortable = $this->input->get_post('bSortable_'.intval($iSortCol), true);
                $sSortDir = $this->input->get_post('sSortDir_'.$i, true);
    
                if($bSortable == 'true')
                {
                    $this->db->order_by($aColumns[intval($this->db->escape_str($iSortCol))], $this->db->escape_str($sSortDir));
                }
            }
        }
		
		/* 
         * Filtering
         * NOTE this does not match the built-in DataTables filtering which does it
         * word by word on any field. It's possible to do here, but concerned about efficiency
         * on very large tables, and MySQL's regex functionality is very limited
         */
        if(isset($sSearch) && !empty($sSearch))
        {
            for($i=0; $i<count($aColumns); $i++)
            {
                $bSearchable = $this->input->get_post('bSearchable_'.$i, true);
                
                // Individual column filtering
                if(isset($bSearchable) && $bSearchable == 'true')
                {
                    $this->db->or_like($aColumns[$i], $this->db->escape_like_str($sSearch));
                }
            }
        }
		
		 // Select Data
        $this->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $aColumns)), false);
		$this->db->select("dc.id,SUM(dsb.balance) as stock_level,g.Name as generic_name,s.Name as supported_by,d.Name as dose");
		$today = date('Y-m-d'); 
        $this->db->from("drugcode dc");
		$this->db->where('dc.enabled','1');
		$this->db->where('dsb.facility_code',$facility_code);
		$this->db->where('dsb.expiry_date > ',$today);
		$this->db->where('dsb.stock_type ','1');
		$this->db->join("generic_name g","g.id=dc.generic_name");
		$this->db->join("drug_stock_balance dsb","dsb.drug_id=dc.id");
		$this->db->join("supporter s","s.id=dc.supported_by");
		$this->db->join("dose d","d.id=dc.dose");
		$this->db->group_by("dsb.drug_id"); 
		
		$rResult = $this->db->get();
		
		// Data set length after filtering
        $this->db->select('FOUND_ROWS() AS found_rows');
        $iFilteredTotal = $this->db->get()->row()->found_rows;
		
		// Total data set length
        $this->db->select("dsb.*");
		$where ="dc.enabled='1' AND dsb.facility='$facility_code' AND dsb.expiry_date > CURDATE() AND dsb.stock_type='1'";
		$this->db->from("drugcode dc");
		$this->db->where('dc.enabled','1');
		$this->db->where('dsb.facility_code',$facility_code);
		$this->db->where('dsb.expiry_date > ',$today);
		$this->db->where('dsb.stock_type ','1');
		$this->db->join("generic_name g","g.id=dc.generic_name");
		$this->db->join("drug_stock_balance dsb","dsb.drug_id=dc.id");
		$this->db->join("supporter s","s.id=dc.supported_by");
		$this->db->join("dose d","d.id=dc.dose");
		$this->db->group_by("dsb.drug_id"); 
		$tot_drugs=$this->db->get();
		$iTotal = count($tot_drugs->result_array());
		
		// Output
        $output = array(
            'sEcho' => intval($sEcho),
            'iTotalRecords' => $iTotal,
            'iTotalDisplayRecords' => $iFilteredTotal,
            'aaData' => array()
        );
		
		 foreach($rResult->result_array() as $aRow)
        {
        	$row = array();
			$x=0;
			foreach($aColumns as $col)
            {
            	$x++;
            	$row[] = strtoupper($aRow[$col]);
            	//Append Generic name
            	if($x==1){
            		$row[]=strtoupper($aRow['generic_name']);
					$row[]='<b style="color:green">'.number_format($aRow['stock_level']).'</b>';
            	}
				else if($x==3){
					$row[]=$aRow['supported_by'];
					$row[]=$aRow['dose'];
					$id=$aRow['id'];
					$row[]="<a href='".base_url()."inventory_management/view_bin_card/".$id."/1'>View Bin Card</a>";
				}
            	
			}
			$output['aaData'][] = $row;
		}
		echo json_encode($output);
		
	}

	public function pharmacy_store_stock(){
		$facility_code = $this -> session -> userdata('facility');
		$data = array();
		/* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
		$aColumns = array('drug','unit','pack_size');
		
		$iDisplayStart = $this->input->get_post('iDisplayStart', true);
        $iDisplayLength = $this->input->get_post('iDisplayLength', true);
        $iSortCol_0 = $this->input->get_post('iSortCol_0', true);
        $iSortingCols = $this->input->get_post('iSortingCols', true);
        $sSearch = $this->input->get_post('sSearch', true);
        $sEcho = $this->input->get_post('sEcho', true);
		
		// Paging
        if(isset($iDisplayStart) && $iDisplayLength != '-1')
        {
            $this->db->limit($this->db->escape_str($iDisplayLength), $this->db->escape_str($iDisplayStart));
        }
		
		 // Ordering
        if(isset($iSortCol_0))
        {
            for($i=0; $i<intval($iSortingCols); $i++)
            {
                $iSortCol = $this->input->get_post('iSortCol_'.$i, true);
                $bSortable = $this->input->get_post('bSortable_'.intval($iSortCol), true);
                $sSortDir = $this->input->get_post('sSortDir_'.$i, true);
    
                if($bSortable == 'true')
                {
                    $this->db->order_by($aColumns[intval($this->db->escape_str($iSortCol))], $this->db->escape_str($sSortDir));
                }
            }
        }
		
		/* 
         * Filtering
         * NOTE this does not match the built-in DataTables filtering which does it
         * word by word on any field. It's possible to do here, but concerned about efficiency
         * on very large tables, and MySQL's regex functionality is very limited
         */
        if(isset($sSearch) && !empty($sSearch))
        {
            for($i=0; $i<count($aColumns); $i++)
            {
                $bSearchable = $this->input->get_post('bSearchable_'.$i, true);
                
                // Individual column filtering
                if(isset($bSearchable) && $bSearchable == 'true')
                {
                    $this->db->or_like($aColumns[$i], $this->db->escape_like_str($sSearch));
                }
            }
        }
		
		 // Select Data
        $this->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $aColumns)), false);
		$this->db->select("dc.id,SUM(dsb.balance) as stock_level,g.Name as generic_name,s.Name as supported_by,d.Name as dose");
		$today = date('Y-m-d'); 
        $this->db->from("drugcode dc");
		$this->db->where('dc.enabled','1');
		$this->db->where('dsb.facility_code',$facility_code);
		$this->db->where('dsb.expiry_date > ',$today);
		$this->db->where('dsb.stock_type ','2');
		$this->db->join("generic_name g","g.id=dc.generic_name");
		$this->db->join("drug_stock_balance dsb","dsb.drug_id=dc.id");
		$this->db->join("supporter s","s.id=dc.supported_by");
		$this->db->join("dose d","d.id=dc.dose");
		$this->db->group_by("dsb.drug_id"); 
		
		$rResult = $this->db->get();
		
		// Data set length after filtering
        $this->db->select('FOUND_ROWS() AS found_rows');
        $iFilteredTotal = $this->db->get()->row()->found_rows;
		
		// Total data set length
        $this->db->select("dsb.*");
		$where ="dc.enabled='1' AND dsb.facility='$facility_code' AND dsb.expiry_date > CURDATE() AND dsb.stock_type='1'";
		$this->db->from("drugcode dc");
		$this->db->where('dc.enabled','1');
		$this->db->where('dsb.facility_code',$facility_code);
		$this->db->where('dsb.expiry_date > ',$today);
		$this->db->where('dsb.stock_type ','2');
		$this->db->join("generic_name g","g.id=dc.generic_name");
		$this->db->join("drug_stock_balance dsb","dsb.drug_id=dc.id");
		$this->db->join("supporter s","s.id=dc.supported_by");
		$this->db->join("dose d","d.id=dc.dose");
		$this->db->group_by("dsb.drug_id"); 
		$tot_drugs=$this->db->get();
		$iTotal = count($tot_drugs->result_array());
		
		// Output
        $output = array(
            'sEcho' => intval($sEcho),
            'iTotalRecords' => $iTotal,
            'iTotalDisplayRecords' => $iFilteredTotal,
            'aaData' => array()
        );
		
		 foreach($rResult->result_array() as $aRow)
        {
        	$row = array();
			$x=0;
			foreach($aColumns as $col)
            {
            	$x++;
            	$row[] = strtoupper($aRow[$col]);
            	//Append Generic name
            	if($x==1){
            		$row[]=strtoupper($aRow['generic_name']);
					$row[]='<b style="color:green">'.number_format($aRow['stock_level']).'</b>';
            	}
				else if($x==3){
					$row[]=$aRow['supported_by'];
					$row[]=$aRow['dose'];
					$id=$aRow['id'];
					$row[]="<a href='".base_url()."inventory_management/view_bin_card/".$id."/2'>View Bin Card</a>";
				}
            	
			}
			$output['aaData'][] = $row;
		}
		echo json_encode($output);
	}

	public function view_bin_card($drug_id,$stock_type=1){
		$store="";
		if($stock_type==1){
			$data['store']="Main Store";
			$data['previous']='inventory_management/1';
			$this->session->set_userdata("inventory_go_back","store_table");
			
		}
		else if($stock_type==2){
			$data['store']="Pharmacy";
			$data['previous']='inventory_management/2';
			$this->session->set_userdata("inventory_go_back","pharmacy_table");
		}
		
		$today = date('Y-m-d');
		$facility_code = $this -> session -> userdata('facility');
		$results=Drug_Stock_Movement::getDrugTransactions($drug_id,$facility_code,$stock_type);
		
		$query=$this->db->query("SELECT d.drug,d.unit,d.pack_size,dsb.batch_number,dsb.expiry_date,dsb.stock_type,dsb.balance FROM drug_stock_balance dsb LEFT JOIN drugcode d ON d.id=dsb.drug_id WHERE dsb.drug_id='$drug_id'  AND dsb.expiry_date > '$today' AND dsb.balance > 0   AND dsb.facility_code='$facility_code' AND dsb.stock_type='$stock_type' order by dsb.expiry_date asc");
		$stock_bactchinfo_array=$query->result_array();
		$stock_level=0;
		foreach ($stock_bactchinfo_array as $total) {
			$stock_level+=$total['balance'];
		}
		$data['stock_type']=$stock_type;
		$data['stock_level']=number_format($stock_level);
		
		$data['drug_name']="";
		foreach ($stock_bactchinfo_array as $value) {
			$data['drug_name']=$value['drug'];
			$drug_unit_array=Drug_Unit::getUnit($value['unit']);
			
			foreach ($drug_unit_array as $row) {
				$data['drug_unit']=$row['Name'];
			}
			
		}
		
		$data['batch_info']=$stock_bactchinfo_array;
		$data['drug_transactions']=$results;
		
		$consumption=Drug_Stock_Movement::getDrugMonthlyConsumption($drug_id,$facility_code,$stock_type);
		
		
		$three_months_consumption = 0;
		$drug_name="";
		
		foreach ($consumption as $value) {
			$three_months_consumption+=$value['total_out'];
			
		}
		$maximum_consumption=number_format($three_months_consumption);
		$monthly_consumption =($three_months_consumption) / 3 ;
		$minimum_consumption = number_format(($monthly_consumption) * 1.5);
		$monthly_consumption=number_format($monthly_consumption);
		
		$data['maximum_consumption']=$maximum_consumption;
		$data['avg_consumption']=$monthly_consumption;
		$data['minimum_consumption']=$minimum_consumption;
		
		$data['content_view']='bin_card_v';
		//Hide side menus
		$data['hide_side_menu']='1';
		$this->base_params($data);
		
		
	}

	public function stock_transaction($stock_type=1){
		$data['hide_side_menu']=1;
		$facility_code = $this -> session -> userdata('facility');
		$user_id = $this -> session -> userdata('user_id');
		$transaction_type=Transaction_Type::getAll();
		$drug_source=Drug_Source::getAll();
		$drug_destination=Drug_Destination::getAll();
		$satelittes=facilities::getSatellites($facility_code);
		$data['satelittes']=$satelittes;
		$data['user_id']=$user_id;
		$data['facility']=$facility_code;
		$data['stock_type']=$stock_type;
		$data['transaction_types']=$transaction_type;
		$data['drug_sources']=$drug_source;
		$data['drug_destinations']=$drug_destination;
		if($stock_type==1){
			$data['store']='Main Store Transaction';
		}
		else if($stock_type==2){
			$data['store']='Pharmacy Transaction';
		}
		$data['content_view'] = "stock_transaction_v";
		$this -> base_params($data);
		
	}
	
	public function getStockDrugs(){
		$stock_type=$this->input ->post("stock_type");
		$facility_code = $this -> session -> userdata('facility');
		$drugs_sql=$this->db->query("SELECT DISTINCT(d.id),d.drug FROM drugcode d LEFT JOIN drug_stock_balance dsb on dsb.drug_id=d.id WHERE dsb.facility_code='$facility_code' AND dsb.stock_type='$stock_type' AND dsb.balance>0 AND dsb.expiry_date>=CURDATE()");
		$drugs_array=$drugs_sql->result_array();
		echo json_encode($drugs_array);
		
	}
	
	public function getAllDrugs(){
		$facility_code = $this -> session -> userdata('facility');
		$drugs_sql=$this->db->query("SELECT DISTINCT(d.id),d.drug FROM drugcode d  WHERE d.enabled='1' ");
		$drugs_array=$drugs_sql->result_array();
		echo json_encode($drugs_array);
		
	}
	
	public function getBacthes(){
		$facility_code = $this -> session -> userdata('facility');
		$stock_type=$this->input ->post("stock_type");
		$selected_drug=$this->input ->post("selected_drug");
		$batch_sql=$this->db->query("SELECT DISTINCT d.pack_size,d.duration,d.quantity,u.Name,dsb.batch_number,d.dose as dose,do.Name as dose_id FROM drugcode d LEFT JOIN drug_stock_balance dsb ON d.id=dsb.drug_id LEFT JOIN drug_unit u ON u.id=d.unit LEFT JOIN dose do ON d.dose=do.id  WHERE d.enabled=1 AND dsb.facility_code='$facility_code' AND dsb.stock_type='$stock_type' AND dsb.drug_id='$selected_drug' AND dsb.balance>0 AND dsb.expiry_date>=CURDATE() ORDER BY dsb.expiry_date ASC");
		$batches_array=$batch_sql->result_array();
		echo json_encode($batches_array);
	}
	
	public function getBacthDetails(){
		$facility_code = $this -> session -> userdata('facility');
		$stock_type=$this->input ->post("stock_type");
		$selected_drug=$this->input ->post("selected_drug");
		$batch_selected=$this->input ->post("batch_selected");
		$batch_sql=$this->db->query("SELECT dsb.balance, dsb.expiry_date FROM drug_stock_balance dsb  WHERE dsb.facility_code='$facility_code' AND dsb.stock_type='$stock_type' AND dsb.drug_id='$selected_drug' AND dsb.batch_number='$batch_selected' AND dsb.balance>0 AND dsb.expiry_date>=CURDATE() ORDER BY dsb.expiry_date ASC LIMIT 1");
		$batches_array=$batch_sql->result_array();
		echo json_encode($batches_array);
	}
	
	//Get balance details
	public function getBalanceDetails(){
		$facility_code = $this -> session -> userdata('facility');
		$stock_type=$this->input ->post("stock_type");
		$selected_drug=$this->input ->post("selected_drug");
		$batch_selected=$this->input ->post("batch_selected");
		$expiry_date=$this->input->post("expiry_date");
		$batch_sql=$this->db->query("SELECT dsb.balance, dsb.expiry_date FROM drug_stock_balance dsb  WHERE dsb.facility_code='$facility_code' AND dsb.stock_type='$stock_type' AND dsb.drug_id='$selected_drug' AND dsb.batch_number='$batch_selected' AND dsb.balance>0 AND dsb.expiry_date>=CURDATE() AND dsb.expiry_date='$expiry_date' ORDER BY dsb.expiry_date ASC LIMIT 1");
		$batches_array=$batch_sql->result_array();
		echo json_encode($batches_array);
	}	
	
	public function getDrugDetails(){
		
		$selected_drug=$this->input ->post("selected_drug");
		$drug_details_sql=$this->db->query("SELECT d.pack_size,u.Name FROM drugcode d LEFT JOIN drug_unit u ON u.id=d.unit WHERE d.enabled=1 AND d.id='$selected_drug' ");
		$drug_details_array=$drug_details_sql->result_array();
		echo json_encode($drug_details_array);
	}
	

	public function save() {
		/*
		 * Get posted data from the client
		 */
		$balance="";
		$facility = $this -> session -> userdata("facility");
		$get_user = $this -> session -> userdata("user_id");
		$get_qty_choice=$this->input->post("quantity_choice");
		$get_qty_out_choice=$this->input->post("quantity_out_choice");
		$get_source=$this->input->post("source");
		$get_destination=$this->input->post("destination");
		$get_transaction_date=$this->input->post("transaction_date");
		$get_ref_number=$this->input->post("reference_number");
		$get_transaction_type=$this->input->post("transaction_type");
		$get_drug_id=$this->input->post("drug_id");
		$get_batch=$this->input->post("batch");
		$get_expiry=$this->input->post("expiry");
		$get_packs=$this->input->post("packs");
		$get_qty=$this->input->post("quantity");
		$get_available_qty=$this->input->post("available_qty");
		$get_unit_cost=$this->input->post("unit_cost");
		$get_amount=$this->input->post("amount");
		$get_comment=$this->input->post("comment");
		$get_stock_type=$this->input->post("stock_type");
		$remaining_drugs=$this->input->post("remaining_drugs");
		$balance=0;
		$pharma_balance=0;
		$store_balance=0;
		$sql_queries="";
		
		/*
		 * Start processing
		 */
		if($get_stock_type=='1'){
			//Stockin coming in
			if($get_transaction_type == 1 || $get_transaction_type == 2 || $get_transaction_type == 3 || $get_transaction_type == 4 || $get_transaction_type == 11) {
				//Get remaining balance for the drug
				$get_balance_sql=$this->db->query("SELECT dsb.balance FROM drug_stock_balance dsb  WHERE dsb.facility_code='$facility' AND dsb.stock_type='$get_stock_type' AND dsb.drug_id='$get_drug_id' AND dsb.batch_number='$get_batch' AND dsb.balance>0 AND dsb.expiry_date>=CURDATE() AND dsb.expiry_date='$get_expiry' LIMIT 1");
				$balance_array=$get_balance_sql->result_array();
				//Check if drug exists in the drug_stock_balance table
				if(count($balance_array>0)){
					$bal=$balance_array[0]["balance"];
				}
				else{
					//If drug does not exist, initialise the balance to zero
					$bal=0;
				}
				$balance=$get_qty+$bal;
				
			} else {
			
				//If transaction is from main store to pharmacy, get remaining balance for pharmacy
				if($get_destination==$facility){
					//Get remaining balance for the drug
					$get_balance_sql=$this->db->query("SELECT dsb.balance FROM drug_stock_balance dsb  
					WHERE dsb.facility_code='$facility' AND dsb.stock_type='2' AND dsb.drug_id='$get_drug_id' AND dsb.batch_number='$get_batch' 
					AND dsb.balance>0 AND dsb.expiry_date>=CURDATE() AND dsb.expiry_date='$get_expiry' LIMIT 1");
					$balance_array=$get_balance_sql->result_array();
					//Check if drug exists in the drug_stock_balance table
					if(count($balance_array>0)){
						$bal_pharma=$balance_array[0]["balance"];
					}
					else{
						//If drug does not exist, initialise the balance to zero
						$bal_pharma=0;
					}
					$pharma_balance=$bal_pharma+$get_qty;
				}
				//Substract balance from qty going out
				$balance=$get_available_qty-$get_qty;
				
				
				
			}
		
		}
		//If transaction is from pharmacy
		else if($get_stock_type=='2'){
			//If transaction is received from
			if($get_transaction_type == 1 || $get_transaction_type == 2 || $get_transaction_type == 3 || $get_transaction_type == 4 || $get_transaction_type == 11) {
				//Get remaining balance for the drug
				$get_balance_sql=$this->db->query("SELECT dsb.balance FROM drug_stock_balance dsb  WHERE dsb.facility_code='$facility' AND dsb.stock_type='$get_stock_type' AND dsb.drug_id='$get_drug_id' AND dsb.batch_number='$get_batch' AND dsb.balance>0 AND dsb.expiry_date>=CURDATE() AND dsb.expiry_date='$get_expiry' LIMIT 1");
				$balance_array=$get_balance_sql->result_array();
				//Check if drug exists in the drug_stock_balance table
				if(count($balance_array>0)){
					$bal=$balance_array[0]["balance"];
				}
				else{
					//If drug does not exist, initialise the balance to zero
					$bal=0;
				}
				$balance=$get_qty+$bal;
				
				//Get the remaining balance for the drug in the store
				if($get_transaction_type=='1' && $get_stock_type=='2' && $get_source==1 ){
					$get_balance_sql=$this->db->query("SELECT dsb.balance FROM drug_stock_balance dsb  WHERE dsb.facility_code='$facility' AND dsb.stock_type='1' AND dsb.drug_id='$get_drug_id' AND dsb.batch_number='$get_batch' AND dsb.balance>0 AND dsb.expiry_date>=CURDATE() AND dsb.expiry_date='$get_expiry' LIMIT 1");
					$balance_array=$get_balance_sql->result_array();
					//Check if drug exists in the drug_stock_balance table
					if(count($balance_array>0)){
						$bal_store=$balance_array[0]["balance"];
					}
					else{
						//If drug does not exist, initialise the balance to zero
						$bal_store=0;
					}
					$store_balance=$bal_store-$get_qty;
				}
				
			} else {
				//Substract $$balance from qty going out
				$balance=$get_available_qty-$get_qty;
			}
		}
		/*
		 * Calculate remaining balance end
		 */
		
		//Check if destination is not the same as facility code, which would be a pharmacy transaction
		if($get_destination==$facility && $get_transaction_type == 6){
			$destination="";
			$source=$facility;
		}
		
		//When dispensing to patients from pharmacy
		else if($get_transaction_type == 5 && $get_stock_type=='2'){
			$source=$facility;
			$destination=$facility;
		}
		
		//When issuing, source is facility (for store transaction)
		else if($get_transaction_type == 6){
			$source=$facility;
			$destination=$get_destination;
		}
		//Pharmacy transaction:Received from Main Store
		else if($get_transaction_type==1 && $get_stock_type=='2' && $get_source==1){
			$source=$facility;
			$destination=$facility;
		}
		//Physical count store
		else if($get_transaction_type==11 && $get_stock_type=='1'){
			$source=$facility;
			$destination="";
		}
		//Physical count pharmacy
		else if($get_transaction_type==11 && $get_stock_type=='2'){
			$source=$facility;
			$destination=$facility;
		}
		else{
			$destination=$facility;
			$source=$get_source;
		}
		
		$sql = "INSERT INTO drug_stock_movement (drug, transaction_date, batch_number, transaction_type, source, destination, expiry_date, packs,".$get_qty_choice.",".$get_qty_out_choice.",balance, unit_cost, amount, remarks, operator, order_number, facility) VALUES ('".$get_drug_id. "', '".$get_transaction_date."', '".$get_batch."', '".$get_transaction_type ."', '".$source."', '".$destination."', '".$get_expiry."', '".$get_packs."', '".$get_qty."','0','".$balance."','".$get_unit_cost."', '".$get_amount."', '".$get_comment."','".$get_user."','".$get_ref_number."','".$facility."');";
		$sql1=$this->db->query($sql);
		
		//If transaction type is issued to, create query for the receiving store
		if($get_transaction_type == 6) {
			// Case where destination is Pharmacy
			if($get_destination==$facility){
				$source=$facility;
				
			}else{
				$source=$facility;
			}
			$destination=$get_destination;
			//If transaction type is issued to, insert another transaction as a received from
			$transaction_type=1;
			$sql_queries = "INSERT INTO drug_stock_movement (drug, transaction_date, batch_number,transaction_type, source, destination, expiry_date, packs,".$get_qty_out_choice.",".$get_qty_choice.",balance, unit_cost, amount, remarks, operator, order_number, facility) VALUES ('".$get_drug_id. "', '".$get_transaction_date."', '".$get_batch."', '".$transaction_type."', '".$source."', '".$destination."', '".$get_expiry."', '".$get_packs."', '".$get_qty."','0','".$pharma_balance."','".$get_unit_cost."', '".$get_amount."', '".$get_comment."','".$get_user."','".$get_ref_number."','".$facility."');";
			$sql2=$this->db->query($sql_queries);
		}
		
		//If received from main store to pharmacy, insert an issued to in main store
		else if($get_transaction_type=='1' && $get_stock_type=='2' && $get_source==1 ){
			$transaction_type=6;
			$sql_queries = "INSERT INTO drug_stock_movement (drug, transaction_date, batch_number, transaction_type, source, destination, expiry_date, packs,".$get_qty_out_choice.",".$get_qty_choice.",balance, unit_cost, amount, remarks, operator, order_number, facility) VALUES ('".$get_drug_id. "', '".$get_transaction_date."', '".$get_batch."', '".$transaction_type."', '".$get_source."', '".$destination."', '".$get_expiry."', '".$get_packs."', '".$get_qty."','0','".$store_balance."','".$get_unit_cost."', '".$get_amount."', '".$get_comment."','".$get_user."','".$get_ref_number."','".$facility."');";
			$sql2=$this->db->query($sql_queries);
		}
		
		//Update drug_stock_balance
		//Add to balance
		if($get_transaction_type==1 || $get_transaction_type==2 || $get_transaction_type==3 || $get_transaction_type==4 || $get_transaction_type==11){
			
			//In case of physical count
			if($get_transaction_type==11){
				$balance_sql="INSERT INTO drug_stock_balance(drug_id,batch_number,expiry_date,stock_type,facility_code,balance) VALUES('".$get_drug_id."','".$get_batch."','".$get_expiry."','".$get_stock_type."','".$facility."','".$get_qty."') ON DUPLICATE KEY UPDATE balance=".$get_qty.";";
				
			}
			else{
				//If transaction is receiving from Main Store to Pharmacy, Update Main Store Balance
				if($get_transaction_type==1 && $get_stock_type==2 && $get_source==1){
					$balance_sql="UPDATE drug_stock_balance SET balance=balance - ".$get_qty." WHERE drug_id='".$get_drug_id."' AND batch_number='".$get_batch."' AND expiry_date='".$get_expiry."' AND stock_type='1' AND facility_code='".$facility."';";
					$sql3=$this->db->query($balance_sql);
				}	
				$balance_sql="INSERT INTO drug_stock_balance(drug_id,batch_number,expiry_date,stock_type,facility_code,balance) VALUES('".$get_drug_id."','".$get_batch."','".$get_expiry."','".$get_stock_type."','".$facility."','".$get_qty."') ON DUPLICATE KEY UPDATE balance=balance+".$get_qty.";";
				
			}
			$sql3=$this->db->query($balance_sql);
		}
		//Substract from balance
		else{
			$balance_sql="";
			//If transaction is From Main Store to pharmacy, update pharmacy balance
			if($get_transaction_type==6 && $get_destination==$facility && $get_stock_type==1){
				$balance_sql="INSERT INTO drug_stock_balance(drug_id,batch_number,expiry_date,stock_type,facility_code,balance) VALUES('".$get_drug_id."','".$get_batch."','".$get_expiry."','2','".$facility."','".$get_qty."') ON DUPLICATE KEY UPDATE balance=balance+".$get_qty.";";
				$sql3=$this->db->query($balance_sql);
				
			}
			$balance_sql="UPDATE drug_stock_balance SET balance=balance - ".$get_qty." WHERE drug_id='".$get_drug_id."' AND batch_number='".$get_batch."' AND expiry_date='".$get_expiry."' AND stock_type='".$get_stock_type."' AND facility_code='".$facility."';";
			$sql3=$this->db->query($balance_sql);
		}
		echo json_encode($remaining_drugs);
		if(remaining_drugs==0){
			redirect("inventory_management");
		}
		
	}
	
	public function save_edit() {
		$this->load->database();
		$sql = $this->input->post("sql");
		$queries = explode(";", $sql);
		foreach($queries as $query){
			if(strlen($query)>0){
				$this->db->query($query);
			}
			
		}
	} 
	public function getDrugsBatches($drug){
		$today=date('Y-m-d');
		$sql="select drug_stock_balance.batch_number,drug_unit.Name as unit,dose.Name as dose,drugcode.quantity,drugcode.duration from drug_stock_balance,drugcode,drug_unit,dose where drug_id='$drug' and drugcode.id=drug_stock_balance.drug_id  and drug_unit.id=drugcode.unit and dose.id= drugcode.dose and expiry_date>'$today' and balance>0 group by batch_number order by drug_stock_balance.expiry_date asc";
		$query=$this->db->query($sql);
		$results=$query->result_array();
		if($results){
		echo json_encode($results);
		}
	}
	
	public function getBatchInfo($drug,$batch){
		$sql="select * from drug_stock_balance where drug_id='$drug' and batch_number='$batch'";
		$query=$this->db->query($sql);
		$results=$query->result_array();
		if($results){
		echo json_encode($results);
		}
	}
	
	public function getDrugsBrands($drug){
		$sql="select * from brand where drug_id='$drug' group by brand";
		$query=$this->db->query($sql);
		$results=$query->result_array();
		if($results){
		echo json_encode($results);
		}
	}
	public function base_params($data) {
		$data['title'] = "webADT | Inventory";
		$data['banner_text'] = "Inventory Management";
		$data['link'] = "inventory";
		$this -> load -> view('template', $data);
	}

}
?>