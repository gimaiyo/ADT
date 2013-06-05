<?php
class Inventory_Management extends MY_Controller {
	function __construct() {
		parent::__construct();
	}

	public function index() {
		$this -> listing();
	} 
	
	public function listing(){
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
					$row[]='<b>'.$aRow['stock_level'].'</b>';
            	}
				else if($x==3){
					$row[]=$aRow['supported_by'];
					$row[]=$aRow['dose'];
					$id=$aRow['id'];
					$row[]="<a href='".base_url()."iventory_management/view_bincard/".$id."'>View Bin Card</a>";
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
					$row[]='<b>'.$aRow['stock_level'].'</b>';
            	}
				else if($x==3){
					$row[]=$aRow['supported_by'];
					$row[]=$aRow['dose'];
					$id=$aRow['id'];
					$row[]="<a href='".base_url()."iventory_management/view_bincard/".$id."'>View Bin Card</a>";
				}
            	
			}
			$output['aaData'][] = $row;
		}
		echo json_encode($output);
	}
	
	public function mainstore_show(){
		$data = array();
		$data['content_view'] = "add_stock_v";
		$this -> base_params($data);
	}
	public function pharmacy_show(){
		$data = array();
		$data['content_view'] = "add_stock_pharmacy_v";
		$this -> base_params($data);
	}

	public function save() {
		$this->load->database();
		$sql = $this->input->post("sql");
		$queries = explode(";", $sql);
		foreach($queries as $query){
			if(strlen($query)>0){
				$this->db->query($query);
				$new_log = new Sync_Log();
				$new_log -> logggedsql = $query;
				$new_log -> machine_code ="1";
				$new_log -> facility = $this -> session -> userdata('facility');
				$new_log -> save();
			}
			
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
	public function base_params($data) {
		$data['title'] = "Inventory";
		$data['banner_text'] = "Inventory Management";
		$data['link'] = "inventory";
		$this -> load -> view('template', $data);
	}

}
?>