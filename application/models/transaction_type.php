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
		$query = Doctrine_Query::create() -> select("*") -> from("transaction_type");
		$transaction_types = $query -> execute();
		return $transaction_types;
	}
	
	public function getTransactionType($filter,$effect){
		$query = Doctrine_Query::create() -> select("*") -> from("transaction_type")->where("name LIKE '%$filter%' AND effect='$effect' ");
		$transaction_type = $query -> execute();
		return $transaction_type[0];
	}
}
?>
	