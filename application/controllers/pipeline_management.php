<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Pipeline_Management extends MY_Controller {
	function __construct() {
		parent::__construct();
		$data = array();
		$this -> load -> library('PHPExcel');
		ini_set("max_execution_time", "10000");
	}

	public function index() {
		$data['settings_view'] = "pipeline_upload";
		$this -> base_params($data);
	}

	public function data_upload() {
		if ($_POST['btn_save']) {
			$objReader = new PHPExcel_Reader_Excel5();

			if ($_FILES['file']['tmp_name']) {
				$objPHPExcel = $objReader -> load($_FILES['file']['tmp_name']);

			} else {
				$this -> session -> set_userdata('upload_counter', '1');
				redirect("pipeline_management/index");

			}

			$arr = $objPHPExcel -> getActiveSheet() -> toArray(null, true, true, true);
			$highestColumm = $objPHPExcel -> setActiveSheetIndex(0) -> getHighestColumn();
			$highestRow = $objPHPExcel -> setActiveSheetIndex(0) -> getHighestRow();

			for ($i = 2; $i <= $highestRow; $i++) {
				for ($j = 2; $j <= $highestColumm; $j++) {

				}

				$commodity_name = $arr[$i]['B'];
				$this -> load -> database();
				$query = $this -> db -> query("SELECT id FROM drugcode WHERE drug LIKE '%$commodity_name%'");
				$results = $query -> result_array();

				@$commodity_id = $results[0]['id'];
				$total_issued = $arr[$i]['C'];
				$consumption = $arr[$i]['D'];
				$stock_on_hand = $arr[$i]['E'];
				$earliest_expiry_date = $arr[$i]['F'];
				$quantity_of_stock_expiring = $arr[$i]['G'];
				$central_site_stock_on_hand = $arr[$i]['H'];
				$total_stock_in_country = $arr[$i]['I'];
				$mos_on_hand_pipeline = $arr[$i]['J'];
				$mos_on_hand_central_sites = $arr[$i]['K'];
				$mos_on_hand_total = $arr[$i]['L'];
				$quantity_on_order_from_suppliers = $arr[$i]['M'];
				$source = $arr[$i]['N'];
				$expected_delivery_date = $arr[$i]['O'];
				$receipts_or_transfers = $arr[$i]['R'];
				$comments_or_actions = $arr[$i]['S'];
				$upload_date = $_POST['upload_date'];
				$pipeline_id = $_POST['pipeline_name'];

				//pipeline id: 1= KEMSA & 2=KENYA PHARMA

				$new_pipeline = new Pipeline_Stock();
				$data = array("id" => 'NULL', "commodity_id" => $commodity_id, "total_issued" => $total_issued, "consumption" => $consumption, "stock_on_hand" => $stock_on_hand, "earliest_expiry_date" => $earliest_expiry_date, "quantity_of_stock_expiring" => $quantity_of_stock_expiring, "central_site_stock_on_hand" => $central_site_stock_on_hand, "total_stock_in_country" => $total_stock_in_country, "mos_on_hand_pipeline" => $mos_on_hand_pipeline, "mos_on_hand_central_sites" => $mos_on_hand_central_sites, "mos_on_hand_total" => $mos_on_hand_total, "quantity_on_order_from_suppliers" => $quantity_on_order_from_suppliers, "source" => $source, "expected_delivery_date" => $expected_delivery_date, "receipts_or_transfers" => $receipts_or_transfers, "comments_or_actions" => $comments_or_actions, "upload_date" => $upload_date, "pipeline_id" => $pipeline_id);
				$new_pipeline -> fromArray($data);
				$new_pipeline -> save();

				//Pipeline_Stock::add($commodity_id,$total_issued,$consumption,$stock_on_hand,$earliest_expiry_date,$quantity_of_stock_expiring,$central_site_stock_on_hand,$total_stock_in_country,$mos_on_hand_pipeline,$mos_on_hand_central_sites,$mos_on_hand_total,$quantity_on_order_from_suppliers,$source,$expected_delivery_date,$receipts_or_transfers,$comments_or_actions,$upload_date,$pipeline_id);

			}

			$this -> session -> set_userdata('upload_counter', '2');
			redirect("pipeline_management/index");

		}

	}

	public function import() {
		if ($_POST['btn_save']) {

			$pipeline = $_POST['pipeline_name'];
			$upload_period = $_POST['upload_date'];
			$report_type = $_POST['test_type'];
			$period = explode('-', $upload_period);
			$year = $period[1];
			$month = date('m', strtotime($period[0]));
			$comments = "";
			$facility_name = "";
			if ($_FILES['file']['tmp_name']) {
				$objPHPExcel = PHPExcel_IOFactory::load($_FILES['file']['tmp_name']);

			}
			//check if single sheet
			if ($_POST['book_type'] == 1) {
				//If report is  patient by regimen
				if ($report_type == 1) {
					$validity = Patient_Byregimen_Numbers::checkValid($pipeline, $month, $year);

					if (!$validity) {
						//If pipeline is Kemsa
						if ($_POST['pipeline_name'] == 1) {
							//Iterate through an unknown structure
							foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
								$highestRow = $worksheet -> getHighestRow();
								$highestColumn = $worksheet -> getHighestColumn();
								$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
								$arr = $objPHPExcel -> getActiveSheet() -> toArray(null, true, true, true);
								for ($row = 10; $row <= ($highestRow - 1); ++$row) {
									$facility_cell = $worksheet -> getCellByColumnAndRow(1, $row);
									$facility_name = $facility_cell -> getValue();
									for ($col = 4; $col < ($highestColumnIndex - 1); ++$col) {
										$cell = $worksheet -> getCellByColumnAndRow($col, $row);
										$regimen_desc_cell = $worksheet -> getCellByColumnAndRow($col, 1);
										$regimen_code_cell = $worksheet -> getCellByColumnAndRow($col, 6);
										$prev_regimen_code_cell = $worksheet -> getCellByColumnAndRow($col, 7);
										$val = $cell -> getValue();
										if ($val == null) {
											$val = 0;
										}
										//echo $facility_name . "---" . $comments . "---" . $regimen_desc_cell . "---" . $regimen_code_cell . "---" . $prev_regimen_code_cell . "---" . $month . "---" . $year . "----" . $val . "---" . $pipeline . "<br/>";
										$pipeline_report = new Patient_Byregimen_Numbers();
										$pipeline_report -> facilityname = $facility_name;
										$pipeline_report -> comments = $comments;
										$pipeline_report -> regimen_desc = $regimen_desc_cell;
										$pipeline_report -> regimen_code = $regimen_code_cell;
										$pipeline_report -> previous_code = $prev_regimen_code_cell;
										$pipeline_report -> month = $month;
										$pipeline_report -> year = $year;
										$pipeline_report -> total = $val;
										$pipeline_report -> pipeline = $pipeline;
										$pipeline_report -> save();
									}
								}
							}

						}
						//If pipeline is Kenya Pharma
						if ($_POST['pipeline_name'] == 2) {
							//Iterate through an unknown structure
							foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
								$worksheetTitle = $worksheet -> getTitle();
								if ($worksheetTitle == "Current Patients by ART Site") {
									$highestRow = $worksheet -> getHighestRow();
									$highestColumn = $worksheet -> getHighestColumn();
									$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
									$arr = $objPHPExcel -> getActiveSheet() -> toArray(null, true, true, true);
									$dyn_table = "<table border='1'><tr>";
									for ($row = 9; $row <= $highestRow; ++$row) {
										if ($row < 176) {
											$facility_cell = $worksheet -> getCellByColumnAndRow(1, $row);
											$facility_name = $facility_cell -> getValue();
											$dyn_table .= "<tr>";
											for ($col = 4; $col < $highestColumnIndex; ++$col) {
												$cell = $worksheet -> getCellByColumnAndRow($col, $row);
												$regimen_desc_cell = $worksheet -> getCellByColumnAndRow($col, 1);
												$regimen_code_cell = $worksheet -> getCellByColumnAndRow($col, 6);
												$prev_regimen_code_cell = $worksheet -> getCellByColumnAndRow($col, 7);
												$val = $cell -> getValue();
												if ($val == null) {
													$val = 0;
												}

												//echo $facility_name . "---" . $comments . "---" . $regimen_desc_cell . "---" . $regimen_code_cell . "---" . $prev_regimen_code_cell . "---" . $month . "---" . $year . "----" . $val . "---" . $pipeline . "<br/>";
												$pipeline_report = new Patient_Byregimen_Numbers();
												$pipeline_report -> facilityname = $facility_name;
												$pipeline_report -> comments = $comments;
												$pipeline_report -> regimen_desc = $regimen_desc_cell;
												$pipeline_report -> regimen_code = $regimen_code_cell;
												$pipeline_report -> previous_code = $prev_regimen_code_cell;
												$pipeline_report -> month = $month;
												$pipeline_report -> year = $year;
												$pipeline_report -> total = $val;
												$pipeline_report -> pipeline = $pipeline;
												$pipeline_report -> save();

												$dyn_table .= "<td>" . $val . ".</td>";
											}
											$dyn_table .= "</tr>";
										}

									}
									$dyn_table .= "</table>";
								}
							}
							//echo $dyn_table;

						}
						$this -> session -> set_userdata('upload_counter', '2');
						redirect("pipeline_management/index");

					}//end of validity
					else {
						$this -> session -> set_userdata('upload_counter', '1');
						redirect("pipeline_management/index");
					}
				}//end of if patient regimen

				//If report is facility consumption
				if ($report_type == 2) {
					$validity = Facility_Consumption::checkValid($pipeline, $month, $year);
					if (!$validity) {
						//If pipeline is Kemsa
						if ($_POST['pipeline_name'] == 1) {

							//Iterate through an unknown structure
							foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
								$highestRow = $worksheet -> getHighestRow();
								$highestColumn = $worksheet -> getHighestColumn();
								$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
								$arr = $objPHPExcel -> getActiveSheet() -> toArray(null, true, true, true);
								for ($row = 3; $row <= ($highestRow - 1); ++$row) {
									$facility_cell = $worksheet -> getCellByColumnAndRow(1, $row);
									$facility_name = $facility_cell -> getValue();
									for ($col = 2; $col < ($highestColumnIndex); ++$col) {
										$cell = $worksheet -> getCellByColumnAndRow($col, $row);
										$drugname_cell = $worksheet -> getCellByColumnAndRow($col, 1);
										$val = $cell -> getValue();
										if ($facility_name != "") {
											if ($val == null) {
												$val = 0;
											}
											//echo $facility_name . "---" . $drugname_cell . "---" . $month . "---" . $year . "----" . $val . "---" . $pipeline . "<br/>";
											$fconsumption_report = new Facility_Consumption();
											$fconsumption_report -> facilityname = $facility_name;
											$fconsumption_report -> drugname = $drugname_cell;
											$fconsumption_report -> month = $month;
											$fconsumption_report -> year = $year;
											$fconsumption_report -> total = $val;
											$fconsumption_report -> pipeline = $pipeline;
											$fconsumption_report -> save();
										}

									}
								}
							}

						}
						//If pipeline is Kenya Pharma
						if ($_POST['pipeline_name'] == 2) {

							//Iterate through an unknown structure
							foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
								$highestRow = $worksheet -> getHighestRow();
								$highestColumn = $worksheet -> getHighestColumn();
								$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
								$arr = $objPHPExcel -> getActiveSheet() -> toArray(null, true, true, true);
								for ($row = 9; $row <= ($highestRow - 1); ++$row) {
									$facility_cell = $worksheet -> getCellByColumnAndRow(1, $row);
									$facility_name = $facility_cell -> getValue();
									for ($col = 3; $col < ($highestColumnIndex); ++$col) {
										$cell = $worksheet -> getCellByColumnAndRow($col, $row);
										$drugname_cell = $worksheet -> getCellByColumnAndRow($col, 7);
										$val = $cell -> getValue();
										if ($drugname_cell != "") {
											if ($val == null) {
												$val = 0;
											}
											//echo $facility_name . "---" . $drugname_cell . "---" . $month . "---" . $year . "----" . $val . "---" . $pipeline . "<br/>";
											$fconsumption_report = new Facility_Consumption();
											$fconsumption_report -> facilityname = $facility_name;
											$fconsumption_report -> drugname = $drugname_cell;
											$fconsumption_report -> month = $month;
											$fconsumption_report -> year = $year;
											$fconsumption_report -> total = $val;
											$fconsumption_report -> pipeline = $pipeline;
											$fconsumption_report -> save();

										}

									}
								}
							}

						}

						$this -> session -> set_userdata('upload_counter', '2');
						redirect("pipeline_management/index");

					} else {
						$this -> session -> set_userdata('upload_counter', '1');
						redirect("pipeline_management/index");
					}

				}
				//If report is facility SOH
				if ($report_type == 3) {
					$validity = Facility_Soh::checkValid($pipeline, $month, $year);
					if (!$validity) {
						//If pipeline is Kemsa
						if ($_POST['pipeline_name'] == 1) {

							//Iterate through an unknown structure
							foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
								$highestRow = $worksheet -> getHighestRow();
								$highestColumn = $worksheet -> getHighestColumn();
								$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
								$arr = $objPHPExcel -> getActiveSheet() -> toArray(null, true, true, true);
								for ($row = 9; $row <= ($highestRow - 1); ++$row) {
									$facility_cell = $worksheet -> getCellByColumnAndRow(1, $row);
									$facility_name = $facility_cell -> getValue();
									for ($col = 2; $col < ($highestColumnIndex); ++$col) {
										$cell = $worksheet -> getCellByColumnAndRow($col, $row);
										$drugname_cell = $worksheet -> getCellByColumnAndRow($col, 7);
										$val = $cell -> getValue();
										if ($facility_name != "") {
											if ($val == null) {
												$val = 0;
											}
											//echo $facility_name . "---" . $drugname_cell . "---" . $month . "---" . $year . "----" . $val . "---" . $pipeline . "<br/>";

											$fsoh_report = new Facility_Soh();
											$fsoh_report -> facilityname = $facility_name;
											$fsoh_report -> drugname = $drugname_cell;
											$fsoh_report -> month = $month;
											$fsoh_report -> year = $year;
											$fsoh_report -> total = $val;
											$fsoh_report -> pipeline = $pipeline;
											$fsoh_report -> save();

										}

									}
								}
							}

						}
						//If pipeline is Kenya Pharma
						if ($_POST['pipeline_name'] == 2) {

							//Iterate through an unknown structure
							foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
								$highestRow = $worksheet -> getHighestRow();
								$highestColumn = $worksheet -> getHighestColumn();
								$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
								$arr = $objPHPExcel -> getActiveSheet() -> toArray(null, true, true, true);
								for ($row = 9; $row <= ($highestRow - 2); ++$row) {
									$facility_cell = $worksheet -> getCellByColumnAndRow(1, $row);
									$facility_name = $facility_cell -> getValue();
									for ($col = 3; $col < ($highestColumnIndex); ++$col) {
										$cell = $worksheet -> getCellByColumnAndRow($col, $row);
										$drugname_cell = $worksheet -> getCellByColumnAndRow($col, 7);
										$val = $cell -> getValue();
										if ($drugname_cell != "") {
											if ($val == null) {
												$val = 0;
											}
											//echo $facility_name . "---" . $drugname_cell . "---" . $month . "---" . $year . "----" . $val . "---" . $pipeline . "<br/>";

											$fsoh_report = new Facility_Soh();
											$fsoh_report -> facilityname = $facility_name;
											$fsoh_report -> drugname = $drugname_cell;
											$fsoh_report -> month = $month;
											$fsoh_report -> year = $year;
											$fsoh_report -> total = $val;
											$fsoh_report -> pipeline = $pipeline;
											$fsoh_report -> save();

										}

									}
								}
							}

						}

						$this -> session -> set_userdata('upload_counter', '2');
						redirect("pipeline_management/index");

					} else {
						$this -> session -> set_userdata('upload_counter', '1');
						redirect("pipeline_management/index");
					}
				}
				//If report is pipeline consumption
				if ($report_type == 4) {

					//If pipeline is Kenya Pharma
					if ($_POST['pipeline_name'] == 2) {

						//Iterate through an unknown structure
						foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
							$highestRow = $worksheet -> getHighestRow();
							$highestColumn = $worksheet -> getHighestColumn();
							$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
							$arr = $objPHPExcel -> getActiveSheet() -> toArray(null, true, true, true);
							for ($row = 10; $row <= $highestRow; ++$row) {
								for ($col = 1; $col < $highestColumnIndex; ++$col) {
									$cell = $worksheet -> getCellByColumnAndRow($col, $row);
									$drugname_cell = $worksheet -> getCellByColumnAndRow(0, $row);
									$month = date('m', strtotime($worksheet -> getCellByColumnAndRow($col, 7)));
									$year = $worksheet -> getCellByColumnAndRow($col, 6);
									$val = $cell -> getValue();
									if ($drugname_cell != null) {
										if (is_string($val) || $val == null) {
											$val = 0;
										}
										$validity = Pipeline_Consumption::checkValid($pipeline, $month, $year, $drugname_cell);
										if (!$validity) {
											//echo $pipeline . "---" . $month . "---" . $year . "---" . $drugname_cell . "----" . $val . "<br/>";
											$pc_report = new Pipeline_Consumption();
											$pc_report -> pipeline = $pipeline;
											$pc_report -> month = $month;
											$pc_report -> year = $year;
											$pc_report -> drugname = $drugname_cell;
											$pc_report -> consumption = $val;
											$pc_report -> save();
										}
									}

								}
							}
						}
						$this -> session -> set_userdata('upload_counter', '2');
						redirect("pipeline_management/index");
					} else {
						$this -> session -> set_userdata('upload_counter', '1');
						redirect("pipeline_management/index");
					}
				}
				//If report is patient_scale_up
				if ($report_type == 5) {
					//If pipeline is Kenya Pharma
					if ($_POST['pipeline_name'] == 2) {

						//Iterate through an unknown structure
						foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
							$highestRow = $worksheet -> getHighestRow();
							$highestColumn = $worksheet -> getHighestColumn();
							$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
							$arr = $objPHPExcel -> getActiveSheet() -> toArray(null, true, true, true);
							for ($row = 8; $row <= $highestRow; ++$row) {
								$facility_cell = $worksheet -> getCellByColumnAndRow(0, $row);
								$period_name = $facility_cell -> getValue();
								for ($col = 0; $col < $highestColumnIndex; ++$col) {

								}

								$month = date('m', strtotime($arr[$row]["A"]));
								$year = "20" . date('d', strtotime($arr[$row]["A"]));
								$adult_art = $arr[$row]["B"];
								$paed_art = $arr[$row]["C"];
								$paed_pep = $arr[$row]["E"];
								$adult_pep = $arr[$row]["F"];
								$mother_pmtct = $arr[$row]["G"];
								$infant_pmtct = $arr[$row]["H"];
								//echo $pipeline."---" . $month . "---" . $year . "---" . $adult_art . "---" . $paed_art . "----" . $paed_pep . "---" .$adult_pep."---".$mother_pmtct."---".$infant_pmtct . "<br/>";
								$validity = Patient_Scaleup::checkValid($pipeline, $month, $year);
								if (!$validity) {
									$ps_report = new Patient_Scaleup();
									$ps_report -> pipeline = $pipeline;
									$ps_report -> month = $month;
									$ps_report -> year = $year;
									$ps_report -> adult_art = $adult_art;
									$ps_report -> paed_art = $paed_art;
									$ps_report -> paed_pep = $paed_pep;
									$ps_report -> adult_pep = $adult_pep;
									$ps_report -> mothers_pmtct = $mother_pmtct;
									$ps_report -> infant_pmtct = $infant_pmtct;
									$ps_report -> save();

								}

							}
						}
						$this -> session -> set_userdata('upload_counter', '2');
						redirect("pipeline_management/index");
					} else {
						$this -> session -> set_userdata('upload_counter', '1');
						redirect("pipeline_management/index");
					}

				}//end of patient scaleup
			}//end of book_type(Single sheet)
			if ($_POST['book_type'] == 0) {
				$CurrentWorkSheetIndex = 0;
				//For Kemsa
				if ($pipeline == 1) {
					//Iterate through an unknown structure
					foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
						$CurrentWorkSheetIndex++;
						$worksheetTitle = $worksheet -> getTitle();
						//check for ordering point sheet
						if ($worksheetTitle == "Ordering Points" || $CurrentWorkSheetIndex == 3) {
							$highestRow = $worksheet -> getHighestRow();
							$highestColumn = $worksheet -> getHighestColumn();
							$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
							for ($row = 8; $row <= $highestRow; ++$row) {
								for ($col = 11; $col < $highestColumnIndex; ++$col) {
									//Get facility codes
									$mflcode_cell = $worksheet -> getCellByColumnAndRow(11, $row);
									$facilityname_cell = $worksheet -> getCellByColumnAndRow(12, $row);
									$district_cell = $worksheet -> getCellByColumnAndRow(13, $row);
									$province_cell = $worksheet -> getCellByColumnAndRow(14, $row);
									$central_cell = $worksheet -> getCellByColumnAndRow(15, $row);
									$standalone_cell = $worksheet -> getCellByColumnAndRow(16, $row);
									$store_cell = $worksheet -> getCellByColumnAndRow(17, $row);
									$mfl_code = $mflcode_cell -> getValue();
									$facility_name = $facilityname_cell -> getValue();
									$district = $district_cell -> getValue();
									$province = $province_cell -> getValue();
									$central = 0;
									$standalone = 0;
									$store = 0;
									if ($central_cell -> getValue()) {
										$central = 1;
									}
									if ($standalone_cell -> getValue()) {
										$standalone = 1;
									}
									if ($store_cell -> getValue()) {
										$store = 1;
									}
								}
								$validity = Dashboard_Orderpoints::checkValid($pipeline, $month, $year, $mfl_code);
								if (!$validity) {
									echo $pipeline . "-" . $month . "-" . $year . "-" . $mfl_code . "-" . $facility_name . "-" . $district . "-" . $province . "-" . $central . "-" . $standalone . "-" . $store . "<br/>";
									$orderpoints_report = new Dashboard_Orderpoints();
									$orderpoints_report -> pipeline = $pipeline;
									$orderpoints_report -> month = $month;
									$orderpoints_report -> year = $year;
									$orderpoints_report -> mfl_code = $mfl_code;
									$orderpoints_report -> facility_name = $facility_name;
									$orderpoints_report -> district = $district;
									$orderpoints_report -> province = $province;
									$orderpoints_report -> central = $central;
									$orderpoints_report -> standalone = $standalone;
									$orderpoints_report -> store = $store;
									$orderpoints_report -> save();
								}
							}

						}//end of first worksheet

						if ($worksheetTitle == "Service Points" || $CurrentWorkSheetIndex == 4) {

							$highestRow = $worksheet -> getHighestRow();
							$highestColumn = $worksheet -> getHighestColumn();
							$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
							$arr = $worksheet -> toArray(null, true, true, true);
							for ($row = 4; $row <= $highestRow; ++$row) {
								for ($col = 12; $col < $highestColumnIndex; ++$col) {
									$id_cell = $worksheet -> getCellByColumnAndRow(10, $row);
									//Get facility codes
									$mflcode_cell = $worksheet -> getCellByColumnAndRow(11, $row);
									$facilityname_cell = $worksheet -> getCellByColumnAndRow(12, $row);
									$centralsite_cell = $worksheet -> getCellByColumnAndRow(13, $row);
									$district_cell = $worksheet -> getCellByColumnAndRow(14, $row);
									$province_cell = $worksheet -> getCellByColumnAndRow(15, $row);
									$dispensing_cell = $worksheet -> getCellByColumnAndRow(16, $row);
									$standalone_cell = $worksheet -> getCellByColumnAndRow(17, $row);
									$satelite_cell = $worksheet -> getCellByColumnAndRow(18, $row);
									$mfl_code = $mflcode_cell -> getValue();
									//$facility_name = $facilityname_cell -> getValue();
									$facility_name=$arr[$row]['M'];
									$centralsite_name = $centralsite_cell -> getValue();
									$district = $district_cell -> getValue();
									$province = $province_cell -> getValue();
									$dispensing = 0;
									$standalone = 0;
									$satelite = 0;
									if ($dispensing_cell -> getValue()) {
										$dispensing = 1;
									}
									if ($standalone_cell -> getValue()) {
										$standalone = 1;
									}
									if ($satelite_cell -> getValue()) {
										$satelite = 1;
									}
								}
								if ($id_cell -> getValue()) {
									$facility_name=str_replace(".", "", $facility_name);
									$validity = Dashboard_Servicepoints::checkValid($pipeline, $month, $year, $facility_name,$mfl_code);
									if (!$validity) {
										echo $arr[$row]['K'] . "-" . $pipeline . "-" . $month . "-" . $year . "-" . $mfl_code . "-" . $facility_name . "-" . $centralsite_name . "-" . $district . "-" . $province . "-" . $dispensing . "-" . $standalone . "-" . $satelite . "<br/>";
										$servicepoints_report = new Dashboard_Servicepoints();
										$servicepoints_report -> pipeline = $pipeline;
										$servicepoints_report -> month = $month;
										$servicepoints_report -> year = $year;
										$servicepoints_report -> mfl_code = $mfl_code;
										$servicepoints_report -> facility_name = $facility_name;
										$servicepoints_report -> centralsite_name = $centralsite_name;
										$servicepoints_report -> district = $district;
										$servicepoints_report -> province = $province;
										$servicepoints_report -> dispensing = $dispensing;
										$servicepoints_report -> standalone = $standalone;
										$servicepoints_report -> satellite = $satelite;
										$servicepoints_report -> save();
									}
								}

							}

						}//end of second worksheet
					}
				}
				//For Kenya Pharma
				if ($pipeline == 2) {
					//Iterate through an unknown structure
					foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
						$CurrentWorkSheetIndex++;
						$worksheetTitle = $worksheet -> getTitle();
						//check for ordering point sheet
						if ($worksheetTitle == "ART Ordering Points" || $CurrentWorkSheetIndex == 3) {
							$highestRow = $worksheet -> getHighestRow();
							$highestColumn = $worksheet -> getHighestColumn();
							$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
							for ($row = 9; $row <= $highestRow; ++$row) {
								for ($col = 11; $col < $highestColumnIndex; ++$col) {
									//Get facility codes
									$mflcode_cell = $worksheet -> getCellByColumnAndRow(11, $row);
									$facilityname_cell = $worksheet -> getCellByColumnAndRow(12, $row);
									$centralsite_cell = $worksheet -> getCellByColumnAndRow(13, $row);
									$district_cell = $worksheet -> getCellByColumnAndRow(14, $row);
									$province_cell = $worksheet -> getCellByColumnAndRow(15, $row);
									$facilitytype_cell = $worksheet -> getCellByColumnAndRow(16, $row);
									$mfl_code = $mflcode_cell -> getValue();
									$facility_name = $facilityname_cell -> getValue();
									$district = $district_cell -> getValue();
									$province = $province_cell -> getValue();
									$central = 0;
									$standalone = 0;
									$store = 0;
									if ($facilitytype_cell -> getValue() == "Central Site") {
										$central = 1;
										$standalone = 0;
										$store = 0;
									}
									if ($facilitytype_cell -> getValue() == "Standalone Site") {
										$central = 0;
										$standalone = 1;
										$store = 0;
									}
									if ($facilitytype_cell -> getValue() == "Satellite Site") {
										$central = 0;
										$standalone = 0;
										$store = $centralsite_cell -> getValue();
									}
								}
								$validity = Dashboard_Orderpoints::checkValid($pipeline, $month, $year, $mfl_code);
								if (!$validity) {
									echo $pipeline . "-" . $month . "-" . $year . "-" . $mfl_code . "-" . $facility_name . "-" . $district . "-" . $province . "-" . $central . "-" . $standalone . "-" . $store . "<br/>";
									$orderpoints_report = new Dashboard_Orderpoints();
									$orderpoints_report -> pipeline = $pipeline;
									$orderpoints_report -> month = $month;
									$orderpoints_report -> year = $year;
									$orderpoints_report -> mfl_code = $mfl_code;
									$orderpoints_report -> facility_name = $facility_name;
									$orderpoints_report -> district = $district;
									$orderpoints_report -> province = $province;
									$orderpoints_report -> central = $central;
									$orderpoints_report -> standalone = $standalone;
									$orderpoints_report -> store = $store;
									$orderpoints_report -> save();
								}
							}

						}//end of first worksheet
						if ($worksheetTitle == "ART Service Points" || $CurrentWorkSheetIndex == 4) {

							$highestRow = $worksheet -> getHighestRow();
							$highestColumn = $worksheet -> getHighestColumn();
							$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
							$arr = $worksheet -> toArray(null, true, true, true);
							for ($row = 6; $row <= $highestRow; ++$row) {
								for ($col = 12; $col < $highestColumnIndex; ++$col) {
									$id_cell = $worksheet -> getCellByColumnAndRow(10, $row);
									//Get facility codes
									$mflcode_cell = $worksheet -> getCellByColumnAndRow(11, $row);
									$facilityname_cell = $worksheet -> getCellByColumnAndRow(12, $row);
									$centralsite_cell = $worksheet -> getCellByColumnAndRow(13, $row);
									$district_cell = $worksheet -> getCellByColumnAndRow(14, $row);
									$province_cell = $worksheet -> getCellByColumnAndRow(15, $row);
									$facilitytype_cell = $worksheet -> getCellByColumnAndRow(16, $row);
									$mfl_code = $mflcode_cell -> getValue();
									$facility_name = $facilityname_cell -> getValue();
									$centralsite_name = $centralsite_cell -> getValue();
									$district = $district_cell -> getValue();
									$province = $province_cell -> getValue();
									$dispensing = 0;
									$standalone = 0;
									$satelite = 0;

									if ($facilitytype_cell -> getValue() == "Standalone Site") {
										$dispensing = 0;
										$standalone = 1;
										$satelite = 0;
									}
									if ($facilitytype_cell -> getValue() == "Satellite Site") {
										$dispensing = 0;
										$standalone = 0;
										$satelite = 1;
									}
									if ($facilitytype_cell -> getValue() == "Dispensing Point") {
										$dispensing = 1;
										$standalone = 0;
										$satelite = 0;
									}
								}
								if ($id_cell -> getValue()) {
									$facility_name=str_replace(".", "", $facility_name);
									$validity = Dashboard_Servicepoints::checkValid($pipeline, $month, $year, $facility_name,$mfl_code);
									if (!$validity) {
										echo $arr[$row]['K'] . "-" . $pipeline . "-" . $month . "-" . $year . "-" . $mfl_code . "-" . $facility_name . "-" . $centralsite_name . "-" . $district . "-" . $province . "-" . $dispensing . "-" . $standalone . "-" . $satelite . "<br/>";
										$servicepoints_report = new Dashboard_Servicepoints();
										$servicepoints_report -> pipeline = $pipeline;
										$servicepoints_report -> month = $month;
										$servicepoints_report -> year = $year;
										$servicepoints_report -> mfl_code = $mfl_code;
										$servicepoints_report -> facility_name = $facility_name;
										$servicepoints_report -> centralsite_name = $centralsite_name;
										$servicepoints_report -> district = $district;
										$servicepoints_report -> province = $province;
										$servicepoints_report -> dispensing = $dispensing;
										$servicepoints_report -> standalone = $standalone;
										$servicepoints_report -> satellite = $satelite;
										$servicepoints_report -> save();
									}
								}

							}

						}//end of second worksheet
					}
				}

			}
		}//End of Button save is clicked
		else {
			$this -> session -> set_userdata('upload_counter', '1');
			redirect("pipeline_management/index");
		}

	}

	public function base_params($data) {
		$data['title'] = "Pipleline Stock Data";
		$data['banner_text'] = "Pipeline Monthly Stock Data Upload";
		$data['content_view'] = "settings_v";
		$data['quick_link'] = "pipeline";
		$this -> load -> view('template_admin', $data);
	}

}
