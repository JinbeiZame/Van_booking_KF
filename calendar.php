<script language="JavaScript" SRC="javafunction.js"></Script>
<table width="95%" border="0" cellpadding="0" cellspacing="0" align="center">
          <tr>
            <td align="center" bgcolor="#d0103a" height="30px" style="color:#ffffff;"><strong>Calendar</strong></td>
          </tr>
          <tr>
            <td align="center"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td align="center"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                  
                  <tr>
                    <td align="center"><?php
											/* $diffHour และ $diffMinute คือตัวแปรที่ใช้เก็บจำนวนชั่วโมงและจำนวนนาทีที่
											แตกต่างกันระหว่างเครื่องไคลเอนต์กับเครื่องเซิร์ฟเวอร์ ตามลำดับ เช่นถ้าเวลาของ
											เครื่องไคลเอ็นต์เร็วกว่าเวลาของเครื่องเซิร์ฟเวอร์ 11 ชั่วโมง 15 นาที ก็ให้กำหนด 
											$diffHour เป็น 11 และกำหนด $diffMinute เป็น 15 ในที่นี้ผู้เขียนถือว่า
											เครื่องเซิร์ฟเวอร์กับเครื่องไคลเอ็นต์มีเวลาตรงกัน */
$diffHour = 0;
$diffMinute = 0;
//////
$setday = "setday";
$norm ="norm";
/////
if ($dfMonth == "") {
						/* ถ้าไม่มีการระบุให้แสดงปฏิทินของเดือนใดเดือนหนึ่ง เราจะแสดงปฏิทินของเดือน
						ปัจจุบันตามเวลาในเครื่องไคลเอ็นต์ โดยใช้ฟังก์ชั่น getdate() สร้างวันที่/เวลา
						ปัจจุบันของเครื่องไคลเอ็นต์เก็บไว้ในตัวแปร $calTime ซึ่งฟังก์ชั่นนี้จะคืนค่ากลับมา
						เป็นอาร์เรย์ */
	$calTime = getdate(date(mktime(date("H") + $diffHour, 
	date("i") + $diffMinute)));
	$today = $calTime["mday"]; //วันที่
	$month = $calTime["mon"]; //เดือน
	$year = $calTime["year"]; //ปี
}
else {
	/* กรณีที่ระบุให้แสดงปฏิทินของเดือน/ปีหนึ่งๆนั้น จะมีการส่งตัวแปร $today, 
	$dfMonth และ $dfYear ผ่านมาทาง query string ด้วย */
	if ($dfMonth == 0) {
			/* ถ้าตัวแปร $dfMonth เป็น 0 เราจะแสดงปฏิทินของเดือนธันวาคมของปีที่น้อย
			กว่าปีที่กำลังแสดงอยู่ */
			$dfMonth = 12;
			$dfYear = $dfYear - 1;
	}
	elseif ($dfMonth == 13) {
		/* ถ้าตัวแปร $dfMonth เป็น 13 เราจะแสดงปฏิทินของเดือนมกราคมของปีที่มาก
		กว่าปีที่กำลังแสดงอยู่ */
		$dfMonth = 1;
		$dfYear = $dfYear + 1;
	}
	//สร้างวัน/เวลาของเดือนและปีที่ผู้ใช้ระบุ เก็บไว้ในตัวแปร $calTime
	$calTime = getdate(date(mktime((date("H") + $diffHour), 
	(date("i") + $diffMinute), 0, $dfMonth, $today, $dfYear)));
	$today = $calTime["mday"]; //วันที่
	$month = $calTime["mon"]; //เดือน
	$year = $calTime["year"]; //ปี
}

						/* เรียกฟังก์ชั่น LastDay() ซึ่งเป็นฟังก์ชั่นที่เราสร้างขึ้นมาเอง เพื่อหา "จำนวนวัน" 
						ของเดือนและปีที่จะแสดงปฏิทิน โดยเก็บไว้ในตัวแปร $Lday */
$Lday = LastDay($month, $year);
						//เก็บ timestamp ของวันที่ 1 ของเดือนที่จะแสดงปฏิทิน ไว้ในตัวแปร $FTime
$FTime = getdate(date(mktime(0, 0, 0, $month, 1, $year)));
						//เก็บ "วันในสัปดาห์" (จันทร์, อังคาร ฯลฯ) ของวันที่ 1 ของเดือนไว้ในตัวแปร $wday
$wday = $FTime["wday"];

						//สร้างตัวแปรชนิดอาร์เรย์เก็บชื่อเดือนภาษาไทย
/*
$thmonthname = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", 
"พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", 
"พฤศจิกายน", "ธันวาคม");
*/

$thmonthname = array("January", "February", "March", "April", 
"May", "June", "July", "August", "September", "October", 
"November", "December");

						/* ฟังก์ชั่น LastDay() ใช้สำหรับหาวันที่สุดท้ายของเดือน/ปีที่ระบุ 
						หรือกล่าวอีกนัยหนึ่งคือหาว่าเดือน/ปีที่ระบุนั้นมีกี่วัน */
function LastDay($m, $y) {
	for ($i=29; $i<=32; $i++) {
		if (checkdate($m, $i, $y) == 0) {
			return $i - 1;
		}
	}
}
?>
                        <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#ffffff">
                          <tr class="norm">
                            <td height="50px" width="24" align="center" bgcolor="#e0e0e0"><a href="<?php echo $PHP_SELF; ?>?page=calendar&today=<?php echo $today; ?>&amp;dfMonth=<?php echo ($month - 1) ?>
&amp;dfYear=<? echo $year; ?>">&lt;</a> </td>
                            <td height="20px"  width="120" colspan="5" align="center" bgcolor="#e0e0e0"><?php echo $thmonthname[$month - 1]; ?>&nbsp; <?php echo ($year); ?></td>
                            <td height="20px"  width="24" align="center" bgcolor="#e0e0e0"><a href="<?php echo $PHP_SELF; ?>?page=calendar&today=<?php echo $today; ?>&amp;dfMonth=<?php echo ($month + 1); ?>&amp;dfYear=<?php echo $year; ?>">&gt;</a></td>
                          </tr>
                          <tr> </tr>
                          <tr>
                           <td width="24" align="center" bgcolor="#FFFFCC" height="50px">&nbsp;<font color="#FF0000">Sun</font>&nbsp;</td>
                            <td width="24" align="center" bgcolor="#FFFFCC" >&nbsp;Mon&nbsp;</td>
                            <td width="24" align="center" bgcolor="#FFFFCC" >&nbsp;Tue&nbsp;</td>
                            <td width="24" align="center" bgcolor="#FFFFCC" >&nbsp;Wed&nbsp;</td>
                            <td width="24" align="center" bgcolor="#FFFFCC" >&nbsp;Thu&nbsp;</td>
                            <td width="24" align="center" bgcolor="#FFFFCC" >&nbsp;Fri&nbsp;</td>
                            <td width="24" align="center" bgcolor="#FFFFCC" >&nbsp;Sat&nbsp;</td>
                          </tr>
                          <?php
				include "config.php";
			//	$host = 'localhost';
			//	$dbname = 'elibrary_db_meetroom';
			//	$user = 'elibrary_root';
			//	$pass = 'elibrary123456';
				 $link = mysql_connect($host,$user,$pass)  or die ("<div align='center' >ติต่อฐานข้อมูลไม่ได้</div>");
				mysql_select_db($dbname,$link) or die ("ตายเลย");
				mysql_query("USE minimart; ");
				mysql_query("SET NAMES 'tis620'; ");		
$iday = 1;

if($dfMonth==''){
	$dmonth=$month;
}
else{
	$dmonth=$dfMonth;
} 
function day($iday,$dmonth,$year){
			$sdate = $iday ;
			$edate = $iday;
			$y = $year;
			$d = "$y-$dmonth-$iday";
			$s = "$y-$dmonth-$sdate 08:00";
			$e = "$y-$dmonth-$edate 18:30";//and sDate >'$s' and sDate < '$e'
										// $sql = " select  * from  van_reserve where Status ='1' and (sDate between '$s' and '$e' or eDate between '$s' and '$e' ) ";
										
										$sql = " select * from  van_reserve where status ='1' and ( '$d' between start_date and end_date ) ";
										$sql2 = " select  * from  eq where Status ='1' and (sDate between '$s' and '$e') ";
										$result = mysql_query($sql) or die ("คิวรี่ไม่ได้1");
										$result2 = mysql_query($sql2) or die ("คิวรี่ไม่ได้2");
										$total=mysql_num_rows($result );
										$total2=mysql_num_rows($result2);
										if(($total || $total2) !=0){
												return 1;
										}else {return 0;}
					
}
//แสดงแถวแรกของปฏิทิน
for ($i=0; $i<=6; $i++) {
	if ($i < $wday) { //แสดงเซลล์ว่างก่อนวันที่ 1 ของเดือน
			if ($i == 0) { //กรณีที่เป็นวันอาทิตย์
					echo "<td width=\"24\"  bgcolor=\"#efeeec\" align=\"center\" height=\"50px\"  class=sunday>&nbsp;</td>\n";
			}
			else { //กรณีที่เป็นวันอื่นๆที่ไม่ใช่วันอาทิตย์
					echo "<td width=\"24\"  bgcolor=\"#efeeec\" align=\"center\" height=\"50px\" class=\"norm\">&nbsp;</td>\n";
			}
	}
	else { //แสดงวันที่ในแถวแรกของปฏิทิน
			if ($i == 0 && ($iday != $today)) { 
							//กรณีที่เป็นวันอาทิตย์ และไม่ใช่วันปัจจุบัน
					if(day($iday,$dmonth,$year) == 1){
									echo "<td width=\"24\"  bgcolor=\"#efeeec\" align=\"center\" height=\"50px\" class=\"sunday\"><a href='Javascript:newShow($iday,$dmonth,$year);'>$iday</a></td>\n";
								}else{
									echo "<td width=\"24\"  bgcolor=\"#efeeec\" align=\"center\" height=\"50px\" class=\"sunday\">$iday</td>\n";
								}		
					
			}
			elseif ($iday == $today) { //กรณีที่เป็นวันปัจจุบัน
					if(day($iday,$dmonth,$year) == 1){
									echo "<td width=\"24\"  bgcolor=\"#efeeec\" align=\"center\" height=\"50px\" class=\"dayevent\"><a href='Javascript:newShow($iday,$dmonth,$year);'>$iday</a></td>\n";
					}else{
							echo "<td width=\"24\"  bgcolor=\"#efeeec\" align=\"center\" height=\"50px\" class=\"today\">$iday</td>\n";
					}		
			}else{
						if(day($iday,$dmonth,$year) == 1){
							echo "<td width=\"24\"  bgcolor=\"#efeeec\" align=\"center\" height=\"50px\" class=\"dayevent\"><a href='Javascript:newShow($iday,$dmonth,$year);'>$iday</a></td>\n";
						}else{
								echo "<td width=\"24\"  bgcolor=\"#efeeec\" align=\"center\" height=\"50px\" class=\"norm\">$iday</td>\n";
						}
			}
				$iday++;
	}
}
/////////////////

//////////////////
//แสดงแถวที่เหลือของปฏิทิน (หลังจากแสดงแถวแรกไปแล้ว จะเหลืออย่างมาก 5 แถว)
for ($j=0; $j<=4; $j++) {
		if ($iday <= $Lday) {
				echo "<tr>\n";
			for ($i=0; $i<=6; $i++) {
					if ($iday <= $Lday) {
							if ($i == 0 && ($iday != $today)) {
								if(day($iday,$dmonth,$year) == 1){
									echo "<td width=\"24\"  bgcolor=\"#efeeec\" align=\"center\" height=\"50px\" class=\"sunday\"><a href='Javascript:newShow($iday,$dmonth,$year);'>$iday</a></td>\n";
								}else{
									echo "<td width=\"24\"  bgcolor=\"#efeeec\" align=\"center\" height=\"50px\" class=\"sunday\">$iday</td>\n";
								}		
							}
							elseif ($i == 0 && ($iday == $today)) {
									if(day($iday,$dmonth,$year) == 1){
									echo "<td width=\"24\"  bgcolor=\"#efeeec\" align=\"center\" height=\"50px\" class=\"dayevent\"><a href='Javascript:newShow($iday,$dmonth,$year);'>$iday</a></td>\n";
								}else{
									echo "<td width=\"24\"  bgcolor=\"#efeeec\" align=\"center\" height=\"50px\" class=\"today\">$iday</td>\n";
								}		
							}
							elseif ($iday == $today) {
								if(day($iday,$dmonth,$year) == 1){
									echo "<td width=\"24\"  bgcolor=\"#efeeec\" align=\"center\" height=\"50px\" class=\"dayevent\"><a href='Javascript:newShow($iday,$dmonth,$year);'>$iday</a></td>\n";
								}else{
									echo "<td width=\"24\"  bgcolor=\"#efeeec\" align=\"center\" height=\"50px\" class=\"today\">$iday</td>\n";
								}		
							}
							else {
									if(day($iday,$dmonth,$year) == 1){
									echo "<td width=\"24\"  bgcolor=\"#efeeec\" align=\"center\" height=\"50px\" class=\"dayevent\"><a href='Javascript:newShow($iday,$dmonth,$year);'>$iday</a></td>\n";
								}else{
									echo "<td width=\"24\"  bgcolor=\"#efeeec\" align=\"center\" height=\"50px\" class=\"norm\">$iday</td>\n";
								}		
							}
							$iday++;
					}
					else {
						echo "<td width=\"24\"  bgcolor=\"#efeeec\" align=\"center\" height=\"50px\" class=\"norm\">&nbsp;</td>\n";
					}
			}
			echo "</tr>\n";
		}
		else {
			break;
		}
}
?>
                          
                        </table>
                                           </td>
                  </tr>
                </table></td>
              </tr>

            </table></td>
          </tr>
        </table>

</body>
</html>