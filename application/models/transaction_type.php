<?php
class Transaction_Type extends Doctrine_Record {
	
	public function setTableDefinition() {
		$this -> hasColumn('Name', 'varchar', 100);
		$this -> hasColumn('Desc', 'varchar', 200);
		$this -> hasColumn('Effect', 'varchar', 2);
	}	
	public function setUp() {
		$this -> setTableName('transaction_type');
	}
	
	public function getAll() {
		$query = Doctrine_Query::create() -> select("*") -> from("transaction_type") -> where("effect", "1");
		$transaction_types = $query -> execute();
		return $transaction_types;
	}
}
?>
	