<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="JavaScript" SRC="javafunction.js"></Script>
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<title>จองห้องประชุม</title>

</head>
<body style="background-color:#ffffff;">
<fieldset>
<legend><strong>รายละเอียดการจองอุปกรณ์ออนไลน์</strong></legend>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                  
                  <tr>
                    <td align="left"><form id="form1" name="form1" method="post" action="save.php" onsubmit="return Chk_Reser();">
                      <table width="560" border="0" cellpadding="0" cellspacing="1">
                        <tr>
                          <td height="25" colspan="3" align="center">
						  <?
						    $EqId=$_GET[EqId];
							 include  "config.php";
							 $link = mysql_connect($host,$user,$pass)  or die ("<div align='center' >ติตด่อฐานข้อมูลไม่ได้</div>");
							mysql_select_db($dbname,$link) or die ("ตายเลย");
							mysql_query("USE minimart; ");
							mysql_query("SET NAMES 'utf8'; ");
							$sql = " select  * from  eq where EqId='$EqId' ";
							$result = mysql_query($sql) or die ("คิวรี่ไมไ้ด้");	
										$record=mysql_fetch_array($result );
										$EqId = $record[EqId];
										$Group = $record[Group1];
										$Story = $record[Story];
										$Room = $record[Room];
										$sDate = $record[sDate];
										$eDate = $record[eDate];
										$Location=$record[Location];
										$EqSupport = $record[EqSupport];
										$RsName = $record[RsName];
										$TelNum = $record[TelNum];
										//time
										$y = split(" ",$sDate); //แยกวันที่กับเวลา
										$ey = split(" ",$eDate);
										$d = split("-",$y[0]);
										$date = "$d[2]-$d[1]-$d[0]";  
										$Time="$y[1]-$ey[1]";
						  ?>
						  	</td>
                          </tr>
                        <tr>
                          <td bgcolor="#F8F8F8"><p align="right">กลุ่มงาน/หน่วยงาน </p></td>
                          <td colspan="2" bgcolor="#FFFFCC">&nbsp;<? echo "$Group";?></td>
                          </tr>
                        <tr>
                          <td bgcolor="#F8F8F8"><p align="right">ใช้วันที่  </p></td>
                          <td colspan="2" bgcolor="#FFFFCC">&nbsp;<? echo "$sDate";?> <div id="popup" ></div></td>
                          </tr>
                        <tr>
                          <td align="right" bgcolor="#F8F8F8"><p align="right">คืนวันที่ </p></td>
                          <td colspan="2" bgcolor="#FFFFCC">&nbsp;<? echo "$eDate";?></td>
                        </tr>
                        <tr>
                          <td align="right" bgcolor="#F8F8F8"><p align="right">อุปกรณ์ที่ใช้ </p></td>
                          <td colspan="2" bgcolor="#FFFFCC">&nbsp;<? echo "$Location";?></td>
                        </tr>
                        <tr>
                          <td bgcolor="#F8F8F8"><p align="right">ช่วงเวลาที่ใช้ </p></td>
                          <td colspan="2" bgcolor="#FFFFCC">&nbsp;<? echo "$Time";?></td>
                          </tr>
                        <tr>
                          <td bgcolor="#F8F8F8"><p align="right">สถานที่นำไปใช้งาน </p></td>
                          <td colspan="2" bgcolor="#FFFFCC">&nbsp;<? echo "$EqSupport ";?></td>
                          </tr>
                        <tr>
                          <td bgcolor="#F8F8F8"><p align="right">ลงชื่อผู้จอง </p></td>
                          <td bgcolor="#FFFFCC">&nbsp;<? echo "$RsName";?></td>
                          <td bgcolor="#FFFFCC"><table width="100" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td>เบอร์ต่อภายใน </td>
                                <td><? echo "$TelNum";?></td>
                              </tr>
                            </table></td>
                        </tr>
                      </table>
                                        </form>                    </td>
                  </tr>
                  
                  
                </table>
</fieldset>              
</body>
</html>