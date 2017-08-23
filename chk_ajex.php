<?
header("Content-Type:  text/plain; charset=utf-8");
$d=$_GET[d];
$Rs=split("/",$d);
$sDate=$Rs[0];
$eDate=$Rs[1];

$st=split(" ",$sDate);
$et=split(" ",$eDate);

$sd=split("-",$st[0]);
$ed=split("-",$s[0]);
$sd0= $sd[2]-1;
$sd4= $sd[2]+1;

$Start = "$sd[0]-$sd[1]-$sd0  $st[1]";
$End = "$sd[0]-$sd[1]-$sd4";

//áÂ¡àÇÅÒ
$EndTime=substr($et[1],3,5);
if($EndTime==00){
	$Time=$et[1]-0.41;
}else{
	$Time=$et[1]-0.01;
}
$StartTime=$st[1]+0.01;
$EndDate="$et[0] $Time";
$StartDate="$st[0]  $StartTime";

$host = 'localhost';
$dbname = 'room';
$user = 'root';
$pass = 'wvmu123';
$link = mysql_connect($host,$user,$pass)  or die ("<div align='center' >Cannot Connect Database.</div>");
mysql_select_db($dbname,$link) or die ("Die connect.");
mysql_query("USE minimart; ");
mysql_query("SET NAMES 'utf8'; ");		

		$sql="select  EqSupport from  reserve  where  (eDate between '$StartDate' and '$eDate') or (sDate between '$sDate' and '$EndDate')";
				//$sql = " select  EqSupport from  reserve  where   (eDate between '$StartDate' and '$eDate') or (sDate between '$sDate' and '$EndDate')";
		//$sql2 = " select  Location from  eq  where    (eDate between '$sDate' and '$eDate') or (sDate between '$sDate' and '$eDate')";
				//$sql2 = " select  EqSupport from  eq  where    (eDate between '$StartDate' and '$eDate') or (sDate between '$sDate' and '$EndDate')";
			//echo $sql."<br>".$sql2;
				$result = mysql_query($sql) or die ("Cannot Query Database.");
				//$result2= mysql_query($sql2) or die ("Cannot Query Database.");
				
				$total = mysql_num_rows($result );
				//$total2 = mysql_num_rows($result2);
				
				$record=mysql_fetch_array($result );
				//$record2=mysql_fetch_array($result2);
				
				$EqSupport = $record[EqSupport];
				//$EqSupport2 = $record2[Location];	
				
				$mat=split(" ",$EqSupport);
				//$mat2=split(" ",$EqSupport2);
				
				$reser= "$mat[0] $mat[1] $mat[2] $mat[3] $mat[4] $mat[5] $mat[6]";
				//$reser2= "$mat2[0] $mat2[1] $mat2[2] $mat2[3] $mat2[4] $mat2[5] $mat2[6]";
					if(($total)!= 0) // or $total2 
							echo "<font color ='#FF0000'><span style='background-color: #FFFF00'><strong>อุปกรณ์ต่อไปนี้มีการจองแล้ว</strong></span></font> <font color ='#ff0000'>**$reser  $reser2</font>" ;
					else
							echo "<font color ='blue'>ท่านสามารถจองอุปกรณ์ได้ **$reser  $reser2</font>" ;
?>