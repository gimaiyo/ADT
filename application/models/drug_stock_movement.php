<?php
class Drug_Stock_Movement extends Doctrine_Record {

	public function setTableDefinition() {
		$this -> hasColumn('Machine_Code', 'varchar', 10);
		$this -> hasColumn('Drug', 'varchar', 10);
		$this -> hasColumn('Transaction_Date', 'varchar', 10);
		$this -> hasColumn('Batch_Number', 'varchar', 10);
		$this -> hasColumn('Transaction_Type', 'varchar', 10);
		$this -> hasColumn('Source', 'varchar', 10);
		$this -> hasColumn('Destination', 'varchar', 10);
		$this -> hasColumn('Expiry_date', 'varchar', 10);
		$this -> hasColumn('Packs', 'varchar', 10);
		$this -> hasColumn('Quantity', 'varchar', 10);
		$this -> hasColumn('Quantity_Out', 'varchar', 10);
		$this -> hasColumn('Unit_Cost', 'varchar', 10);
		$this -> hasColumn('Amount', 'varchar', 10);
		$this -> hasColumn('Remarks', 'text');
		$this -> hasColumn('Operator', 'varchar', 10);
		$this -> hasColumn('Order_Number', 'varchar', 10);
		$this -> hasColumn('Facility', 'varchar', 10);
		$this -> hasColumn('Machine_Code', 'varchar', 10);
		$this -> hasColumn('Merged_From', 'varchar', 50);
		$this -> hasColumn('Timestamp', 'varchar', 50);
	}

	public function setUp() {
		$this -> setTableName('drug_stock_movement');
		$this -> hasOne('Drug as Drug_Object', array('local' => 'Drug', 'foreign' => 'id'));
	}

	public function getTotalTransactions($facility) {
		$query = Doctrine_Query::create() -> select("count(*) as Total_Transactions") -> from("Drug_Stock_Movement") -> where("Facility= '$facility'");
		//echo $query->getSQL();
		$total = $query -> execute();
		return $total[0]['Total_Transactions'];
	}

	public function getPagedTransactions($offset, $items, $machine_code, $drug, $facility, $transaction_date, $timestamp) {
		$query = Doctrine_Query::create() -> select("dm2.*") -> from("Drug_Stock_Movement dm2")-> where("dm2.Machine_Code = '$machine_code' and dm2.Facility='$facility' and dm2.Timestamp>$timestamp");
		//echo $query->getSQL();
		$drug_transactions = $query -> execute(array(), Doctrine::HYDRATE_ARRAY);
		return $drug_transactions;
	}

	public function getPagedFacilityTransactions($offset, $items, $facility) {
		$query = Doctrine_Query::create() -> select("*") -> from("Drug_Stock_Movement") -> where("Facility='$facility'") -> offset($offset) -> limit($items);
		$drug_transactions = $query -> execute(array(), Doctrine::HYDRATE_ARRAY);
		return $drug_transactions;
	}

}
