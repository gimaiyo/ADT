<?php

class Pipeline_Consumption extends Doctrine_Record {
	public function setTableDefinition() {
		$this -> hasColumn('id', 'int', 11);
		$this -> hasColumn('pipeline', 'varchar', 50);
		$this -> hasColumn('month', 'varchar', 100);
		$this -> hasColumn('year', 'varchar', 100);
		$this -> hasColumn('drugname', 'varchar', 200);
		$this -> hasColumn('consumption', 'varchar', 150);
	}

	public function setUp() {
		$this -> setTableName('pipeline_consumption');
	}

	public function getAll() {
		$query = Doctrine_Query::create() -> select("*") -> from("pipeline_consumption");
		$types = $query -> execute();
		return $types;
	}

	public function checkValid($pipeline, $month, $year, $drugname_cell) {
		$query = Doctrine_Query::create() -> select("*") -> from("pipeline_consumption") -> where("pipeline='$pipeline' and month='$month' and year='$year' and drugname='$drugname_cell'");
		$types = $query -> execute(array(), Doctrine::HYDRATE_ARRAY);
		return $types;

	}

	public function getTotals($pipeline, $month, $year) {
		$query = Doctrine_Query::create() -> select("*") -> from("pipeline_consumption") -> where("pipeline='$pipeline' and month='$month' and year='$year'");
		$types = $query -> execute(array(), Doctrine::HYDRATE_ARRAY);
		return $types;
	}
	public function getDrugs($pipeline, $month, $year) {
		$query = Doctrine_Query::create() -> select("distinct(drugname) as drugname") -> from("pipeline_consumption") -> where("pipeline='$pipeline' and month='$month' and year='$year'");
		$types = $query -> execute(array(), Doctrine::HYDRATE_ARRAY);
		return $types;
	}

}
?>