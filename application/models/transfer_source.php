<?php
class Transfer_Source extends Doctrine_Record {

	public function setTableDefinition() {
		$this -> hasColumn('Name', 'varchar', 100);
		$this -> hasColumn('Active', 'varchar', 2);
	}

	public function setUp() {
		$this -> setTableName('transfer_source');
	}
    
	public function getAll() {
		$query = Doctrine_Query::create() -> select("*") -> from("Transfer_Source") -> where("Active", "1");
		$infections = $query -> execute();
		return $infections;
	}

	public function getTotalNumber() {
		$query = Doctrine_Query::create() -> select("count(*) as Total_Sources") -> from("Transfer_Source");
		$total = $query -> execute();
		return $total[0]['Total_Sources'];
	}

	public function getPagedOIs($offset, $items) {
		$query = Doctrine_Query::create() -> select("Name") -> from("Transfer_Source") -> offset($offset) -> limit($items);
		$ois = $query -> execute();
		return $ois;
	}
	public static function getSource($id) {
		$query = Doctrine_Query::create() -> select("*") -> from("Transfer_Source") -> where("id = '$id'");
		$ois = $query -> execute();
		return $ois[0];
	}
	public function getThemAll() {
		$query = Doctrine_Query::create() -> select("*") -> from("Transfer_Source");
		$infections = $query -> execute();
		return $infections;
	}

}
?>