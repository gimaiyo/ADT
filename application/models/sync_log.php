<?php
class Sync_Log extends Doctrine_Record {

	public function setTableDefinition() {
		$this -> hasColumn('logggedsql', 'text');
		$this -> hasColumn('timestamp', 'varchar',255);
		$this -> hasColumn('machine_code','varchar',255);
		$this -> hasColumn('facility','varchar',150);
	}

	public function setUp() {
		$this -> setTableName('sync_log');
	}

	public function getAll() {
		$query = Doctrine_Query::create() -> select("*") -> from("sync_log");
		$sync_log = $query -> execute();
		return $sync_log;
	}
	


}
