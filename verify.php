<?php 
ob_start(); 
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<?php

include "config.php";

$timeoutseconds = 300; 
$timestamp=time();
$timeout=$timestamp-$timeoutseconds;
mysql_db_query($dbname, "DELETE FROM useronline WHERE timestamp<$timeout");

$checkIP = $REMOTE_ADDR;
$checking = explode(".",$checkIP);
if($checking[0] != 10 or $checking[1] != 0 or $checking[2] != 0) { //Block user log in from external IP.
	
	echo "<p align=center><br><br><font color=red>ระบบนี้ใช้ภายในบริษัทเท่านั้น<br/><br/><img src='images/89.gif'/></p>";
	echo"<META HTTP-EQUIV='REFRESH' CONTENT='5; URL=index.html'>";		

} else {

$username = $_POST[username];
$password = $_POST[password];

$distinct = mysql_db_query($dbname, "SELECT DISTINCT useronline FROM useronline WHERE useronline='$username'"); //Don't log in distinct users.
while ($match = mysql_fetch_array($distinct)) {
	
	$userNow = $match[useronline];
	$no = count($userNow);
	//echo "Now: ".$userNow." username: ".$username." ".$no;
	//exit();
	
	if($no == 1) {
	
		echo "<p align=center><br><br><font color=red>ไม่สามารถเข้าสู่ระบบได้เนื่องจากมีผู้ใช้ระบบชื่อนี้ใช้งานอยู่ในระบบขณะนี้<br/><br/><img src='images/89.gif'/></p>";
		echo"<META HTTP-EQUIV='REFRESH' CONTENT='5; URL=index.html'>";	
		exit();	
		
	}
}


//	echo $username."<br/>".$password."<br/>";

$sql = "select * from user where username = '$username' and password = '$password' ";
$check = mysql_db_query($dbname,$sql);
$verify = mysql_num_rows($check);


while($show = mysql_fetch_array($check)) {
	$username_land = $show[username];
	$password = $show[password];
	$level_land = $show[level];
	
}

	if ($verify == 1) {
		//Set session Variable
		session_register("sess_id_land");
		session_register("username_land");
		session_register("level_land");
		$sess_id_land = session_id();
		
		//$time = date("Y-m-j h:i:s"); 
		//$sqlLog = "insert into log (log_user,log_time,log_action) values ('$username_land','$time','เข้าสู่ระบบ')";
		//mysql_db_query($dbname,$sqlLog);
		
		include ("function.php");
		$actionLog = "เข้าสู่ระบบ";
		$ip = $REMOTE_ADDR;		
		saveLog($username_land,$ip,$actionLog);
		
		//echo "Time & Date : ".$time;
		
		header ("location: index.php");	
	}
	else {
		
		//echo "username : ".$username." Password : ".$password." Level : ".$level ;
		
		echo "<p align=center><br><br><font color=red>รหัสผ่านหรือชื่อของท่านไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง<br/><br/><img src='images/89.gif'/></p>";
		echo"<META HTTP-EQUIV='REFRESH' CONTENT='5; URL=index.html'>";
	}
}
?>
</body>
</html>