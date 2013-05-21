<?php
class test_management extends MY_Controller {
	function __construct() {
		parent::__construct();
		ini_set("max_execution_time", "100000");
		$this -> load -> helper('fusioncharts');
	}

	public function index() {
		$this -> load ->view('test_v');
	}
	
	public function getmonthsofstock($type,$drugid,$pipeline,$currentmonth,$currentyear){
if ($currentmonth > 0)//month and year
{
		if ($type==1) //facility
		{
			if ($pipeline !='') // specific
			{
			$sql=mysql_query("select MosatFacility as 'MOS' from pipelineconsumptionnstocks where productid='$drugid' and  pipeline='$pipeline' AND month='$currentmonth' and year='$currentyear'") or die(mysql_error());
			$sqlarray=mysql_fetch_array($sql);
			$MOS=$sqlarray['MOS'];
			}
			else//national
			{
			$sql=mysql_query("select MosatFacility as 'MOS' from monthsofstock where product='$drugid' and  month='$currentmonth' and year='$currentyear'") or die(mysql_error());
			$sqlarray=mysql_fetch_array($sql);
			$MOS=$sqlarray['MOS'];
			}
		}
		elseif ($type==2) //cms
		{
			if ($pipeline !='') // specific
			{
			$sql=mysql_query("select MoSatCMS as 'MOS' from pipelineconsumptionnstocks where productid='$drugid' and  pipeline='$pipeline' AND month='$currentmonth' and year='$currentyear'") or die(mysql_error());
			$sqlarray=mysql_fetch_array($sql);
			$MOS=$sqlarray['MOS'];
			}
			else//national
			{
			$sql=mysql_query("select MoSatCMS as 'MOS' from monthsofstock where product='$drugid' and  month='$currentmonth' and year='$currentyear'") or die(mysql_error());
			$sqlarray=mysql_fetch_array($sql);
			$MOS=$sqlarray['MOS'];
			}
		}
		elseif ($type==3) //pending
		{
			if ($pipeline !='') // specific
			{
			$sql=mysql_query("select MoSatPendingwithsuppliers as 'MOS' from pipelineconsumptionnstocks where productid='$drugid' and  pipeline='$pipeline' AND month='$currentmonth' and year='$currentyear'") or die(mysql_error());
			$sqlarray=mysql_fetch_array($sql);
			$MOS=$sqlarray['MOS'];
			}
			else//national
			{
			$sql=mysql_query("select MoSatPendingwithsuppliers as 'MOS' from monthsofstock where product='$drugid' and  month='$currentmonth' and year='$currentyear'") or die(mysql_error());
			$sqlarray=mysql_fetch_array($sql);
			$MOS=$sqlarray['MOS'];
			}
		}//end if agetype

}
else //year only
{
	if ($type==1) //facility
		{
			if ($pipeline !='') // specific
			{
			$sql=mysql_query("select SUM(MosatFacility) as 'MOS' from pipelineconsumptionnstocks where productid='$drugid' and  pipeline='$pipeline'  and year='$currentyear'") or die(mysql_error());
			$sqlarray=mysql_fetch_array($sql);
			$MOS=$sqlarray['MOS'];
			}
			else//national
			{
			$sql=mysql_query("select SUM(MosatFacility) as 'MOS' from monthsofstock where product='$drugid'  and year='$currentyear'") or die(mysql_error());
			$sqlarray=mysql_fetch_array($sql);
			$MOS=$sqlarray['MOS'];
			}
		}
		elseif ($type==2) //cms
		{
			if ($pipeline !='') // specific
			{
			$sql=mysql_query("select SUM(MoSatCMS) as 'MOS' from pipelineconsumptionnstocks where productid='$drugid' and  pipeline='$pipeline'  and year='$currentyear'") or die(mysql_error());
			$sqlarray=mysql_fetch_array($sql);
			$MOS=$sqlarray['MOS'];
			}
			else//national
			{
			$sql=mysql_query("select SUM(MoSatCMS) as 'MOS' from monthsofstock where product='$drugid' and year='$currentyear'") or die(mysql_error());
			$sqlarray=mysql_fetch_array($sql);
			$MOS=$sqlarray['MOS'];
			}
		}
		elseif ($type==3) //pending
		{
			if ($pipeline !='') // specific
			{
			$sql=mysql_query("select SUM(MoSatPendingwithsuppliers) as 'MOS' from pipelineconsumptionnstocks where productid='$drugid' and  pipeline='$pipeline'  and year='$currentyear'") or die(mysql_error());
			$sqlarray=mysql_fetch_array($sql);
			$MOS=$sqlarray['MOS'];
			}
			else//national
			{
			$sql=mysql_query("select SUM(MoSatPendingwithsuppliers) as 'MOS' from monthsofstock where product='$drugid' and year='$currentyear'") or die(mysql_error());
			$sqlarray=mysql_fetch_array($sql);
			$MOS=$sqlarray['MOS'];
			}
		}//end if agetype
		
}//END IF YEAR


return $MOS;

}//end function

}
?>	