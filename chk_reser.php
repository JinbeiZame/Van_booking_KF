<?
header("Content-Type:  text/plain; charset=utf-8");
$d=$_GET[d];
$Rs=split("/",$d);
$sDate=$Rs[0];
$eDate=$Rs[1];
$Room =$Rs[2];
//$s=split("-",$sDate);//
//แยกเวลาออกจากวัน
$stime=split(" ",$sDate);
$etime=split(" ",$eDate);

$sd=split("-",$st[0]);//แยกวันที(y m d)วันแรกเพื่อนหาจุดสิ่นสุดand sDate < '$End' 
$ed=split("-",$s[0]);
$sd0= $sd[2]-1;
$sd4= $sd[2]+1;
//แยกเวลา
$EndTime=substr($etime[1],3,5);
if($EndTime==00){
	$Time=$etime[1]-0.41;
}else{
	$Time=$etime[1]-0.01;
}
$StartTime=$stime[1]+0.01;
$EndDate="$etime[0] $Time";
$StartDate="$stime[0]  $StartTime";
//echo  $sd0;
$Start = "$sd[0]-$sd[1]-$sd0  $st[1]";//วันที่ sdate -1
$End = "$sd[0]-$sd[1]-$sd4";
include "config.php";
$link = mysql_connect($host,$user,$pass)  or die ("<div align='center' > ไม่สามารถติดต่อฐานข้อมูลได้ </div>");
	mysql_select_db($dbname,$link) or die ("ชื่อฐานข้อมูลผิด");
	if($link){
				mysql_query("USE minimart; ");
				mysql_query("SET NAMES 'utf8'; ");
				// $sql = " select  * from  reserve  where Room='$Room'  and  ((eDate between '$sDate' and '$eDate') or (sDate between '$sDate' and '$eDate'))";
				
				$sql = " select  * from  reserve where Room='$Room'  and  (( '$sDate' between sDate and eDate) or ('$eDate' between sDate and eDate))";
				// echo $sql;
				$result = mysql_query($sql) or die ("คิวรี่ไม่ได้");
				$total = mysql_num_rows($result );
				if($total !=0){
					echo "<font color='red'><span style='background-color: #FFFF00;'><strong>** Unavailable</strong><span></font>";
				} else  echo " <font color='blue'>** Available</font>";
	}
?>