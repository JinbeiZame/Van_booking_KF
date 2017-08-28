<?php


/** Error reporting */
error_reporting(E_ALL);

date_default_timezone_set('Asia/Bangkok');

/** PHPExcel */
require_once 'phpexcel/PHPExcel.php';

ini_set('max_execution_time', 30000);

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objPHPExcel = $objReader->load("van.xlsx");

$sheet = $objPHPExcel->getActiveSheet();




$num_id = $_GET['number_id'];
$objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database");
$objDB = mysql_select_db("van-requisition");
$strSQL = "SELECT * FROM  van_reserve where van_reserve_id=$num_id";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");

while($objResult = mysql_fetch_array($objQuery))
{

  $dept = $objResult["department"];
  $name = $objResult["name"];
  $position = $objResult["position"];
  $tel =  $objResult["tel"];
  $ext =  $objResult["ext"];
  $email =   $objResult["email"];
  $start_date =   $objResult["start_date"];
  $end_date =   $objResult["end_date"];
  $Start_time =   $objResult["Start_time"];
  $End_time =   $objResult["End_time"];
  $place =   $objResult["place"];
  $reason =   $objResult["reason"];
  $people_total =   $objResult["people_total"];
  $people_name1 =   $objResult["people_name1"];
  $people_position1 =   $objResult["people_position1"];
  $people_company1 =   $objResult["people_company1"];
  $people_name2 =   $objResult["people_name2"];
  $people_position2 =   $objResult["people_position2"];
  $people_company2 =   $objResult["people_company2"];
  $people_name3 =   $objResult["people_name3"];
  $people_position3 =   $objResult["people_position3"];
  $people_company3 =   $objResult["people_company3"];
  $people_name4 =   $objResult["people_name4"];
  $people_position4 =   $objResult["people_position4"];
  $people_company4 =   $objResult["people_company4"];
  $people_name5 =   $objResult["people_name5"];
  $people_position5 =   $objResult["people_position5"];
  $people_company5 =   $objResult["people_company5"];
  $people_name6 =   $objResult["people_name6"];
  $people_position6 =   $objResult["people_position6"];
  $people_company6 =   $objResult["people_company6"];
  $company_driver =   $objResult["company_driver"];
  $driver_id =   $objResult["driver_id"];
  $driver_name =   $objResult["driver_name"];
  $driver_position =   $objResult["driver_position"];
  $driver_licence =   $objResult["driver_licence"];
  $status =   $objResult["status"];
  $create_date =   $objResult["create_date"];
  $update_date =   $objResult["update_date"];

}
$sheet->setCellValue('D3',$name);
$sheet->setCellValue('Z3',$position);
$sheet->setCellValue('D6',$dept);
$sheet->setCellValue('Z5',$tel);
$sheet->setCellValue('M9',$start_date);
$sheet->setCellValue('T9',$Start_time);
$sheet->setCellValue('AC9',$end_date);
$sheet->setCellValue('AK9',$End_time);
$sheet->setCellValue('E12',$place);
$sheet->setCellValue('H19',$reason);
$sheet->setCellValue('G22',$people_total);

$sheet->setCellValue('C26',$people_name1);
$sheet->setCellValue('Q26',$people_position1);
$sheet->setCellValue('AD26',$people_company1);
$sheet->setCellValue('C28',$people_name2);
$sheet->setCellValue('Q28',$people_position2);
$sheet->setCellValue('AD28',$people_company2);
$sheet->setCellValue('C30',$people_name3);
$sheet->setCellValue('Q30',$people_position3);
$sheet->setCellValue('AD30',$people_company3);
$sheet->setCellValue('C32',$people_name4);
$sheet->setCellValue('Q32',$people_position4);
$sheet->setCellValue('AD32',$people_company4);
$sheet->setCellValue('C34',$people_name5);
$sheet->setCellValue('Q34',$people_position5);
$sheet->setCellValue('AD34',$people_company5);
$sheet->setCellValue('C36',$people_name6);
$sheet->setCellValue('Q36',$people_position6);
$sheet->setCellValue('AD36',$people_company6);
$sheet->setCellValue('E40',$driver_name);
$sheet->setCellValue('S39',$driver_position);
$sheet->setCellValue('AH39',$driver_licence);
$sheet->setCellValue('F46',$name);


//$sheet->setCellValue('',);

//$num_id = $_GET['number_id'];
//echo $num_id;
/*
  $sqlnum = "select * from van_reserve where van_reserve_id=$num_id";
  $result = $link->query($sqlnum);
  while($record=mysql_fetch_array($result))
  {
     echo $record[name];
  }
*/

  //$result = mysql_query($sqlnum) or die ("คิวรี่ไม่ได้");

/*
while($record=mysql_fetch_array($result))
{
   echo $record[name];
}
*/

//$id = $_GET[van_reserve_id];


/*
$id = $_GET[$van_reserve_id];
$sheet = $objPHPExcel->getActiveSheet();
$sheet->setCellValue('B6', $osearchenquiry->land_total);
*/
/*
// Set properties
$id = $_GET[$van_reserve_id];
$objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database");
$objDB = mysql_select_db("van-requisition");
$strSQL = "SELECT * FROM van_reserve where	van_reserve_id = $id";

// Call in chart day by day Industrial
//$sql = "select sum(land) as land_total, sum(warehouse) as warehouse_total, sum(factory) as factory_total from enquiry_industrial where  DAYOFWEEK(enquiry_date) = 1 and enquiry_date  between '$dateformReport' and '$datetoReport'";
$osearchenquiry->search($strSQL);

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

*/
// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="callin-report.xlsx"');
header('Cache-Control: max-age=0');


$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
