<?php 

	require_once "../class_connect/clsconnect.php"; 
	require_once "../class/clsindividual.php";
	require_once "../class/clscompany.php";
	require_once "../class/clslog.php";
	require_once "../class/clsuser.php";
	require_once "../class/clsenquiry_industrial.php";
  	require_once "../class/clsenquiry_industrial_user.php";
	require_once "../class/clssearchenquiry.php"; 
	
	require_once "../class/clsenquiry_status.php";
	require_once "../lib/message.php";
	
	$oconnect  				   = new MyDB();
	$oindividual 				= new individual();
	$ocompany 				   = new company();	
	$olog  					   = new log();
	$oenquiry_industrial_user   = new enquiry_industrial_user();
	$ouser 					  = new user();	
	$osearchenquiry			 = new searchenquiry();
	
	$oenquiry_industrial		= new enquiry_industrial();
	
	$ostatus    = new enquiry_status();	
	$status_arr = $ostatus->selectstatus_array();
	
	$dateform 			= $_REQUEST['dateform'];
 	$dateto 			  = $_REQUEST['dateto'];
	
	$month 			   = $_REQUEST['month'];
 	$year 				= $_REQUEST['year'];
	
	$dateformReport 	  = $oconnect->spDateInfo2($_REQUEST['dateform']);
	$datetoReport 		= $oconnect->spDateInfo2($_REQUEST['dateto']);
		
	
	if($month != 0 && $year != 0 ){	
    	
		// echo "<br>  IF 1 ";
		if($month < 10 ) $month = '0'.$month;
		
		$dateformReport 	  = $year."-".$month."-01";
		$datetoReport 		= $year."-".$month."-31";
		
		$dateform 			= $oconnect->spDateInfo($dateformReport);
 		$dateto 			  = $oconnect->spDateInfo($datetoReport);
	
		
	}else if($month == 0 && $year != 0 ){
		
		// echo "<br>  IF 2 ";	
		
    	$dateformReport 	  = $year."-01-01";
		$datetoReport 		= $year."-12-31";
		
		$dateform 			= $oconnect->spDateInfo($dateformReport);
 		$dateto 			  = $oconnect->spDateInfo($datetoReport);
		
	}else if($month != 0 && $year == 0 ){	
    	
		// echo "<br>  IF 3 ";
		if($month < 10 ) $month = '0'.$month;
		$year = date('Y');
		
		$dateformReport 	  = $year."-".$month."-01";
		$datetoReport 		= $year."-".$month."-31";
		
		$dateform 			= $oconnect->spDateInfo($dateformReport);
 		$dateto 			  = $oconnect->spDateInfo($datetoReport);
	}
	

/** Error reporting */
error_reporting(E_ALL);

date_default_timezone_set('Asia/Bangkok');

/** PHPExcel */
require_once 'phpexcel/PHPExcel.php';

ini_set('max_execution_time', 30000);

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objPHPExcel = $objReader->load("template.xlsx");

// Set properties
$objPHPExcel->getProperties()->setCreator("Wuttichai Somkhampet")
							 ->setLastModifiedBy("Wuttichai Somkhampet")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Commission document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Commission result file");	
							 
$sheet = $objPHPExcel->getActiveSheet();	

$sheet->setCellValue('A2', 'Call in chart day by day in '.$dateform.' to '.$dateto);
$sheet->setCellValue('A13', 'Call in chart by source in '.$dateform.' to '.$dateto);
$sheet->setCellValue('A24', 'Sale person assignment of '.$dateform.' to '.$dateto);

// Call in chart day by day Industrial
$sql = "select sum(land) as land_total, sum(warehouse) as warehouse_total, sum(factory) as factory_total from enquiry_industrial where  DAYOFWEEK(enquiry_date) = 1 and enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);

// echo "<br>".$sql;
		 
while($osearchenquiry->getRecordInd()){
	$sheet->setCellValue('B6', $osearchenquiry->land_total);
	$sheet->setCellValue('B8', $osearchenquiry->warehouse_total + $osearchenquiry->factory_total);	
}

$sql = "select sum(land) as land_total, sum(warehouse) as warehouse_total, sum(factory) as factory_total from enquiry_industrial where  DAYOFWEEK(enquiry_date) = 2 and enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);

// echo "<br>".$sql;
		 
while($osearchenquiry->getRecordInd()){
	$sheet->setCellValue('C6', $osearchenquiry->land_total);
	$sheet->setCellValue('C8', $osearchenquiry->warehouse_total + $osearchenquiry->factory_total);	
	
}

$sql = "select sum(land) as land_total, sum(warehouse) as warehouse_total, sum(factory) as factory_total from enquiry_industrial where  DAYOFWEEK(enquiry_date) = 3 and enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);
		 
while($osearchenquiry->getRecordInd()){
	$sheet->setCellValue('D6', $osearchenquiry->land_total);
	$sheet->setCellValue('D8', $osearchenquiry->warehouse_total + $osearchenquiry->factory_total);	
}

$sql = "select sum(land) as land_total, sum(warehouse) as warehouse_total, sum(factory) as factory_total from enquiry_industrial where  DAYOFWEEK(enquiry_date) = 4 and enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);
		 
while($osearchenquiry->getRecordInd()){
	$sheet->setCellValue('E6', $osearchenquiry->land_total);
	$sheet->setCellValue('E8', $osearchenquiry->warehouse_total + $osearchenquiry->factory_total);	
}

$sql = "select sum(land) as land_total, sum(warehouse) as warehouse_total, sum(factory) as factory_total from enquiry_industrial where  DAYOFWEEK(enquiry_date) = 5 and enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);
		 
while($osearchenquiry->getRecordInd()){
	$sheet->setCellValue('F6', $osearchenquiry->land_total);
	$sheet->setCellValue('F8', $osearchenquiry->warehouse_total + $osearchenquiry->factory_total);	
}

$sql = "select sum(land) as land_total, sum(warehouse) as warehouse_total, sum(factory) as factory_total from enquiry_industrial where  DAYOFWEEK(enquiry_date) = 6 and enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);
		 
while($osearchenquiry->getRecordInd()){
	$sheet->setCellValue('G6', $osearchenquiry->land_total);
	$sheet->setCellValue('G8', $osearchenquiry->warehouse_total + $osearchenquiry->factory_total);	
}

$sql = "select sum(land) as land_total, sum(warehouse) as warehouse_total, sum(factory) as factory_total from enquiry_industrial where  DAYOFWEEK(enquiry_date) = 7 and enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);
		 
while($osearchenquiry->getRecordInd()){
	$sheet->setCellValue('H6', $osearchenquiry->land_total);
	$sheet->setCellValue('H8', $osearchenquiry->warehouse_total + $osearchenquiry->factory_total);	
}

// // Call in chart day by day Commercial
$sql = "select sum(office) as office_total, sum(shop) as shop_total, sum(retail) as retail_total, sum(showroom) as showroom_total from enquiry_commercial where  DAYOFWEEK(enquiry_date) = 1 and enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);
		 
while($osearchenquiry->getRecordCom()){
	$sheet->setCellValue('B7', $osearchenquiry->shop_total);
	$sheet->setCellValue('B9', $osearchenquiry->office_total);
	$sheet->setCellValue('B10', $osearchenquiry->retail_total + $osearchenquiry->showroom_total);	
}

$sql = "select sum(office) as office_total, sum(shop) as shop_total, sum(retail) as retail_total, sum(showroom) as showroom_total from enquiry_commercial where  DAYOFWEEK(enquiry_date) = 2 and enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);
		 
while($osearchenquiry->getRecordCom()){
	$sheet->setCellValue('C7', $osearchenquiry->shop_total);
	$sheet->setCellValue('C9', $osearchenquiry->office_total);
	$sheet->setCellValue('C10', $osearchenquiry->retail_total + $osearchenquiry->showroom_total);	
}

$sql = "select sum(office) as office_total, sum(shop) as shop_total, sum(retail) as retail_total, sum(showroom) as showroom_total from enquiry_commercial where  DAYOFWEEK(enquiry_date) = 3 and enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);
		 
while($osearchenquiry->getRecordCom()){
	$sheet->setCellValue('D7', $osearchenquiry->shop_total);
	$sheet->setCellValue('D9', $osearchenquiry->office_total);
	$sheet->setCellValue('D10', $osearchenquiry->retail_total + $osearchenquiry->showroom_total);	
}

$sql = "select sum(office) as office_total, sum(shop) as shop_total, sum(retail) as retail_total, sum(showroom) as showroom_total from enquiry_commercial where  DAYOFWEEK(enquiry_date) = 4 and enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);
		 
while($osearchenquiry->getRecordCom()){
	$sheet->setCellValue('E7', $osearchenquiry->shop_total);
	$sheet->setCellValue('E9', $osearchenquiry->office_total);
	$sheet->setCellValue('E10', $osearchenquiry->retail_total + $osearchenquiry->showroom_total);	
}

$sql = "select sum(office) as office_total, sum(shop) as shop_total, sum(retail) as retail_total, sum(showroom) as showroom_total from enquiry_commercial where  DAYOFWEEK(enquiry_date) = 5 and enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);
		 
while($osearchenquiry->getRecordCom()){
	$sheet->setCellValue('F7', $osearchenquiry->shop_total);
	$sheet->setCellValue('F9', $osearchenquiry->office_total);
	$sheet->setCellValue('F10', $osearchenquiry->retail_total + $osearchenquiry->showroom_total);	
}

$sql = "select sum(office) as office_total, sum(shop) as shop_total, sum(retail) as retail_total, sum(showroom) as showroom_total from enquiry_commercial where  DAYOFWEEK(enquiry_date) = 6 and enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);
		 
while($osearchenquiry->getRecordCom()){
	$sheet->setCellValue('G7', $osearchenquiry->shop_total);
	$sheet->setCellValue('G9', $osearchenquiry->office_total);
	$sheet->setCellValue('G10', $osearchenquiry->retail_total + $osearchenquiry->showroom_total);	
}

$sql = "select sum(office) as office_total, sum(shop) as shop_total, sum(retail) as retail_total, sum(showroom) as showroom_total from enquiry_commercial where  DAYOFWEEK(enquiry_date) = 7 and enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);
		 
while($osearchenquiry->getRecordCom()){
	$sheet->setCellValue('H7', $osearchenquiry->shop_total);
	$sheet->setCellValue('H9', $osearchenquiry->office_total);
	$sheet->setCellValue('H10', $osearchenquiry->retail_total + $osearchenquiry->showroom_total);	
}


// Call in chart by source Industrial
$sql = "select sum(land) as land_total, sum(warehouse) as warehouse_total, sum(factory) as factory_total from enquiry_industrial where ads = 1 and enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);
		 
while($osearchenquiry->getRecordInd()){
	$sheet->setCellValue('B17', $osearchenquiry->land_total);
	$sheet->setCellValue('B19', $osearchenquiry->warehouse_total + $osearchenquiry->factory_total);	
}

$sql = "select sum(land) as land_total, sum(warehouse) as warehouse_total, sum(factory) as factory_total from enquiry_industrial where board = 1 and enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);
		 
while($osearchenquiry->getRecordInd()){
	$sheet->setCellValue('C17', $osearchenquiry->land_total);
	$sheet->setCellValue('C19', $osearchenquiry->warehouse_total + $osearchenquiry->factory_total);	
}

$sql = "select sum(land) as land_total, sum(warehouse) as warehouse_total, sum(factory) as factory_total from enquiry_industrial where portal_check = 1 and enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);
		 
while($osearchenquiry->getRecordInd()){
	$sheet->setCellValue('D17', $osearchenquiry->land_total);
	$sheet->setCellValue('D19', $osearchenquiry->warehouse_total + $osearchenquiry->factory_total);	
}

$sql = "select sum(land) as land_total, sum(warehouse) as warehouse_total, sum(factory) as factory_total from enquiry_industrial where website  = 1 and enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);
		 
while($osearchenquiry->getRecordInd()){
	$sheet->setCellValue('E17', $osearchenquiry->land_total);
	$sheet->setCellValue('E19', $osearchenquiry->warehouse_total + $osearchenquiry->factory_total);	
}

$sql = "select sum(land) as land_total, sum(warehouse) as warehouse_total, sum(factory) as factory_total from enquiry_industrial where email_check = 1 and enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);
		 
while($osearchenquiry->getRecordInd()){
	$sheet->setCellValue('F17', $osearchenquiry->land_total);
	$sheet->setCellValue('F19', $osearchenquiry->warehouse_total + $osearchenquiry->factory_total);	
}

$sql = "select sum(land) as land_total, sum(warehouse) as warehouse_total, sum(factory) as factory_total from enquiry_industrial where  mail_shot = 1 and enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);
		 
while($osearchenquiry->getRecordInd()){
	$sheet->setCellValue('G17', $osearchenquiry->land_total);
	$sheet->setCellValue('G19', $osearchenquiry->warehouse_total + $osearchenquiry->factory_total);	
}

$sql = "select sum(land) as land_total, sum(warehouse) as warehouse_total, sum(factory) as factory_total from enquiry_industrial where call_in = 1 and enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);
		 
while($osearchenquiry->getRecordInd()){
	$sheet->setCellValue('H17', $osearchenquiry->land_total);
	$sheet->setCellValue('H19', $osearchenquiry->warehouse_total + $osearchenquiry->factory_total);	
}


// Call in chart by source Commercial
$sql = "select sum(office) as office_total, sum(shop) as shop_total, sum(retail) as retail_total, sum(showroom) as showroom_total from enquiry_commercial where ads = 1 and enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);
		 
while($osearchenquiry->getRecordCom()){
	$sheet->setCellValue('B18', $osearchenquiry->shop_total);
	$sheet->setCellValue('B20', $osearchenquiry->office_total);
	$sheet->setCellValue('B21', $osearchenquiry->retail_total + $osearchenquiry->showroom_total);	
}

$sql = "select sum(office) as office_total, sum(shop) as shop_total, sum(retail) as retail_total, sum(showroom) as showroom_total from enquiry_commercial where board = 1 and enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);
		 
while($osearchenquiry->getRecordCom()){
	$sheet->setCellValue('C18', $osearchenquiry->shop_total);
	$sheet->setCellValue('C20', $osearchenquiry->office_total);
	$sheet->setCellValue('C21', $osearchenquiry->retail_total + $osearchenquiry->showroom_total);	
}
$sql = "select sum(office) as office_total, sum(shop) as shop_total, sum(retail) as retail_total, sum(showroom) as showroom_total from enquiry_commercial where portal_check = 1 and enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);
		 
while($osearchenquiry->getRecordCom()){
	$sheet->setCellValue('D18', $osearchenquiry->shop_total);
	$sheet->setCellValue('D20', $osearchenquiry->office_total);
	$sheet->setCellValue('D21', $osearchenquiry->retail_total + $osearchenquiry->showroom_total);	
}
$sql = "select sum(office) as office_total, sum(shop) as shop_total, sum(retail) as retail_total, sum(showroom) as showroom_total from enquiry_commercial where website  = 1 and enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);
		 
while($osearchenquiry->getRecordCom()){
	$sheet->setCellValue('E18', $osearchenquiry->shop_total);
	$sheet->setCellValue('E20', $osearchenquiry->office_total);
	$sheet->setCellValue('E21', $osearchenquiry->retail_total + $osearchenquiry->showroom_total);	
}

$sql = "select sum(office) as office_total, sum(shop) as shop_total, sum(retail) as retail_total, sum(showroom) as showroom_total from enquiry_commercial where email_check = 1 and enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);
		 
while($osearchenquiry->getRecordCom()){
	$sheet->setCellValue('F18', $osearchenquiry->shop_total);
	$sheet->setCellValue('F20', $osearchenquiry->office_total);
	$sheet->setCellValue('F21', $osearchenquiry->retail_total + $osearchenquiry->showroom_total);	
}

$sql = "select sum(office) as office_total, sum(shop) as shop_total, sum(retail) as retail_total, sum(showroom) as showroom_total from enquiry_commercial where  mail_shot = 1 and enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);
		 
while($osearchenquiry->getRecordCom()){
	$sheet->setCellValue('G18', $osearchenquiry->shop_total);
	$sheet->setCellValue('G20', $osearchenquiry->office_total);
	$sheet->setCellValue('G21', $osearchenquiry->retail_total + $osearchenquiry->showroom_total);	
}

$sql = "select sum(office) as office_total, sum(shop) as shop_total, sum(retail) as retail_total, sum(showroom) as showroom_total from enquiry_commercial where call_in = 1 and enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);
		 
while($osearchenquiry->getRecordCom()){
	$sheet->setCellValue('H18', $osearchenquiry->shop_total);
	$sheet->setCellValue('H20', $osearchenquiry->office_total);
	$sheet->setCellValue('H21', $osearchenquiry->retail_total + $osearchenquiry->showroom_total);	
}

$sql = "select sum(office) as office_total, sum(shop) as shop_total, sum(retail) as retail_total, sum(showroom) as showroom_total from enquiry_commercial where referral = 1 and enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);
		 
while($osearchenquiry->getRecordCom()){
	$sheet->setCellValue('I18', $osearchenquiry->shop_total);
	$sheet->setCellValue('I20', $osearchenquiry->office_total);
	$sheet->setCellValue('I21', $osearchenquiry->retail_total + $osearchenquiry->showroom_total);	
}


// Sale person assignment Industrial

$sql = "select sum(land) as land_total, sum(warehouse) as warehouse_total, sum(factory) as factory_total from enquiry_industrial e LEFT JOIN enquiry_industrial_user eu ON eu.enquiry_industrial_id = e.enquiry_industrial_id where eu.userID = 6 and e.enquiry_date  between '$dateformReport' and '$datetoReport'";

// echo $sql;
$osearchenquiry->search($sql);

while($osearchenquiry->getRecordInd()){
	$sheet->setCellValue('C28', $osearchenquiry->land_total);
	$sheet->setCellValue('C30', $osearchenquiry->warehouse_total + $osearchenquiry->factory_total);	
}

$sql = "select sum(land) as land_total, sum(warehouse) as warehouse_total, sum(factory) as factory_total 
from enquiry_industrial e LEFT JOIN enquiry_industrial_user eu  ON e.enquiry_industrial_id = eu.enquiry_industrial_id  
where  eu.userID = 7 and e.enquiry_date  between '$dateformReport' and '$datetoReport'";

// echo "<br>".$sql;
$osearchenquiry->search($sql);

while($osearchenquiry->getRecordInd()){
	/*
	echo "<br>".$osearchenquiry->land_total;
	echo "<br>".$osearchenquiry->warehouse_total;
	echo "<br>".$osearchenquiry->factory_total;
	*/
	$sheet->setCellValue('D28', $osearchenquiry->land_total);
	$sheet->setCellValue('D30', $osearchenquiry->warehouse_total + $osearchenquiry->factory_total);	
}

$sql = "select sum(land) as land_total, sum(warehouse) as warehouse_total, sum(factory) as factory_total 
from enquiry_industrial e LEFT JOIN enquiry_industrial_user eu  ON e.enquiry_industrial_id = eu.enquiry_industrial_id  
where  eu.userID = 24 and e.enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);

while($osearchenquiry->getRecordInd()){
	$sheet->setCellValue('F28', $osearchenquiry->land_total);
	$sheet->setCellValue('F30', $osearchenquiry->warehouse_total + $osearchenquiry->factory_total);	
}

$sql = "select sum(land) as land_total, sum(warehouse) as warehouse_total, sum(factory) as factory_total 
from enquiry_industrial e LEFT JOIN enquiry_industrial_user eu  ON e.enquiry_industrial_id = eu.enquiry_industrial_id  
where  eu.userID = 19 and e.enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);

while($osearchenquiry->getRecordInd()){
	$sheet->setCellValue('G28', $osearchenquiry->land_total);
	$sheet->setCellValue('G30', $osearchenquiry->warehouse_total + $osearchenquiry->factory_total);	
}

$sql = "select sum(land) as land_total, sum(warehouse) as warehouse_total, sum(factory) as factory_total 
from enquiry_industrial e LEFT JOIN enquiry_industrial_user eu  ON e.enquiry_industrial_id = eu.enquiry_industrial_id  
where  eu.userID = 18 and e.enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);

while($osearchenquiry->getRecordInd()){
	$sheet->setCellValue('H28', $osearchenquiry->land_total);
	$sheet->setCellValue('H30', $osearchenquiry->warehouse_total + $osearchenquiry->factory_total);	
}

$sql = "select sum(land) as land_total, sum(warehouse) as warehouse_total, sum(factory) as factory_total 
from enquiry_industrial e LEFT JOIN enquiry_industrial_user eu  ON e.enquiry_industrial_id = eu.enquiry_industrial_id  
where  eu.userID = 27 and e.enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);

while($osearchenquiry->getRecordInd()){
	$sheet->setCellValue('J28', $osearchenquiry->land_total);
	$sheet->setCellValue('J30', $osearchenquiry->warehouse_total + $osearchenquiry->factory_total);	
}

$sql = "select sum(land) as land_total, sum(warehouse) as warehouse_total, sum(factory) as factory_total 
from enquiry_industrial e LEFT JOIN enquiry_industrial_user eu  ON e.enquiry_industrial_id = eu.enquiry_industrial_id  
where  eu.userID = 17 and e.enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);

while($osearchenquiry->getRecordInd()){
	$sheet->setCellValue('K28', $osearchenquiry->land_total);
	$sheet->setCellValue('K30', $osearchenquiry->warehouse_total + $osearchenquiry->factory_total);	
}

$sql = "select sum(land) as land_total, sum(warehouse) as warehouse_total, sum(factory) as factory_total 
from enquiry_industrial e LEFT JOIN enquiry_industrial_user eu  ON e.enquiry_industrial_id = eu.enquiry_industrial_id  
where  eu.userID = 33 and e.enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);

while($osearchenquiry->getRecordInd()){
	$sheet->setCellValue('M28', $osearchenquiry->land_total);
	$sheet->setCellValue('M30', $osearchenquiry->warehouse_total + $osearchenquiry->factory_total);	
}

// Sale person assignment Commercial
$sql = "select sum(office) as office_total, sum(shop) as shop_total, sum(retail) as retail_total, sum(showroom) as showroom_total from enquiry_commercial e LEFT JOIN enquiry_commercial_user eu  ON e.enquiry_commercial_id = eu.enquiry_commercial_id  
where  eu.userID = 5 and e.enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);

while($osearchenquiry->getRecordCom()){
	$sheet->setCellValue('E29', $osearchenquiry->shop_total);
	$sheet->setCellValue('E31', $osearchenquiry->office_total);
	$sheet->setCellValue('E32', $osearchenquiry->retail_total + $osearchenquiry->showroom_total);	
}

$sql = "select sum(office) as office_total, sum(shop) as shop_total, sum(retail) as retail_total, sum(showroom) as showroom_total from enquiry_commercial e LEFT JOIN enquiry_commercial_user eu  ON e.enquiry_commercial_id = eu.enquiry_commercial_id  
where  eu.userID = 30 and e.enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);

while($osearchenquiry->getRecordCom()){
	$sheet->setCellValue('I29', $osearchenquiry->shop_total);
	$sheet->setCellValue('I31', $osearchenquiry->office_total);
	$sheet->setCellValue('I32', $osearchenquiry->retail_total + $osearchenquiry->showroom_total);	
}

$sql = "select sum(office) as office_total, sum(shop) as shop_total, sum(retail) as retail_total, sum(showroom) as showroom_total from enquiry_commercial e LEFT JOIN enquiry_commercial_user eu  ON e.enquiry_commercial_id = eu.enquiry_commercial_id  
where  eu.userID = 26 and e.enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);

while($osearchenquiry->getRecordCom()){
	$sheet->setCellValue('L29', $osearchenquiry->shop_total);
	$sheet->setCellValue('L31', $osearchenquiry->office_total);
	$sheet->setCellValue('L32', $osearchenquiry->retail_total + $osearchenquiry->showroom_total);	
}	

$sql = "select sum(office) as office_total, sum(shop) as shop_total, sum(retail) as retail_total, sum(showroom) as showroom_total from enquiry_commercial e LEFT JOIN enquiry_commercial_user eu  ON e.enquiry_commercial_id = eu.enquiry_commercial_id  
where  eu.userID = 31 and e.enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($sql);

while($osearchenquiry->getRecordCom()){
	$sheet->setCellValue('N29', $osearchenquiry->shop_total);
	$sheet->setCellValue('N31', $osearchenquiry->office_total);
	$sheet->setCellValue('N32', $osearchenquiry->retail_total + $osearchenquiry->showroom_total);	
}	
	
// Rename sheet
$sheet->setTitle('Callin-Report');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
// $objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="callin-report.xlsx"');
header('Cache-Control: max-age=0');


$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;


	
