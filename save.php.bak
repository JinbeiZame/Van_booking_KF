<?
	//ini_set("SMTP","10.0.0.3");
	//ini_set("port","25");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="images/favicon.ico" REL="SHORTCUT ICON"/> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="JavaScript" SRC="javafunction.js"></Script>

<title>จองอุปกรณ์</title>
</head>
<body>
<?

$save			   = $_GET[save];
$department  		 = $_POST[department];
$name			   = $_POST[name];
$position		   = $_POST[position];
$tel	  	 		= $_POST[tel];
$ext	  	 	    = $_POST[ext];
$email	   		  = $_POST[email];

$year	  		   = $_POST[year];
$kwm	   	 		= $_POST[kwm];
$day 	   	 		= $_POST[day];
$eyear	   		  = $_POST[eyear];
$ekwm	  		   = $_POST[ekwm];
$eday 	  		   = $_POST[eday];
$StartTime   		  = $_POST[StartTime];
$EndTime	 		= $_POST[EndTime];


$start_date  		 = $_POST[start_date];
$end_date    	   = $_POST[end_date];

$place  	     	  = $_POST[place];
$reason  	    	 = $_POST[reason];
$people_total  	   = $_POST[people_total];

$people_name1  	   = $_POST[people_name1];
$people_position1   = $_POST[people_position1];
$people_company1    = $_POST[people_company1];
$people_name2  	   = $_POST[people_name2];
$people_position2   = $_POST[people_position2];
$people_company2    = $_POST[people_company2];
$people_name3  	   = $_POST[people_name3];
$people_position3   = $_POST[people_position3];
$people_company3    = $_POST[people_company3];
$people_name4  	   = $_POST[people_name4];
$people_position4   = $_POST[people_position4];
$people_company4    = $_POST[people_company4];
$people_name5  	   = $_POST[people_name5];
$people_position5   = $_POST[people_position5];
$people_company5    = $_POST[people_company5];
$people_name6  	   = $_POST[people_name6];
$people_position6   = $_POST[people_position6];
$people_company6    = $_POST[people_company6];
$people_name7  	   = $_POST[people_name7];
$people_position7   = $_POST[people_position7];
$people_company7    = $_POST[people_company7];
$people_name8  	   = $_POST[people_name8];
$people_position8   = $_POST[people_position8];
$people_company8    = $_POST[people_company8];
$people_name9  	   = $_POST[people_name9];
$people_position9   = $_POST[people_position9];
$people_company9    = $_POST[people_company9];
$people_name10  	  = $_POST[people_name10];
$people_position10  = $_POST[people_position10];
$people_company10   = $_POST[people_company10];


$company_driver     = $_POST[company_driver];
$driver_id  	  	  = $_POST[driver_id];
$driver_name  		= $_POST[driver_name];
$driver_position  	= $_POST[driver_position];
$driver_licence   	 = $_POST[driver_licence];


function mailto($rsId,$noti){
include "config.php";	
require("PHPMailer_v5.0.2/class.phpmailer.php");

$rsDate = "$_POST[day]-$_POST[kwm]-$_POST[year]";
$equipSupport = "$_POST[mat1] $_POST[mat5]";

$rseDate = "$_POST[eday]-$_POST[ekwm]-$_POST[eyear]";

//$notiMail

$mail = new PHPMailer();
$mail->CharSet = "utf-8";	
$mail->From = "reservation@th.knightfrank.com";
$mail->FromName = "Van Reservation System";
$mail->SMTPSecure = 'tls';
$mail->Host = "mail.knightfrankthailand.com";

$mail->Mailer = "smtp";
$mail->AddAddress("it@th.knightfrank.com","it@th.knightfrank.com");

	
$mail->Subject = "Online Notification from Van Reservation"; //ชื่อหัวข้อจดหมาย 
$mail->Body = "<html>
		<head>
		<title>Online Notification from Van Reservation</title>
		</head>
		<body>
			<div style='font-family: Tahoma, Vernada, Arial; font-size:10pt;'>
				<p><strong>มีผู้จองรถเข้ามาในระบบ</strong></p>
				<table style='font-family: Tahoma, Vernada, Arial; font-size:10pt;'>
				
				<tr>
				<td><strong>วันที่จอง:</strong></td><td> $rsDate</td>
				</tr>
				
				<tr>
				<td><strong>ถึง:</strong></td><td> $rseDate</td>
				</tr>
				
				<tr>
				<td><strong>เวลา:</strong></td><td> $_POST[StartTime] - $_POST[EndTime]</td>		
				</tr>								
				
				<tr>
				<td><strong>กลุ่มงาน/หน่วยงาน:</strong></td><td> $_POST[department]</td>
				</tr>
				
				<tr>
				<td><strong>จองโดย:</strong></td><td> $_POST[name]</td>
				</tr>
				
				<tr>
				<td><strong>เบอร์ต่อภายใน:</strong></td><td>$_POST[ext]</td>
				</tr>	
				
				<tr>
				<td><strong>สถานที่ไป:</strong></td><td> $_POST[place]</td>
				</tr>
				
				<tr>
				<td><strong>วัตถุประสงค์ในการขอใช้รถ:</strong></td><td> $_POST[reason]</td>
				</tr>				
				
				</table>
				<p><a href='http://10.0.0.251/van-requisition/index.php?page=admin'>ตรวจสอบผู้จอง</a> | <a href='http://10.0.0.251/van-requisition/index.php?page=chk_eq'>ตรวจสอบตารางการจอง</a></p>
			</div>
		</body>
		</html>"; 
		
	
	$mail->IsHTML(true); //กำหนดให้เป็น false ถ้าข้อความที่ต้องการส่งเป็นข้อความธรรมดา $mail->IsHTML(false); 
	//กำหนดให้เป็น true ถ้าข้อความที่ต้องการส่งเป็นเว็บเพจ $mail->IsHTML(true);
	$mail->SMTPAuth = "true"; 
	$mail->Username = "ot@th.knightfrank.com"; 
	$mail->Password = "wvmu123";
	
	
	/*
	if(!$mail->Send()) 
	{ //กรณีส่งเมล์ไม่สำเร็จ 
	echo "There was an error sending the message"; 
	} 
	else 
	{ //กรณีส่งเมล์ได้สำเร็จ 
	echo "Message send successfully."; 
	}
	*/
   
}
		
function mailtoAdmin(){
	
	require("PHPMailer_v5.0.2/class.phpmailer.php");
	
	$mail = new PHPMailer(); // การเรียกใช้งานไฟล์พื้นฐานในการส่งอีเมล์ 
	$mail->From = "reservation@th.knightfrank.com"; //อีเมล์แอดเดรสของผู้ส่ง (Sender address) 
	$mail->FromName = "Van Reservation System"; //ชื่อผู้ส่ง (Sender Name) 
	$mail->SMTPSecure = 'tls';
	$mail->Host = "mail.knightfrankthailand.com"; //ชื่อของเครื่องเซิร์ฟเวอร์ที่ให้บริการส่งอีเมล์ (SMTP mail server) ให้ระบุเป็น "localhost" 
	$mail->Mailer = "smtp"; //ชื่อวิธีการส่ง ให้ระบุเป็น "smtp" 
	$mail->AddAddress("it@th.knightfrank.com","it@th.knightfrank.com"); //ฟังก์ชัน AddAddress(อีเมล์แอดเดรสของผู้รับ, ชื่อผู้รับ) 
	$mail->Subject = "Online Notification from Van Reservation"; //ชื่อหัวข้อจดหมาย 
	$mail->Body = "<html>
			<head>
			<title>Online Notification from Notebook Reservation</title>
			</head>
			<body>
			<p><strong>Please check the status Equipment researvation system</strong></p>
			</body>
			</html>"; //ข้อความที่ต้องการส่งไปยังผู้รับ
	
	$mail->IsHTML(true); //กำหนดให้เป็น false ถ้าข้อความที่ต้องการส่งเป็นข้อความธรรมดา $mail->IsHTML(false); 
	//กำหนดให้เป็น true ถ้าข้อความที่ต้องการส่งเป็นเว็บเพจ $mail->IsHTML(true);

	$mail->SMTPAuth = "true"; 
	$mail->Username = "ot@th.knightfrank.com"; 
	$mail->Password = "wvmu123";

	// คำสั่งในการส่งเมล์ 
	/*
	if(!$mail->Send()) 
	{ //กรณีส่งเมล์ไม่สำเร็จ 
	echo "There was an error sending the message"; 
	} 
	else 
	{ //กรณีส่งเมล์ได้สำเร็จ 
	echo "Message send successfully."; 
	}
	*/
   
}

function mailtoBack($emailBack,$resID,$type,$status,$rejects){	

	include "config.php";
	
		$link = mysql_connect($host,$user,$pass)  or die ("<div align='center' > ไม่สามมารถติดต่อฐานข้อมูลได้ </div>");
		mysql_select_db($dbname,$link) or die ("");
		mysql_query("USE minimart;");
		mysql_query("SET NAMES 'utf8';");
	
	if($type == "van"){
										
		$sql = "select * from van_reserve where van_reserve_id = '$resID' ";	
		$result = mysql_query($sql);
		while($record = mysql_fetch_array($result)){
			
			$van_reserve_id  	= $record[van_reserve_id];
			$department  		= $record[department];
			$name			  = $record[name];
			$position		  = $record[position];
			$tel	  	 	   = $record[tel];
			$ext	  	 	   = $record[ext];
			$email	   		 = $record[email];
			
			$start_date  		= $record[start_date];
			$end_date    	  = $record[end_date];
			
			$place  	     	 = $record[place];
			$reason  	    	= $record[reason];
			$people_total  	  = $record[people_total];
			
			$people_name1  	   = $record[people_name1];
			$people_position1   = $record[people_position1];
			$people_company1    = $record[people_company1];
			$people_name2  	   = $record[people_name2];
			$people_position2   = $record[people_position2];
			$people_company2    = $record[people_company2];
			$people_name3  	   = $record[people_name3];
			$people_position3   = $record[people_position3];
			$people_company3    = $record[people_company3];
			$people_name4  	   = $record[people_name4];
			$people_position4   = $record[people_position4];
			$people_company4    = $record[people_company4];
			$people_name5  	   = $record[people_name5];
			$people_position5   = $record[people_position5];
			$people_company5    = $record[people_company5];
			$people_name6  	   = $record[people_name6];
			$people_position6   = $record[people_position6];
			$people_company6    = $record[people_company6];
			$people_name7  	   = $record[people_name7];
			$people_position7   = $record[people_position7];
			$people_company7    = $record[people_company7];
			$people_name8  	   = $record[people_name8];
			$people_position8   = $record[people_position8];
			$people_company8    = $record[people_company8];
			$people_name9  	   = $record[people_name9];
			$people_position9   = $record[people_position9];
			$people_company9    = $record[people_company9];
			$people_name10  	  = $record[people_name10];
			$people_position10  = $record[people_position10];
			$people_company10   = $record[people_company10];
			
			
			$company_driver     = $record[company_driver];
			$driver_id  	  	  = $record[driver_id];
			$driver_name  		= $record[driver_name];
			$driver_position  	= $record[driver_position];
			$driver_licence   	 = $record[driver_licence];

			$y = split(" ",$start_date); //แยกวันที่กับเวลา
			$ey = split(" ",$end_date);
			$d = split("-",$y[0]);
			$ed = split("-",$y[0]);
			$date = "$d[2]-$d[1]-$d[0]";  
			$edate = "$ed[2]-$ed[1]-$ed[0]";  
			
			$Time="$y[1]-$ey[1]";
		}
	
	if($status == "reject"){
		$titleDisplay = "<span style='color:red;'>Notebook ที่ท่านจองไว้ไม่ได้รับการอนุมัติ<br>";
		$titleDisplay.= "เนื่องจากช่วงเวลา $rejects ที่ท่านจองไม่มีอุปกรณ์ว่าง</span>";
		$msgDisplay = "<p><a href='http://10.0.0.251/van-requisition/index.php?page=resv_room'>คลิกที่นี่เพื่อเข้าสู่ระบบจองอุปกรณ์</a></p>";
	} else if($status == "approve"){
		$titleDisplay = "อุปกรณ์ที่ท่านจองไว้ได้รับการอนุมัติเรียบร้อยแล้ว";
	}
		
	$dateSplit = explode(" ",$start);
	$datevan_reserve = $dateSplit[0];
	$sTime = $dateSplit[1];
	
	$dateFormat = explode("-",$datevan_reserve);
	$dateShow = $dateFormat[2]."-".$dateFormat[1]."-".$dateFormat[0];
	
	$endSplit = explode(" ",$end);
	$eTime = $endSplit[1];
	
	} else if($type == "eq"){
		
		$sql = "select * from eq where EqId = '$resID' ";	
		$result = mysql_query($sql);
		while($record = mysql_fetch_array($result)){
			$equip = $record[Location]; 
			$start = $record[sDate];
			$end = $record[eDate];
			$group = $record[Group1];
			$rsName = $record[RsName];
			$location = $record[EqSupport];
		}	
		
	$dateSplit = explode(" ",$start);
	$datevan_reserve = $dateSplit[0];
	$sTime = $dateSplit[1];
	
	$dateFormat = explode("-",$datevan_reserve);
	$dateShow = $dateFormat[2]."-".$dateFormat[1]."-".$dateFormat[0];
	
	$endSplit = explode(" ",$end);
	$datevan_reserveEnd = $endSplit[0];
	$eTime = $endSplit[1];
	
	$dateFormatEnd = explode("-",$datevan_reserveEnd);
	$dateShowEnd = "ถึง ".$dateFormatEnd[2]."-".$dateFormatEnd[1]."-".$dateFormatEnd[0];
	}
	require("PHPMailer_v5.0.2/class.phpmailer.php");
	
	$mail = new PHPMailer(); // การเรียกใช้งานไฟล์พื้นฐานในการส่งอีเมล์ 
	$mail->CharSet = "utf-8";
	$mail->From = "reservation@th.knightfrank.com"; //อีเมล์แอดเดรสของผู้ส่ง (Sender address) 
	$mail->FromName = "Notebook Reservation System"; //ชื่อผู้ส่ง (Sender Name) 
	$mail->SMTPSecure = 'tls';
	$mail->Host = "mail.knightfrankthailand.com"; //ชื่อของเครื่องเซิร์ฟเวอร์ที่ให้บริการส่งอีเมล์ (SMTP mail server) ให้ระบุเป็น "localhost" 
	$mail->Mailer = "smtp"; //ชื่อวิธีการส่ง ให้ระบุเป็น "smtp" 
	$mail->AddAddress($emailBack,"$emailBack"); //ฟังก์ชัน AddAddress(อีเมล์แอดเดรสของผู้รับ, ชื่อผู้รับ) 
	$mail->Subject = "Online Notification from Notebook Reservation"; //ชื่อหัวข้อจดหมาย 
	$mail->Body = "<html>
			<head>
			<title>Online Notification from Notebook Reservation</title>
			</head>
			<body>
				<div style='font-family: Tahoma, Vernada, Arial; font-size:10pt;'>
					<p><strong>$titleDisplay</strong></p>
					
					<table style='font-family: Tahoma, Vernada, Arial; font-size:10pt;'>
					
					<tr>
					<td><strong>อุปกรณ์:</strong></td><td> $Room</td>
					</tr>
					
					<tr>
					<td><strong>วันที่จอง:</strong></td><td> $date</td>
					</tr>
					
					<tr>
					<td><strong>วันที่คืน:</strong></td><td> $edate</td>
					</tr>
					
					<tr>
					<td><strong>เวลา:</strong></td><td> $Time</td>		
					</tr>								
					
					<tr>
					<td><strong>กลุ่มงาน/หน่วยงาน:</strong></td><td> $Group1</td>
					</tr>
					
					<tr>
					<td><strong>จองโดย:</strong></td><td> $RsName</td>
					</tr>
					
					</table>
					
					$msgDisplay	
				</div>
			</body>
			</html>"; //ข้อความที่ต้องการส่งไปยังผู้รับ
	
	$mail->IsHTML(true); //กำหนดให้เป็น false ถ้าข้อความที่ต้องการส่งเป็นข้อความธรรมดา $mail->IsHTML(false); 
	//กำหนดให้เป็น true ถ้าข้อความที่ต้องการส่งเป็นเว็บเพจ $mail->IsHTML(true);
	
	$mail->SMTPAuth = "true"; 
	$mail->Username = "ot@th.knightfrank.com"; 
	$mail->Password = "wvmu123";

	// คำสั่งในการส่งเมล์ 
	if(!$mail->Send()) 
	{ //กรณีส่งเมล์ไม่สำเร็จ 
	echo "There was an error sending the message"; 
	} 
	else 
	{ //กรณีส่งเมล์ได้สำเร็จ 
	echo "Message send successfully."; 
	}
}
				
$sDate	 = "$year-$kwm-$day  $StartTime";//////////////เวลาของ eq
$eDate	 = "$eyear-$ekwm-$eday  $EndTime";

$stDate	= "$year-$kwm-$day $StartTime";/////////////เวลาของ  van_reserve
$enDate   	= "$eyear-$ekwm-$eday  $EndTime";
$EqSupport = "$mat1 $mat2 $mat3 $mat4 $mat5 $mat6 $mat7";

include "config.php";

	$link = mysql_connect($host,$user,$pass)  or die ("<div align='center' > ไม่สามมารถติดต่อฐานข้อมูลได้ </div>");
	mysql_select_db($dbname,$link) or die ("ชื่อฐานข้อมูลผิด");
	if($link){
				mysql_query("USE minimart; ");
				mysql_query("SET NAMES 'utf8'; ");
				
				if($save==1){
						$sql = "update van_reserve set status = '1' where van_reserve_id = '$id' " or die("ไม่พบฐานข้อมูล");
						$result = mysql_query($sql) or die ("คิวรี่ไม่ได้");						
						$url="index.php?page=admin";
						$echo = "<br>อนุมัติการจองเรียบร้อยแล้วครับ...";
						$rsType = "van";
						$rsvStatus = "approve";
						mailtoBack($_GET[email],$_GET[id],$rsType,$rsvStatus,$timeReject);
				}
				else if($save==2){
						$sql = "update eq set Status = '1' where EqId='$id' " or die("ไม่พบฐานข้อมูล");
						$result = mysql_query($sql) or die ("คิวรี่ไม่ได้");						
						$url="index.php?page=admin";
						$echo = "<br>อนุมัติการจองเรียบร้อยแล้วครับ...";
						$rsType = "eq";
						$rsvStatus = "approve";
						mailtoBack($_GET[email],$_GET[id],$rsType,$rsvStatus,$timeReject);						
				}
				else if($Eq){
						$sql = "insert into eq values('','$Group','$sDate','$eDate','$Location','$EqSupport','$RsName','$TelNum','$Status','$notiMail')" or die("ไม่พบฐานข้อมูล");
						$result = mysql_query($sql) or die ("คิวรี่ไม่ได้");						
						$url="index.php";
						$echo = "<br><font color=#FF0000 size=2>การจองสำเร็จ ทางส่วนงานธุรการและงานบุคคล จะตรวจสอบและอนุมัติการจองของท่านภายในไม่ช้า <br>
													กรุณาตรวจสอบผลการจอง จากตารางการจองได้ในภายหลัง </font>";
						mailtoAdmin();
				}
				else if($remove==1){
							$sqlTime = "select * from van_reserve where RsId ='$id'";
							$resultTime = mysql_query($sqlTime) or die ("คิวรี่ไม่ได้");
							while($timeQuery = mysql_fetch_array($resultTime)){
								$timeStart = $timeQuery[sDate];
								$timeEnd = $timeQuery[eDate];
							}							
								$splitTime = explode(" ",$timeStart);
								$rsvDate = $splitTime[0];
								$sTimes = $splitTime[1];
								
								$dateFormats = explode("-",$rsvDate);
								$dateShows = $dateFormats[2]."-".$dateFormats[1]."-".$dateFormats[0];
								
								$endSplits = explode(" ",$timeEnd);
								$eTimes = $endSplits[1];	
								
								$timeReject = $dateShows." ".$sTimes." - ".$eTimes;						
							
							$sql = "delete from van_reserve where van_reserve_id = '$id'" or die("ไม่พบฐานข้อมูล");
							$result = mysql_query($sql) or die ("คิวรี่ไม่ได้");							
							$url="index.php?page=admin";
							$echo = "<br>ลบข้อมูลเรียบร้อยแล้ว...";
							$rsType = "rooms";
							$rsvStatus = "reject";
							mailtoBack($_GET[email],$_GET[id],$rsType,$rsvStatus,$timeReject);
				}
				else if($remove==2){
						$sql = "delete from eq  where EqId = '$id'" or die("ไม่พบฐานข้อมูล");
						$result = mysql_query($sql) or die ("คิวรี่ไม่ได้");						
							$url="index.php?page=admin";
							$echo = "<br>ลบข้อมูลเรียบร้อยแล้ว...";
				}
				else if($remove==3){
							$sql = "delete from van_reserve where RsId='$id'" or die("ไม่พบฐานข้อมูล");
							$result = mysql_query($sql) or die ("คิวรี่ไม่ได้");							
							$url="index.php?page=result_resv";
							$echo = "<br>ลบข้อมูลเรียบร้อยแล้ว...";
				}
				else if($remove==4){
							$sql = "delete from eq  where EqId='$id'" or die("ไม่พบฐานข้อมูล");
							$url="index.php?page=result_resv";
							$echo = "<br>ลบข้อมูลเรียบร้อยแล้ว...";
				}
				else if($remove==31){
							$sql = "delete from van_reserve  where RsId='$id'" or die("ไม่พบฐานข้อมูล");
							$result = mysql_query($sql) or die ("คิวรี่ไม่ได้");
							$url="Chk_van_reserves.php?Showall=Showall";
							$echo = "<br>ลบข้อมูลเรียบร้อยแล้ว...";
				}
				else if($remove==41){
							$sql = "delete from eq  where EqId='$id'" or die("ไม่พบฐานข้อมูล");
							$result = mysql_query($sql) or die ("คิวรี่ไม่ได้");
							$url="index.php?page=chk_eq&Showall=Showall";
							$echo = "<br>ลบข้อมูลเรียบร้อยแล้ว...";
				}
				else if(isset($Res_up)){//update  van_reserves room 	พนักงาน edit
						$sql = "update van_reserve set
							department='$department',
							name='$name',
							position='$position',
							tel='$tel',
							ext='$ext',
							email='$email',
							start_date='$start_date',
							end_date='$end_date',
							place='$place',
							reason='$reason',
							
							people_total='$people_total',
							people_name1='$people_name1',
							people_position1='$people_position1',
							people_company1='$people_company1',
							people_name2='$people_name2',
							people_position2='$people_position2',
							people_company2='$people_company2',
							people_name3='$people_name3',
							people_position3='$people_position3',
							people_company3='$people_company3',
							people_name4='$people_name4',
							people_position4='$people_position4',
							people_company4='$people_company4',
							people_name5='$people_name5',
							people_position5='$people_position5',
							people_company5='$people_company5',
							people_name6='$people_name6',
							people_position6='$people_position6',
							people_company6='$people_company6',
							people_name7='$people_name7',
							people_position7='$people_position7',
							people_company7='$people_company7',
							people_name8='$people_name8',
							people_position8='$people_position8',
							people_company8='$people_company8',
							people_name9='$people_name9',
							people_position9='$people_position9',
							people_company9='$people_company9',
							people_name10='$people_name10',
							people_position10='$people_position10',
							people_company10='$people_company10',
							
							
							company_driver='$company_driver',
							driver_id='$driver_id',
							driver_name='$driver_name',
							driver_position='$driver_position',
							driver_licence='$driver_licence',
							status='$status',
							update_date='NOW()'
						where van_reserve_id='$van_reserve_id' " 
						or die("ไม่พบฐานข้อมูล");
						$result = mysql_query($sql) or die ("คิวรี่ไม่ได้");						
						$url="index.php?page=result_resv";
						$echo = "<br>Update เรียบร้อยแล้ว...";
						mailto();
				}
				else if(isset($Eq_up)){//update  van_reserves room 	พนักงาน edit
						$sql = "update eq set  Group1='$Group',sDate='$sDate',eDate='$eDate',Location='$Location',EqSupport='$EqSupport',RsName='$RsName',TelNum='$TelNum',Status='' where EqId='$EqId' "; 
						$result = mysql_query($sql) or die ("คิวรี่ไม่ได้");						
						$url="index.php?page=result_resv";
						$echo = "<br>Update เรียบร้อยแล้ว...";
				}
				else{
					
				/*
				$sql = "insert into van_reserve (van_reserve_id, department, name, position, tel, ext, email, start_date, end_date, place, reason, people_total, people_name1, people_position1, people_company1, people_name2, people_position2, people_company2, people_name3, people_position3, people_company3, people_name4
, people_position4, people_company4, people_name5, people_position5, people_company5, people_name6, people_position6, people_company6, people_name7, people_position7, people_company7, people_name8, people_position8, people_company8, people_name9, people_position9, people_company9, people_name10
, people_position10, people_company10, company_driver, driver_id, driver_name, driver_position, driver_licence, status, create_date, update_date) values('','$department','$name','$position','$tel','$ext','$email','$start_date','$end_date','$place','$reason','$people_total','$people_name1','$people_position1','$people_company1','$people_name2','$people_position2','$people_company2','$people_name3','$people_position3','$people_company3','$people_name4','$people_position4','$people_company4','$people_name5','$people_position5','$people_company5','$people_name6','$people_position6','$people_company6','$people_name7','$people_position7','$people_company7','$people_name8','$people_position8','$people_company8','$people_name9','$people_position9','$people_company9','$people_name10','$people_position10','$people_company10','$company_driver','$driver_id','$driver_name','$driver_position','$driver_licence',
'$status',NOW(),NOW())" or die("ไม่พบฐานข้อมูล");
				*/
				
				
				$sql = "insert into van_reserve (van_reserve_id, department, name, position, tel, ext, email, start_date, end_date, place, reason, people_total, people_name1, people_position1, people_company1, people_name2, people_position2, people_company2, people_name3, people_position3, people_company3, people_name4
, people_position4, people_company4, people_name5, people_position5, people_company5, people_name6, people_position6, people_company6, people_name7, people_position7, people_company7, people_name8, people_position8, people_company8, people_name9, people_position9, people_company9, people_name10
, people_position10, people_company10, company_driver, driver_id, driver_name, driver_position, driver_licence, status, create_date, update_date) values('','$department','$name','$position','$tel','$ext','$email','$start_date','$end_date','$place','$reason','$people_total','$people_name1','$people_position1','$people_company1','$people_name2','$people_position2','$people_company2','$people_name3','$people_position3','$people_company3','$people_name4','$people_position4','$people_company4','$people_name5','$people_position5','$people_company5','$people_name6','$people_position6','$people_company6','$people_name7','$people_position7','$people_company7','$people_name8','$people_position8','$people_company8','$people_name9','$people_position9','$people_company9','$people_name10','$people_position10','$people_company10','$company_driver','$driver_id','$driver_name','$driver_position','$driver_licence',
'$status',NOW(),NOW())" or die("ไม่พบฐานข้อมูล");
				
				
				echo $sql; 
				
				$result = mysql_query($sql) or die ("คิวรี่ไม่ได้");
				$sqlMax = "select max(van_reserve_id) from van_reserve where email = '$email'";
				$query = mysql_query($sqlMax) or die ("คิวรี่ไม่ได้");
				$record = mysql_fetch_array($query);
					$maxId = $record[0];

				$url="index.php";
				$echo = "<br><font color=#FF0000 size=2>ทำการจองสำเร็จ หากต้องการยกเลิกใช้รถกรุณาติดต่อส่วนงาน Operator</font>";
				mailto($maxId,$notiMail);

				}
		}
		echo "<br>".$sql;


		if($result){
			echo "<br><br><br><center><br>$echo";
			echo"<META HTTP-EQUIV='REFRESH' CONTENT='3; URL=$url'>";
		}


?>
</body>
</html>