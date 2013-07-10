<?php
class report_management extends MY_Controller {

	var $counter = 0;
	function __construct() {
		parent::__construct();
		$this -> load -> database();
		ini_set("max_execution_time", "1000000");

	}

	public function index() {
		$this -> listing();
	}

	public function listing($data = "") {
		$data['content_view'] = "report_v";
		$this -> base_params($data);
	}

	public function patient_enrolled($from = "", $to = "", $supported_by = 0) {
		//Variables
		$facility_code = $this -> session -> userdata("facility");
		$from = date('Y-m-d', strtotime($from));
		$to = date('Y-m-d', strtotime($to));

		//art
		$adult_male_art_outpatient = 0;
		$adult_male_art_inpatient = 0;
		$adult_male_art_transferin = 0;
		$adult_male_art_casualty = 0;
		$adult_male_art_transit = 0;
		$adult_male_art_htc = 0;
		$adult_male_art_other = 0;

		$child_male_art_outpatient = 0;
		$child_male_art_inpatient = 0;
		$child_male_art_transferin = 0;
		$child_male_art_casualty = 0;
		$child_male_art_transit = 0;
		$child_male_art_htc = 0;
		$child_male_art_other = 0;

		$adult_female_art_outpatient = 0;
		$adult_female_art_inpatient = 0;
		$adult_female_art_transferin = 0;
		$adult_female_art_casualty = 0;
		$adult_female_art_transit = 0;
		$adult_female_art_htc = 0;
		$adult_female_art_other = 0;

		$child_female_art_outpatient = 0;
		$child_female_art_inpatient = 0;
		$child_female_art_transferin = 0;
		$child_female_art_casualty = 0;
		$child_female_art_transit = 0;
		$child_female_art_htc = 0;
		$child_female_art_other = 0;

		//PEP
		$adult_male_pep_outpatient = 0;
		$adult_male_pep_inpatient = 0;
		$adult_male_pep_transferin = 0;
		$adult_male_pep_casualty = 0;
		$adult_male_pep_transit = 0;
		$adult_male_pep_htc = 0;
		$adult_male_pep_other = 0;

		$child_male_pep_outpatient = 0;
		$child_male_pep_inpatient = 0;
		$child_male_pep_transferin = 0;
		$child_male_pep_casualty = 0;
		$child_male_pep_transit = 0;
		$child_male_pep_htc = 0;
		$child_male_pep_other = 0;

		$adult_female_pep_outpatient = 0;
		$adult_female_pep_inpatient = 0;
		$adult_female_pep_transferin = 0;
		$adult_female_pep_casualty = 0;
		$adult_female_pep_transit = 0;
		$adult_female_pep_htc = 0;
		$adult_female_pep_other = 0;

		$child_female_pep_outpatient = 0;
		$child_female_pep_inpatient = 0;
		$child_female_pep_transferin = 0;
		$child_female_pep_casualty = 0;
		$child_female_pep_transit = 0;
		$child_female_pep_htc = 0;
		$child_female_pep_other = 0;

		//PMTCT
		$adult_male_pmtct_outpatient = 0;
		$adult_male_pmtct_inpatient = 0;
		$adult_male_pmtct_transferin = 0;
		$adult_male_pmtct_casualty = 0;
		$adult_male_pmtct_transit = 0;
		$adult_male_pmtct_htc = 0;
		$adult_male_pmtct_other = 0;

		$child_male_pmtct_outpatient = 0;
		$child_male_pmtct_inpatient = 0;
		$child_male_pmtct_transferin = 0;
		$child_male_pmtct_casualty = 0;
		$child_male_pmtct_transit = 0;
		$child_male_pmtct_htc = 0;
		$child_male_pmtct_other = 0;

		$adult_female_pmtct_outpatient = 0;
		$adult_female_pmtct_inpatient = 0;
		$adult_female_pmtct_transferin = 0;
		$adult_female_pmtct_casualty = 0;
		$adult_female_pmtct_transit = 0;
		$adult_female_pmtct_htc = 0;
		$adult_female_pmtct_other = 0;

		$child_female_pmtct_outpatient = 0;
		$child_female_pmtct_inpatient = 0;
		$child_female_pmtct_transferin = 0;
		$child_female_pmtct_casualty = 0;
		$child_female_pmtct_transit = 0;
		$child_female_pmtct_htc = 0;
		$child_female_pmtct_other = 0;

		//OI
		$adult_male_oi_outpatient = 0;
		$adult_male_oi_inpatient = 0;
		$adult_male_oi_transferin = 0;
		$adult_male_oi_casualty = 0;
		$adult_male_oi_transit = 0;
		$adult_male_oi_htc = 0;
		$adult_male_oi_other = 0;

		$child_male_oi_outpatient = 0;
		$child_male_oi_inpatient = 0;
		$child_male_oi_transferin = 0;
		$child_male_oi_casualty = 0;
		$child_male_oi_transit = 0;
		$child_male_oi_htc = 0;
		$child_male_oi_other = 0;

		$adult_female_oi_outpatient = 0;
		$adult_female_oi_inpatient = 0;
		$adult_female_oi_transferin = 0;
		$adult_female_oi_casualty = 0;
		$adult_female_oi_transit = 0;
		$adult_female_oi_htc = 0;
		$adult_female_oi_other = 0;

		$child_female_oi_outpatient = 0;
		$child_female_oi_inpatient = 0;
		$child_female_oi_transferin = 0;
		$child_female_oi_casualty = 0;
		$child_female_oi_transit = 0;
		$child_female_oi_htc = 0;
		$child_female_oi_other = 0;

		if ($supported_by == 0) {
			$supported_query = "AND(supported_by=1 OR supported_by=2) AND facility_code='$facility_code'";
		}
		if ($supported_by == 1) {
			$supported_query = "AND supported_by=1 AND facility_code='$facility_code'";
		}
		if ($supported_by == 2) {
			$supported_query = "AND supported_by=2 AND facility_code='$facility_code'";
		}
		$sql = "select count(*) as total, service, gender,r.name,source,ROUND((DATEDIFF(CURDATE(),dob)/360)) as age from patient p left join regimen_service_type r on p.service = r.id where date_enrolled between '$from' and '$to' $supported_query and r.active=1 group by service,gender,source,age";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();

		if ($results) {
			//Loop through array
			foreach ($results as $result) {
				if ($result['age'] >= 15) {
					//Check if adult
					if ($result['gender'] == 1) {
						//Check if male adult
						if ($result['service'] == 1) {
							//Check if ART
							if ($result['source'] == 1) {
								//Check if Outpatient
								$adult_male_art_outpatient++;
							} else if ($result['source'] == 2) {
								//Check if inpatient
								$adult_male_art_inpatient++;
							} else if ($result['source'] == 3) {
								//Check if Transfer in
								$adult_male_art_transferin++;
							} else if ($result['source'] == 4) {
								//Check if Casualty
								$adult_male_art_casualty++;
							} else if ($result['source'] == 5) {
								//Check if Transit
								$adult_male_art_transit;
							} else if ($result['source'] == 6) {
								//Check if HTC
								$adult_male_art_htc++;
							} else {
								//Check if other
								$adult_male_art_other++;
							}

						} else if ($result['service'] == 2) {
							//Check if PEP
							if ($result['source'] == 1) {
								//Check if Outpatient
								$adult_male_pep_outpatient++;
							} else if ($result['source'] == 2) {
								//Check if inpatient
								$adult_male_pep_inpatient++;
							} else if ($result['source'] == 3) {
								//Check if Transfer in
								$adult_male_pep_transferin++;
							} else if ($result['source'] == 4) {
								//Check if Casualty
								$adult_male_pep_casualty++;
							} else if ($result['source'] == 5) {
								//Check if Transit
								$adult_male_pep_transit++;
							} else if ($result['source'] == 6) {
								//Check if HTC
								$adult_male_pep_htc++;
							} else {
								//Check if other
								$adult_male_pep_other++;
							}
						} else if ($result['service'] == 3) {
							//Check if PMTCT
							if ($result['source'] == 1) {
								//Check if Outpatient
								$adult_male_pmtct_outpatient++;
							} else if ($result['source'] == 2) {
								//Check if inpatient
								$adult_male_pmtct_inpatient++;
							} else if ($result['source'] == 3) {
								//Check if Transfer in
								$adult_male_pmtct_transferin++;
							} else if ($result['source'] == 4) {
								//Check if Casualty
								$adult_male_pmtct_casualty++;
							} else if ($result['source'] == 5) {
								//Check if Transit
								$adult_male_pmtct_transit++;
							} else if ($result['source'] == 6) {
								//Check if HTC
								$adult_male_pmtct_htc++;
							} else {
								//Check if other
								$adult_male_pmtct_other++;
							}
						} else if ($result['service'] == 5) {
							//Check if OI
							if ($result['source'] == 1) {
								//Check if Outpatient
								$adult_male_oi_outpatient++;
							} else if ($result['source'] == 2) {
								//Check if inpatient
								$adult_male_oi_inpatient++;
							} else if ($result['source'] == 3) {
								//Check if Transfer in
								$adult_male_oi_transferin++;
							} else if ($result['source'] == 4) {
								//Check if Casualty
								$adult_male_oi_casualty++;
							} else if ($result['source'] == 5) {
								//Check if Transit
								$adult_male_oi_transit++;
							} else if ($result['source'] == 6) {
								//Check if HTC
								$adult_male_oi_htc++;
							} else {
								//Check if other
								$adult_male_oi_other++;
							}
						}
					} else if ($result['gender'] == 2) {
						//Check if female adult
						if ($result['service'] == 1) {
							//Check if ART
							if ($result['source'] == 1) {
								//Check if Outpatient
								$adult_female_art_outpatient++;
							} else if ($result['source'] == 2) {
								//Check if inpatient
								$adult_female_art_inpatient++;
							} else if ($result['source'] == 3) {
								//Check if Transfer in
								$adult_female_art_transferin++;
							} else if ($result['source'] == 4) {
								//Check if Casualty
								$adult_female_art_casualty++;
							} else if ($result['source'] == 5) {
								//Check if Transit
								$adult_female_art_transit++;
							} else if ($result['source'] == 6) {
								//Check if HTC
								$adult_female_art_htc++;
							} else {
								//Check if other
								$adult_female_art_other++;
							}
						} else if ($result['service'] == 2) {
							//Check if PEP
							if ($result['source'] == 1) {
								//Check if Outpatient
								$adult_female_pep_outpatient++;
							} else if ($result['source'] == 2) {
								//Check if inpatient
								$adult_female_pep_inpatient++;
							} else if ($result['source'] == 3) {
								//Check if Transfer in
								$adult_female_pep_transferin++;
							} else if ($result['source'] == 4) {
								//Check if Casualty
								$adult_female_pep_casualty++;
							} else if ($result['source'] == 5) {
								//Check if Transit
								$adult_female_pep_transit++;
							} else if ($result['source'] == 6) {
								//Check if HTC
								$adult_female_pep_htc++;
							} else {
								//Check if other
								$adult_female_pep_other++;
							}
						} else if ($result['service'] == 3) {
							//Check if PMTCT
							if ($result['source'] == 1) {
								//Check if Outpatient
								$adult_female_pmtct_outpatient++;
							} else if ($result['source'] == 2) {
								//Check if inpatient
								$adult_female_pmtct_inpatient++;
							} else if ($result['source'] == 3) {
								//Check if Transfer in
								$adult_female_pmtct_transferin++;
							} else if ($result['source'] == 4) {
								//Check if Casualty
								$adult_female_pmtct_casualty++;
							} else if ($result['source'] == 5) {
								//Check if Transit
								$adult_female_pmtct_transit++;
							} else if ($result['source'] == 6) {
								//Check if HTC
								$adult_female_pmtct_htc++;
							} else {
								//Check if other
								$adult_female_pmtct_other++;
							}
						} else if ($result['service'] == 5) {
							//Check if OI
							if ($result['source'] == 1) {
								//Check if Outpatient
								$adult_female_oi_outpatient++;
							} else if ($result['source'] == 2) {
								//Check if inpatient
								$adult_female_oi_inpatient++;
							} else if ($result['source'] == 3) {
								//Check if Transfer in
								$adult_female_oi_transferin++;
							} else if ($result['source'] == 4) {
								//Check if Casualty
								$adult_female_oi_casualty++;
							} else if ($result['source'] == 5) {
								//Check if Transit
								$adult_female_oi_transit++;
							} else if ($result['source'] == 6) {
								//Check if HTC
								$adult_female_oi_htc++;
							} else {
								//Check if other
								$adult_female_oi_other++;
							}
						}
					}
				} else if ($result['age'] < 15) {
					//Check if child
					if ($result['gender'] == 1) {
						//Check if male child
						if ($result['service'] == 1) {
							//Check if ART
							if ($result['source'] == 1) {
								//Check if Outpatient
								$child_male_art_outpatient++;
							} else if ($result['source'] == 2) {
								//Check if inpatient
								$child_male_art_inpatient++;
							} else if ($result['source'] == 3) {
								//Check if Transfer in
								$child_male_art_transferin++;
							} else if ($result['source'] == 4) {
								//Check if Casualty
								$child_male_art_casualty++;
							} else if ($result['source'] == 5) {
								//Check if Transit
								$child_male_art_transit++;
							} else if ($result['source'] == 6) {
								//Check if HTC
								$child_male_art_htc++;
							} else {
								//Check if other
								$child_male_art_other++;
							}
						} else if ($result['service'] == 2) {
							//Check if PEP
							if ($result['source'] == 1) {
								//Check if Outpatient
								$child_male_pep_outpatient++;
							} else if ($result['source'] == 2) {
								//Check if inpatient
								$child_male_pep_inpatient++;
							} else if ($result['source'] == 3) {
								//Check if Transfer in
								$child_male_pep_transferin++;
							} else if ($result['source'] == 4) {
								//Check if Casualty
								$child_male_pep_casualty++;
							} else if ($result['source'] == 5) {
								//Check if Transit
								$child_male_pep_transit++;
							} else if ($result['source'] == 6) {
								//Check if HTC
								$child_male_pep_htc++;
							} else {
								//Check if other
								$child_male_pep_other++;
							}
						} else if ($result['service'] == 3) {
							//Check if PMTCT
							if ($result['source'] == 1) {
								//Check if Outpatient
								$child_male_pmtct_outpatient++;
							} else if ($result['source'] == 2) {
								//Check if inpatient
								$child_male_pmtct_inpatient++;
							} else if ($result['source'] == 3) {
								//Check if Transfer in
								$child_male_pmtct_transferin++;
							} else if ($result['source'] == 4) {
								//Check if Casualty
								$child_male_pmtct_casualty++;
							} else if ($result['source'] == 5) {
								//Check if Transit
								$child_male_pmtct_transit++;
							} else if ($result['source'] == 6) {
								//Check if HTC
								$child_male_pmtct_htc++;
							} else {
								//Check if other
								$child_male_pmtct_other++;
							}
						} else if ($result['service'] == 5) {
							//Check if OI
							if ($result['source'] == 1) {
								//Check if Outpatient
								$child_male_oi_outpatient++;
							} else if ($result['source'] == 2) {
								//Check if inpatient
								$child_male_oi_inpatient++;
							} else if ($result['source'] == 3) {
								//Check if Transfer in
								$child_male_oi_transferin++;
							} else if ($result['source'] == 4) {
								//Check if Casualty
								$child_male_oi_casualty++;
							} else if ($result['source'] == 5) {
								//Check if Transit
								$child_male_oi_transit++;
							} else if ($result['source'] == 6) {
								//Check if HTC
								$child_male_oi_htc++;
							} else {
								//Check if other
								$child_male_oi_other++;
							}
						}
					} else if ($result['gender'] == 2) {
						//Check if female child
						if ($result['service'] == 1) {
							//Check if ART
							if ($result['source'] == 1) {
								//Check if Outpatient
								$child_female_art_outpatient++;
							} else if ($result['source'] == 2) {
								//Check if inpatient
								$child_female_art_inpatient++;
							} else if ($result['source'] == 3) {
								//Check if Transfer in
								$child_female_art_transferin++;
							} else if ($result['source'] == 4) {
								//Check if Casualty
								$child_female_art_casualty++;
							} else if ($result['source'] == 5) {
								//Check if Transit
								$child_female_art_transit++;
							} else if ($result['source'] == 6) {
								//Check if HTC
								$child_female_art_htc++;
							} else {
								//Check if other
								$child_female_art_other++;
							}
						} else if ($result['service'] == 2) {
							//Check if PEP
							if ($result['source'] == 1) {
								//Check if Outpatient
								$child_female_pep_outpatient++;
							} else if ($result['source'] == 2) {
								//Check if inpatient
								$child_female_pep_inpatient++;
							} else if ($result['source'] == 3) {
								//Check if Transfer in
								$child_female_pep_transferin++;
							} else if ($result['source'] == 4) {
								//Check if Casualty
								$child_female_pep_casualty++;
							} else if ($result['source'] == 5) {
								//Check if Transit
								$child_female_pep_transit++;
							} else if ($result['source'] == 6) {
								//Check if HTC
								$child_female_pep_htc++;
							} else {
								//Check if other
								$child_female_pep_other++;
							}
						} else if ($result['service'] == 3) {
							//Check if PMTCT
							if ($result['source'] == 1) {
								//Check if Outpatient
								$child_female_pmtct_outpatient++;
							} else if ($result['source'] == 2) {
								//Check if inpatient
								$child_female_pmtct_inpatient++;
							} else if ($result['source'] == 3) {
								//Check if Transfer in
								$child_female_pmtct_transferin++;
							} else if ($result['source'] == 4) {
								//Check if Casualty
								$child_female_pmtct_casualty++;
							} else if ($result['source'] == 5) {
								//Check if Transit
								$child_female_pmtct_transit++;
							} else if ($result['source'] == 6) {
								//Check if HTC
								$child_female_pmtct_htc++;
							} else {
								//Check if other
								$child_female_pmtct_other++;
							}
						} else if ($result['service'] == 5) {
							//Check if OI
							if ($result['source'] == 1) {
								//Check if Outpatient
								$child_female_oi_outpatient++;
							} else if ($result['source'] == 2) {
								//Check if inpatient
								$child_female_oi_inpatient++;
							} else if ($result['source'] == 3) {
								//Check if Transfer in
								$child_female_oi_transferin++;
							} else if ($result['source'] == 4) {
								//Check if Casualty
								$child_female_oi_casualty++;
							} else if ($result['source'] == 5) {
								//Check if Transit
								$child_female_oi_transit++;
							} else if ($result['source'] == 6) {
								//Check if HTC
								$child_female_oi_htc++;
							} else {
								//Check if other
								$child_female_oi_other++;
							}
						}
					}
				}

			}
		}

		//Push to array
		$data = array();
		$data['adult_male_art_outpatient'] = $adult_male_art_outpatient;
		$data['adult_male_art_inpatient'] = $adult_male_art_inpatient;
		$data['adult_male_art_transferin'] = $adult_male_art_transferin;
		$data['adult_male_art_casualty'] = $adult_male_art_casualty;
		$data['adult_male_art_transit'] = $adult_male_art_transit;
		$data['adult_male_art_htc'] = $adult_male_art_htc;
		$data['adult_male_art_other'] = $adult_male_art_other;

		$data['child_male_art_outpatient'] = $child_male_art_outpatient;
		$data['child_male_art_inpatient'] = $child_male_art_inpatient;
		$data['child_male_art_transferin'] = $child_male_art_transferin;
		$data['child_male_art_casualty'] = $child_male_art_casualty;
		$data['child_male_art_transit'] = $child_male_art_transit;
		$data['child_male_art_htc'] = $child_male_art_htc;
		$data['child_male_art_other'] = $child_male_art_other;

		$data['adult_female_art_outpatient'] = $adult_female_art_outpatient;
		$data['adult_female_art_inpatient'] = $adult_female_art_inpatient;
		$data['adult_female_art_transferin'] = $adult_female_art_transferin;
		$data['adult_female_art_casualty'] = $adult_female_art_casualty;
		$data['adult_female_art_transit'] = $adult_female_art_transit;
		$data['adult_female_art_htc'] = $adult_female_art_htc;
		$data['adult_female_art_other'] = $adult_female_art_other;

		$data['child_female_art_outpatient'] = $child_female_art_outpatient;
		$data['child_female_art_inpatient'] = $child_female_art_inpatient;
		$data['child_female_art_transferin'] = $child_female_art_transferin;
		$data['child_female_art_casualty'] = $child_female_art_casualty;
		$data['child_female_art_transit'] = $child_female_art_transit;
		$data['child_female_art_htc'] = $child_female_art_htc;
		$data['child_female_art_other'] = $child_female_art_other;

		$data['adult_male_pep_outpatient'] = $adult_male_pep_outpatient;
		$data['adult_male_pep_inpatient'] = $adult_male_pep_inpatient;
		$data['adult_male_pep_transferin'] = $adult_male_pep_transferin;
		$data['adult_male_pep_casualty'] = $adult_male_pep_casualty;
		$data['adult_male_pep_transit'] = $adult_male_pep_transit;
		$data['adult_male_pep_htc'] = $adult_male_pep_htc;
		$data['adult_male_pep_other'] = $adult_male_pep_other;

		$data['child_male_pep_outpatient'] = $child_male_pep_outpatient;
		$data['child_male_pep_inpatient'] = $child_male_pep_inpatient;
		$data['child_male_pep_transferin'] = $child_male_pep_transferin;
		$data['child_male_pep_casualty'] = $child_male_pep_casualty;
		$data['child_male_pep_transit'] = $child_male_pep_transit;
		$data['child_male_pep_htc'] = $child_male_pep_htc;
		$data['child_male_pep_other'] = $child_male_pep_other;

		$data['adult_female_pep_outpatient'] = $adult_female_pep_outpatient;
		$data['adult_female_pep_inpatient'] = $adult_female_pep_inpatient;
		$data['adult_female_pep_transferin'] = $adult_female_pep_transferin;
		$data['adult_female_pep_casualty'] = $adult_female_pep_casualty;
		$data['adult_female_pep_transit'] = $adult_female_pep_transit;
		$data['adult_female_pep_htc'] = $adult_female_pep_htc;
		$data['adult_female_pep_other'] = $adult_female_pep_other;

		$data['child_female_pep_outpatient'] = $child_female_pep_outpatient;
		$data['child_female_pep_inpatient'] = $child_female_pep_inpatient;
		$data['child_female_pep_transferin'] = $child_female_pep_transferin;
		$data['child_female_pep_casualty'] = $child_female_pep_casualty;
		$data['child_female_pep_transit'] = $child_female_pep_transit;
		$data['child_female_pep_htc'] = $child_female_pep_htc;
		$data['child_female_pep_other'] = $child_female_pep_other;

		$data['adult_male_pmtct_outpatient'] = $adult_male_pmtct_outpatient;
		$data['adult_male_pmtct_inpatient'] = $adult_male_pmtct_inpatient;
		$data['adult_male_pmtct_transferin'] = $adult_male_pmtct_transferin;
		$data['adult_male_pmtct_casualty'] = $adult_male_pmtct_casualty;
		$data['adult_male_pmtct_transit'] = $adult_male_pmtct_transit;
		$data['adult_male_pmtct_htc'] = $adult_male_pmtct_htc;
		$data['adult_male_pmtct_other'] = $adult_male_pmtct_other;

		$data['child_male_pmtct_outpatient'] = $child_male_pmtct_outpatient;
		$data['child_male_pmtct_inpatient'] = $child_male_pmtct_inpatient;
		$data['child_male_pmtct_transferin'] = $child_male_pmtct_transferin;
		$data['child_male_pmtct_casualty'] = $child_male_pmtct_casualty;
		$data['child_male_pmtct_transit'] = $child_male_pmtct_transit;
		$data['child_male_pmtct_htc'] = $child_male_pmtct_htc;
		$data['child_male_pmtct_other'] = $child_male_pmtct_other;

		$data['adult_female_pmtct_outpatient'] = $adult_female_pmtct_outpatient;
		$data['adult_female_pmtct_inpatient'] = $adult_female_pmtct_inpatient;
		$data['adult_female_pmtct_transferin'] = $adult_female_pmtct_transferin;
		$data['adult_female_pmtct_casualty'] = $adult_female_pmtct_casualty;
		$data['adult_female_pmtct_transit'] = $adult_female_pmtct_transit;
		$data['adult_female_pmtct_htc'] = $adult_female_pmtct_htc;
		$data['adult_female_pmtct_other'] = $adult_female_pmtct_other;

		$data['child_female_pmtct_outpatient'] = $child_female_pmtct_outpatient;
		$data['child_female_pmtct_inpatient'] = $child_female_pmtct_inpatient;
		$data['child_female_pmtct_transferin'] = $child_female_pmtct_transferin;
		$data['child_female_pmtct_casualty'] = $child_female_pmtct_casualty;
		$data['child_female_pmtct_transit'] = $child_female_pmtct_transit;
		$data['child_female_pmtct_htc'] = $child_female_pmtct_htc;
		$data['child_female_pmtct_other'] = $child_female_pmtct_other;

		$data['adult_male_oi_outpatient'] = $adult_male_oi_outpatient;
		$data['adult_male_oi_inpatient'] = $adult_male_oi_inpatient;
		$data['adult_male_oi_transferin'] = $adult_male_oi_transferin;
		$data['adult_male_oi_casualty'] = $adult_male_oi_casualty;
		$data['adult_male_oi_transit'] = $adult_male_oi_transit;
		$data['adult_male_oi_htc'] = $adult_male_oi_htc;
		$data['adult_male_oi_other'] = $adult_male_oi_other;

		$data['child_male_oi_outpatient'] = $child_male_oi_outpatient;
		$data['child_male_oi_inpatient'] = $child_male_oi_inpatient;
		$data['child_male_oi_transferin'] = $child_male_oi_transferin;
		$data['child_male_oi_casualty'] = $child_male_oi_casualty;
		$data['child_male_oi_transit'] = $child_male_oi_transit;
		$data['child_male_oi_htc'] = $child_male_oi_htc;
		$data['child_male_oi_other'] = $child_male_oi_other;

		$data['adult_female_oi_outpatient'] = $adult_female_oi_outpatient;
		$data['adult_female_oi_inpatient'] = $adult_female_oi_inpatient;
		$data['adult_female_oi_transferin'] = $adult_female_oi_transferin;
		$data['adult_female_oi_casualty'] = $adult_female_oi_casualty;
		$data['adult_female_oi_transit'] = $adult_female_oi_transit;
		$data['adult_female_oi_htc'] = $adult_female_oi_htc;
		$data['adult_female_oi_other'] = $adult_female_oi_other;

		$data['child_female_oi_outpatient'] = $child_female_oi_outpatient;
		$data['child_female_oi_inpatient'] = $child_female_oi_inpatient;
		$data['child_female_oi_transferin'] = $child_female_oi_transferin;
		$data['child_female_oi_casualty'] = $child_female_oi_casualty;
		$data['child_female_oi_transit'] = $child_female_oi_transit;
		$data['child_female_oi_htc'] = $child_female_oi_htc;
		$data['child_female_oi_other'] = $child_female_oi_other;

		//Totals for Service Lines(Adult Male)
		$data['total_adult_male_art'] = $adult_male_art_outpatient + $adult_male_art_inpatient + $adult_male_art_transferin + $adult_male_art_casualty + $adult_male_art_transit + $adult_male_art_htc + $adult_male_art_other;
		$data['total_adult_male_pep'] = $adult_male_pep_outpatient + $adult_male_pep_inpatient + $adult_male_pep_transferin + $adult_male_pep_casualty + $adult_male_pep_transit + $adult_male_pep_htc + $adult_male_pep_other;
		$data['total_adult_male_pmtct'] = $adult_male_pmtct_outpatient + $adult_male_pmtct_inpatient + $adult_male_pmtct_transferin + $adult_male_pmtct_casualty + $adult_male_pmtct_transit + $adult_male_pmtct_htc + $adult_male_pmtct_other;
		$data['total_adult_male_oi'] = $adult_male_oi_outpatient + $adult_male_oi_inpatient + $adult_male_oi_transferin + $adult_male_oi_casualty + $adult_male_oi_transit + $adult_male_oi_htc + $adult_male_oi_other;
		$data['overall_line_adult_male'] = $data['total_adult_male_art'] + $data['total_adult_male_pep'] + $data['total_adult_male_oi'];

		//Totals for sources(Adult Male)
		$data['total_adult_male_outpatient'] = $adult_male_art_outpatient + $adult_male_pep_outpatient + $adult_male_pmtct_outpatient + $adult_male_oi_outpatient;
		$data['total_adult_male_inpatient'] = $adult_male_art_inpatient + $adult_male_pep_inpatient + $adult_male_pmtct_inpatient + $adult_male_oi_inpatient;
		$data['total_adult_male_transferin'] = $adult_male_art_transferin + $adult_male_pep_transferin + $adult_male_pmtct_transferin + $adult_male_oi_transferin;
		$data['total_adult_male_casualty'] = $adult_male_art_casualty + $adult_male_pep_casualty + $adult_male_pmtct_casualty + $adult_male_oi_casualty;
		$data['total_adult_male_transit'] = $adult_male_art_transit + $adult_male_pep_transit + $adult_male_pmtct_transit + $adult_male_oi_transit;
		$data['total_adult_male_htc'] = $adult_male_art_htc + $adult_male_pep_htc + $adult_male_pmtct_htc + $adult_male_oi_htc;
		$data['total_adult_male_other'] = $adult_male_art_other + $adult_male_pep_other + $adult_male_pmtct_other + $adult_male_oi_other;

		//Totals for Service Lines(Adult Female)
		$data['total_adult_female_art'] = $adult_female_art_outpatient + $adult_female_art_inpatient + $adult_female_art_transferin + $adult_female_art_casualty + $adult_female_art_transit + $adult_female_art_htc + $adult_female_art_other;
		$data['total_adult_female_pep'] = $adult_female_pep_outpatient + $adult_female_pep_inpatient + $adult_female_pep_transferin + $adult_female_pep_casualty + $adult_female_pep_transit + $adult_female_pep_htc + $adult_female_pep_other;
		$data['total_adult_female_pmtct'] = $adult_female_pmtct_outpatient + $adult_female_pmtct_inpatient + $adult_female_pmtct_transferin + $adult_female_pmtct_casualty + $adult_female_pmtct_transit + $adult_female_pmtct_htc + $adult_female_pmtct_other;
		$data['total_adult_female_oi'] = $adult_female_oi_outpatient + $adult_female_oi_inpatient + $adult_female_oi_transferin + $adult_female_oi_casualty + $adult_female_oi_transit + $adult_female_oi_htc + $adult_female_oi_other;
		$data['overall_line_adult_female'] = $data['total_adult_female_art'] + $data['total_adult_female_pep'] + $data['total_adult_female_pmtct'] + $data['total_adult_female_oi'];

		//Totals for sources(Adult Female)
		$data['total_adult_female_outpatient'] = $adult_female_art_outpatient + $adult_female_pep_outpatient + $adult_female_pmtct_outpatient + $adult_female_oi_outpatient;
		$data['total_adult_female_inpatient'] = $adult_female_art_inpatient + $adult_female_pep_inpatient + $adult_female_pmtct_inpatient + $adult_female_oi_inpatient;
		$data['total_adult_female_transferin'] = $adult_female_art_transferin + $adult_female_pep_transferin + $adult_female_pmtct_transferin + $adult_female_oi_transferin;
		$data['total_adult_female_casualty'] = $adult_female_art_casualty + $adult_female_pep_casualty + $adult_female_pmtct_casualty + $adult_female_oi_casualty;
		$data['total_adult_female_transit'] = $adult_female_art_transit + $adult_female_pep_transit + $adult_female_pmtct_transit + $adult_female_oi_transit;
		$data['total_adult_female_htc'] = $adult_female_art_htc + $adult_female_pep_htc + $adult_female_pmtct_htc + $adult_female_oi_htc;
		$data['total_adult_female_other'] = $adult_female_art_other + $adult_female_pep_other + $adult_female_pmtct_other + $adult_female_oi_other;

		//Totals for Service Lines(Child Male)
		$data['total_child_male_art'] = $child_male_art_outpatient + $child_male_art_inpatient + $child_male_art_transferin + $child_male_art_casualty + $child_male_art_transit + $child_male_art_htc + $child_male_art_other;
		$data['total_child_male_pep'] = $child_male_pep_outpatient + $child_male_pep_inpatient + $child_male_pep_transferin + $child_male_pep_casualty + $child_male_pep_transit + $child_male_pep_htc + $child_male_pep_other;
		$data['total_child_male_pmtct'] = $child_male_pmtct_outpatient + $child_male_pmtct_inpatient + $child_male_pmtct_transferin + $child_male_pmtct_casualty + $child_male_pmtct_transit + $child_male_pmtct_htc + $child_male_pmtct_other;
		$data['total_child_male_oi'] = $child_male_oi_outpatient + $child_male_oi_inpatient + $child_male_oi_transferin + $child_male_oi_casualty + $child_male_oi_transit + $child_male_oi_htc + $child_male_oi_other;
		$data['overall_line_child_male'] = $data['total_child_male_art'] + $data['total_child_male_pep'] + $data['total_child_male_pmtct'] + $data['total_child_male_oi'];

		//Totals for sources(Child Male)
		$data['total_child_male_outpatient'] = $child_male_art_outpatient + $child_male_pep_outpatient + $child_male_pmtct_outpatient + $child_male_oi_outpatient;
		$data['total_child_male_inpatient'] = $child_male_art_inpatient + $child_male_pep_inpatient + $child_male_pmtct_inpatient + $child_male_oi_inpatient;
		$data['total_child_male_transferin'] = $child_male_art_transferin + $child_male_pep_transferin + $child_male_pmtct_transferin + $child_male_oi_transferin;
		$data['total_child_male_casualty'] = $child_male_art_casualty + $child_male_pep_casualty + $child_male_pmtct_casualty + $child_male_oi_casualty;
		$data['total_child_male_transit'] = $child_male_art_transit + $child_male_pep_transit + $child_male_pmtct_transit + $child_male_oi_transit;
		$data['total_child_male_htc'] = $child_male_art_htc + $child_male_pep_htc + $child_male_pmtct_htc + $child_male_oi_htc;
		$data['total_child_male_other'] = $child_male_art_other + $child_male_pep_other + $child_male_pmtct_other + $child_male_oi_other;

		//Totals for Service Lines(Child Female)
		$data['total_child_female_art'] = $child_female_art_outpatient + $child_female_art_inpatient + $child_female_art_transferin + $child_female_art_casualty + $child_female_art_transit + $child_female_art_htc + $child_female_art_other;
		$data['total_child_female_pep'] = $child_female_pep_outpatient + $child_female_pep_inpatient + $child_female_pep_transferin + $child_female_pep_casualty + $child_female_pep_transit + $child_female_pep_htc + $child_female_pep_other;
		$data['total_child_female_pmtct'] = $child_female_pmtct_outpatient + $child_female_pmtct_inpatient + $child_female_pmtct_transferin + $child_female_pmtct_casualty + $child_female_pmtct_transit + $child_female_pmtct_htc + $child_female_pmtct_other;
		$data['total_child_female_oi'] = $child_female_oi_outpatient + $child_female_oi_inpatient + $child_female_oi_transferin + $child_female_oi_casualty + $child_female_oi_transit + $child_female_oi_htc + $child_female_oi_other;
		$data['overall_line_child_female'] = $data['total_child_female_art'] + $data['total_child_female_pep'] + $data['total_child_female_pmtct'] + $data['total_child_female_oi'];

		//Totals for sources(Child Female)
		$data['total_child_female_outpatient'] = $child_female_art_outpatient + $child_female_pep_outpatient + $child_female_pmtct_outpatient + $child_female_oi_outpatient;
		$data['total_child_female_inpatient'] = $child_female_art_inpatient + $child_female_pep_inpatient + $child_female_pmtct_inpatient + $child_female_oi_inpatient;
		$data['total_child_female_transferin'] = $child_female_art_transferin + $child_female_pep_transferin + $child_female_pmtct_transferin + $child_female_oi_transferin;
		$data['total_child_female_casualty'] = $child_female_art_casualty + $child_female_pep_casualty + $child_female_pmtct_casualty + $child_female_oi_casualty;
		$data['total_child_female_transit'] = $child_female_art_transit + $child_female_pep_transit + $child_female_pmtct_transit + $child_female_oi_transit;
		$data['total_child_female_htc'] = $child_female_art_htc + $child_female_pep_htc + $child_female_pmtct_htc + $child_female_oi_htc;
		$data['total_child_female_other'] = $child_female_art_other + $child_female_pep_other + $child_female_pmtct_other + $child_female_oi_other;

		//Overall Total
		$data['overall_total'] = $data['overall_line_adult_female'] + $data['overall_line_adult_male'] + $data['overall_line_child_female'] + $data['overall_line_child_male'];
		$data['from'] = date('d-M-Y', strtotime($from));
		$data['to'] = date('d-M-Y', strtotime($to));
		$data['title'] = "Reports";
		$data['hide_side_menu'] = 1;
		$data['banner_text'] = "Facility Reports";
		$data['selected_report_type_link'] = "standard_report_row";
		$data['selected_report_type'] = "Standard Reports";
		$data['report_title'] = "Number of Patients Enrolled in Period";
		$data['facility_name'] = $this -> session -> userdata('facility_name');
		$data['content_view'] = 'reports/no_of_patients_enrolled_v';
		$this -> load -> view('template', $data);

	}

	public function getScheduledPatients($from = "", $to = "") {
		//Variables
		$visited = 0;
		$not_visited = 0;
		$visited_later = 0;
		$row_string = "";
		$status = "";
		$overall_total = 0;
		$today = date('Y-m-d');
		$late_by = "";
		$facility_code = $this -> session -> userdata("facility");
		$from = date('Y-m-d', strtotime($from));
		$to = date('Y-m-d', strtotime($to));

		//Get all patients who have apppointments on the selected date range
		$sql = "select patient,appointment from patient_appointment where appointment between '$from' and '$to' and facility='$facility_code' group by patient,appointment";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		$row_string = "
			<table id='patient_listing' >
				<thead >
					<tr>
						<th> Patient No </th>
						<th> Patient Name </th>
						<th> Phone No /Alternate No</th>
						<th> Phys. Address </th>
						<th> Sex </th>
						<th> Age </th>
						<th> Last Regimen </th>
						<th> Appointment Date </th>
						<th> Visit Status</th>
					</tr>
				</thead>
				<tbody>";
		if ($results) {
			foreach ($results as $result) {
				$patient = $result['patient'];
				$appointment = $result['appointment'];
				//Check if Patient visited on set appointment
				$sql = "select * from patient_visit where patient_id='$patient' and dispensing_date='$appointment' and facility='$facility_code'";
				$query = $this -> db -> query($sql);
				$results = $query -> result_array();
				if ($results) {
					//Visited
					$visited++;
					$status = "<span style='color:green;'>Yes</span>";
				} else if (!$results) {
					//Check if visited later or not
					$sql = "select DATEDIFF(dispensing_date,'$appointment')as late_by from patient_visit where patient_id='$patient' and dispensing_date>'$appointment' and facility='$facility_code' ORDER BY dispensing_date asc LIMIT 1";
					$query = $this -> db -> query($sql);
					$results = $query -> result_array();
					if ($results) {
						//Visited Later
						$visited_later++;
						$late_by = $results[0]['late_by'];
						$status = "<span style='color:blue;'>Late by $late_by Day(s)</span>";
					} else {
						//Not Visited
						$not_visited++;
						$status = "<span style='color:red;'>Not Visited</span>";
					}
				}
				$sql = "select patient_number_ccc as art_no,UPPER(first_name)as first_name,UPPER(other_name)as other_name,UPPER(last_name)as last_name, IF(gender=1,'Male','Female')as gender,UPPER(physical) as physical,phone,alternate,ROUND(DATEDIFF('$today',dob)/360) as age,r.regimen_desc as last_regimen from patient,regimen r where patient_number_ccc='$patient' and current_regimen=r.id and facility_code='$facility_code'";
				$query = $this -> db -> query($sql);
				$results = $query -> result_array();
				if ($results) {
					foreach ($results as $result) {
						$patient_id = $result['art_no'];
						$first_name = $result['first_name'];
						$other_name = $result['other_name'];
						$last_name = $result['last_name'];
						$phone = $result['phone'];
						if (!$phone) {
							$phone = $result['alternate'];
						}
						$address = $result['physical'];
						$gender = $result['gender'];
						$age = $result['age'];
						$last_regimen = $result['last_regimen'];
						$appointment = date('d-M-Y', strtotime($appointment));
					}
					$row_string .= "<tr><td>$patient_id</td><td width='300' style='text-align:left;'>$first_name $other_name $last_name</td><td>$phone</td><td>$address</td><td>$gender</td><td>$age</td><td style='white-space:nowrap;'>$last_regimen</td><td>$appointment</td><td width='200px'>$status</td></tr>";
					$overall_total++;
				}
			}

		} else {
			//$row_string .= "<tr><td colspan='8'>No Data Available</td></tr>";
		}
		$row_string .= "</tbody></table>";
		$data['from'] = date('d-M-Y', strtotime($from));
		$data['to'] = date('d-M-Y', strtotime($to));
		$data['dyn_table'] = $row_string;
		$data['visited_later'] = $visited_later;
		$data['not_visited'] = $not_visited;
		$data['visited'] = $visited;
		$data['all_count'] = $overall_total;
		$data['title'] = "webADT | Reports";
		$data['hide_side_menu'] = 1;
		$data['banner_text'] = "Facility Reports";
		$data['selected_report_type_link'] = "visiting_patient_report_row";
		$data['selected_report_type'] = "Visiting Patients";
		$data['report_title'] = "List of Patients Scheduled to Visit";
		$data['facility_name'] = $this -> session -> userdata('facility_name');
		$data['content_view'] = 'reports/patients_scheduled_v';
		$this -> load -> view('template', $data);
	}

	public function getPatientMissingAppointments($from = "", $to = "") {
		//Variables
		$today = date('Y-m-d');
		$row_string = "";
		$overall_total = 0;
		$facility_code = $this -> session -> userdata("facility");
		$from = date('Y-m-d', strtotime($from));
		$to = date('Y-m-d', strtotime($to));

		$adult_male_art_outpatient = 0;
		$adult_male_art_inpatient = 0;
		$adult_male_art_transferin = 0;
		$adult_male_art_casualty = 0;
		$adult_male_art_transit = 0;
		$adult_male_art_htc = 0;
		$adult_male_art_other = 0;

		$child_male_art_outpatient = 0;
		$child_male_art_inpatient = 0;
		$child_male_art_transferin = 0;
		$child_male_art_casualty = 0;
		$child_male_art_transit = 0;
		$child_male_art_htc = 0;
		$child_male_art_other = 0;

		$adult_female_art_outpatient = 0;
		$adult_female_art_inpatient = 0;
		$adult_female_art_transferin = 0;
		$adult_female_art_casualty = 0;
		$adult_female_art_transit = 0;
		$adult_female_art_htc = 0;
		$adult_female_art_other = 0;

		$child_female_art_outpatient = 0;
		$child_female_art_inpatient = 0;
		$child_female_art_transferin = 0;
		$child_female_art_casualty = 0;
		$child_female_art_transit = 0;
		$child_female_art_htc = 0;
		$child_female_art_other = 0;

		$adult_male_pep_outpatient = 0;
		$adult_male_pep_inpatient = 0;
		$adult_male_pep_transferin = 0;
		$adult_male_pep_casualty = 0;
		$adult_male_pep_transit = 0;
		$adult_male_pep_htc = 0;
		$adult_male_pep_other = 0;

		$child_male_pep_outpatient = 0;
		$child_male_pep_inpatient = 0;
		$child_male_pep_transferin = 0;
		$child_male_pep_casualty = 0;
		$child_male_pep_transit = 0;
		$child_male_pep_htc = 0;
		$child_male_pep_other = 0;

		$adult_female_pep_outpatient = 0;
		$adult_female_pep_inpatient = 0;
		$adult_female_pep_transferin = 0;
		$adult_female_pep_casualty = 0;
		$adult_female_pep_transit = 0;
		$adult_female_pep_htc = 0;
		$adult_female_pep_other = 0;

		$child_female_pep_outpatient = 0;
		$child_female_pep_inpatient = 0;
		$child_female_pep_transferin = 0;
		$child_female_pep_casualty = 0;
		$child_female_pep_transit = 0;
		$child_female_pep_htc = 0;
		$child_female_pep_other = 0;

		$adult_male_pmtct_outpatient = 0;
		$adult_male_pmtct_inpatient = 0;
		$adult_male_pmtct_transferin = 0;
		$adult_male_pmtct_casualty = 0;
		$adult_male_pmtct_transit = 0;
		$adult_male_pmtct_htc = 0;
		$adult_male_pmtct_other = 0;

		$child_male_pmtct_outpatient = 0;
		$child_male_pmtct_inpatient = 0;
		$child_male_pmtct_transferin = 0;
		$child_male_pmtct_casualty = 0;
		$child_male_pmtct_transit = 0;
		$child_male_pmtct_htc = 0;
		$child_male_pmtct_other = 0;

		$adult_female_pmtct_outpatient = 0;
		$adult_female_pmtct_inpatient = 0;
		$adult_female_pmtct_transferin = 0;
		$adult_female_pmtct_casualty = 0;
		$adult_female_pmtct_transit = 0;
		$adult_female_pmtct_htc = 0;
		$adult_female_pmtct_other = 0;

		$child_female_pmtct_outpatient = 0;
		$child_female_pmtct_inpatient = 0;
		$child_female_pmtct_transferin = 0;
		$child_female_pmtct_casualty = 0;
		$child_female_pmtct_transit = 0;
		$child_female_pmtct_htc = 0;
		$child_female_pmtct_other = 0;

		$adult_male_oi_outpatient = 0;
		$adult_male_oi_inpatient = 0;
		$adult_male_oi_transferin = 0;
		$adult_male_oi_casualty = 0;
		$adult_male_oi_transit = 0;
		$adult_male_oi_htc = 0;
		$adult_male_oi_other = 0;

		$child_male_oi_outpatient = 0;
		$child_male_oi_inpatient = 0;
		$child_male_oi_transferin = 0;
		$child_male_oi_casualty = 0;
		$child_male_oi_transit = 0;
		$child_male_oi_htc = 0;
		$child_male_oi_other = 0;

		$adult_female_oi_outpatient = 0;
		$adult_female_oi_inpatient = 0;
		$adult_female_oi_transferin = 0;
		$adult_female_oi_casualty = 0;
		$adult_female_oi_transit = 0;
		$adult_female_oi_htc = 0;
		$adult_female_oi_other = 0;

		$child_female_oi_outpatient = 0;
		$child_female_oi_inpatient = 0;
		$child_female_oi_transferin = 0;
		$child_female_oi_casualty = 0;
		$child_female_oi_transit = 0;
		$child_female_oi_htc = 0;
		$child_female_oi_other = 0;

		$sql = "select patient,appointment from patient_appointment where appointment between '$from' and '$to' and facility='$facility_code' group by patient,appointment";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		$row_string .= "<table id='patient_listing'>
			<tr>
				<th> ART ID </th>
				<th> Patient Name</th>
				<th> Sex </th>
				<th> Contacts/Address </th>
				<th> Appointment Date </th>
				<th> Late by (days)</th>
			</tr>";
		if ($results) {
			foreach ($results as $result) {
				$patient = $result['patient'];
				$appointment = $result['appointment'];
				//Check if Patient visited on set appointment
				$sql = "select * from patient_visit where patient_id='$patient' and dispensing_date='$appointment' and facility='$facility_code'";				$query = $this -> db -> query($sql);
				$results = $query -> result_array();
				if (!$results) {
					$sql = "select patient_number_ccc as art_no,UPPER(first_name)as first_name,UPPER(other_name)as other_name,UPPER(last_name)as last_name, IF(gender=1,'Male','Female')as gender,UPPER(physical) as physical,DATEDIFF('$today','$appointment') as days_late from patient where patient_number_ccc='$patient' and facility_code='$facility_code'";
					$query = $this -> db -> query($sql);
					$results = $query -> result_array();
					if ($results) {
						//select patient info
						foreach ($results as $result) {
							$patient_no = $result['art_no'];
							$patient_name = $result['first_name'] . " " . $result['other_name'] . " " . $result['last_name'];
							$gender = $result['gender'];
							$address = $result['physical'];
							$appointment = date('d-M-Y', strtotime($appointment));
							$days_late_by = $result['days_late'];
							$row_string .= "<tr><td>$patient_no</td><td>$patient_name</td><td>$gender</td><td>$address</td><td>$appointment</td><td>$days_late_by</td></tr>";
						}
						$overall_total++;
					}
				}

			}
		}

		//Push to array
		$data = array();
		$data['adult_male_art_outpatient'] = $adult_male_art_outpatient;
		$data['adult_male_art_inpatient'] = $adult_male_art_inpatient;
		$data['adult_male_art_transferin'] = $adult_male_art_transferin;
		$data['adult_male_art_casualty'] = $adult_male_art_casualty;
		$data['adult_male_art_transit'] = $adult_male_art_transit;
		$data['adult_male_art_htc'] = $adult_male_art_htc;
		$data['adult_male_art_other'] = $adult_male_art_other;

		$data['child_male_art_outpatient'] = $child_male_art_outpatient;
		$data['child_male_art_inpatient'] = $child_male_art_inpatient;
		$data['child_male_art_transferin'] = $child_male_art_transferin;
		$data['child_male_art_casualty'] = $child_male_art_casualty;
		$data['child_male_art_transit'] = $child_male_art_transit;
		$data['child_male_art_htc'] = $child_male_art_htc;
		$data['child_male_art_other'] = $child_male_art_other;

		$data['adult_female_art_outpatient'] = $adult_female_art_outpatient;
		$data['adult_female_art_inpatient'] = $adult_female_art_inpatient;
		$data['adult_female_art_transferin'] = $adult_female_art_transferin;
		$data['adult_female_art_casualty'] = $adult_female_art_casualty;
		$data['adult_female_art_transit'] = $adult_female_art_transit;
		$data['adult_female_art_htc'] = $adult_female_art_htc;
		$data['adult_female_art_other'] = $adult_female_art_other;

		$data['child_female_art_outpatient'] = $child_female_art_outpatient;
		$data['child_female_art_inpatient'] = $child_female_art_inpatient;
		$data['child_female_art_transferin'] = $child_female_art_transferin;
		$data['child_female_art_casualty'] = $child_female_art_casualty;
		$data['child_female_art_transit'] = $child_female_art_transit;
		$data['child_female_art_htc'] = $child_female_art_htc;
		$data['child_female_art_other'] = $child_female_art_other;

		$data['adult_male_pep_outpatient'] = $adult_male_pep_outpatient;
		$data['adult_male_pep_inpatient'] = $adult_male_pep_inpatient;
		$data['adult_male_pep_transferin'] = $adult_male_pep_transferin;
		$data['adult_male_pep_casualty'] = $adult_male_pep_casualty;
		$data['adult_male_pep_transit'] = $adult_male_pep_transit;
		$data['adult_male_pep_htc'] = $adult_male_pep_htc;
		$data['adult_male_pep_other'] = $adult_male_pep_other;

		$data['child_male_pep_outpatient'] = $child_male_pep_outpatient;
		$data['child_male_pep_inpatient'] = $child_male_pep_inpatient;
		$data['child_male_pep_transferin'] = $child_male_pep_transferin;
		$data['child_male_pep_casualty'] = $child_male_pep_casualty;
		$data['child_male_pep_transit'] = $child_male_pep_transit;
		$data['child_male_pep_htc'] = $child_male_pep_htc;
		$data['child_male_pep_other'] = $child_male_pep_other;

		$data['adult_female_pep_outpatient'] = $adult_female_pep_outpatient;
		$data['adult_female_pep_inpatient'] = $adult_female_pep_inpatient;
		$data['adult_female_pep_transferin'] = $adult_female_pep_transferin;
		$data['adult_female_pep_casualty'] = $adult_female_pep_casualty;
		$data['adult_female_pep_transit'] = $adult_female_pep_transit;
		$data['adult_female_pep_htc'] = $adult_female_pep_htc;
		$data['adult_female_pep_other'] = $adult_female_pep_other;

		$data['child_female_pep_outpatient'] = $child_female_pep_outpatient;
		$data['child_female_pep_inpatient'] = $child_female_pep_inpatient;
		$data['child_female_pep_transferin'] = $child_female_pep_transferin;
		$data['child_female_pep_casualty'] = $child_female_pep_casualty;
		$data['child_female_pep_transit'] = $child_female_pep_transit;
		$data['child_female_pep_htc'] = $child_female_pep_htc;
		$data['child_female_pep_other'] = $child_female_pep_other;

		$data['adult_male_pmtct_outpatient'] = $adult_male_pmtct_outpatient;
		$data['adult_male_pmtct_inpatient'] = $adult_male_pmtct_inpatient;
		$data['adult_male_pmtct_transferin'] = $adult_male_pmtct_transferin;
		$data['adult_male_pmtct_casualty'] = $adult_male_pmtct_casualty;
		$data['adult_male_pmtct_transit'] = $adult_male_pmtct_transit;
		$data['adult_male_pmtct_htc'] = $adult_male_pmtct_htc;
		$data['adult_male_pmtct_other'] = $adult_male_pmtct_other;

		$data['child_male_pmtct_outpatient'] = $child_male_pmtct_outpatient;
		$data['child_male_pmtct_inpatient'] = $child_male_pmtct_inpatient;
		$data['child_male_pmtct_transferin'] = $child_male_pmtct_transferin;
		$data['child_male_pmtct_casualty'] = $child_male_pmtct_casualty;
		$data['child_male_pmtct_transit'] = $child_male_pmtct_transit;
		$data['child_male_pmtct_htc'] = $child_male_pmtct_htc;
		$data['child_male_pmtct_other'] = $child_male_pmtct_other;

		$data['adult_female_pmtct_outpatient'] = $adult_female_pmtct_outpatient;
		$data['adult_female_pmtct_inpatient'] = $adult_female_pmtct_inpatient;
		$data['adult_female_pmtct_transferin'] = $adult_female_pmtct_transferin;
		$data['adult_female_pmtct_casualty'] = $adult_female_pmtct_casualty;
		$data['adult_female_pmtct_transit'] = $adult_female_pmtct_transit;
		$data['adult_female_pmtct_htc'] = $adult_female_pmtct_htc;
		$data['adult_female_pmtct_other'] = $adult_female_pmtct_other;

		$data['child_female_pmtct_outpatient'] = $child_female_pmtct_outpatient;
		$data['child_female_pmtct_inpatient'] = $child_female_pmtct_inpatient;
		$data['child_female_pmtct_transferin'] = $child_female_pmtct_transferin;
		$data['child_female_pmtct_casualty'] = $child_female_pmtct_casualty;
		$data['child_female_pmtct_transit'] = $child_female_pmtct_transit;
		$data['child_female_pmtct_htc'] = $child_female_pmtct_htc;
		$data['child_female_pmtct_other'] = $child_female_pmtct_other;

		$data['adult_male_oi_outpatient'] = @$adult_male_oi_outpatient;
		$data['adult_male_oi_inpatient'] = @$adult_male_oi_inpatient;
		$data['adult_male_oi_transferin'] = @$adult_male_oi_transferin;
		$data['adult_male_oi_casualty'] = @$adult_male_oi_casualty;
		$data['adult_male_oi_transit'] = @$adult_male_oi_transit;
		$data['adult_male_oi_htc'] = @$adult_male_oi_htc;
		$data['adult_male_oi_other'] = @$adult_male_oi_other;

		$data['child_male_oi_outpatient'] = @$child_male_oi_outpatient;
		$data['child_male_oi_inpatient'] = @$child_male_oi_inpatient;
		$data['child_male_oi_transferin'] = @$child_male_oi_transferin;
		$data['child_male_oi_casualty'] = @$child_male_oi_casualty;
		$data['child_male_oi_transit'] = @$child_male_oi_transit;
		$data['child_male_oi_htc'] = @$child_male_oi_htc;
		$data['child_male_oi_other'] = @$child_male_oi_other;

		$data['adult_female_oi_outpatient'] = @$adult_female_oi_outpatient;
		$data['adult_female_oi_inpatient'] = @$adult_female_oi_inpatient;
		$data['adult_female_oi_transferin'] = @$adult_female_oi_transferin;
		$data['adult_female_oi_casualty'] = @$adult_female_oi_casualty;
		$data['adult_female_oi_transit'] = @$adult_female_oi_transit;
		$data['adult_female_oi_htc'] = @$adult_female_oi_htc;
		$data['adult_female_oi_other'] = @$adult_female_oi_other;

		$data['child_female_oi_outpatient'] = @$child_female_oi_outpatient;
		$data['child_female_oi_inpatient'] = @$child_female_oi_inpatient;
		$data['child_female_oi_transferin'] = @$child_female_oi_transferin;
		$data['child_female_oi_casualty'] = @$child_female_oi_casualty;
		$data['child_female_oi_transit'] = @$child_female_oi_transit;
		$data['child_female_oi_htc'] = @$child_female_oi_htc;
		$data['child_female_oi_other'] = @$child_female_oi_other;

		//Totals for Service Lines(Adult Male)
		$data['total_adult_male_art'] = $adult_male_art_outpatient + $adult_male_art_inpatient + $adult_male_art_transferin + $adult_male_art_casualty + $adult_male_art_transit + $adult_male_art_htc + $adult_male_art_other;
		$data['total_adult_male_pep'] = $adult_male_pep_outpatient + $adult_male_pep_inpatient + $adult_male_pep_transferin + $adult_male_pep_casualty + $adult_male_pep_transit + $adult_male_pep_htc + $adult_male_pep_other;
		$data['total_adult_male_pmtct'] = $adult_male_pmtct_outpatient + $adult_male_pmtct_inpatient + $adult_male_pmtct_transferin + $adult_male_pmtct_casualty + $adult_male_pmtct_transit + $adult_male_pmtct_htc + $adult_male_pmtct_other;
		$data['total_adult_male_oi'] = $adult_male_oi_outpatient + $adult_male_oi_inpatient + $adult_male_oi_transferin + $adult_male_oi_casualty + $adult_male_oi_transit + $adult_male_oi_htc + $adult_male_oi_other;
		$data['overall_line_adult_male'] = $data['total_adult_male_art'] + $data['total_adult_male_pep'] + $data['total_adult_male_oi'];

		//Totals for sources(Adult Male)
		$data['total_adult_male_outpatient'] = $adult_male_art_outpatient + $adult_male_pep_outpatient + $adult_male_pmtct_outpatient + $adult_male_oi_outpatient;
		$data['total_adult_male_inpatient'] = $adult_male_art_inpatient + $adult_male_pep_inpatient + $adult_male_pmtct_inpatient + $adult_male_oi_inpatient;
		$data['total_adult_male_transferin'] = $adult_male_art_transferin + $adult_male_pep_transferin + $adult_male_pmtct_transferin + $adult_male_oi_transferin;
		$data['total_adult_male_casualty'] = $adult_male_art_casualty + $adult_male_pep_casualty + $adult_male_pmtct_casualty + $adult_male_oi_casualty;
		$data['total_adult_male_transit'] = $adult_male_art_transit + $adult_male_pep_transit + $adult_male_pmtct_transit + $adult_male_oi_transit;
		$data['total_adult_male_htc'] = $adult_male_art_htc + $adult_male_pep_htc + $adult_male_pmtct_htc + $adult_male_oi_htc;
		$data['total_adult_male_other'] = $adult_male_art_other + $adult_male_pep_other + $adult_male_pmtct_other + $adult_male_oi_other;

		//Totals for Service Lines(Adult Female)
		$data['total_adult_female_art'] = $adult_female_art_outpatient + $adult_female_art_inpatient + $adult_female_art_transferin + $adult_female_art_casualty + $adult_female_art_transit + $adult_female_art_htc + $adult_female_art_other;
		$data['total_adult_female_pep'] = $adult_female_pep_outpatient + $adult_female_pep_inpatient + $adult_female_pep_transferin + $adult_female_pep_casualty + $adult_female_pep_transit + $adult_female_pep_htc + $adult_female_pep_other;
		$data['total_adult_female_pmtct'] = $adult_female_pmtct_outpatient + $adult_female_pmtct_inpatient + $adult_female_pmtct_transferin + $adult_female_pmtct_casualty + $adult_female_pmtct_transit + $adult_female_pmtct_htc + $adult_female_pmtct_other;
		$data['total_adult_female_oi'] = $adult_female_oi_outpatient + $adult_female_oi_inpatient + $adult_female_oi_transferin + $adult_female_oi_casualty + $adult_female_oi_transit + $adult_female_oi_htc + $adult_female_oi_other;
		$data['overall_line_adult_female'] = $data['total_adult_female_art'] + $data['total_adult_female_pep'] + $data['total_adult_female_pmtct'] + $data['total_adult_female_oi'];

		//Totals for sources(Adult Female)
		$data['total_adult_female_outpatient'] = $adult_female_art_outpatient + $adult_female_pep_outpatient + $adult_female_pmtct_outpatient + $adult_female_oi_outpatient;
		$data['total_adult_female_inpatient'] = $adult_female_art_inpatient + $adult_female_pep_inpatient + $adult_female_pmtct_inpatient + $adult_female_oi_inpatient;
		$data['total_adult_female_transferin'] = $adult_female_art_transferin + $adult_female_pep_transferin + $adult_female_pmtct_transferin + $adult_female_oi_transferin;
		$data['total_adult_female_casualty'] = $adult_female_art_casualty + $adult_female_pep_casualty + $adult_female_pmtct_casualty + $adult_female_oi_casualty;
		$data['total_adult_female_transit'] = $adult_female_art_transit + $adult_female_pep_transit + $adult_female_pmtct_transit + $adult_female_oi_transit;
		$data['total_adult_female_htc'] = $adult_female_art_htc + $adult_female_pep_htc + $adult_female_pmtct_htc + $adult_female_oi_htc;
		$data['total_adult_female_other'] = $adult_female_art_other + $adult_female_pep_other + $adult_female_pmtct_other + $adult_female_oi_other;

		//Totals for Service Lines(Child Male)
		$data['total_child_male_art'] = $child_male_art_outpatient + $child_male_art_inpatient + $child_male_art_transferin + $child_male_art_casualty + $child_male_art_transit + $child_male_art_htc + $child_male_art_other;
		$data['total_child_male_pep'] = $child_male_pep_outpatient + $child_male_pep_inpatient + $child_male_pep_transferin + $child_male_pep_casualty + $child_male_pep_transit + $child_male_pep_htc + $child_male_pep_other;
		$data['total_child_male_pmtct'] = $child_male_pmtct_outpatient + $child_male_pmtct_inpatient + $child_male_pmtct_transferin + $child_male_pmtct_casualty + $child_male_pmtct_transit + $child_male_pmtct_htc + $child_male_pmtct_other;
		$data['total_child_male_oi'] = $child_male_oi_outpatient + $child_male_oi_inpatient + $child_male_oi_transferin + $child_male_oi_casualty + $child_male_oi_transit + $child_male_oi_htc + $child_male_oi_other;
		$data['overall_line_child_male'] = $data['total_child_male_art'] + $data['total_child_male_pep'] + $data['total_child_male_pmtct'] + $data['total_child_male_oi'];

		//Totals for sources(Child Male)
		$data['total_child_male_outpatient'] = $child_male_art_outpatient + $child_male_pep_outpatient + $child_male_pmtct_outpatient + $child_male_oi_outpatient;
		$data['total_child_male_inpatient'] = $child_male_art_inpatient + $child_male_pep_inpatient + $child_male_pmtct_inpatient + $child_male_oi_inpatient;
		$data['total_child_male_transferin'] = $child_male_art_transferin + $child_male_pep_transferin + $child_male_pmtct_transferin + $child_male_oi_transferin;
		$data['total_child_male_casualty'] = $child_male_art_casualty + $child_male_pep_casualty + $child_male_pmtct_casualty + $child_male_oi_casualty;
		$data['total_child_male_transit'] = $child_male_art_transit + $child_male_pep_transit + $child_male_pmtct_transit + $child_male_oi_transit;
		$data['total_child_male_htc'] = $child_male_art_htc + $child_male_pep_htc + $child_male_pmtct_htc + $child_male_oi_htc;
		$data['total_child_male_other'] = $child_male_art_other + $child_male_pep_other + $child_male_pmtct_other + $child_male_oi_other;

		//Totals for Service Lines(Child Female)
		$data['total_child_female_art'] = $child_female_art_outpatient + $child_female_art_inpatient + $child_female_art_transferin + $child_female_art_casualty + $child_female_art_transit + $child_female_art_htc + $child_female_art_other;
		$data['total_child_female_pep'] = $child_female_pep_outpatient + $child_female_pep_inpatient + $child_female_pep_transferin + $child_female_pep_casualty + $child_female_pep_transit + $child_female_pep_htc + $child_female_pep_other;
		$data['total_child_female_pmtct'] = $child_female_pmtct_outpatient + $child_female_pmtct_inpatient + $child_female_pmtct_transferin + $child_female_pmtct_casualty + $child_female_pmtct_transit + $child_female_pmtct_htc + $child_female_pmtct_other;
		$data['total_child_female_oi'] = $child_female_oi_outpatient + $child_female_oi_inpatient + $child_female_oi_transferin + $child_female_oi_casualty + $child_female_oi_transit + $child_female_oi_htc + $child_female_oi_other;
		$data['overall_line_child_female'] = $data['total_child_female_art'] + $data['total_child_female_pep'] + $data['total_child_female_pmtct'] + $data['total_child_female_oi'];

		//Totals for sources(Child Female)
		$data['total_child_female_outpatient'] = $child_female_art_outpatient + $child_female_pep_outpatient + $child_female_pmtct_outpatient + $child_female_oi_outpatient;
		$data['total_child_female_inpatient'] = $child_female_art_inpatient + $child_female_pep_inpatient + $child_female_pmtct_inpatient + $child_female_oi_inpatient;
		$data['total_child_female_transferin'] = $child_female_art_transferin + $child_female_pep_transferin + $child_female_pmtct_transferin + $child_female_oi_transferin;
		$data['total_child_female_casualty'] = $child_female_art_casualty + $child_female_pep_casualty + $child_female_pmtct_casualty + $child_female_oi_casualty;
		$data['total_child_female_transit'] = $child_female_art_transit + $child_female_pep_transit + $child_female_pmtct_transit + $child_female_oi_transit;
		$data['total_child_female_htc'] = $child_female_art_htc + $child_female_pep_htc + $child_female_pmtct_htc + $child_female_oi_htc;
		$data['total_child_female_other'] = $child_female_art_other + $child_female_pep_other + $child_female_pmtct_other + $child_female_oi_other;

		//Overall Total
		$data['overall_total'] = $data['overall_line_adult_female'] + $data['overall_line_adult_male'] + $data['overall_line_child_female'] + $data['overall_line_child_male'];
		$data['from'] = date('d-M-Y', strtotime($from));
		$data['to'] = date('d-M-Y', strtotime($to));
		$data['title'] = "webADT | Reports";
		$data['dyn_table'] = $row_string;
		$data['hide_side_menu'] = 1;
		$data['banner_text'] = "Facility Reports";
		$data['selected_report_type_link'] = "visiting_patient_report_row";
		$data['selected_report_type'] = "Visiting Patients";
		$data['report_title'] = "List of Patients Visited For Refill";
		$data['facility_name'] = $this -> session -> userdata('facility_name');
		$data['dyn_table'] = $row_string;
		$data['content_view'] = 'reports/patients_missing_appointments_v';
		$this -> load -> view('template', $data);
	}

	public function getPatientsStartedonDate($from = "", $to = "") {
		//Variables
		$overall_total = 0;
		$facility_code = $this -> session -> userdata("facility");
		$from = date('Y-m-d', strtotime($from));

		$sql = "SELECT p.patient_number_ccc as art_no,UPPER(p.first_name) as first_name,UPPER(p.last_name) as last_name,UPPER(p.other_name)as other_name, p.dob, IF(p.gender=1,'Male','Female') as gender, p.weight, r.regimen_desc,r.regimen_code,p.start_regimen_date, t.name AS service_type, s.name AS supported_by from patient p,regimen r,regimen_service_type t,supporter s where p.start_regimen_date between '$from' and '$to' and p.facility_code='$facility_code' and p.start_regimen =r.id and p.service=t.id and p.supported_by =s.id group by p.patient_number_ccc";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		$row_string = "<table id='patient_listing' width='100%'>
				<thead>
				<tr>
					<th> Patient No </th>
					<th> Type of Service </th>
					<th> Client Support </th>
					<th> Patient Name </th>
					<th> Sex</th>
					<th> Start Regimen Date </th>
					<th> Regimen </th>
					<th> Current Weight </th>
				</tr>
				</thead>
				<tbody>";
		if ($results) {
			foreach ($results as $result) {
				$patient_no = $result['art_no'];
				$service_type = $result['service_type'];
				$supported_by = $result['supported_by'];
				$patient_name = $result['first_name'] . " " . $result['other_name'] . " " . $result['last_name'];
				$gender = $result['gender'];
				$start_regimen_date = date('d-M-Y', strtotime($result['start_regimen_date']));
				$regimen_desc = "<b>" . $result['regimen_code'] . "</b>|" . $result['regimen_desc'];
				$weight = number_format($result['weight'], 2);
				$row_string .= "<tr><td>$patient_no</td><td>$service_type</td><td>$supported_by</td><td>$patient_name</td><td>$gender</td><td>$start_regimen_date</td><td>$regimen_desc</td><td>$weight</td></tr>";
				$overall_total++;
			}

		} else {
			//$row_string .= "<tr><td colspan='8'>No Data Available</td></tr>";
		}
		$row_string .= "</tbody></table>";
		$data['from'] = date('d-M-Y', strtotime($from));
		$data['to'] = date('d-M-Y', strtotime($to));
		$data['dyn_table'] = $row_string;
		$data['all_count'] = $overall_total;
		$data['title'] = "webADT | Reports";
		$data['hide_side_menu'] = 1;
		$data['banner_text'] = "Facility Reports";
		$data['selected_report_type_link'] = "visiting_patient_report_row";
		$data['selected_report_type'] = "Visiting Patients";
		$data['report_title'] = "List of Patients Scheduled to Visit";
		$data['facility_name'] = $this -> session -> userdata('facility_name');
		$data['content_view'] = 'reports/patients_started_on_date_v';
		$this -> load -> view('template', $data);

	}

	public function getPatientsforRefill($from = "", $to = "") {
		//Variables
		$overall_total = 0;
		$today = date('Y-m-d');
		$facility_code = $this -> session -> userdata("facility");
		$from = date('Y-m-d', strtotime($from));

		$sql = "SELECT pv.patient_id as art_no,pv.dispensing_date, t.name AS service_type, s.name AS supported_by,UPPER(p.first_name) as first_name ,UPPER(p.other_name) as other_name ,UPPER(p.last_name)as last_name,ROUND(DATEDIFF('$today',p.dob)/360) as age, pv.current_weight as weight, IF(p.gender=1,'Male','Female')as gender, r.regimen_desc,r.regimen_code from patient_visit pv,patient p,supporter s,regimen_service_type t,regimen r where pv.dispensing_date between '$from' and '$to' and pv.patient_id=p.patient_number_ccc and s.id = p.supported_by and t.id = p.service and r.id = pv.regimen and pv.visit_purpose =  '2' and p.current_status =  '1' and pv.facility =  '$facility_code' and p.facility_code = pv.facility group by pv.patient_id,pv.dispensing_date";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		$row_string = "<table   id='patient_listing'>
			<thead>
			<tr>
				<th> Patient No </th>
				<th> Type of Service </th>
				<th> Client Support </th>
				<th> Patient Name </th>
				<th> Current Age </th>
				<th> Sex</th>
				<th> Regimen </th>
				<th> Visit Date</th>
				<th> Current Weight </th>
			</tr>
			</thead>
			<tbody>";
		if ($results) {
			foreach ($results as $result) {
				$patient_no = $result['art_no'];
				$service_type = $result['service_type'];
				$supported_by = $result['supported_by'];
				$patient_name = $result['first_name'] . " " . $result['other_name'] . " " . $result['last_name'];
				$age = $result['age'];
				$gender = $result['gender'];
				$dispensing_date = date('d-M-Y', strtotime($result['dispensing_date']));
				$regimen_desc = "<b>" . $result['regimen_code'] . "</b>|" . $result['regimen_desc'];
				$weight = number_format($result['weight'], 2);
				$row_string .= "<tr><td>$patient_no</td><td>$service_type</td><td>$supported_by</td><td>$patient_name</td><td>$age</td><td>$gender</td><td>$regimen_desc</td><td>$dispensing_date</td><td>$weight</td></tr>";
				$overall_total++;
			}

		} else {
			//$row_string .= "<tr><td colspan='6'>No Data Available</td></tr>";
		}
		$row_string .= "</tbody></table>";
		$data['from'] = date('d-M-Y', strtotime($from));
		$data['to'] = date('d-M-Y', strtotime($to));
		$data['dyn_table'] = $row_string;
		$data['all_count'] = $overall_total;
		$data['title'] = "webADT | Reports";
		$data['hide_side_menu'] = 1;
		$data['banner_text'] = "Facility Reports";
		$data['selected_report_type_link'] = "visiting_patient_report_row";
		$data['selected_report_type'] = "Visiting Patients";
		$data['report_title'] = "List of Patients Visited For Refill";
		$data['facility_name'] = $this -> session -> userdata('facility_name');
		$data['content_view'] = 'reports/patients_for_refill_v';
		$this -> load -> view('template', $data);
	}

	public function getStartedonART($from = "", $to = "", $supported_by = 0) {
		//Variables
		$patient_total = 0;
		$facility_code = $this -> session -> userdata("facility");
		$supported_query = "and facility_code='$facility_code'";
		$from = date('Y-m-d', strtotime($from));
		$to = date('Y-m-d', strtotime($to));
		$regimen_totals = array();

		$total_adult_male = 0;
		$total_adult_female = 0;
		$total_child_male = 0;
		$total_child_female = 0;

		$overall_adult_male = 0;
		$overall_adult_female = 0;
		$overall_child_male = 0;
		$overall_child_female = 0;

		if ($supported_by == 1) {
			$supported_query = "and supported_by=1 and facility_code='$facility_code'";
		} else if ($supported_by == 2) {
			$supported_query = "and supported_by=2 and facility_code='$facility_code'";
		}

		//Get Patient Totals
		$sql = "select count(*) as total from patient p,gender g,regimen_service_type rs,regimen r where start_regimen_date between '$from' and '$to' and p.gender=g.id and p.service=rs.id and p.start_regimen=r.id and p.service='1' and p.facility_code='$facility_code'";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		$patient_total = $results[0]['total'];
		//Get Totals for each regimen
		$sql = "select count(*) as total, r.regimen_desc,r.regimen_code,p.start_regimen from patient p,gender g,regimen_service_type rs,regimen r where start_regimen_date between '$from' and '$to' and p.gender=g.id and p.service=rs.id and p.start_regimen=r.id and p.service='1' and p.facility_code='$facility_code' group by p.start_regimen ORDER BY r.regimen_code ASC";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		$row_string = "<table   id='patient_listing'  cellpadding='5'>
			<tr class='table_title'>
				<th rowspan='3'>Regimen</th>
				<th colspan='2'>Total</th>
				<th colspan='4'> Adult</th>
				<th colspan='4'> Children </th>
			</tr>
			<tr class='table_subtitle'>
				<th rowspan='2'>No.</th>
				<th rowspan='2'>%</th>
				<th colspan='2'>Male</th>
				<th colspan='2'>Female</th>
				<th colspan='2'>Male</th>
				<th colspan='2'>Female</th>
			</tr>
			<tr class='table_subsubtitle'>
				<th>No.</th>
				<th>%</th>
				<th>No.</th>
				<th>%</th><th>No.</th>
				<th>%</th><th>No.</th>
				<th>%</th>
			</tr>";
		if ($results) {
			foreach ($results as $result) {
				$regimen_totals[$result['start_regimen']] = $result['total'];
				$start_regimen = $result['start_regimen'];
				$regimen_name = $result['regimen_desc'];
				$regimen_code = $result['regimen_code'];
				$regimen_total = $result['total'];
				$regimen_total_percentage = number_format(($regimen_total / $patient_total) * 100, 1);
				$row_string .= "<tr><td><b>$regimen_code</b> | $regimen_name</td><td>$regimen_total</td><td>$regimen_total_percentage</td>";
				//SQL for Adult Male Regimens
				$sql = "select count(*) as total_adult_male, r.regimen_desc,r.regimen_code,p.start_regimen from patient p,gender g,regimen_service_type rs,regimen r where start_regimen_date between '$from' and '$to' and p.gender=g.id and p.service=rs.id and p.start_regimen=r.id and round(datediff('$to',p.dob)/360)>=15 and p.gender='1' and start_regimen='$start_regimen' and p.service='1' and p.facility_code='$facility_code' group by p.start_regimen";
				$query = $this -> db -> query($sql);
				$results = $query -> result_array();
				if ($results) {
					foreach ($results as $result) {
						$total_adult_male = $result['total_adult_male'];
						$overall_adult_male += $total_adult_male;
						$total_adult_male_percentage = number_format(($total_adult_male / $regimen_total) * 100, 1);
						if ($result['start_regimen'] != null) {
							$row_string .= "<td>$total_adult_male</td><td>$total_adult_male_percentage</td>";
						}
					}
				} else {
					$row_string .= "<td>-</td><td>-</td>";
				}
				//SQL for Adult Female Regimens
				$sql = "select count(*) as total_adult_female, r.regimen_desc,r.regimen_code,p.start_regimen from patient p,gender g,regimen_service_type rs,regimen r where start_regimen_date between '$from' and '$to' and p.gender=g.id and p.service=rs.id and p.start_regimen=r.id and round(datediff('$to',p.dob)/360)>=15 and p.gender='2' and p.service='1' and start_regimen='$start_regimen' and p.facility_code='$facility_code' group by p.start_regimen";
				$query = $this -> db -> query($sql);
				$results = $query -> result_array();
				if ($results) {
					foreach ($results as $result) {
						$total_adult_female = $result['total_adult_female'];
						$overall_adult_female += $total_adult_female;
						$total_adult_female_percentage = number_format(($total_adult_female / $regimen_total) * 100, 1);
						if ($result['start_regimen'] != null) {
							$row_string .= "<td>$total_adult_female</td><td>$total_adult_female_percentage</td>";
						}
					}
				} else {
					$row_string .= "<td>-</td><td>-</td>";
				}
				//SQL for Child Male Regimens
				$sql = "select count(*) as total_child_male, r.regimen_desc,r.regimen_code,p.start_regimen from patient p,gender g,regimen_service_type rs,regimen r where start_regimen_date between '$from' and '$to' and p.gender=g.id and p.service=rs.id and p.start_regimen=r.id and round(datediff('$to',p.dob)/360)<15 and p.gender='1' and p.service='1' and start_regimen='$start_regimen' and p.facility_code='$facility_code' group by p.start_regimen";
				$query = $this -> db -> query($sql);
				$results = $query -> result_array();
				if ($results) {
					foreach ($results as $result) {
						$total_child_male = $result['total_child_male'];
						$overall_child_male += $total_child_male;
						$total_child_male_percentage = number_format(($total_child_male / $regimen_total) * 100, 1);
						if ($result['start_regimen'] != null) {
							$row_string .= "<td>$total_child_male</td><td>$total_child_male_percentage</td>";
						}
					}
				} else {
					$row_string .= "<td>-</td><td>-</td>";
				}
				//SQL for Child Female Regimens
				$sql = "select count(*) as total_child_female, r.regimen_desc,r.regimen_code,p.start_regimen from patient p,gender g,regimen_service_type rs,regimen r where start_regimen_date between '$from' and '$to' and p.gender=g.id and p.service=rs.id and p.start_regimen=r.id and round(datediff('$to',p.dob)/360)<15 and p.gender='2' and p.service='1' and start_regimen='$start_regimen' and p.facility_code='$facility_code' group by p.start_regimen";
				$query = $this -> db -> query($sql);
				$results = $query -> result_array();
				if ($results) {
					foreach ($results as $result) {
						$total_child_female = $result['total_child_female'];
						$overall_child_female += $total_child_female;
						$total_child_female_percentage = number_format(($total_child_female / $regimen_total) * 100, 1);
						if ($result['start_regimen'] != null) {
							$row_string .= "<td>$total_child_female</td><td>$total_child_female_percentage</td>";
						}
					}
				} else {
					$row_string .= "<td>-</td><td>-</td>";
				}
				$row_string .= "</tr>";
			}
			$row_string .= "<tr class='tfoot'><td><b>Totals:</b></td><td><b>$patient_total</b></td><td><b>100</b></td><td><b>$overall_adult_male</b></td><td><b>" . number_format(($overall_adult_male / $patient_total) * 100, 1) . "</b></td><td><b>$overall_adult_female</b></td><td><b>" . number_format(($overall_adult_female / $patient_total) * 100, 1) . "</b></td><td><b>$overall_child_male</b></td><td><b>" . number_format(($overall_child_male / $patient_total) * 100, 1) . "</b></td><td><b>$overall_child_female</b></td><td><b>" . number_format(($overall_child_female / $patient_total) * 100, 1) . "</b></td></tr>";
		} else {
			$row_string .= "<tr><td colspan='11'>No Data Available</td></tr>";
		}
		$row_string .= "</table>";
		$data['from'] = date('d-M-Y', strtotime($from));
		$data['to'] = date('d-M-Y', strtotime($to));
		$data['dyn_table'] = $row_string;
		$data['title'] = "webADT | Reports";
		$data['hide_side_menu'] = 1;
		$data['banner_text'] = "Facility Reports";
		$data['selected_report_type_link'] = "standard_report_row";
		$data['selected_report_type'] = "Standard Reports";
		$data['report_title'] = "Number of Patients Started on ART in the Period";
		$data['facility_name'] = $this -> session -> userdata('facility_name');
		$data['content_view'] = 'reports/patients_started_on_art_v';
		$this -> load -> view('template', $data);
	}

	public function patient_active_byregimen($from = "2013-06-06") {
		//Variables
		$facility_code = $this -> session -> userdata("facility");
		$from = date('Y-m-d', strtotime($from));
		$regimen_totals = array();
		$data = array();
		$row_string = "";
		$overall_adult_male = 0;
		$overall_adult_female = 0;
		$overall_child_male = 0;
		$overall_child_female = 0;

		//Get Total of all patients
		$sql = "SELECT count(*) as total, r.regimen_desc,p.current_regimen FROM patient p,regimen r WHERE p.current_status=1 AND r.id=p.current_regimen AND p.facility_code='$facility_code' AND p.current_regimen !=0 AND p.current_regimen !='' AND p.current_status !='' AND p.current_status !=0";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		$patient_total = $results[0]['total'];

		//Get Totals for each regimen
		$sql = "SELECT count(*) as total, r.regimen_desc,r.regimen_code,p.current_regimen FROM patient p,regimen r WHERE p.current_status=1 AND r.id=p.current_regimen AND p.facility_code='$facility_code' AND p.current_regimen !=0 AND p.current_regimen !='' AND p.current_status !='' AND p.current_status !=0 GROUP BY p.current_regimen ORDER BY r.regimen_code ASC";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		if ($results) {
			$row_string .= "<table id='patient_listing'  cellpadding='5'>
			<tr>
				<th rowspan='3'>Regimen</th>
				<th colspan='2'>Total</th>
				<th colspan='4'> Adult</th>
				<th colspan='4'> Children </th>
			</tr>
			<tr>
				<th rowspan='2'>No.</th>
				<th rowspan='2'>%</th>
				<th colspan='2'>Male</th>
				<th colspan='2'>Female</th>
				<th colspan='2'>Male</th>
				<th colspan='2'>Female</th>
			</tr>
			<tr>
				<th>No.</th>
				<th>%</th>
				<th>No.</th>
				<th>%</th><th>No.</th>
				<th>%</th><th>No.</th>
				<th>%</th>
			</tr>";
			foreach ($results as $result) {
				$regimen_totals[$result['current_regimen']] = $result['total'];
				$current_regimen = $result['current_regimen'];
				$regimen_name = $result['regimen_desc'];
				$regimen_code = $result['regimen_code'];
				$regimen_total = $result['total'];
				$regimen_total_percentage = number_format(($regimen_total / $patient_total) * 100, 1);
				$row_string .= "<tr><td><b>$regimen_code</b> | $regimen_name</td><td>$regimen_total</td><td>$regimen_total_percentage</td>";
				//SQL for Adult Male Regimens
				$sql = "SELECT count(*) as total_adult_male, r.regimen_desc,p.current_regimen as regimen_id FROM patient p,regimen r WHERE p.current_status=1 AND r.id=p.current_regimen AND p.facility_code='$facility_code' AND p.gender=1 AND p.current_regimen='$current_regimen' AND round(datediff('$from',p.dob)/360)>=15 GROUP BY p.current_regimen";
				$query = $this -> db -> query($sql);
				$results = $query -> result_array();
				if ($results) {
					foreach ($results as $result) {
						$total_adult_male = $result['total_adult_male'];
						$overall_adult_male += $total_adult_male;
						$total_adult_male_percentage = number_format(($total_adult_male / $regimen_total) * 100, 1);
						if ($result['regimen_id'] != null) {
							$row_string .= "<td>$total_adult_male</td><td>$total_adult_male_percentage</td>";
						}
					}
				} else {
					$row_string .= "<td>-</td><td>-</td>";
				}
				//SQL for Adult Female Regimens
				$sql = "SELECT count(*) as total_adult_female, r.regimen_desc,p.current_regimen as regimen_id FROM patient p,regimen r WHERE p.current_status=1 AND r.id=p.current_regimen AND p.facility_code='$facility_code' AND p.gender=2 AND p.current_regimen='$current_regimen' AND round(datediff('$from',p.dob)/360)>=15 GROUP BY p.current_regimen";
				$query = $this -> db -> query($sql);
				$results = $query -> result_array();
				if ($results) {
					foreach ($results as $result) {
						$total_adult_female = $result['total_adult_female'];
						$overall_adult_female += $total_adult_female;
						$total_adult_female_percentage = number_format(($total_adult_female / $regimen_total) * 100, 1);
						if ($result['regimen_id'] != null) {
							$row_string .= "<td>$total_adult_female</td><td>$total_adult_female_percentage</td>";
						}
					}
				} else {
					$row_string .= "<td>-</td><td>-</td>";
				}
				//SQL for Child Male Regimens
				$sql = "SELECT count(*) as total_child_male, r.regimen_desc,p.current_regimen as regimen_id FROM patient p,regimen r WHERE p.current_status=1 AND r.id=p.current_regimen AND p.facility_code='$facility_code' AND p.gender=1 AND p.current_regimen='$current_regimen' AND round(datediff('$from',p.dob)/360)<15 GROUP BY p.current_regimen";
				$query = $this -> db -> query($sql);
				$results = $query -> result_array();
				if ($results) {
					foreach ($results as $result) {
						$total_child_male = $result['total_child_male'];
						$overall_child_male += $total_child_male;
						$total_child_male_percentage = number_format(($total_child_male / $regimen_total) * 100, 1);
						if ($result['regimen_id'] != null) {
							$row_string .= "<td>$total_child_male</td><td>$total_child_male_percentage</td>";
						}
					}
				} else {
					$row_string .= "<td>-</td><td>-</td>";
				}
				//SQL for Child Female Regimens
				$sql = "SELECT count(*) as total_child_female, r.regimen_desc,p.current_regimen as regimen_id FROM patient p,regimen r WHERE p.current_status=1 AND r.id=p.current_regimen AND p.facility_code='$facility_code' AND p.gender=2 AND p.current_regimen='$current_regimen' AND round(datediff('$from',p.dob)/360)<15 GROUP BY p.current_regimen";
				$query = $this -> db -> query($sql);
				$results = $query -> result_array();
				if ($results) {
					foreach ($results as $result) {
						$total_child_female = $result['total_child_female'];
						$overall_child_female += $total_child_female;
						$total_child_female_percentage = number_format(($total_child_female / $regimen_total) * 100, 1);
						if ($result['regimen_id'] != null) {
							$row_string .= "<td>$total_child_female</td><td>$total_child_female_percentage</td>";
						}
					}
				} else {
					$row_string .= "<td>-</td><td>-</td>";
				}
				$row_string .= "</tr>";
			}
			$row_string .= "<tr class='tfoot'><td><b>Totals:</b></td><td><b>$patient_total</b></td><td><b>100</b></td><td><b>$overall_adult_male</b></td><td><b>" . number_format(($overall_adult_male / $patient_total) * 100, 1) . "</b></td><td><b>$overall_adult_female</b></td><td><b>" . number_format(($overall_adult_female / $patient_total) * 100, 1) . "</b></td><td><b>$overall_child_male</b></td><td><b>" . number_format(($overall_child_male / $patient_total) * 100, 1) . "</b></td><td><b>$overall_child_female</b></td><td><b>" . number_format(($overall_child_female / $patient_total) * 100, 1) . "</b></td></tr>";
			$row_string .= "</table>";

		}
		$data['from'] = date('d-M-Y', strtotime($from));
		$data['dyn_table'] = $row_string;
		$data['title'] = "webADT | Reports";
		$data['hide_side_menu'] = 1;
		$data['banner_text'] = "Facility Reports";
		$data['selected_report_type_link'] = "standard_report_row";
		$data['selected_report_type'] = "Standard Reports";
		$data['report_title'] = "Number of Active Patients Receiving ART (by Regimen)";
		$data['facility_name'] = $this -> session -> userdata('facility_name');
		$data['content_view'] = 'reports/no_of_patients_receiving_art_byregimen_v';
		$this -> load -> view('template', $data);
	}

	public function cumulative_patients($from = "2013-06-06") {
		//Variables
		$facility_code = $this -> session -> userdata("facility");
		$from = date('Y-m-d', strtotime($from));
		$status_totals = array();
		$row_string = "";
		$total_adult_male_art = 0;
		$total_adult_male_pep = 0;
		$total_adult_male_oi = 0;
		$total_adult_female_art = 0;
		$total_adult_female_pep = 0;
		$total_adult_female_pmtct = 0;
		$total_adult_female_oi = 0;
		$total_child_male_art = 0;
		$total_child_male_pep = 0;
		$total_child_male_pmtct = 0;
		$total_child_male_oi = 0;
		$total_child_female_art = 0;
		$total_child_female_pep = 0;
		$total_child_female_pmtct = 0;
		$total_child_female_oi = 0;

		//Get Total Count of all patients
		//$sql = "select count(*) as total from patient,patient_status ps where(date_enrolled <= '$from' or date_enrolled='') and ps.id=current_status and current_status!='' and service!='' and gender !='' and facility_code='$facility_code'";
		$sql = "select count(*) as total from patient p,patient_status ps,regimen_service_type rst,gender g where(p.date_enrolled <= '$from' or p.date_enrolled='') and ps.id=p.current_status and p.service=rst.id and p.gender=g.id and facility_code='$facility_code'";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		$patient_total = $results[0]['total'];

		$row_string = "<table id='patient_listing'  cellpadding='5'>
			<tr>
				<th rowspan='3'>Current Status</th>
				<th colspan='2'>Total</th>
				<th colspan='7'> Adult</th>
				<th colspan='8'> Children </th>
			</tr>
			<tr>
				<th rowspan='2'>No.</th>
				<th rowspan='2'>%</th>
				<th colspan='3'>Male</th>
				<th colspan='4'>Female</th>
				<th colspan='4'>Male</th>
				<th colspan='4'>Female</th>
			</tr>
			<tr>
				<th>ART</th>
				<th>PEP</th>
				<th>OI</th>
				<th>ART</th>
				<th>PEP</th>
				<th>PMTCT</th>
				<th>OI</th>
				<th>ART</th>
				<th>PEP</th>
				<th>PMTCT</th>
				<th>OI</th>
				<th>ART</th>
				<th>PEP</th>
				<th>PMTCT</th>
				<th>OI</th>
			</tr>";

		//Get Totals for each Status
		//$sql = "select count(p.id) as total,current_status,ps.name from patient p,patient_status ps where(date_enrolled <= '$from' or date_enrolled='') and facility_code='$facility_code' and ps.id = current_status and current_status!='' and service!='' and gender !='' group by p.current_status";
		$sql = "select count(p.id) as total,p.current_status,ps.name from patient p,patient_status ps,regimen_service_type rst,gender g where(p.date_enrolled <= '$from' or p.date_enrolled='') and ps.id=p.current_status and p.service=rst.id and p.gender=g.id and facility_code='$facility_code' group by p.current_status";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		if ($results) {

			foreach ($results as $result) {
				$status_totals[$result['current_status']] = $result['total'];
				$current_status = $result['current_status'];
				$status_name = $result['name'];
				$patient_percentage = number_format(($status_totals[$current_status] / $patient_total) * 100, 1);
				$row_string .= "<tr><td>$status_name</td><td>$status_totals[$current_status]</td><td>$patient_percentage</td>";
				//SQL for Adult Male Status
				$service_list = array('ART', 'PEP', 'OI Only');
				$sql = "SELECT count(*) as total_adult_male, ps.Name,ps.id as current_status,r.name AS Service FROM patient p,patient_status ps,regimen_service_type r WHERE  p.current_status=ps.id AND p.service=r.id AND p.current_status='$current_status' AND p.facility_code='$facility_code' AND p.gender=1 AND p.service !=3 AND round(datediff('$from',p.dob)/360)>=15 GROUP BY service";
				$query = $this -> db -> query($sql);
				$results = $query -> result_array();
				$i = 0;
				$j = 0;
				if ($results) {
					while ($j < 3) {
						$patient_current_total = @$results[$i]['total_adult_male'];
						$service = @$results[$i]['Service'];
						if ($service == @$service_list[$j]) {
							$row_string .= "<td>$patient_current_total</td>";
							if ($service == "ART") {
								$total_adult_male_art += $patient_current_total;
							} else if ($service == "PEP") {
								$total_adult_male_pep += $patient_current_total;
							} else if ($service == "OI Only") {
								$total_adult_male_oi += $patient_current_total;
							}
							$i++;
							$j++;
						} else {
							$row_string .= "<td>-</td>";
							$j++;
						}
					}

				} else {
					$row_string .= "<td>-</td><td>-</td><td>-</td>";
				}
				//SQL for Adult Female Status
				$service_list = array('ART', 'PEP', 'PMTCT', 'OI Only');
				$sql = "SELECT count(*) as total_adult_female, ps.Name,ps.id as current_status,r.name AS Service FROM patient p,patient_status ps,regimen_service_type r WHERE  p.current_status=ps.id AND p.service=r.id AND p.current_status='$current_status' AND p.facility_code='$facility_code' AND p.gender=2  AND round(datediff('$from',p.dob)/360)>=15 GROUP BY service";
				$query = $this -> db -> query($sql);
				$results = $query -> result_array();
				$i = 0;
				$j = 0;
				if ($results) {
					while ($j < 4) {
						$patient_current_total = @$results[$i]['total_adult_female'];
						$service = @$results[$i]['Service'];
						if ($service == @$service_list[$j]) {
							$row_string .= "<td>$patient_current_total</td>";
							if ($service == "ART") {
								$total_adult_female_art += $patient_current_total;
							} else if ($service == "PEP") {
								$total_adult_female_pep += $patient_current_total;
							} else if ($service == "PMTCT") {
								$total_adult_female_pmtct += $patient_current_total;
							} else if ($service == "OI Only") {
								$total_adult_female_oi += $patient_current_total;
							}
							$i++;
							$j++;
						} else {
							$row_string .= "<td>-</td>";
							$j++;
						}
					}
				} else {
					$row_string .= "<td>-</td><td>-</td><td>-</td><td>-</td>";
				}
				//SQL for Child Male Status
				$service_list = array('ART', 'PEP', 'PMTCT', 'OI Only');
				$sql = "SELECT count(*) as total_child_male, ps.Name,ps.id as current_status,r.name AS Service FROM patient p,patient_status ps,regimen_service_type r WHERE  p.current_status=ps.id AND p.service=r.id AND p.current_status='$current_status' AND p.facility_code='$facility_code' AND p.gender=1  AND round(datediff('$from',p.dob)/360)<15 GROUP BY service";
				$query = $this -> db -> query($sql);
				$results = $query -> result_array();
				$i = 0;
				$j = 0;
				if ($results) {
					while ($j < 4) {
						$patient_current_total = @$results[$i]['total_child_male'];
						$service = @$results[$i]['Service'];
						if ($service == @$service_list[$j]) {
							$row_string .= "<td>$patient_current_total</td>";
							if ($service == "ART") {
								$total_child_male_art += $patient_current_total;
							} else if ($service == "PEP") {
								$total_child_male_pep += $patient_current_total;
							} else if ($service == "PMTCT") {
								$total_child_male_pmtct += $patient_current_total;
							} else if ($service == "OI Only") {
								$total_child_male_oi += $patient_current_total;
							}
							$i++;
							$j++;
						} else {
							$row_string .= "<td>-</td>";
							$j++;
						}
					}
				} else {
					$row_string .= "<td>-</td><td>-</td><td>-</td><td>-</td>";
				}
				//SQL for Child Female Status
				$service_list = array('ART', 'PEP', 'PMTCT', 'OI Only');
				$sql = "SELECT count(*) as total_child_female, ps.Name,ps.id as current_status,r.name AS Service FROM patient p,patient_status ps,regimen_service_type r WHERE  p.current_status=ps.id AND p.service=r.id AND p.current_status='$current_status' AND p.facility_code='$facility_code' AND p.gender=2  AND round(datediff('$from',p.dob)/360)<15 GROUP BY service";
				$query = $this -> db -> query($sql);
				$results = $query -> result_array();
				$i = 0;
				$j = 0;
				if ($results) {
					while ($j < 4) {
						$patient_current_total = @$results[$i]['total_child_female'];
						$service = @$results[$i]['Service'];
						if ($service == @$service_list[$j]) {
							$row_string .= "<td>$patient_current_total</td>";
							if ($service == "ART") {
								$total_child_female_art += $patient_current_total;
							} else if ($service == "PEP") {
								$total_child_female_pep += $patient_current_total;
							} else if ($service == "PMTCT") {
								$total_child_female_pmtct += $patient_current_total;
							} else if ($service == "OI Only") {
								$total_child_female_oi += $patient_current_total;
							}
							$i++;
							$j++;
						} else {
							$row_string .= "<td>-</td>";
							$j++;
						}
					}
				} else {
					$row_string .= "<td>-</td><td>-</td><td>-</td><td>-</td>";
				}
				$row_string .= "</tr>";
			}
			$row_string .= "<tr class='tfoot'><td><b>Total:</b></td><td><b>$patient_total</b></td><td><b>100</b></td><td><b>$total_adult_male_art</b></td><td><b>$total_adult_male_pep</b></td><td><b>$total_adult_male_oi</b></td><td><b>$total_adult_female_art</b></td><td><b>$total_adult_female_pep</b></td><td><b>$total_adult_female_pmtct</b></td><td><b>$total_adult_female_oi</b></td><td><b>$total_child_male_art</b></td><td><b>$total_child_male_pep</b></td><td><b>$total_child_male_pmtct</b></td><td><b>$total_child_male_oi</b></td><td><b>$total_child_female_art</b></td><td><b>$total_child_female_pep</b></td><td><b>$total_child_female_pmtct</b></td><td><b>$total_child_female_oi</b></td></tr>";
			$row_string .= "</table>";

		}
		$data['from'] = date('d-M-Y', strtotime($from));
		$data['dyn_table'] = $row_string;
		$data['title'] = "Reports";
		$data['hide_side_menu'] = 1;
		$data['banner_text'] = "Facility Reports";
		$data['selected_report_type_link'] = "standard_report_row";
		$data['selected_report_type'] = "Standard Reports";
		$data['report_title'] = "Cumulative Number of Patients to Date";
		$data['facility_name'] = $this -> session -> userdata('facility_name');
		$data['content_view'] = 'reports/cumulative_patients_v';
		$this -> load -> view('template', $data);
	}

	public function drug_consumption($year = "2012") {
		$data['year'] = $year;
		//Create table to store data
		$tmpl = array('table_open' => '<table class="table table-bordered"  id="drug_listing">');
		$this -> table -> set_template($tmpl);
		$this -> table -> set_heading('', 'Drug', 'Unit', 'Jan', 'Feb', 'Mar', 'Apr', 'May', "Jun", 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');

		$facility_code = $this -> session -> userdata("facility");
		$facility_name = $this -> session -> userdata('facility_name');
		$drugs_sql = "select d.id as id,drug, pack_size, name from drugcode d left join drug_unit u on d.unit = u.id LIMIT 5";
		$drugs = $this -> db -> query($drugs_sql);
		$drugs_array = $drugs -> result_array();
		$counter = 0;
		foreach ($drugs_array as $parent_row) {

			$sql = "select '" . $parent_row['drug'] . "' as drug_name,'" . $parent_row['pack_size'] . "' as pack_size,'" . $parent_row['name'] . "' as unit,month(date(dispensing_date)) as month, sum(quantity) as total_consumed from patient_visit where drug_id = '" . $parent_row['id'] . "' and dispensing_date like '%" . $year . "%' and facility='" . $facility_code . "' group by month(date(dispensing_date)) order by month(date(dispensing_date)) asc";
			$drug_details_sql = $this -> db -> query($sql);
			$sql_array = $drug_details_sql -> result_array();
			$drug_consumption = array();
			$count = count($sql_array);
			$drug_name = "";
			$unit = "";
			$pack_size = "";
			$y = 0;
			if ($count > 0) {
				foreach ($sql_array as $row) {
					$drug_name = $row['drug_name'];
					$unit = $row['unit'];
					$pack_size = $row['pack_size'];

					$month = $row['month'];
					//Replace the preceding 0 in months less than october
					if ($month < 10) {
						$month = str_replace('0', '', $row['month']);
					}
					$drug_consumption[$month] = $row['total_consumed'];
				}

				//$row_string = "<tr><td>" .$drug_name . "</td><td>" . $unit . "</td>";
				$columns[] = $drug_name;
				$columns[] = $drug_name;
				$columns[] = $unit;
				//Loop untill 12; check if there is a result for each month
				for ($i = 1; $i <= 12; $i++) {
					if (isset($drug_consumption[$i]) and isset($pack_size) and $pack_size != 0) {
						//$row_string += "<td>" + ceil($drug_consumption[$i] / $pack_size) + "</td>";
						$columns[] = ceil($drug_consumption[$i] / $pack_size);
					} else {
						//$row_string += "<td>-</td>";
						$columns[] = '-';
					}
				}

				//$row_string += "</tr>";
				$this -> table -> add_row($columns);

			}

		}
		$drug_display = $this -> table -> generate();
		$data['drug_listing'] = $drug_display;
		$data['title'] = "Reports";
		$data['content_view'] = 'drugconsumption_v';
		$this -> load -> view('template_report', $data);
	}

	public function stock_report($report_type, $stock_type) {
		$data['facility_name'] = $this -> session -> userdata('facility_name');
		$data['base_url'] = base_url();
		$data['stock_type'] = $stock_type;
		if ($report_type == "drug_stock_on_hand") {
			$data['content_view'] = 'drugstock_on_hand_v';
		} else if ($report_type == "expiring_drug") {
			$data['content_view'] = 'expiring_drugs_v';
		}

		$data['title'] = "Reports";
		$this -> load -> view('template_report', $data);
	}

	public function drug_stock_on_hand($stock_type) {
		$facility_code = $this -> session -> userdata('facility');

		//Store
		if ($stock_type == '1') {
			$stock_param = " AND (source='" . $facility_code . "' OR destination='" . $facility_code . "') AND source!=destination ";
		}
		//Pharmacy
		else if ($stock_type == '2') {
			$stock_param = " AND (source=destination) AND(source='" . $facility_code . "') ";
		}
		$data = array();
		/* Array of database columns which should be read and sent back to DataTables. Use a space where
		 * you want to insert a non-database field (for example a counter or static image)
		 */
		$aColumns = array('drug', 'pack_size');

		$iDisplayStart = $this -> input -> get_post('iDisplayStart', true);
		$iDisplayLength = $this -> input -> get_post('iDisplayLength', true);
		$iSortCol_0 = $this -> input -> get_post('iSortCol_0', false);
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
		$this -> db -> select("dc.id,u.Name,SUM(dsb.balance) as stock_level");
		$today = date('Y-m-d');
		$this -> db -> from("drugcode dc");
		$this -> db -> where('dc.enabled', '1');
		$this -> db -> where('dsb.facility_code', $facility_code);
		$this -> db -> where('dsb.expiry_date > ', $today);
		$this -> db -> where('dsb.stock_type ', $stock_type);
		$this -> db -> join("drug_stock_balance dsb", "dsb.drug_id=dc.id");
		$this -> db -> join("drug_unit u", "u.id=dc.unit");
		$this -> db -> group_by("dsb.drug_id");

		$rResult = $this -> db -> get();

		// Data set length after filtering
		$this -> db -> select('FOUND_ROWS() AS found_rows');
		$iFilteredTotal = $this -> db -> get() -> row() -> found_rows;

		// Total data set length
		$this -> db -> select("dsb.*");
		$where = "dc.enabled='1' AND dsb.facility='$facility_code' AND dsb.expiry_date > CURDATE() AND dsb.stock_type='$stock_type'";
		$this -> db -> from("drugcode dc");
		$this -> db -> where('dc.enabled', '1');
		$this -> db -> where('dsb.facility_code', $facility_code);
		$this -> db -> where('dsb.expiry_date > ', $today);
		$this -> db -> where('dsb.stock_type ', $stock_type);
		$this -> db -> join("drug_stock_balance dsb", "dsb.drug_id=dc.id");
		$this -> db -> join("drug_unit u", "u.id=dc.unit");
		$this -> db -> group_by("dsb.drug_id");
		$tot_drugs = $this -> db -> get();
		$iTotal = count($tot_drugs -> result_array());

		// Output
		$output = array('sEcho' => intval($sEcho), 'iTotalRecords' => $iTotal, 'iTotalDisplayRecords' => $iFilteredTotal, 'aaData' => array());

		foreach ($rResult->result_array() as $aRow) {

			//Get consumption for the past three months
			$drug = $aRow['id'];
			$stock_level = $aRow['stock_level'];
			$safetystock_query = "SELECT SUM(d.quantity_out) AS TOTAL FROM drug_stock_movement d WHERE d.drug ='$drug' AND DATEDIFF(CURDATE(),d.transaction_date)<= 90 and facility='$facility_code' $stock_param";
			$safetystocks = $this -> db -> query($safetystock_query);
			$safetystocks_results = $safetystocks -> result_array();
			$three_monthly_consumption = 0;
			$stock_status = "";
			foreach ($safetystocks_results as $safetystocks_result) {
				$three_monthly_consumption = $safetystocks_result['TOTAL'];
				//Calculating Monthly Consumption hence Max-Min Inventory
				$monthly_consumption = ($three_monthly_consumption) / 3;
				$monthly_consumption = number_format($monthly_consumption, 2);

				//Therefore Maximum Consumption
				$maximum_consumption = $monthly_consumption * 3;
				$maximum_consumption = number_format($maximum_consumption, 2);

				//Therefore Minimum Consumption
				$minimum_consumption = $monthly_consumption * 1.5;
				//$minimum_consumption = number_format($monthly_consumption, 2);

				//If current stock balance is less than minimum consumption
				if ($stock_level < $minimum_consumption) {
					$stock_status = "LOW";
					if ($minimum_consumption < 0) {
						$minimum_consumption = 0;
					}
				}
			}

			$row = array();
			$x = 0;

			foreach ($aColumns as $col) {
				$x++;
				$row[] = strtoupper($aRow[$col]);
				if ($x == 1) {
					$row[] = $aRow['Name'];
				} else if ($x == 2) {

					//SOH IN Units
					//$row[]='<b style="color:green">'.number_format($aRow['stock_level']).'</b>';
					$row[] = number_format($aRow['stock_level']);
					//SOH IN Packs
					if (is_numeric($aRow['pack_size']) and $aRow['pack_size'] > 0) {
						$row[] = ceil($aRow['stock_level'] / $aRow['pack_size']);
					} else {
						$row[] = " - ";
					}

					//Safety Stock
					$row[] = ceil($minimum_consumption);
					$row[] = $stock_status;

				}

			}
			$output['aaData'][] = $row;
		}
		echo json_encode($output);
	}

	public function expiring_drugs($stock_type) {
		if ($stock_type == 1) {
			$data['stock_type'] = 'Main Store';
		} else if ($stock_type == 2) {
			$data['stock_type'] = 'Pharmacy';
		}
		$count = 0;
		$facility_code = $this -> session -> userdata('facility');
		$data['facility_name'] = $this -> session -> userdata('facility_name');
		$drugs_sql = "SELECT s.id AS id,s.drug AS Drug_Id,d.drug AS Drug_Name,d.pack_size AS pack_size, u.name AS Unit, s.batch_number AS Batch,s.expiry_date AS Date_Expired,DATEDIFF(s.expiry_date,CURDATE()) AS Days_Since_Expiry FROM drugcode d LEFT JOIN drug_unit u ON d.unit = u.id LEFT JOIN drug_stock_movement s ON d.id = s.drug LEFT JOIN transaction_type t ON t.id=s.transaction_type WHERE t.effect=1 AND DATEDIFF(s.expiry_date,CURDATE()) <=180 AND DATEDIFF(s.expiry_date,CURDATE())>=0 AND d.enabled=1 AND s.facility ='" . $facility_code . "' GROUP BY Batch ORDER BY Days_Since_Expiry asc";
		$drugs = $this -> db -> query($drugs_sql);
		$results = $drugs -> result_array();
		//Get all expiring drugs
		foreach ($results as $result => $value) {
			$count = 1;
			$this -> getBatchInfo($value['Drug_Id'], $value['Batch'], $value['Unit'], $value['Drug_Name'], $value['Date_Expired'], $value['Days_Since_Expiry'], $value['id'], $value['pack_size'], $stock_type, $facility_code);
		}
		//If no drugs if found, return null
		if ($count == 0) {
			$data['drug_details'] = "null";
		}
		$d = 0;
		$drugs_array = $this -> drug_array;
		$data['drug_details'] = $drugs_array;
		$data['title'] = "Reports";
		$data['content_view'] = 'expiring_drugs_v';
		$this -> load -> view('template_report', $data);

	}

	public function expired_drugs($stock_type) {
		$count = 0;
		$facility_code = $this -> session -> userdata('facility');
		$data['facility_name'] = $this -> session -> userdata('facility_name');
		$drugs_sql = "SELECT s.id AS id,s.drug AS Drug_Id,d.drug AS Drug_Name,d.pack_size AS pack_size, u.name AS Unit, s.batch_number AS Batch,s.expiry_date AS Date_Expired,DATEDIFF(CURDATE(),DATE(s.expiry_date)) AS Days_Since_Expiry FROM drugcode d LEFT JOIN drug_unit u ON d.unit = u.id LEFT JOIN drug_stock_movement s ON d.id = s.drug LEFT JOIN transaction_type t ON t.id=s.transaction_type WHERE t.effect=1 AND DATEDIFF(CURDATE(),DATE(s.expiry_date)) >0  AND d.enabled=1 AND s.facility ='" . $facility_code . "' GROUP BY Batch ORDER BY Days_Since_Expiry asc";
		$drugs = $this -> db -> query($drugs_sql);
		$results = $drugs -> result_array();
		//Get all expiring drugs
		foreach ($results as $result => $value) {
			$count = 1;
			$this -> getBatchInfo($value['Drug_Id'], $value['Batch'], $value['Unit'], $value['Drug_Name'], $value['Date_Expired'], $value['Days_Since_Expiry'], $value['id'], $value['pack_size'], $stock_type, $facility_code);
		};
		//If no drugs if found, return null
		if ($count == 0) {
			$data['drug_details'] = "null";
		}
		$d = 0;
		$drugs_array = $this -> drug_array;
		$data['drug_details'] = $drugs_array;
		$data['title'] = "Reports";
		$data['content_view'] = 'expired_drugs_v';
		$this -> load -> view('template_report', $data);
	}

	public function getBatchInfo($drug, $batch, $drug_unit, $drug_name, $expiry_date, $expired_days, $drug_id, $pack_size, $stock_type, $facility_code) {
		$stock_status = 0;
		$stock_param = "";

		//Store
		if ($stock_type == '1') {
			$stock_param = " AND (source='" . $facility_code . "' OR destination='" . $facility_code . "') AND source!=destination ";
		}
		//Pharmacy
		else if ($stock_type == '2') {
			$stock_param = " AND (source=destination) AND(source='" . $facility_code . "') ";
		}
		$initial_stock_sql = "SELECT SUM( d.quantity ) AS Initial_stock, d.transaction_date AS transaction_date, '" . $batch . "' AS batch FROM drug_stock_movement d WHERE d.drug =  '" . $drug . "' AND facility='" . $facility_code . "' " . $stock_param . " AND transaction_type =  '11' AND d.batch_number =  '" . $batch . "'";
		$batches = $this -> db -> query($initial_stock_sql);
		$batch_results = $batches -> result_array();
		foreach ($batch_results as $batch_result => $value) {
			$initial_stock = $value['Initial_stock'];
			//Check if initial stock is present meaning physical count done
			if ($initial_stock != null) {
				$batch_stock_sql = "SELECT (SUM( ds.quantity ) - SUM( ds.quantity_out )) AS stock_levels, ds.batch_number,ds.expiry_date FROM drug_stock_movement ds WHERE ds.transaction_date BETWEEN  '" . $value['transaction_date'] . "' AND curdate() AND facility='" . $facility_code . "' " . $stock_param . " AND ds.drug ='" . $drug . "'  AND ds.batch_number ='" . $value['batch'] . "'";
				$second_row = $this -> db -> query($batch_stock_sql);
				$second_rows = $second_row -> result_array();

				foreach ($second_rows as $second_row => $value) {
					if ($value['stock_levels'] > 0) {
						$batch_balance = $value['stock_levels'];
						$batch_expiry = $expiry_date;
						$ed = substr($expired_days, 0, 1);
						if ($ed == "-") {
							$expired_days = $expired_days;
						}

						$batch_stock = $batch_balance / $pack_size;
						$expired_days_display = number_format($expired_days);
						$stocks_display = ceil(number_format($batch_stock, 1));

						$this -> drug_array[$this -> counter]['drug_name'] = $drug_name;
						$this -> drug_array[$this -> counter]['drug_unit'] = $drug_unit;
						$this -> drug_array[$this -> counter]['batch'] = $batch;
						$this -> drug_array[$this -> counter]['expiry_date'] = $batch_expiry;
						$this -> drug_array[$this -> counter]['stocks_display'] = $stocks_display;
						$this -> drug_array[$this -> counter]['expired_days_display'] = $expired_days_display;
						$this -> counter++;
					}
				}

			} else {

				$batch_stock_sql = "SELECT (SUM( ds.quantity ) - SUM( ds.quantity_out ) ) AS stock_levels, ds.batch_number,ds.expiry_date FROM drug_stock_movement ds WHERE ds.drug =  '" . $drug . "' AND facility='" . $facility_code . "' " . $stock_param . " AND ds.expiry_date > curdate() AND ds.batch_number='" . $value['batch'] . "'";
				$second_row = $this -> db -> query($batch_stock_sql);
				$second_rows = $second_row -> result_array();

				foreach ($second_rows as $second_row => $value) {

					if ($value['stock_levels'] > 0) {
						$batch_balance = $value['stock_levels'];
						$batch_expiry = $expiry_date;
						$ed = substr($expired_days, 0, 1);
						if ($ed == "-") {

							$expired_days = $expired_days;
						}
						$batch_stock = $batch_balance / $pack_size;
						$expired_days_display = number_format($expired_days);

						$stocks_display = number_format($batch_stock, 1);

						$this -> drug_array[$this -> counter]['drug_name'] = $drug_name;
						$this -> drug_array[$this -> counter]['drug_unit'] = $drug_unit;
						$this -> drug_array[$this -> counter]['batch'] = $batch;
						$this -> drug_array[$this -> counter]['expiry_date'] = $batch_expiry;
						$this -> drug_array[$this -> counter]['stocks_display'] = $stocks_display;
						$this -> drug_array[$this -> counter]['expired_days_display'] = $expired_days_display;
						$this -> counter++;
					}
				}
			}

		}
	}

	public function commodity_summary($start_date = "", $end_date = "") {
		$facility_code = $this -> session -> userdata('facility');
		$data['facility_name'] = $this -> session -> userdata('facility_name');
		$get_facility_sql = $this -> db -> query("SELECT '$facility_code' as facility,d.id as id,drug, pack_size, name from drugcode d left join drug_unit u on d.unit = u.id where d.Enabled=1");

	}

	public function patients_who_changed_regimen($start_date = "", $end_date = "") {
		$facility_code = $this -> session -> userdata('facility');
		$start_date = date('Y-m-d', strtotime($start_date));
		$end_date = date('Y-m-d', strtotime($end_date));
		$patient_sql = $this -> db -> query("SELECT DISTINCT p.patient_number_ccc,UPPER(p.first_name) as first_name,UPPER(p.other_name) as other_name ,UPPER(p.last_name) as last_name, p.service, pv.dispensing_date, r1.regimen_desc AS current_regimen, r2.regimen_desc AS last_regimen, pv.comment, pv.regimen_change_reason FROM patient p LEFT JOIN patient_visit pv ON pv.patient_id = p.patient_number_ccc LEFT JOIN regimen r1 ON r1.id = pv.regimen LEFT JOIN regimen r2 ON r2.id = pv.last_regimen WHERE pv.last_regimen !=  '' AND pv.regimen != pv.last_regimen AND DATE( pv.dispensing_date ) BETWEEN DATE('" . $start_date . "' ) AND DATE( '" . $end_date . "' ) AND p.current_status =  '1' AND pv.facility =  '" . $facility_code . "' AND pv.facility=p.facility_code ORDER BY last_regimen");
		$data['patients'] = $patient_sql -> result_array();
		$data['total'] = count($data['patients']);
		$data['from'] = $start_date;
		$data['to'] = $end_date;
		$data['title'] = "webADT | Reports";
		$data['hide_side_menu'] = 1;
		$data['banner_text'] = "Facility Reports";
		$data['selected_report_type_link'] = "early_warning_report_select";
		$data['selected_report_type'] = "Early Warning Indicators";
		$data['report_title'] = "Active Patients who Have Changed Regimens";
		$data['facility_name'] = $this -> session -> userdata('facility_name');
		$data['content_view'] = 'reports/patients_who_changed_regimen_v';
		$this -> load -> view('template', $data);
	}

	public function patients_starting($start_date = "", $end_date = "") {
		$start_date = date('Y-m-d', strtotime($start_date));
		$end_date = date('Y-m-d', strtotime($end_date));
		$facility_code = $this -> session -> userdata('facility');
		$patient_sql = $this -> db -> query("SELECT distinct r.regimen_desc AS Regimen,p.first_name As First,p.last_name AS Last,p.patient_number_ccc AS Patient_Id FROM patient p LEFT JOIN regimen r ON r.id = p.start_regimen WHERE DATE(p.start_regimen_date) between DATE('" . $start_date . "') and DATE('" . $end_date . "') and p.facility_code='" . $facility_code . "' ORDER BY Patient_Id DESC");
		$data['patients'] = $patient_sql -> result_array();
		$data['total'] = count($data['patients']);
		$data['from'] = $start_date;
		$data['to'] = $end_date;
		$data['title'] = "webADT | Reports";
		$data['hide_side_menu'] = 1;
		$data['banner_text'] = "Facility Reports";
		$data['selected_report_type_link'] = "early_warning_report_select";
		$data['selected_report_type'] = "Early Warning Indicators";
		$data['report_title'] = "List of Patients Starting (By Regimen)";
		$data['facility_name'] = $this -> session -> userdata('facility_name');
		$data['content_view'] = 'reports/patients_starting_v';
		$this -> load -> view('template', $data);
	}

	public function early_warning_indicators($start_date = "", $end_date = "") {
		$facility_code = $this -> session -> userdata('facility');
		$start_date = date('Y-m-d', strtotime($start_date));
		$end_date = date('Y-m-d', strtotime($end_date));
		$tot_patients_sql = $this -> db -> query("SELECT COUNT( * ) AS Total_Patients FROM patient p WHERE DATE(start_regimen_date) between DATE('" . $start_date . "') and  DATE('" . $end_date . "') and p.facility_code='" . $facility_code . "' AND p.service=1");
		$tot_patients = 0;
		$patients = $tot_patients_sql -> result_array();
		foreach ($patients as $value) {
			$tot_patients = $value['Total_Patients'];
		}
		$first_line_sql = $this -> db -> query("SELECT COUNT( * ) AS First_Line FROM patient p LEFT JOIN regimen r ON r.id = p.start_regimen WHERE DATE(p.start_regimen_date) between DATE('" . $start_date . "') and DATE('" . $end_date . "') AND r.line=1 AND p.facility_code='" . $facility_code . "' AND p.service=1");
		$first_line = 0;
		$first_line_array = $first_line_sql -> result_array();
		foreach ($first_line_array as $value) {
			$first_line = $value['First_Line'];
		}
		$percentage_firstline = 0;
		$percentage_onotherline = 0;
		if ($tot_patients == 0) {
			$percentage_firstline = 0;
			$percentage_onotherline = 0;
		} else {
			$percentage_firstline = ($first_line / $total_patients) * 100;
			$percentage_onotherline = 100 - $percentage_firstline;
		}

		//Gets patients started 12 months from selected period
		$to_date = "";
		$future_date = "";
		$patient_from_period_sql = $this -> db -> query("SELECT COUNT( * ) AS Total_Patients FROM patient p LEFT JOIN regimen r ON r.id = p.start_regimen WHERE DATE(p.start_regimen_date) BETWEEN DATE('" . $to_date . "') and DATE('" . $future_date . "') and p.facility_code='" . $facility_code . "'");
		$total_from_period_array = $patient_from_period_sql -> result_array();
		$total_from_period = 0;
		foreach ($total_from_period_array as $value) {
			$total_from_period = $value['Total_Patients'];
		}

		$from_date = $start_date;
		$future_date = $end_date;
		$stil_in_first_line = 0;
		$first_line_patient_from_period_sql = $this -> db -> query("SELECT COUNT( * ) AS Total_Patients FROM patient p LEFT JOIN regimen r ON r.id=p.current_regimen WHERE DATE(p.start_regimen_date) between DATE('" . $from_date . "') and DATE('" . $future_date . "')and r.line=1 and p.facility_code='" . $facility_code . "'");
		$first_line_patient_from_period_array = $first_line_patient_from_period_sql -> result_array();
		foreach ($first_line_patient_from_period_array as $row) {
			$stil_in_first_line = $row['Total_Patients'];
		}
		if ($total_from_period == 0 || $stil_in_first_line == 0) {
			$percentage_stillfirstline = 0;

		} else {
			$percentage_stillfirstline = ($stil_in_first_line / $total_from_period) * 100;
		}

		$prevFrom = $start_date;
		$prevTo = $end_date;
		$patients_before_sql = $this -> db -> query("SELECT COUNT( * ) AS Total_Patients FROM patient p WHERE DATE(p.start_regimen_date) between DATE('" . $prevFrom . "') and DATE('" . $prevTo . "') and p.facility_code='" . $facility_code . "' AND p.service=1");
		$patients_before_array = $patients_before_sql -> result_array();
		$total_before_period = 0;
		foreach ($patients_before_array as $row1) {
			$total_before_period = $row1['Total_Patients'];
		}

		$patient_lost_followup_sql = $this -> db -> query("SELECT COUNT( * ) AS Total_Patients FROM patient p LEFT JOIN patient_status ps ON ps.id = p.current_status WHERE DATE(p.status_change_date) between DATE('" . $prevFrom . "') and DATE('" . $prevTo . "') AND p.current_status=5 AND p.facility_code='" . $facility_code . "'");
		$patient_lost_followup_array = $patient_lost_followup_sql -> result_array();
		$lost_to_follow = 0;
		foreach ($patient_lost_followup_array as $row2) {
			$lost_to_follow = $row2['Total_Patients'];
		}
		if ($lost_to_follow == 0 || $total_before_period == 0) {
			$percentage_lost_to_follow = 0;
		} else {
			$percentage_lost_to_follow = ($lost_to_follow / $total_before_period) * 100;
		}
		$data['from'] = $start_date;
		$data['to'] = $end_date;

		$data['tot_patients'] = $tot_patients;
		$data['first_line'] = number_format($first_line, 1);
		$data['percentage_firstline'] = $percentage_firstline;
		$data['percentage_onotherline'] = $percentage_onotherline;

		$data['total_from_period'] = $total_from_period;
		$data['stil_in_first_line'] = $stil_in_first_line;
		$data['percentage_stillfirstline'] = number_format($percentage_stillfirstline, 1);

		$data['total_before_period'] = $total_before_period;
		$data['lost_to_follow'] = $lost_to_follow;
		$data['percentage_lost_to_follow'] = number_format($percentage_lost_to_follow, 1);
		$data['title'] = "webADT | Reports";
		$data['hide_side_menu'] = 1;
		$data['banner_text'] = "Facility Reports";
		$data['selected_report_type_link'] = "early_warning_report_select";
		$data['selected_report_type'] = "Early Warning Indicators";
		$data['report_title'] = "HIV Early Warning Indicators";
		$data['facility_name'] = $this -> session -> userdata('facility_name');
		$data['content_view'] = 'reports/early_warning_indicators_v';
		$this -> load -> view('template', $data);
	}

	public function graph_patients_enrolled_in_year($year = "") {
		$facility_code = $this -> session -> userdata('facility');
		$sql = "SELECT MONTH(p.date_enrolled) AS MONTH,rst.name AS Enrollment,COUNT(*) AS TOTAL FROM patient p LEFT JOIN regimen_service_type rst ON rst.id = p.service WHERE YEAR(p.date_enrolled)='$year' AND rst.active=1 AND p.facility_code='$facility_code' AND(p.supported_by=1 OR p.supported_by=2) GROUP BY MONTH(p.date_enrolled),rst.name";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		$data['graphs'] = $results;
		$data['title'] = "webADT | Reports";
		$data['hide_side_menu'] = 1;
		$data['banner_text'] = "Facility Reports";
		$data['selected_report_type_link'] = "standard_report_row";
		$data['selected_report_type'] = "Standard Reports";
		$data['report_title'] = "Graph of Number of Patients Enrolled Per Month in a Given Year";
		$data['facility_name'] = $this -> session -> userdata('facility_name');
		$data['year'] = $year;
		$data['content_view'] = 'reports/graphs_on_patients_v';
		$this -> load -> view('template', $data);
	}

	public function patients_adherence($start_date = "", $end_date = "") {
		$data['from'] = $start_date;
		$data['to'] = $end_date;
		$start_date = date('Y-m-d', strtotime($start_date));
		$end_date = date('Y-m-d', strtotime($end_date));
		$facility_code = $this -> session -> userdata('facility');
		$sql = "SELECT SUM(pill_count) as pill_count,SUM(missed_pills) as missed_pills,adherence,SUM(pv.quantity) as quantity, frequency, p.patient_number_ccc, p.service, p.gender,(YEAR(curdate()) - YEAR(p.dob)) as age FROM patient_visit pv LEFT JOIN patient p ON p.patient_number_ccc = pv.patient_id LEFT JOIN dose ds ON ds.name = pv.dose LEFT JOIN drugcode dc ON dc.id=pv.drug_id LEFT JOIN regimen r ON pv.regimen=r.id WHERE dispensing_date BETWEEN  '$start_date' AND  '$end_date' AND pv.facility ='$facility_code' AND frequency <=2 AND (r.regimen_code NOT LIKE '%OI%' OR dc.drug LIKE '%COTRIMOXAZOLE%' OR dc.drug LIKE '%DAPSONE%' ) GROUP BY p.patient_number_ccc";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		$data['results'] = $results;
		$data['title'] = "webADT | Reports";
		$data['hide_side_menu'] = 1;
		$data['banner_text'] = "Facility Reports";
		$data['selected_report_type_link'] = "visiting_patient_report_row";
		$data['selected_report_type'] = "Visiting Patients";
		$data['report_title'] = "Patient Adherence";
		$data['facility_name'] = $this -> session -> userdata('facility_name');

		$data['content_view'] = 'reports/patient_adherence_v';
		$this -> load -> view('template', $data);
	}

	public function getFacilityConsumption($start_date = "", $end_date = "") {
		$data['from'] = $start_date;
		$data['to'] = $end_date;
		$start_date = date('Y-m-d', strtotime($start_date));
		$end_date = date('Y-m-d', strtotime($end_date));
		$facility_code = $this -> session -> userdata('facility');
		$consumption_totals = array();
		$row_string = "";
		$drug_total = 0;
		$total = 0;
		$overall_pharmacy_drug_qty = 0;
		$overall_store_drug_qty = 0;
		$pharmacy_drug_qty_percentage = "";
		$store_drug_qty_percentage = "";
		$drug_total_percentage = "";

		//Select total consumption at facility
		$sql = "select sum(quantity_out) as total from drug_stock_movement where transaction_date between '$start_date' and '$end_date' and facility='$facility_code' ";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		if ($results) {
			$total = $results[0]['total'];
		}

		//Select total consumption at facility per drug
		$sql = "select dsm.drug,d.drug as Name,d.pack_size,du.Name as unit,sum(dsm.quantity_out) as qty from drug_stock_movement dsm left join drugcode d on dsm.drug=d.id left join drug_unit du on d.unit=du.id where dsm.transaction_date between '$start_date' and '$end_date' and dsm.facility='$facility_code' group by dsm.drug";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		if ($results) {
			$row_string .= "<table id='patient_listing'  cellpadding='5'>
			<tr>
				<th >Drug</th>
				<th >Unit</th>
				<th >PackSize</th>
				<th >Total(units)</th>
				<th >%</th>
				<th >Pharmacy(units)</th>
				<th >%</th>
				<th > Store(units)</th>
				<th >%</th>
			</tr>
			";
			foreach ($results as $result) {
				$consumption_totals[$result['drug']] = $result['qty'];
				$current_drug = $result['drug'];
				$current_drugname = $result['Name'];
				$unit = $result['unit'];
				$pack_size = $result['pack_size'];
				$drug_total = $result['qty'];
				$drug_total_percentage = number_format(($drug_total / $total) * 100, 1);
				$row_string .= "<tr><td><b>$current_drugname</b></td><td><b>$unit</b></td><td><b>$pack_size</b></td><td>" . number_format($drug_total) . "</td><td>$drug_total_percentage</td>";
				//Select consumption at pharmacy
				$sql = "select drug,sum(quantity_out) as qty from drug_stock_movement where transaction_date between '$start_date' and '$end_date' and facility='$facility_code' and source='$facility_code' and source=destination and drug='$current_drug' group by drug";
				$query = $this -> db -> query($sql);
				$results = $query -> result_array();
				if ($results) {
					foreach ($results as $result) {
						$total_pharmacy_drug_qty = $result['qty'];
						$overall_pharmacy_drug_qty += $total_pharmacy_drug_qty;
						@$pharmacy_drug_qty_percentage = number_format((@$total_pharmacy_drug_qty / @$drug_total) * 100, 1);
						if ($result['drug'] != null) {
							$row_string .= "<td>" . number_format($total_pharmacy_drug_qty) . "</td><td>$pharmacy_drug_qty_percentage</td>";
						}
					}
				} else {
					$row_string .= "<td>-</td><td>-</td>";
				}
				//Select Consumption at store
				$sql = "select drug,sum(quantity_out) as qty from drug_stock_movement where transaction_date between '$start_date' and '$end_date' and facility='$facility_code' and destination='$facility_code' and source !=destination and drug='$current_drug' group by drug";
				$query = $this -> db -> query($sql);
				$results = $query -> result_array();
				if ($results) {
					foreach ($results as $result) {
						$total_store_drug_qty = $result['qty'];
						$overall_store_drug_qty += $total_drug_qty;
						$store_drug_qty_percentage = number_format(($total_store_drug_qty / $drug_total) * 100, 1);
						if ($result['drug'] != null) {
							$row_string .= "<td>$total_store_drug_qty</td><td>$store_drug_qty_percentage</td>";
						}
					}
				} else {
					$row_string .= "<td>-</td><td>-</td>";
				}
				$row_string .= "</tr>";
			}
			$row_string .= "<tr class='tfoot'><td colspan='3'><b>Totals(units):</b></td><td><b>" . number_format($total) . "</b></td><td><b>100</b></td><td><b>" . number_format($overall_pharmacy_drug_qty) . "</b></td><td><b>" . number_format(($overall_pharmacy_drug_qty / $total) * 100, 1) . "</b></td><td><b>" . number_format($overall_store_drug_qty) . "</b></td><td><b>" . number_format(($overall_store_drug_qty / $total) * 100, 1) . "</b></td></tr>";
			$row_string .= "</table>";
		}
		$data['dyn_table'] = $row_string;
		$data['title'] = "webADT | Reports";
		$data['hide_side_menu'] = 1;
		$data['banner_text'] = "Facility Reports";
		$data['selected_report_type_link'] = "drug_inventory_report_row";
		$data['selected_report_type'] = "Stock Consumption";
		$data['report_title'] = "Stock Consumption";
		$data['facility_name'] = $this -> session -> userdata('facility_name');
		$data['content_view'] = 'reports/stock_consumption_v';
		$this -> load -> view('template', $data);

	}

	public function patients_disclosure($start_date = "", $end_date = "") {
		$data['from'] = $start_date;
		$data['to'] = $end_date;
		$heading = "Patient Disclosure Between $start_date and $end_date";
		$start_date = date('Y-m-d', strtotime($start_date));
		$end_date = date('Y-m-d', strtotime($end_date));
		$facility_code = $this -> session -> userdata('facility');
		$sql = "SELECT gender, disclosure, count( * ) AS total FROM `patient` where date_enrolled between '$start_date' and '$end_date' and partner_status = '2' AND gender != '' AND disclosure != '2' AND facility_code='$facility_code' GROUP BY gender, disclosure";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		$strXML = array();
		$strXML['Male Disclosure(NO)'] = 0;
		$strXML['Male Disclosure(YES)'] = 0;
		$strXML['Female Disclosure(NO)'] = 0;
		$strXML['Female Disclosure(YES)'] = 0;
		if ($results) {
			foreach ($results as $result) {
				if ($result['gender'] == '1' && $result['disclosure'] == 0) {
					$strXML['Male Disclosure(NO)'] = (int)$result['total'];
				} else if ($result['gender'] == '1' && $result['disclosure'] == 1) {
					$strXML['Male Disclosure(YES)'] = (int)$result['total'];
				} else if ($result['gender'] == '2' && $result['disclosure'] == 0) {
					$strXML['Female Disclosure(NO)'] = (int)$result['total'];
				} else if ($result['gender'] == '2' && $result['disclosure'] == 1) {
					$strXML['Female Disclosure(YES)'] = (int)$result['total'];
				}

			}
		}
		$nameArray = array('Male Disclosure(NO)', 'Male Disclosure(YES)', 'Female Disclosure(NO)', 'Female Disclosure(YES)');
		$dataArray = array($strXML['Male Disclosure(NO)'], $strXML['Male Disclosure(YES)'], $strXML['Female Disclosure(NO)'], $strXML['Female Disclosure(YES)']);
		$dataCount = 0;
		$resultArray = array();
		foreach ($nameArray as $val) {
			$resultArray[] = array('name' => $val, 'data' => array($dataArray[$dataCount]));
			$dataCount++;
		}
		$resultArray = json_encode($resultArray);
		$data['chartType'] = 'bar';
		$data['chartTitle'] = 'Patients Disclosure';
		$data['yAxix'] = 'Patients';
		$data['categories'] = $nameArray;
		$data['resultArray'] = $resultArray;
		$this -> load -> view('chart_v', $data);

	}

	public function getTBPatients($start_date = "", $end_date = "") {
		$data['from'] = $start_date;
		$data['to'] = $end_date;
		$start_date = date('Y-m-d', strtotime($start_date));
		$end_date = date('Y-m-d', strtotime($end_date));
		$facility_code = $this -> session -> userdata('facility');
		$one_adult_male = 0;
		$one_child_male = 0;
		$one_adult_female = 0;
		$one_child_female = 0;
		$two_adult_male = 0;
		$two_child_male = 0;
		$two_adult_female = 0;
		$two_child_female = 0;
		$three_adult_male = 0;
		$three_child_male = 0;
		$three_adult_female = 0;
		$three_child_female = 0;

		$sql = "update patient set tbphase='0' where tbphase='un' or tbphase=''";
		$query = $this -> db -> query($sql);
		$sql = "select gender,ROUND(DATEDIFF(curdate(),dob)/360) as age,tbphase from patient where date_enrolled between '$start_date' and '$end_date' and facility_code='$facility_code' and gender !='' and tb='1' and tbphase !='0'";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		$strXML = array();
		if ($results) {
			foreach ($results as $result) {
				if ($result['tbphase'] == 1) {
					if ($result['gender'] == 1) {
						if ($result['age'] >= 15) {
							$one_adult_male++;
						} else if ($result['age'] < 15) {
							$one_child_male++;
						}
					} else if ($result['gender'] == 2) {
						if ($result['age'] >= 15) {
							$one_adult_female++;
						} else if ($result['age'] < 15) {
							$one_child_female++;
						}
					}
				} else if ($result['tbphase'] == 2) {
					if ($result['gender'] == 1) {
						if ($result['age'] >= 15) {
							$two_adult_male++;
						} else if ($result['age'] < 15) {
							$two_child_male++;
						}
					} else if ($result['gender'] == 2) {
						if ($result['age'] >= 15) {
							$two_adult_female++;
						} else if ($result['age'] < 15) {
							$two_child_female++;
						}
					}
				} else if ($result['tbphase'] == 3) {
					if ($result['gender'] == 1) {
						if ($result['age'] >= 15) {
							$three_adult_male++;
						} else if ($result['age'] < 15) {
							$three_child_male++;
						}
					} else if ($result['gender'] == 2) {
						if ($result['age'] >= 15) {
							$three_adult_female++;
						} else if ($result['age'] < 15) {
							$three_child_female++;
						}
					}
				}
			}
		}
		$dyn_table = "<table id='patient_listing' border='1' cellpadding='5'>
			<tr><th>Stages</th><th colspan='2'>Adults</th><th colspan='2'>Children</th></tr>
			<tr><th>----</th><th>No. of Males(TB)</th><th>No. of Females(TB)</th><th>No. of Males(TB)</th><th>No. of Females(TB)</th></tr>";
		$dyn_table .= "<tr><td>Intensive</td><td>" . number_format($one_adult_male) . "</td><td>" . number_format($one_adult_female) . "</td><td>" . number_format($one_child_male) . "</td><td>" . number_format($one_child_female) . "</td></tr>";
		$dyn_table .= "<tr><td>Continuation</td><td>" . number_format($two_adult_male) . "</td><td>" . number_format($two_adult_female) . "</td><td>" . number_format($two_child_male) . "</td><td>" . number_format($two_child_female) . "</td></tr>";
		$dyn_table .= "<tr><td>Completed</td><td>" . number_format($three_adult_male) . "</td><td>" . number_format($three_adult_female) . "</td><td>" . number_format($three_child_male) . "</td><td>" . number_format($three_child_female) . "</td></tr>";
		$dyn_table .= "<tr class='tfoot'><td><b>TOTALS</b></td><td><b>" . number_format($one_adult_male + $two_adult_male + $three_adult_male) . "</b></td><td><b>" . number_format($one_adult_female + $two_adult_female + $three_adult_female) . "</b></td><td><b>" . number_format($one_child_male + $two_child_male + $three_child_male) . "</b></td><td><b>" . number_format($one_child_female + $two_child_female + $three_child_female) . "</b></td></tr>";
		$dyn_table .= "</table>";
		$data['dyn_table'] = $dyn_table;
		$data['title'] = "webADT | Reports";
		$data['hide_side_menu'] = 1;
		$data['banner_text'] = "Facility Reports";
		$data['selected_report_type_link'] = "standard_report_row";
		$data['selected_report_type'] = "Standard Reports";
		$data['report_title'] = "TB Stages Summary";
		$data['facility_name'] = $this -> session -> userdata('facility_name');
		$data['content_view'] = 'reports/tb_stages_v';
		$this -> load -> view('template', $data);
	}

	public function getFamilyPlanning($start_date = "", $end_date = "") {
		$data['from'] = $start_date;
		$data['to'] = $end_date;
		$start_date = date('Y-m-d', strtotime($start_date));
		$end_date = date('Y-m-d', strtotime($end_date));
		$facility_code = $this -> session -> userdata('facility');
		$arr = array();
		$total = 0;
		$sql = "select fplan from patient where date_enrolled between '$start_date' and '$end_date' and gender='2' and gender !='' and facility_code='$facility_code' AND fplan != '' AND fplan != 'null' AND ROUND(DATEDIFF(curdate(),dob)/360)>=15 AND ROUND(DATEDIFF(curdate(),dob)/360)<=49";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		if ($results) {
			foreach ($results as $result) {
				if (strstr($result['fplan'], ',', true)) {
					$values = explode(",", $result['fplan']);
					foreach ($values as $value) {
						$arr[] = $value;
					}
				} else {
					$arr[] = $result['fplan'];
				}

			}
			$family_planning = array_count_values($arr);
			foreach ($family_planning as $family_plan => $index) {
				$sql = "select name from family_planning where indicator='$family_plan'";
				$query = $this -> db -> query($sql);
				$results = $query -> result_array();
				if ($results) {
					foreach ($results as $result) {
						$family[$result['name']] = $index;
					}
				}
				$total += $index;
			}
			$dyn_str = "<table id='patient_listing'  cellpadding='5'><tr><th>Method</th><th>No. Of Women on Method</th><th>Percentage Proportion(%)</th></tr>";
			foreach ($family as $farm => $index) {
				$dyn_str .= "<tr><td>" . $farm . "</td><td>" . $index . "</td><td>" . number_format(($index / $total) * 100, 1) . "%</td></tr>";
			}
			$dyn_str .= "<tr class='tfoot'><td><b>TOTALS</b></td><td><b>$total</b></td><td><b>100%</b></td></tr>";
			$dyn_str .= "</table>";
			$data['dyn_table'] = $dyn_str;
			$data['title'] = "webADT | Reports";
			$data['hide_side_menu'] = 1;
			$data['banner_text'] = "Facility Reports";
			$data['selected_report_type_link'] = "standard_report_row";
			$data['selected_report_type'] = "Standard Reports";
			$data['report_title'] = "Family Planning Summary";
			$data['facility_name'] = $this -> session -> userdata('facility_name');
			$data['content_view'] = 'reports/family_planning_v';
			$this -> load -> view('template', $data);
		}
	}

	public function getIndications($start_date = "", $end_date = "") {
		$data['from'] = $start_date;
		$data['to'] = $end_date;
		$start_date = date('Y-m-d', strtotime($start_date));
		$end_date = date('Y-m-d', strtotime($end_date));
		$facility_code = $this -> session -> userdata('facility');
		$sql = "select * from opportunistic_infection";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		$total = 0;
		$children = 0;
		$adult_male = 0;
		$adult_female = 0;
		$overall_adult_male = 0;
		$overall_adult_female = 0;
		$overall_children = 0;
		$dyn_table = "";
		if ($results) {
			$dyn_table .= "<table id='patient_listing' border='1' cellpadding='5'><tr><th>Indication</th><th>Adult Male</th><th>Adult Female</th><th>Children</th></tr>";
			foreach ($results as $result) {
				$indication = $result['indication'];
				$indication_name = $result['name'];
				$sql = "select ROUND(DATEDIFF(curdate(),p.dob)/360) as age,gender from patient_visit pv left join patient p on p.patient_number_ccc=pv.patient_id where pv.dispensing_date between '$start_date' and '$end_date' and pv.indication='$indication' and facility='$facility_code' group by pv.patient_id,pv.indication";
				$query = $this -> db -> query($sql);
				$results = $query -> result_array();
				if ($results) {
					foreach ($results as $result) {
						if ($result['age'] >= 15) {
							if ($result['gender'] == 2) {
								$adult_male++;
							} else if ($result['gender'] == 2) {
								$adult_female++;
							} else if ($result['age'] < 15) {
								$children++;
							}
						}
					}

				} else {
					$adult_male = 0;
					$adult_female = 0;
					$children = 0;
				}
				$overall_adult_male += $adult_male;
				$overall_adult_female += $adult_female;
				$overall_children += $children;
				$dyn_table .= "<tr><td><b>$indication | $indication_name <b></td><td>" . number_format($adult_male) . "</td><td>" . number_format($adult_female) . "</td><td>" . number_format($children) . "</td></tr>";

			}
			$dyn_table .= "<tr class='tfoot'><td><b>TOTALS</b></td><td><b>" . number_format($overall_adult_male) . "</b></td><td><b>" . number_format($overall_adult_female) . "</b></td><td><b>" . number_format($overall_children) . "</b></td></tr>";
			$dyn_table .= "</table>";
		}
		$data['dyn_table'] = $dyn_table;
		$data['title'] = "webADT | Reports";
		$data['hide_side_menu'] = 1;
		$data['banner_text'] = "Facility Reports";
		$data['selected_report_type_link'] = "standard_report_row";
		$data['selected_report_type'] = "Standard Reports";
		$data['report_title'] = "Patient Indication Summary";
		$data['facility_name'] = $this -> session -> userdata('facility_name');
		$data['content_view'] = 'reports/patient_indication_v';
		$this -> load -> view('template', $data);
	}

	public function getChronic($start_date = "", $end_date = "") {
		$data['from'] = $start_date;
		$data['to'] = $end_date;
		$start_date = date('Y-m-d', strtotime($start_date));
		$end_date = date('Y-m-d', strtotime($end_date));
		$facility_code = $this -> session -> userdata('facility');
		$total = 0;
		$total_male_tb = 0;
		$total_female_tb = 0;
		$total_children_tb = 0;
		$adult_male = array();
		$adult_female = array();
		$child = array();
		$sql = "SELECT other_illnesses, ROUND( DATEDIFF( curdate( ) , dob ) /360 ) AS age,gender FROM patient WHERE date_enrolled BETWEEN '$start_date' AND '$end_date' AND gender != '' AND facility_code = '$facility_code' AND other_illnesses != '' AND other_illnesses != 'null' AND gender !=''";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		if ($results) {
			foreach ($results as $result) {
				if (trim(strtoupper($result['other_illnesses'])) != '' && trim(strtoupper($result['other_illnesses'])) != 'NULL') {

					if (strstr($result['other_illnesses'], ',', true)) {
						$values = explode(",", $result['other_illnesses']);
						foreach ($values as $value) {
							$arr[] = trim(strtoupper($value));
						}
					} else {
						$arr[] = trim(strtoupper($result['other_illnesses']));
					}
					if ($result['gender'] == 1) {//Check Male
						if ($result['age'] >= 15) {//Check Adult
							if (strstr(trim($result['other_illnesses']), ',', true)) {
								$values = explode(",", $result['other_illnesses']);
								foreach ($values as $value) {
									$adult_male[] = trim(strtoupper($value));
								}
							} else {
								$adult_male[] = trim(strtoupper($result['other_illnesses']));
							}
						} else if ($result['age'] < 15) {//Check Child
							if (strstr(trim($result['other_illnesses']), ',', true)) {
								$values = explode(",", $result['other_illnesses']);
								foreach ($values as $value) {
									$child[] = trim(strtoupper($value));
								}
							} else {
								$child[] = trim(strtoupper($result['other_illnesses']));
							}
						}

					} else if ($result['gender'] == 2) {//Check Female
						if ($result['age'] >= 15) {//Check Adult
							if (strstr(trim($result['other_illnesses']), ',', true)) {
								$values = explode(",", $result['other_illnesses']);
								foreach ($values as $value) {
									$adult_female[] = trim(strtoupper($value));
								}
							} else {
								$adult_female[] = trim(strtoupper($result['other_illnesses']));
							}
						} else if ($result['age'] < 15) {//Check Child
							if (strstr(trim($result['other_illnesses']), ',', true)) {
								$values = explode(",", $result['other_illnesses']);
								foreach ($values as $value) {
									$child[] = trim(strtoupper($value));
								}
							} else {
								$child[] = trim(strtoupper($result['other_illnesses']));
							}
						}
					}

				}
			}
			$other_illnesses = array_count_values($arr);
			$other_illnesses_male = array_count_values($adult_male);
			$other_illnesses_female = array_count_values($adult_female);
			$other_illnesses_child = array_count_values($child);
			$values = array();

			foreach ($other_illnesses as $other_illness => $index) {
				if (array_key_exists($other_illness, $other_illnesses_male)) {
					$values[$other_illness]['male'] = $index;
				} else {
					$values[$other_illness]['male'] = 0;
				}
				if (array_key_exists($other_illness, $other_illnesses_female)) {
					$values[$other_illness]['female'] = $index;
				} else {
					$values[$other_illness]['female'] = 0;
				}
				if (array_key_exists($other_illness, $other_illnesses_child)) {
					$values[$other_illness]['child'] = $index;
				} else {
					$values[$other_illness]['child'] = 0;
				}
				$total += $index;
			}
			foreach ($values as $value => $index) {
				foreach ($index as $key => $val) {
					$sql = "select * from other_illnesses where indicator='$value'";
					$query = $this -> db -> query($sql);
					$results = $query -> result_array();
					if ($results) {
						foreach ($results as $result) {
							$answer = strtoupper($result['name']);
						}
						$values[$answer][$key] = $val;
						unset($values[$value]);
					}
				}
			}
		}
		//Get TB Numbers
		$sql = "select ROUND( DATEDIFF( curdate( ) , dob ) /360 ) AS age,gender from patient WHERE date_enrolled BETWEEN '$start_date' AND '$end_date' AND gender != '' AND facility_code = '$facility_code' AND tb='1' AND dob !='' AND gender !=''";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		if ($results) {
			foreach ($results as $result) {
				if ($result['age'] >= 15) {
					if ($result['gender'] == 1) {
						$total_male_tb++;
					} else if ($result['gender'] == 2) {
						$total_female_tb++;
					}
				} else if ($result['age'] < 15) {
					$total_children_tb++;
				}
			}
		}
		//Initialize tb
		$values['TB']['male'] = $total_male_tb;
		$values['TB']['female'] = $total_female_tb;
		$values['TB']['child'] = $total_children_tb;

		$overall_male = 0;
		$overall_female = 0;
		$overall_child = 0;

		$dyn_table = "<table id='patient_listing' border='1' cellpadding='5'><tr><th>Chronic Diseases</th><th>Adult Male</th><th>Adult Female</th><th>Children</th></tr>";

		foreach ($values as $value => $indices) {
			$dyn_table .= "<tr><td><b>$value</b></td>";
			foreach ($indices as $index => $newval) {
				if ($index == "male") {
					$overall_male += $newval;
				} else if ($index == "female") {
					$overall_female += $newval;
				} else if ($index == "child") {
					$overall_child += $newval;
				}

				$val = number_format($newval);
				$dyn_table .= "<td>$val</td>";
			}
			$dyn_table .= "</tr>";
		}
		$dyn_table .= "<tr class='tfoot'><td><b>TOTALS</b></td><td><b>" . number_format($overall_male) . "</b></td><td><b>" . number_format($overall_female) . "</b></td><td><b>" . number_format($overall_child) . "</b></td></tr>";
		$dyn_table .= "</table>";
		$data['dyn_table'] = $dyn_table;
		$data['title'] = "webADT | Reports";
		$data['hide_side_menu'] = 1;
		$data['banner_text'] = "Facility Reports";
		$data['selected_report_type_link'] = "standard_report_row";
		$data['selected_report_type'] = "Standard Reports";
		$data['report_title'] = "Chronic Illnesses Summary";
		$data['facility_name'] = $this -> session -> userdata('facility_name');
		$data['content_view'] = 'reports/chronic_v';
		$this -> load -> view('template', $data);
	}

	public function getADR($start_date = "", $end_date = "") {
		$data['from'] = $start_date;
		$data['to'] = $end_date;
		$start_date = date('Y-m-d', strtotime($start_date));
		$end_date = date('Y-m-d', strtotime($end_date));
		$facility_code = $this -> session -> userdata('facility');
		$male_adr = 0;
		$female_adr = 0;
		$male_noadr = 0;
		$female_noadr = 0;

		//Get Those With ADR
		$sql = "select gender,count(*)as total from patient WHERE date_enrolled BETWEEN '$start_date' AND '$end_date' and facility_code='$facility_code' and adr !='' and adr !='null' and adr is not null and gender !='' group by gender";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		if ($results) {
			foreach ($results as $result) {
				if ($result['gender'] == 1) {
					$male_adr = $result['total'];
				} else if ($result['gender'] == 2) {
					$female_adr = $result['total'];
				}
			}
		}

		//Get Those Without ADR
		$sql = "select gender,count(*)as total from patient WHERE date_enrolled BETWEEN '$start_date' AND '$end_date' and facility_code='$facility_code' and adr ='' or adr ='null' or adr is  null and gender !='' group by gender";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		if ($results) {
			foreach ($results as $result) {
				if ($result['gender'] == 1) {
					$male_noadr = $result['total'];
				} else if ($result['gender'] == 2) {
					$female_noadr = $result['total'];
				}
			}
		}

		$percentage_adr = 0;
		$percentage_noadr = 0;
		$percentage_adr = (($male_adr + $female_adr) / ($male_adr + $female_adr + $male_noadr + $female_noadr)) * 100;
		$percentage_noadr = (($male_noadr + $female_noadr) / ($male_adr + $female_adr + $male_noadr + $female_noadr)) * 100;

		$dyn_table = "<table id='patient_listing' border='1' cellpadding='5'><tr><th colspan='2'>Patients with Allergy</th><th colspan='2'>Patients without Allergy</th><th>Percentage with Allergy</th><th>Percentage without Allergy</th></tr>";
		$dyn_table .= "<tr><th>Male</th><th>Female</th><th>Male</th><th>Female</th><th>((Male +Female)/total)*100%</th><th>((Male +Female)/total)*100%</th></tr>";
		$dyn_table .= "<tr><td>" . number_format($male_adr) . "</td><td>" . number_format($female_adr) . "</td><td>" . number_format($male_noadr) . "</td><td>" . number_format($female_noadr) . "</td><td>" . number_format($percentage_adr, 1) . "%</td><td>" . number_format($percentage_noadr, 1) . "%</td></tr>";
		$dyn_table .= "</table>";
		$data['dyn_table'] = $dyn_table;
		$data['title'] = "webADT | Reports";
		$data['hide_side_menu'] = 1;
		$data['banner_text'] = "Facility Reports";
		$data['selected_report_type_link'] = "standard_report_row";
		$data['selected_report_type'] = "Standard Reports";
		$data['report_title'] = "Patient Allergies Summary";
		$data['facility_name'] = $this -> session -> userdata('facility_name');
		$data['content_view'] = 'reports/allergy_v';
		$this -> load -> view('template', $data);
	}

	public function getDrugsIssued($stock_type, $start_date = "", $end_date = "") {
		$data['from'] = $start_date;
		$data['to'] = $end_date;
		$start_date = date('Y-m-d', strtotime($start_date));
		$end_date = date('Y-m-d', strtotime($end_date));
		$facility_code = $this -> session -> userdata('facility');
		$facilty_value = "";
		if ($stock_type == 1) {
			//Main Store
			$facilty_value = "dsm.source!=dsm.destination";

		} else if ($stock_type == 2) {
			//Pharmacy
			$facilty_value = "dsm.source=dsm.destination";
		}
		$sql = "select d.drug,du.Name as unit,d.pack_size,SUM(dsm.quantity_out) as total from drug_stock_movement dsm LEFT JOIN transaction_type t ON t.id=dsm.transaction_type LEFT JOIN drugcode d ON d.id=dsm.drug LEFT JOIN drug_unit du ON du.id=d.unit where dsm.transaction_date between '$start_date' and '$end_date' and $facilty_value and dsm.facility='$facility_code' AND t.name LIKE '%Issued To%' GROUP BY d.drug";
		$query = $this -> db -> query($sql);
		$dyn_table = "<table id='patient_listing' border='1' cellpadding='5'>";
		$dyn_table .= "<tr><th>Drug Name</th><th>Drug Unit</th><th> Drug PackSize</th><th>Quantity</th></tr>";
		$results = $query -> result_array();
		if ($results) {
			foreach ($results as $result) {
				$dyn_table .= "<tr><td>" . $result['drug'] . "</td><td>" . $result['unit'] . "</td><td>" . $result['pack_size'] . "</td><td>" . number_format($result['total']) . "</td></tr>";
			}
		} else {
			$dyn_table .= "<tr><td colspan='4'>No Data Available</td></tr>";
		}
		$dyn_table .= "</table>";
		echo $dyn_table;
	}

	public function getDrugsReceived($stock_type, $start_date = "", $end_date = "") {
		$data['from'] = $start_date;
		$data['to'] = $end_date;
		$start_date = date('Y-m-d', strtotime($start_date));
		$end_date = date('Y-m-d', strtotime($end_date));
		$facility_code = $this -> session -> userdata('facility');
		$facilty_value = "";
		if ($stock_type == 1) {
			//Main Store
			$facilty_value = "dsm.source!=dsm.destination";

		} else if ($stock_type == 2) {
			//Pharmacy
			$facilty_value = "dsm.source=dsm.destination";
		}
		$sql = "select d.drug,du.Name as unit,d.pack_size,SUM(dsm.quantity) as total from drug_stock_movement dsm LEFT JOIN transaction_type t ON t.id=dsm.transaction_type LEFT JOIN drugcode d ON d.id=dsm.drug LEFT JOIN drug_unit du ON du.id=d.unit where dsm.transaction_date between '$start_date' and '$end_date' and $facilty_value and dsm.facility='$facility_code' AND t.name LIKE '%Received from%' GROUP BY d.drug";
		$query = $this -> db -> query($sql);
		$dyn_table = "<table id='patient_listing' border='1' cellpadding='5'>";
		$dyn_table .= "<tr><th>Drug Name</th><th>Drug Unit</th><th> Drug PackSize</th><th>Quantity</th></tr>";
		$results = $query -> result_array();
		if ($results) {
			foreach ($results as $result) {
				$dyn_table .= "<tr><td>" . $result['drug'] . "</td><td>" . $result['unit'] . "</td><td>" . $result['pack_size'] . "</td><td>" . number_format($result['total']) . "</td></tr>";
			}
		} else {
			$dyn_table .= "<tr><td colspan='4'>No Data Available</td></tr>";
		}
		$dyn_table .= "</table>";
		echo $dyn_table;

	}

	public function getDailyConsumption($stock_type, $start_date = "", $end_date = "") {

	}

	public function getBMI($start_date = "", $end_date = "") {

	}

	public function base_params($data) {
		$data['reports'] = true;
		$data['title'] = "webADT | Reports";
		$data['banner_text'] = "Facility Reports";
		$this -> load -> view('template', $data);
	}

}
