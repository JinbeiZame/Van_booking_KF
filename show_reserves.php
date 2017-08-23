<?
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="images/favicon.ico" REL="SHORTCUT ICON"/> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script language="JavaScript" SRC="javafunction.js"></Script>
<link rel="stylesheet" href="css.css" type="text/css" />
<title>จอง Computer Notebook</title>
<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
	background-image: url(images/SAINT_78_00.gif);
}
.style3 {font-size: 12px}
-->
</style></head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><table width="614" border="0" cellspacing="0" cellpadding="0">
      
      <tr>
        <td width="614" colspan="2" valign="top" bgcolor="#FFFFFF"><table width="613" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="613" background="images/bgtop_main.gif">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" background="images/bgcenter_main.gif"><table width="564" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="564" align="center"><table width="89%" border="0" cellspacing="0" cellpadding="0">
                  
                  <tr>
                    <td height="20" align="center" bgcolor="#F8F8F8"><strong>Van Status</strong></td>
                  </tr>
                  <tr>
                    <td><?
							  $d  = $_GET[d];
							  $m  = $_GET[m];
							  $p  = $_GET[y];
							  $y  = $p;
							  $sd = $d-1;  $ed=$d+1;
							  $sday="$y-$m-$d 08:00:00";
							  $eday="$y-$m-$d 18:30:00";
							  $day="$y-$m-$d";
							 // echo "#$day";
							 include  "config.php";
							 $link = mysql_connect($host,$user,$pass)  or die ("<div align='center' >ติต่อฐานข้อมูลไม่ได้</div>");
							mysql_select_db($dbname,$link) or die ("");
							mysql_query("USE minimart; ");
							mysql_query("SET NAMES 'utf8'; ");
							// $sql = " select  * from  reserve where Status=1 and (sDate between '$sday' and '$eday' or eDate between '$sday' and '$eday')";
							$sql = " select  * from  reserve where Status=1 and ('$day' between sDate and eDate)";
							$result = mysql_query($sql) or die ("คิวรี่ไมไ้ด้");	
							//$num=mysql_query($sqlnum) or die ("Please....");	
							$total = mysql_num_rows($result );
							//echo $sql;
			if($total !=0){
							if($result ){	
								echo "
												<table border='0' cellpadding='1' cellspacing='1' width=100% >
													<tr bgcolor='#CCCffc' >
															<td width=5% align=center>ID</td>
															<td align=center width=15%>Dept.</td>
															<td align=center width=15%>Reservation Name</td>
															<td align=center width=25%>Place</td>
															<td align=center width=25%>Reason</td>
															<td align=center width=10%>Start date</td>
															<td align=center width=10%>Due Date</td>
															<td align=center width=10%>Time</td>
													</tr>	";
								$num=0;
								while($record=mysql_fetch_array($result )){
										$num++;
										$van_reserve_id = $record[van_reserve_id];
										$department 	= $record[department];
										$name 			= $record[name];
										$start_date 	= $record[start_date];
										$end_date 		= $record[end_date];
										$place			= $record[place];
										$reason			= $record[reason];
										
										$y 		= split(" ",$start_date); //แยกวันที่กับเวลา
										$y2		= split(":",$y[1]);
										$ey 	= split(" ",$end_date);
										$ey2	= split(":",$ey[1]);
										
										$d 		= split("-",$y[0]);
										$e 		= split("-",$ey[0]);
										$date   = "$d[2]-$d[1]-$d[0]"; 
										$edate  = "$e[2]-$e[1]-$e[0]";   
										$Time   = "$y2[0]:$y2[1] - $ey2[0]:$ey2[1]";
										
										if($num% 2 == 0){
												$bg='#E9E9cc';
										}
										else{
												$bg='#E9E9cc';
										}
										echo"
												<tr bgcolor='$bg' >
															<td align=center>$van_reserve_id</td>
															<td align=center>$department</td>
															<td>$name</td>
															<td>$place</td>
															<td>$reason</td>
															<td align=center>$date</td>
															<td align=center>$edate</td>
															<td align=center>$Time</td>
													</tr>";				
								}
								echo "</table>";
					}			
					else { 
							echo"<div align=center>do not meet the database anything ";
					}
			}
		else echo"ไม่พบการบันทึกการจองใดๆ";

?></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  
                  <!--
                  <tr>
                    <td height="20" align="center" bgcolor="#F8F8F8"><strong>ตารางการจองอุปกรณ์</strong></td>
                  </tr>
                  <tr>
                    <td><?
							$sql2= " select  * from reserve where Status=1 and (sDate between '$sday' and '$eday' or eDate between '$sday' and '$eday') ";
							$result2 = mysql_query($sql2) or die ("คิวรี่ไมไ้ด้");	
							$total2 = mysql_num_rows($result2);
							// echo $sql2;
			if($total2 !=0){
							if($result2){	
								echo "
												<table border='0' cellpadding='1' cellspacing='1' width=100% >
													<tr bgcolor='#CCCffc' >
															<td width=5% align=center>ลำดับ</td>
															
															<td align=center >หน่วยงาน</td>
															<td align=center width=15%> ผู้จอง</td>
															<td align=center width=15%> วันที่จอง</td>
															<td align=center width=15%>วันที่คืน</td>
															
													</tr>	";
								$num=0;
								while($record=mysql_fetch_array($result2)){
										$num++;
										$EqId = $record[EqId];
										$Group = $record[Group1];
										$Story = $record[Story];
										$sDate = $record[sDate];
										$eDate = $record[eDate];
										$EqSupport = $record[EqSupport];
										$RsName = $record[RsName];
										$TelNum = $record[TelNum];
										
										$y = split(" ",$sDate); //แยกวันที่กับเวลา
										$ey = split(" ",$eDate);
										$e =split("-",$ey[0]);
										$d = split("-",$y[0]);
										$date = "$d[2]-$d[1]-$d[0]";  
										$edate = "$e[2]-$e[1]-$e[0]";  
										$Time="$y[1]-$ey[1]";
										
										if($num% 2 == 0){
												$bg='#E9E9cc';
										}
										else{
												$bg='#E9E9cc';
										}
										echo"
												<tr bgcolor='$bg' >
															<td  align=center>$num</td>
															<td align=center  >$Group</td>
															<td align=center >$RsName</td>
															<td align=center >$date</td>
															<td align=center >$edate</td>
													</tr>";				
								}
								echo "</table>";
					}
					else { 
							echo"<div align=center>do not meet the database anything ";
					}
			}else echo"ไม่พบการบันทึกการจองใดๆ";
?></td>
                  </tr>
                  -->
                  
                </table></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left"><img src="images/SAINT_78_28.gif" width="600" height="29" /></td>
          </tr>
          <tr>
            <td align="center"><span class="style3">Copyright &copy; Knight Frank Chartered
                (Thailand) Co.,Ltd</span></td>
          </tr>
        </table></td>
        </tr>
      
    </table></td>
  </tr>
</table>
</body>
</html>