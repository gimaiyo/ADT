<?php
class Clientsupport extends Doctrine_Record {

	public function setTableDefinition() {
		$this -> hasColumn('Name', 'varchar', 50);
		$this -> hasColumn('Active', 'varchar', 2);
	}

	public function setUp() {
		$this -> setTableName('supporter');
	}

	public function getAll() {
		$query = Doctrine_Query::create() -> select("*") -> from("supporter") -> where("Active", "1");
		$sources = $query -> execute();
		return $sources;
	}

	public function getTotalNumber() {
		$query = Doctrine_Query::create() -> select("count(*) as Total_Sources") -> from("supporter");
		$total = $query -> execute();
		return $total[0]['Total_Sources'];
	}

	public function getPagedSources($offset, $items) {
		$query = Doctrine_Query::create() -> select("Name") -> from("supporter") -> offset($offset) -> limit($items);
		$sources = $query -> execute();
		return $sources;
	}
	public function getThemAll($access_level="") {
		if($access_level="" || $access_level=="system_administrator"){
			$query = Doctrine_Query::create() -> select("*") -> from("supporter") ;
		}
		else{
			$query = Doctrine_Query::create() -> select("*") -> from("supporter") -> where("Active='1'");
		}
		
		$sources = $query -> execute();
		return $sources;
	}
	public static function getSource($id) {
		$query = Doctrine_Query::create() -> select("*") -> from("supporter") -> where("id = '$id'");
		$ois = $query -> execute();
		return $ois[0];
	}

}
?>