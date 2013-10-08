<?php
class Inventory_Management extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> database();
	}

	public function index() {
		$this -> listing();
	}

	public function listing($stock_type = 1) {

		$data['active'] = "";
		//Make pharmacy inventory active
		if ($stock_type == 2) {
			$data['active'] = 'pharmacy_btn';
		}
		//Make store inventory active
		else {
			$data['active'] = 'store_btn';
		}
		$data['content_view'] = "inventory_listing_v";
		$this -> base_params($data);
	}

	public function main_store_stock() {
		$facility_code = $this -> session -> userdata('facility');
		$data = array();
		/* Array of database columns which should be read and sent back to DataTables. Use a space where
		 * you want to insert a non-database field (for example a counter or static image)
		 */
		$aColumns = array('drug', 'pack_size');

		$iDisplayStart = $this -> input -> get_post('iDisplayStart', true);
		$iDisplayLength = $this -> input -> get_post('iDisplayLength', true);
		$iSortCol_0 = $this -> input -> get_post('iSortCol_0', true);
		$iSortingCols = $this -> input -> get_post('iSortingCols', true);
		$sSearch = $this -> input -> get_post('sSearch', true);
		$sEcho = $this -> input -> get_post('sEcho', true);

		// Paging
		if (isset($iDisplayStart) && $iDisplayLength != '-1') {
			$this -> db -> limit($this -> db -> escape_str($iDisplayLength), $this -> db -> escape_str($iDisplayStart));
		}

		// Ordering
		if (isset($iSortCol_0)) {
			for ($i = 0; $i < intval($iSortingCols); $i++) {
				$iSortCol = $this -> input -> get_post('iSortCol_' . $i, true);
				$bSortable = $this -> input -> get_post('bSortable_' . intval($iSortCol), true);
				$sSortDir = $this -> input -> get_post('sSortDir_' . $i, true);

				if ($bSortable == 'true') {
					$this -> db -> order_by($aColumns[intval($this -> db -> escape_str($iSortCol))], $this -> db -> escape_str($sSortDir));
				}
			}
		}

		/*
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables, and MySQL's regex functionality is very limited
		 */
		if (isset($sSearch) && !empty($sSearch)) {
			for ($i = 0; $i < count($aColumns); $i++) {
				$bSearchable = $this -> input -> get_post('bSearchable_' . $i, true);

				// Individual column filtering
				if (isset($bSearchable) && $bSearchable == 'true') {
					$this -> db -> or_like($aColumns[$i], $this -> db -> escape_like_str($sSearch));
				}
			}
		}

		// Select Data
		$this -> db -> select('SQL_CALC_FOUND_ROWS ' . str_replace(' , ', ' ', implode(', ', $aColumns)), false);
		$this -> db -> select("dc.id,SUM(dsb.balance) as stock_level,g.Name as generic_name,s.Name as supported_by,d.Name as dose,du.Name as drug_unit");
		$today = date('Y-m-d');
		$this -> db -> from("drugcode dc");
		$this -> db -> where('dc.enabled', '1');
		$this -> db -> where('dsb.facility_code', $facility_code);
		$this -> db -> where('dsb.expiry_date > ', $today);
		$this -> db -> where('dsb.stock_type ', '1');
		$this -> db -> join("generic_name g", "g.id=dc.generic_name", "left outer");
		$this -> db -> join("drug_stock_balance dsb", "dsb.drug_id=dc.id");
		$this -> db -> join("suppliers s", "s.id=dc.supported_by");
		$this -> db -> join("dose d", "d.id=dc.dose");
		$this -> db -> join("drug_unit du", "du.id=dc.unit");
		$this -> db -> group_by("dsb.drug_id");

		$rResult = $this -> db -> get();

		// Data set length after filtering
		$this -> db -> select('FOUND_ROWS() AS found_rows');
		$iFilteredTotal = $this -> db -> get() -> row() -> found_rows;

		// Total data set length
		$this -> db -> select("dsb.*");
		$where = "dc.enabled='1' AND dsb.facility='$facility_code' AND dsb.expiry_date > CURDATE() AND dsb.stock_type='1'";
		$this -> db -> from("drugcode dc");
		$this -> db -> where('dc.enabled', '1');
		$this -> db -> where('dsb.facility_code', $facility_code);
		$this -> db -> where('dsb.expiry_date > ', $today);
		$this -> db -> where('dsb.stock_type ', '1');
		$this -> db -> join("generic_name g", "g.id=dc.generic_name");
		$this -> db -> join("drug_stock_balance dsb", "dsb.drug_id=dc.id");
		$this -> db -> join("suppliers s", "s.id=dc.supported_by");
		$this -> db -> join("dose d", "d.id=dc.dose");
		$this -> db -> join("drug_unit du", "du.id=dc.unit");
		$this -> db -> group_by("dsb.drug_id");
		$tot_drugs = $this -> db -> get();
		$iTotal = count($tot_drugs -> result_array());

		// Output
		$output = array('sEcho' => intval($sEcho), 'iTotalRecords' => $iTotal, 'iTotalDisplayRecords' => $iFilteredTotal, 'aaData' => array());

		foreach ($rResult->result_array() as $aRow) {
			$row = array();
			$x = 0;
			foreach ($aColumns as $col) {
				$x++;
				$row[] = strtoupper($aRow[$col]);
				//Append Generic name
				if ($x == 1) {
					$row[] = strtoupper($aRow['generic_name']);
					$row[] = '<b style="color:green">' . number_format($aRow['stock_level']) . '</b>';
					$row[] = $aRow['drug_unit'];
				} else if ($x == 2) {
					$row[] = $aRow['supported_by'];
					$row[] = $aRow['dose'];

					$id = $aRow['id'];
					$row[] = "<a href='" . base_url() . "inventory_management/view_bin_card/" . $id . "/1'>View Bin Card</a>";
				}

			}
			$output['aaData'][] = $row;
		}
		echo json_encode($output);

	}

	public function pharmacy_store_stock() {
		$facility_code = $this -> session -> userdata('facility');
		$data = array();
		/* Array of database columns which should be read and sent back to DataTables. Use a space where
		 * you want to insert a non-database field (for example a counter or static image)
		 */
		$aColumns = array('drug', 'pack_size');

		$iDisplayStart = $this -> input -> get_post('iDisplayStart', true);
		$iDisplayLength = $this -> input -> get_post('iDisplayLength', true);
		$iSortCol_0 = $this -> input -> get_post('iSortCol_0', true);
		$iSortingCols = $this -> input -> get_post('iSortingCols', true);
		$sSearch = $this -> input -> get_post('sSearch', true);
		$sEcho = $this -> input -> get_post('sEcho', true);

		// Paging
		if (isset($iDisplayStart) && $iDisplayLength != '-1') {
			$this -> db -> limit($this -> db -> escape_str($iDisplayLength), $this -> db -> escape_str($iDisplayStart));
		}

		// Ordering
		if (isset($iSortCol_0)) {
			for ($i = 0; $i < intval($iSortingCols); $i++) {
				$iSortCol = $this -> input -> get_post('iSortCol_' . $i, true);
				$bSortable = $this -> input -> get_post('bSortable_' . intval($iSortCol), true);
				$sSortDir = $this -> input -> get_post('sSortDir_' . $i, true);

				if ($bSortable == 'true') {
					$this -> db -> order_by($aColumns[intval($this -> db -> escape_str($iSortCol))], $this -> db -> escape_str($sSortDir));
				}
			}
		}

		/*
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables, and MySQL's regex functionality is very limited
		 */
		if (isset($sSearch) && !empty($sSearch)) {
			for ($i = 0; $i < count($aColumns); $i++) {
				$bSearchable = $this -> input -> get_post('bSearchable_' . $i, true);

				// Individual column filtering
				if (isset($bSearchable) && $bSearchable == 'true') {
					$this -> db -> or_like($aColumns[$i], $this -> db -> escape_like_str($sSearch));
				}
			}
		}

		// Select Data
		$this -> db -> select('SQL_CALC_FOUND_ROWS ' . str_replace(' , ', ' ', implode(', ', $aColumns)), false);
		$this -> db -> select("dc.id,SUM(dsb.balance) as stock_level,g.Name as generic_name,s.Name as supported_by,d.Name as dose,du.Name as drug_unit");
		$today = date('Y-m-d');
		$this -> db -> from("drugcode dc");
		$this -> db -> where('dc.enabled', '1');
		$this -> db -> where('dsb.facility_code', $facility_code);
		$this -> db -> where('dsb.expiry_date > ', $today);
		$this -> db -> where('dsb.stock_type ', '2');
		$this -> db -> join("generic_name g", "g.id=dc.generic_name", "left outer");
		$this -> db -> join("drug_stock_balance dsb", "dsb.drug_id=dc.id");
		$this -> db -> join("suppliers s", "s.id=dc.supported_by");
		$this -> db -> join("dose d", "d.id=dc.dose");
		$this -> db -> join("drug_unit du", "du.id=dc.unit");
		$this -> db -> group_by("dsb.drug_id");

		$rResult = $this -> db -> get();

		// Data set length after filtering
		$this -> db -> select('FOUND_ROWS() AS found_rows');
		$iFilteredTotal = $this -> db -> get() -> row() -> found_rows;

		// Total data set length
		$this -> db -> select("dsb.*");
		$where = "dc.enabled='1' AND dsb.facility='$facility_code' AND dsb.expiry_date > CURDATE() AND dsb.stock_type='1'";
		$this -> db -> from("drugcode dc");
		$this -> db -> where('dc.enabled', '1');
		$this -> db -> where('dsb.facility_code', $facility_code);
		$this -> db -> where('dsb.expiry_date > ', $today);
		$this -> db -> where('dsb.stock_type ', '2');
		$this -> db -> join("generic_name g", "g.id=dc.generic_name");
		$this -> db -> join("drug_stock_balance dsb", "dsb.drug_id=dc.id");
		$this -> db -> join("suppliers s", "s.id=dc.supported_by");
		$this -> db -> join("dose d", "d.id=dc.dose");
		$this -> db -> join("drug_unit du", "du.id=dc.unit");
		$tot_drugs = $this -> db -> get();
		$iTotal = count($tot_drugs -> result_array());

		// Output
		$output = array('sEcho' => intval($sEcho), 'iTotalRecords' => $iTotal, 'iTotalDisplayRecords' => $iFilteredTotal, 'aaData' => array());

		foreach ($rResult->result_array() as $aRow) {
			$row = array();
			$x = 0;
			foreach ($aColumns as $col) {
				$x++;
				$row[] = strtoupper($aRow[$col]);
				//Append Generic name
				if ($x == 1) {
					$row[] = strtoupper($aRow['generic_name']);
					$row[] = '<b style="color:green">' . number_format($aRow['stock_level']) . '</b>';
					$row[] = $aRow['drug_unit'];
				} else if ($x == 2) {
					$row[] = $aRow['supported_by'];
					$row[] = $aRow['dose'];
					$id = $aRow['id'];
					$row[] = "<a href='" . base_url() . "inventory_management/view_bin_card/" . $id . "/2'>View Bin Card</a>";
				}

			}
			$output['aaData'][] = $row;
		}
		echo json_encode($output);
	}

	public function view_bin_card($drug_id, $stock_type = 1) {
		$store = "";
		$data['stock_val'] = $stock_type;
		if ($stock_type == 1) {
			$data['store'] = "Main Store";
			$data['previous'] = 'inventory_management/1';
			$this -> session -> set_userdata("inventory_go_back", "store_table");

		} else if ($stock_type == 2) {
			$data['store'] = "Pharmacy";
			$data['previous'] = 'inventory_management/2';
			$this -> session -> set_userdata("inventory_go_back", "pharmacy_table");
		}

		$today = date('Y-m-d');
		$facility_code = $this -> session -> userdata('facility');
		//$results=Drug_Stock_Movement::getDrugTransactions($drug_id,$facility_code,$stock_type);
		$sql = "SELECT d.id,d.drug,du.Name AS unit,d.pack_size,dsb.batch_number,dsb.expiry_date,dsb.stock_type,dsb.balance FROM drug_stock_balance dsb LEFT JOIN drugcode d ON d.id=dsb.drug_id LEFT JOIN drug_unit du ON du.id = d.unit WHERE dsb.drug_id='$drug_id'  AND dsb.expiry_date > '$today' AND dsb.balance > 0   AND dsb.facility_code='$facility_code' AND dsb.stock_type='$stock_type' order by dsb.expiry_date asc";
		$query = $this -> db -> query($sql);

		$stock_bactchinfo_array = $query -> result_array();
		$stock_level = 0;
		$data['drug_name'] = "";
		foreach ($stock_bactchinfo_array as $total) {
			$stock_level += $total['balance'];
			$data['drug_id'] = $total['id'];
			$data['drug_name'] = $total['drug'];
			$data['drug_unit'] = $total['unit'];
		}
		$data['stock_type'] = $stock_type;
		$data['stock_level'] = number_format($stock_level);
		$data['batch_info'] = $stock_bactchinfo_array;
		//$data['drug_transactions'] = $results;

		$consumption = Drug_Stock_Movement::getDrugMonthlyConsumption($drug_id, $facility_code, $stock_type);

		$three_months_consumption = 0;
		$drug_name = "";

		foreach ($consumption as $value) {
			$three_months_consumption += $value['total_out'];

		}
		$maximum_consumption = number_format($three_months_consumption);
		$monthly_consumption = ($three_months_consumption) / 3;
		$minimum_consumption = number_format(($monthly_consumption) * 1.5);
		$monthly_consumption = number_format($monthly_consumption);

		$data['maximum_consumption'] = $maximum_consumption;
		$data['avg_consumption'] = $monthly_consumption;
		$data['minimum_consumption'] = $minimum_consumption;

		$data['content_view'] = 'bin_card_v';
		//Hide side menus
		$data['hide_side_menu'] = '1';
		$this -> base_params($data);

	}

	public function ServerDrugTransactions($drug_id, $stock_type) {
		$data = array();
		$aColumns = array('Order Number', 'Transaction Date', 'Transaction Type', 'Batch Number', 'Expiry Date', 'Pack Size', 'Packs', 'Quantity', 'Balance', 'Unit Cost', 'Amount');

		$iDisplayStart = $this -> input -> get_post('iDisplayStart', true);
		$iDisplayLength = $this -> input -> get_post('iDisplayLength', true);
		$iSortCol_0 = $this -> input -> get_post('iSortCol_0', false);
		$iSortingCols = $this -> input -> get_post('iSortingCols', true);
		$sSearch = $this -> input -> get_post('sSearch', true);
		$sEcho = $this -> input -> get_post('sEcho', true);

		$count = 0;

		// Paging
		if (isset($iDisplayStart) && $iDisplayLength != '-1') {
			$this -> db -> limit($this -> db -> escape_str($iDisplayLength), $this -> db -> escape_str($iDisplayStart));
		}

		// Ordering
		if (isset($iSortCol_0)) {
			for ($i = 0; $i < intval($iSortingCols); $i++) {
				$iSortCol = $this -> input -> get_post('iSortCol_' . $i, true);
				$bSortable = $this -> input -> get_post('bSortable_' . intval($iSortCol), true);
				$sSortDir = $this -> input -> get_post('sSortDir_' . $i, true);

				if ($bSortable == 'true') {
					$this -> db -> order_by($aColumns[intval($this -> db -> escape_str($iSortCol))], $this -> db -> escape_str($sSortDir));
				}
			}
		}
		/*
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables, and MySQL's regex functionality is very limited
		 */
		if (isset($sSearch) && !empty($sSearch)) {
			for ($i = 0; $i < count($aColumns); $i++) {
				$bSearchable = $this -> input -> get_post('bSearchable_' . $i, true);

				// Individual column filtering
				if (isset($bSearchable) && $bSearchable == 'true') {
					$this -> db -> or_like($aColumns[$i], $this -> db -> escape_like_str($sSearch));
				}
			}
		}

		$facility_code = $this -> session -> userdata('facility');
		$drug_transactions = Drug_Stock_Movement::getDrugTransactions($drug_id, $facility_code, $stock_type);
		$iFilteredTotal = count($drug_transactions);
		$iTotal = count($drug_transactions);

		// Output
		$output = array('sEcho' => intval($sEcho), 'iTotalRecords' => $iTotal, 'iTotalDisplayRecords' => $iFilteredTotal, 'aaData' => array());

		foreach ($drug_transactions as $index => $drug_transaction) {
			$row = array();
			$row[] = $drug_transaction -> Order_Number;
			$row[] = date('d-M-Y', strtotime($drug_transaction -> Transaction_Date));
			//Script to get Transaction Type Details
			$transaction_type = $drug_transaction -> Transaction_Object -> Name;

			//Main store transaction
			if ($drug_transaction -> Source != $drug_transaction -> Destination) {
				//Stock going out
				if ($drug_transaction -> Quantity == 0) {
					$qty = $drug_transaction -> Quantity_Out;
					//From Main Store to pharmacy
					if ($drug_transaction -> Destination == "" || ($drug_transaction -> Destination == $facility_code && $drug_transaction -> Transaction_Object -> id == 6)) {
						$transaction_type .= " Pharmacy";
					}
					//If destination is not a facility,get the destination name
					else if ($drug_transaction -> Destination < 10000) {
						$transaction_type .= $drug_transaction -> Destination_Object -> Name;
					}
					//If destination is a facility,get the facility name
					else if ($drug_transaction -> Destination >= 10000) {
						$transaction_type .= $drug_transaction -> Facility_Sat -> name;
					}
				}

				//Stock coming in, received
				else if ($drug_transaction -> Quantity > 0) {
					$qty = $drug_transaction -> Quantity;

					if ($drug_transaction -> Source == "" and $drug_transaction -> Source != "") {
						//$transaction_type.=" <b>".$drug_transaction->Facility_Object->name."</b>";
					}
					//Source is not a facility
					else if ($drug_transaction -> Source < 10000) {
						$transaction_type .= " " . $drug_transaction -> Source_Object -> Name;
					}
					//Source is a facility
					else if ($drug_transaction -> Source >= 10000) {
						//$transaction_type.=" <b>".$drug_transaction->Facility_Object->name."</b>";
					}
				}
			}
			//Pharmacy transaction
			else if ($drug_transaction -> Source == $drug_transaction -> Destination) {

				//Going out
				if ($drug_transaction -> Quantity == 0 or $drug_transaction -> Quantity == "") {
					//$transaction_type.=" Patients";
					$qty = $drug_transaction -> Quantity_Out;
					$transaction_type .= ' ' . $drug_transaction -> Destination_Trans -> Name;
				}
				//Coming in
				else if ($drug_transaction -> Quantity_Out == 0 or $drug_transaction -> Quantity == "") {
					$qty = $drug_transaction -> Quantity;
					$transaction_type .= ' ' . $drug_transaction -> Source_Trans -> Name;
				}

			}
			$row[] = $transaction_type;
			$row[] = $drug_transaction -> Batch_Number;
			$row[] = date('d-M-Y', strtotime($drug_transaction -> Expiry_date));
			$row[] = $drug_transaction -> Drug_Object -> Pack_Size;
			$row[] = $drug_transaction -> Packs;
			$row[] = $qty;
			$row[] = number_format($drug_transaction -> Balance);
			$row[] = $drug_transaction -> Unit_Cost;
			$row[] = $drug_transaction -> Amount;
			$output['aaData'][] = $row;
		}
		echo json_encode($output);

	}

	public function stock_transaction($stock_type = 1) {
		$data['hide_side_menu'] = 1;
		$facility_code = $this -> session -> userdata('facility');
		$user_id = $this -> session -> userdata('user_id');
		$transaction_type = Transaction_Type::getAll();
		$drug_source = Drug_Source::getAll();
		$facility_detail = facilities::getSupplier($facility_code);
		$drug_destination = Drug_Destination::getAll();
		$satelittes = facilities::getSatellites($facility_code);
		$data['supplier_name'] = $facility_detail -> supplier -> name;
		$data['picking_lists'] = facility_order::getPickingList('3', $facility_code);
		$data['satelittes'] = $satelittes;
		$data['user_id'] = $user_id;
		$data['facility'] = $facility_code;
		$data['stock_type'] = $stock_type;
		$data['transaction_types'] = $transaction_type;
		$data['drug_sources'] = $drug_source;
		$data['drug_destinations'] = $drug_destination;
		if ($stock_type == 1) {
			$data['store'] = 'Main Store Transaction';
		} else if ($stock_type == 2) {
			$data['store'] = 'Pharmacy Transaction';
		}
		$data['content_view'] = "stock_transaction_v";
		$this -> base_params($data);

	}

	public function getStockDrugs() {
		$stock_type = $this -> input -> post("stock_type");
		$facility_code = $this -> session -> userdata('facility');
		$drugs_sql = $this -> db -> query("SELECT DISTINCT(d.id),d.drug FROM drugcode d LEFT JOIN drug_stock_balance dsb on dsb.drug_id=d.id WHERE dsb.facility_code='$facility_code' AND dsb.stock_type='$stock_type' AND dsb.balance>0 AND dsb.expiry_date>=CURDATE() AND d.enabled='1'");
		$drugs_array = $drugs_sql -> result_array();
		echo json_encode($drugs_array);

	}

	public function getAllDrugs() {
		$facility_code = $this -> session -> userdata('facility');
		$drugs_sql = $this -> db -> query("SELECT DISTINCT(d.id),d.drug FROM drugcode d  WHERE d.enabled='1' ");
		$drugs_array = $drugs_sql -> result_array();
		echo json_encode($drugs_array);

	}

	public function getBacthes() {
		$facility_code = $this -> session -> userdata('facility');
		$stock_type = $this -> input -> post("stock_type");
		$selected_drug = $this -> input -> post("selected_drug");
		$batch_sql = $this -> db -> query("SELECT DISTINCT d.pack_size,d.duration,d.quantity,u.Name,dsb.batch_number,d.dose as dose,do.Name as dose_id FROM drugcode d LEFT JOIN drug_stock_balance dsb ON d.id=dsb.drug_id LEFT JOIN drug_unit u ON u.id=d.unit LEFT JOIN dose do ON d.dose=do.id  WHERE d.enabled=1 AND dsb.facility_code='$facility_code' AND dsb.stock_type='$stock_type' AND dsb.drug_id='$selected_drug' AND dsb.balance>0 AND dsb.expiry_date>=CURDATE() ORDER BY dsb.expiry_date ASC");
		$batches_array = $batch_sql -> result_array();
		echo json_encode($batches_array);
	}

	public function getBacthDetails() {
		$facility_code = $this -> session -> userdata('facility');
		$stock_type = $this -> input -> post("stock_type");
		$selected_drug = $this -> input -> post("selected_drug");
		$batch_selected = $this -> input -> post("batch_selected");
		$batch_sql = $this -> db -> query("SELECT dsb.balance, dsb.expiry_date FROM drug_stock_balance dsb  WHERE dsb.facility_code='$facility_code' AND dsb.stock_type='$stock_type' AND dsb.drug_id='$selected_drug' AND dsb.batch_number='$batch_selected' AND dsb.balance>0 AND dsb.expiry_date>=CURDATE() ORDER BY dsb.expiry_date ASC LIMIT 1");
		$batches_array = $batch_sql -> result_array();
		echo json_encode($batches_array);
	}

	//Get balance details
	public function getBalanceDetails() {
		$facility_code = $this -> session -> userdata('facility');
		$stock_type = $this -> input -> post("stock_type");
		$selected_drug = $this -> input -> post("selected_drug");
		$batch_selected = $this -> input -> post("batch_selected");
		$expiry_date = $this -> input -> post("expiry_date");
		$batch_sql = $this -> db -> query("SELECT dsb.balance, dsb.expiry_date FROM drug_stock_balance dsb  WHERE dsb.facility_code='$facility_code' AND dsb.stock_type='$stock_type' AND dsb.drug_id='$selected_drug' AND dsb.batch_number='$batch_selected' AND dsb.balance>0 AND dsb.expiry_date>=CURDATE() AND dsb.expiry_date='$expiry_date' ORDER BY dsb.expiry_date ASC LIMIT 1");
		$batches_array = $batch_sql -> result_array();
		echo json_encode($batches_array);
	}

	public function getDrugDetails() {

		$selected_drug = $this -> input -> post("selected_drug");
		$drug_details_sql = $this -> db -> query("SELECT d.pack_size,u.Name FROM drugcode d LEFT JOIN drug_unit u ON u.id=d.unit WHERE d.enabled=1 AND d.id='$selected_drug' ");
		$drug_details_array = $drug_details_sql -> result_array();
		echo json_encode($drug_details_array);
	}

	public function save() {

		/*
		 * Get posted data from the client
		 */
		$balance = "";
		$facility = $this -> session -> userdata("facility");
		$facility_detail = facilities::getSupplier($facility);
		$supplier_name = $facility_detail -> supplier -> name;
		$get_user = $this -> session -> userdata("user_id");
		$get_qty_choice = $this -> input -> post("quantity_choice");
		$get_qty_out_choice = $this -> input -> post("quantity_out_choice");
		$get_source = $this -> input -> post("source");
		$get_source_name = $this -> input -> post("source_name");
		$get_destination = $this -> input -> post("destination");
		$get_transaction_date = date('Y-m-d', strtotime($this -> input -> post("transaction_date")));
		$get_ref_number = $this -> input -> post("reference_number");
		$get_transaction_type = $this -> input -> post("transaction_type");
		$transaction_type_name = $this -> input -> post("trans_type");
		$transaction_effect = $this -> input -> post("trans_effect");
		$get_drug_id = $this -> input -> post("drug_id");
		$get_batch = $this -> input -> post("batch");
		$get_expiry = $this -> input -> post("expiry");
		$get_packs = $this -> input -> post("packs");
		$get_qty = $this -> input -> post("quantity");
		$get_available_qty = $this -> input -> post("available_qty");
		$get_unit_cost = $this -> input -> post("unit_cost");
		$get_amount = $this -> input -> post("amount");
		$get_comment = $this -> input -> post("comment");
		$get_stock_type = $this -> input -> post("stock_type");
		$balance = 0;
		$pharma_balance = 0;
		$store_balance = 0;
		$sql_queries = "";
		$source_destination = "";

		//Check if source if null or not to determine type of transaction
		if ($get_source != "") {
			$source_destination = $get_source;
		} else {
			$source_destination = $get_destination;
		}

		/*
		 * Start processing
		 */
		if ($get_stock_type == '1') {
			//Stock coming in
			if (strpos($transaction_type_name, "received") === 0 || strpos($transaction_type_name, "balance") === 0 || (strpos($transaction_type_name, "returns") === 0 && $transaction_effect == 1) || (strpos($transaction_type_name, "adjustment") === 0 && $transaction_effect == 1) || strpos($transaction_type_name, "startingstock") === 0 || strpos($transaction_type_name, "physicalcount") === 0) {

				//Get remaining balance for the drug
				$get_balance_sql = $this -> db -> query("SELECT dsb.balance FROM drug_stock_balance dsb  WHERE dsb.facility_code='$facility' AND dsb.stock_type='$get_stock_type' AND dsb.drug_id='$get_drug_id' AND dsb.batch_number='$get_batch' AND dsb.balance>0 AND dsb.expiry_date>=CURDATE() AND dsb.expiry_date='$get_expiry' LIMIT 1");
				$balance_array = $get_balance_sql -> result_array();

				//If transaction is physical count, set actual quantity as physical count
				if (strpos($transaction_type_name, "startingstock") === 0 || strpos($transaction_type_name, "physicalcount") === 0) {
					$bal = 0;
				}

				//Check if drug exists in the drug_stock_balance table
				else if (count($balance_array > 0)) {
					$bal = $balance_array[0]["balance"];
				} else {
					//If drug does not exist, initialise the balance to zero
					$bal = 0;
				}
				$balance = $get_qty + $bal;

			} else {

				//If transaction is from main store to pharmacy, get remaining balance for pharmacy
				if ($get_destination == $facility) {
					//Get remaining balance for the drug
					$get_balance_sql = $this -> db -> query("SELECT dsb.balance FROM drug_stock_balance dsb  
					WHERE dsb.facility_code='$facility' AND dsb.stock_type='2' AND dsb.drug_id='$get_drug_id' AND dsb.batch_number='$get_batch' 
					AND dsb.balance>0 AND dsb.expiry_date>=CURDATE() AND dsb.expiry_date='$get_expiry' LIMIT 1");
					$balance_array = $get_balance_sql -> result_array();
					//Check if drug exists in the drug_stock_balance table
					if (count($balance_array > 0)) {
						$bal_pharma = $balance_array[0]["balance"];
					} else {
						//If drug does not exist, initialise the balance to zero
						$bal_pharma = 0;
					}
					$pharma_balance = $bal_pharma + $get_qty;
				}
				//Substract balance from qty going out
				$balance = $get_available_qty - $get_qty;
			}

		}
		//If transaction is from pharmacy
		else if ($get_stock_type == '2') {
			//If transaction is received from
			if (strpos($transaction_type_name, "received") === 0 || strpos($transaction_type_name, "balance") === 0 || (strpos($transaction_type_name, "returns") === 0 && $transaction_effect == 1) || (strpos($transaction_type_name, "adjustment") === 0 && $transaction_effect == 1) || strpos($transaction_type_name, "startingstock") === 0 || strpos($transaction_type_name, "physicalcount") === 0) {
				//Get remaining balance for the drug
				$get_balance_sql = $this -> db -> query("SELECT dsb.balance FROM drug_stock_balance dsb  WHERE dsb.facility_code='$facility' AND dsb.stock_type='$get_stock_type' AND dsb.drug_id='$get_drug_id' AND dsb.batch_number='$get_batch' AND dsb.balance>0 AND dsb.expiry_date>=CURDATE() AND dsb.expiry_date='$get_expiry' LIMIT 1");
				$balance_array = $get_balance_sql -> result_array();
				//If transaction is physical count, set actual quantity as physical count
				if (strpos($transaction_type_name, "startingstock") === 0 || strpos($transaction_type_name, "physicalcount") === 0) {
					$bal = 0;
				}
				//Check if drug exists in the drug_stock_balance table
				else if (count($balance_array > 0)) {
					$bal = $balance_array[0]["balance"];
				} else {
					//If drug does not exist, initialise the balance to zero
					$bal = 0;
				}
				$balance = $get_qty + $bal;
				//Get the remaining balance for the drug in the store

				if (strpos($transaction_type_name, "received") === 0 && $get_stock_type == '2' && (strpos($get_source_name, "main") === 0 || strpos($get_source_name, "store") === 0)) {
					$get_balance_sql = $this -> db -> query("SELECT dsb.balance FROM drug_stock_balance dsb  WHERE dsb.facility_code='$facility' AND dsb.stock_type='1' AND dsb.drug_id='$get_drug_id' AND dsb.batch_number='$get_batch' AND dsb.balance>0 AND dsb.expiry_date>=CURDATE() AND dsb.expiry_date='$get_expiry' LIMIT 1");
					$balance_array = $get_balance_sql -> result_array();
					//Check if drug exists in the drug_stock_balance table
					if (count($balance_array > 0)) {
						$bal_store = $balance_array[0]["balance"];
					} else {
						//If drug does not exist, initialise the balance to zero
						$bal_store = 0;
					}
					$store_balance = $bal_store - $get_qty;
				}

			} else {
				//Substract $$balance from qty going out
				$balance = $get_available_qty - $get_qty;
			}
		}
		/*
		 * Calculate remaining balance end
		 */
		if ($get_destination == $facility && strpos($transaction_type_name, "issued") === 0) {
			$destination = "";
			$source = $facility;
		}
		//Any pharmacy transaction, source and destination is facility code
		else if ((strpos($transaction_type_name, "balance") === 0 || (strpos($transaction_type_name, "returns") === 0 && $transaction_effect == 1) || (strpos($transaction_type_name, "adjustment") === 0 && $transaction_effect == 1) || strpos($transaction_type_name, "dispensed") === 0 || (strpos($transaction_type_name, "adjustment") === 0 && $transaction_effect == 0) || (strpos($transaction_type_name, "returns") === 0 && $transaction_effect == 0) || strpos($transaction_type_name, "losses") === 0 || strpos($transaction_type_name, "expired") === 0 || (strpos($transaction_type_name, "startingstock") === 0 || strpos($transaction_type_name, "physicalcount") === 0)) && $get_stock_type == '2') {
			$source = $facility;
			$destination = $facility;
		}

		//When issuing, source is facility (for store transaction)
		else if (strpos($transaction_type_name, "issued") === 0) {
			$source = $facility;
			$destination = $get_destination;
		}
		//Pharmacy transaction:Received from Main Store, or any other pharmacy transaction
		else if ((strpos($transaction_type_name, "received") === 0 && $get_stock_type == '2' && (strpos($get_source_name, "main") === 0 || strpos($get_source_name, "store") === 0)) || $get_stock_type == '2') {
			$source = $facility;
			$destination = $facility;
		}
		//Physical count store
		else if ((strpos($transaction_type_name, "startingstock") === 0 || strpos($transaction_type_name, "physicalcount") === 0) && $get_stock_type == '1') {
			$source = $facility;
			$destination = "";
		} else {
			$destination = $facility;
			$source = $get_source;
		}

		$sql = "INSERT INTO drug_stock_movement (drug, transaction_date, batch_number, transaction_type, source, destination, expiry_date, packs," . $get_qty_choice . "," . $get_qty_out_choice . ",balance, unit_cost, amount, remarks, operator, order_number, facility,source_destination) VALUES ('" . $get_drug_id . "', '" . $get_transaction_date . "', '" . $get_batch . "', '" . $get_transaction_type . "', '" . $source . "', '" . $destination . "', '" . $get_expiry . "', '" . $get_packs . "', '" . $get_qty . "','0','" . $balance . "','" . $get_unit_cost . "', '" . $get_amount . "', '" . $get_comment . "','" . $get_user . "','" . $get_ref_number . "','" . $facility . "','" . $source_destination . "');";
		$sql1 = $this -> db -> query($sql);

		//If transaction type is issued to pharmacy, create query as received from in pharmacy
		if (strpos($transaction_type_name, "issued") === 0 and $get_destination == $facility) {
			//Get id for received from transaction
			$get_trans_id = $this -> db -> query("SELECT id FROM transaction_type WHERE name LIKE '%received%' LIMIT 1");
			$get_trans_id = $get_trans_id -> result_array();
			$transaction_type = $get_trans_id[0]['id'];

			//Get id for Main Store transaction source
			$get_source_id = $this -> db -> query("SELECT id FROM drug_source WHERE name LIKE '%store%' LIMIT 1");
			$get_source_id = $get_source_id -> result_array();
			$source_destination = $get_source_id[0]['id'];
			$destination = $get_destination;
			//If transaction type is issued to, insert another transaction as a received from
			$sql_queries = "INSERT INTO drug_stock_movement (drug, transaction_date, batch_number,transaction_type, source, destination, expiry_date, packs," . $get_qty_out_choice . "," . $get_qty_choice . ",balance, unit_cost, amount, remarks, operator, order_number, facility,source_destination) VALUES ('" . $get_drug_id . "', '" . $get_transaction_date . "', '" . $get_batch . "', '" . $transaction_type . "', '" . $source . "', '" . $destination . "', '" . $get_expiry . "', '" . $get_packs . "', '" . $get_qty . "','0','" . $pharma_balance . "','" . $get_unit_cost . "', '" . $get_amount . "', '" . $get_comment . "','" . $get_user . "','" . $get_ref_number . "','" . $facility . "','" . $source_destination . "');";
			$sql2 = $this -> db -> query($sql_queries);
		}

		//If received from main store to pharmacy, insert an issued to in main store
		else if (strpos($transaction_type_name, "received") === 0 && $get_stock_type == '2' && (strpos($get_source_name, "main") === 0 || strpos($get_source_name, "store") === 0)) {
			//Get id for issued to transaction type
			$get_trans_id = $this -> db -> query("SELECT id FROM transaction_type WHERE name LIKE '%issued%' LIMIT 1");
			$get_trans_id = $get_trans_id -> result_array();
			$transaction_type = $get_trans_id[0]['id'];

			//Get id for Main Store transaction source
			$get_destination_id = $this -> db -> query("SELECT id FROM drug_destination WHERE name LIKE '%outpatient%' LIMIT 1");
			$get_destination_id = $get_destination_id -> result_array();
			$source_destination = $get_destination_id[0]['id'];

			$sql_queries = "INSERT INTO drug_stock_movement (drug, transaction_date, batch_number, transaction_type, source, destination, expiry_date, packs," . $get_qty_out_choice . "," . $get_qty_choice . ",balance, unit_cost, amount, remarks, operator, order_number, facility,source_destination) VALUES ('" . $get_drug_id . "', '" . $get_transaction_date . "', '" . $get_batch . "', '" . $transaction_type . "', '" . $get_source . "', '" . $destination . "', '" . $get_expiry . "', '" . $get_packs . "', '" . $get_qty . "','0','" . $store_balance . "','" . $get_unit_cost . "', '" . $get_amount . "', '" . $get_comment . "','" . $get_user . "','" . $get_ref_number . "','" . $facility . "','" . $source_destination . "');";
			$sql2 = $this -> db -> query($sql_queries);
		}

		//Update drug_stock_balance
		//Add to balance
		if (strpos($transaction_type_name, "received") === 0 || strpos($transaction_type_name, "balance") === 0 || (strpos($transaction_type_name, "returns") === 0 && $transaction_effect == 1) || (strpos($transaction_type_name, "adjustment") === 0 && $transaction_effect == 1) || strpos($transaction_type_name, "startingstock") === 0 || strpos($transaction_type_name, "physicalcount") === 0) {

			//In case of physical count
			if ($get_transaction_type == 11) {
				$balance_sql = "INSERT INTO drug_stock_balance(drug_id,batch_number,expiry_date,stock_type,facility_code,balance) VALUES('" . $get_drug_id . "','" . $get_batch . "','" . $get_expiry . "','" . $get_stock_type . "','" . $facility . "','" . $get_qty . "') ON DUPLICATE KEY UPDATE balance=" . $get_qty . ";";

			} else {
				//If transaction is receiving from Main Store to Pharmacy, Update Main Store Balance
				if ($get_transaction_type == 1 && $get_stock_type == 2 && $get_source == 1) {
					$balance_sql = "UPDATE drug_stock_balance SET balance=balance - " . $get_qty . " WHERE drug_id='" . $get_drug_id . "' AND batch_number='" . $get_batch . "' AND expiry_date='" . $get_expiry . "' AND stock_type='1' AND facility_code='" . $facility . "';";
					$sql3 = $this -> db -> query($balance_sql);
				}
				$balance_sql = "INSERT INTO drug_stock_balance(drug_id,batch_number,expiry_date,stock_type,facility_code,balance) VALUES('" . $get_drug_id . "','" . $get_batch . "','" . $get_expiry . "','" . $get_stock_type . "','" . $facility . "','" . $get_qty . "') ON DUPLICATE KEY UPDATE balance=balance+" . $get_qty . ";";

			}
			$sql3 = $this -> db -> query($balance_sql);
		}
		//Substract from balance
		else {
			$balance_sql = "";
			//If transaction(issued to) is From Main Store to pharmacy, update pharmacy balance
			if (strpos($transaction_type_name, "issued") === 0 && $get_destination == $facility && $get_stock_type == 1) {
				$balance_sql = "INSERT INTO drug_stock_balance(drug_id,batch_number,expiry_date,stock_type,facility_code,balance) VALUES('" . $get_drug_id . "','" . $get_batch . "','" . $get_expiry . "','2','" . $facility . "','" . $get_qty . "') ON DUPLICATE KEY UPDATE balance=balance+" . $get_qty . ";";
				$sql3 = $this -> db -> query($balance_sql);

			}
			$balance_sql = "UPDATE drug_stock_balance SET balance=balance - " . $get_qty . " WHERE drug_id='" . $get_drug_id . "' AND batch_number='" . $get_batch . "' AND expiry_date='" . $get_expiry . "' AND stock_type='" . $get_stock_type . "' AND facility_code='" . $facility . "';";
			$sql3 = $this -> db -> query($balance_sql);
		}

	}

	public function set_transaction_session() {
		$remaining_drugs = $this -> input -> post("remaining_drugs");
		if ($remaining_drugs == 0) {
			$this -> session -> set_userdata("msg_save_transaction", "success");
		} else {
			$this -> session -> set_userdata("msg_save_transaction", "failure");
		}
	}

	public function save_edit() {
		$this -> load -> database();
		$sql = $this -> input -> post("sql");
		$queries = explode(";", $sql);
		foreach ($queries as $query) {
			if (strlen($query) > 0) {
				$this -> db -> query($query);
			}

		}
	}

	public function getDrugsBatches($drug) {
		$today = date('Y-m-d');
		$sql = "select drug_stock_balance.batch_number,drug_unit.Name as unit,dose.Name as dose,drugcode.quantity,drugcode.duration from drug_stock_balance,drugcode,drug_unit,dose where drug_id='$drug' and drugcode.id=drug_stock_balance.drug_id  and drug_unit.id=drugcode.unit and dose.id= drugcode.dose and expiry_date>'$today' and balance>0 group by batch_number order by drug_stock_balance.expiry_date asc";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		if ($results) {
			echo json_encode($results);
		}
	}

	public function getBatchInfo($drug, $batch) {
		$sql = "select * from drug_stock_balance where drug_id='$drug' and batch_number='$batch'";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		if ($results) {
			echo json_encode($results);
		}
	}

	public function getDrugsBrands($drug) {
		$sql = "select * from brand where drug_id='$drug' group by brand";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		if ($results) {
			echo json_encode($results);
		}
	}

	//Get orders for a picking list
	public function getOrderDetails() {
		$order_id = $this -> input -> post("order_id");
		$sql = $this -> db -> query("SELECT dc.id,dc.pack_size,ci.drug_id,ci.newresupply,ci.resupply FROM cdrr_item ci LEFT JOIN drugcode dc ON dc.drug=ci.drug_id LEFT JOIN facility_order fo ON fo.unique_id=ci.cdrr_id WHERE fo.id='$order_id'");
		$order_list = $sql -> result_array();
		echo json_encode($order_list);
	}

	//Set order status
	public function set_order_status() {
		$order_id = $this -> input -> post("order_id");
		$status = $this -> input -> post("status");
		$updated_on = date("U");
		$this -> db -> query("UPDATE facility_order SET status='$status',updated='$updated_on' WHERE id='$order_id'");

	}

	public function base_params($data) {
		$data['title'] = "webADT | Inventory";
		$data['banner_text'] = "Inventory Management";
		$data['link'] = "inventory";
		$this -> load -> view('template', $data);
	}

}
?>