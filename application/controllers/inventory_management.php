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
		}
		else if($stock_type==2){
			$data['store']="Pharmacy";
			$data['previous']='inventory_management/2';
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
		$batch_sql=$this->db->query("SELECT DISTINCT d.pack_size,u.Name,dsb.batch_number FROM drugcode d LEFT JOIN drug_stock_balance dsb ON d.id=dsb.drug_id LEFT JOIN drug_unit u ON u.id=d.unit  WHERE d.enabled=1 AND dsb.facility_code='$facility_code' AND dsb.stock_type='$stock_type' AND dsb.drug_id='$selected_drug' AND dsb.balance>0 AND dsb.expiry_date>=CURDATE()");
		$batches_array=$batch_sql->result_array();
		echo json_encode($batches_array);
	}
	
	public function getBacthDetails(){
		$facility_code = $this -> session -> userdata('facility');
		$stock_type=$this->input ->post("stock_type");
		$selected_drug=$this->input ->post("selected_drug");
		$batch_selected=$this->input ->post("batch_selected");
		$batch_sql=$this->db->query("SELECT dsb.balance,dsb.expiry_date FROM drug_stock_balance dsb  WHERE dsb.facility_code='$facility_code' AND dsb.stock_type='$stock_type' AND dsb.drug_id='$selected_drug' AND dsb.batch_number='$batch_selected' AND dsb.balance>0 AND dsb.expiry_date>=CURDATE() LIMIT 1");
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
		$data=array();
		$sql = $this->input->post("sql");
		$queries = explode(";", $sql);
		$count=count($queries);
		$c=0;
		foreach($queries as $query){
			$c++;
			if(strlen($query)>0){
				$this->db->query($query);
				//$new_log = new Sync_Log();
				//$new_log -> logggedsql = $query;
				//$new_log -> machine_code ="1";
				//$new_log -> facility = $this -> session -> userdata('facility');
				//$new_log -> save();
			}
			
		}
		
		if($count==$c){
			$this -> session -> set_userdata('msg_save_transaction', 'success');
		}
		else if($c==0){
			$this -> session -> set_userdata('msg_save_transaction', 'all_failure');
		}
		else{
			$this -> session -> set_userdata('msg_save_transaction', 'some_failure');
		}
		
		redirect("inventory_management");
		
		
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
	public function base_params($data) {
		$data['title'] = "Inventory";
		$data['banner_text'] = "Inventory Management";
		$data['link'] = "inventory";
		$this -> load -> view('template', $data);
	}

}
?>