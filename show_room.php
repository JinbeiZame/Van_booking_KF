<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="images/favicon.ico" REL="SHORTCUT ICON"/> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />

<script language="JavaScript" SRC="javafunction.js"></Script>

<title>จองห้องประชุม</title>

</head>
<body style="background-color:#ffffff;">
<fieldset>
<legend><strong>รายละเอียดการจองห้องประชุมออนไลน์</strong></legend>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                  
                  <tr>
                    <td align="left"><form id="form1" name="form1" method="post" action="save.php" onsubmit="return Chk_Reser();">
                      <table width="560" border="0" cellpadding="0" cellspacing="1">
                        <tr>
                          <td height="25" colspan="3" align="center">
						  <?
						    $RsId=$_GET[RsId];
							 include  "config.php";
							 $link = mysql_connect($host,$user,$pass)  or die ("<div align='center' >ติต่อฐานข้อมูลไม่ได้</div>");
							mysql_select_db($dbname,$link) or die ("ตายเลย");
							mysql_query("USE minimart; ");
							mysql_query("SET NAMES 'utf8'; ");
							$sql = " select  * from  reserve where RsId='$RsId' ";
							$result = mysql_query($sql) or die ("คิวรี่ไม่ได้");	
										$record=mysql_fetch_array($result );
										$RsId = $record[RsId];
										$Group = $record[Group1];
										$Story = $record[Story];
										$MeetTotal	= $record[MeetTotal];
										$Room = $record[Room];
										$sDate = $record[sDate];
										$eDate = $record[eDate];
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
                          <td bgcolor="#F8F8F8"><p align="right">กลุ่มงาน/หน่วยงาน  </p></td>
                          <td colspan="2" bgcolor="#FFFFCC">&nbsp;<? echo "$Group";?> </td>
                          </tr>
                        <tr>
                          <td bgcolor="#F8F8F8"><p align="right">ประชุมเรื่อง  </p></td>
                          <td colspan="2" bgcolor="#FFFFCC">&nbsp;<? echo "$Story";?> </td>
                          </tr>
                        <tr>
                          <td bgcolor="#F8F8F8"><p align="right">จำนวนผู้เข้าประชุม  </p></td>
                          <td colspan="2" bgcolor="#FFFFCC">&nbsp;<? echo "$MeetTotal";?> คน </td>
                          </tr>
                        <tr>
                          <td bgcolor="#F8F8F8"><p align="right">ห้องที่ใช้  </p></td>
                          <td colspan="2" bgcolor="#FFFFCC">&nbsp;<? echo "$Room";?> </td>
                          </tr>
                        <tr>
                          <td bgcolor="#F8F8F8"><p align="right">ใช้ห้องวันที่  </p></td>
                          <td colspan="2" bgcolor="#FFFFCC">&nbsp;<? echo "$sDate";?> <div id="popup" ></div></td>
                          </tr>
                        <tr>
                          <td bgcolor="#F8F8F8"><p align="right">ช่วงเวลาที่ใช้  </p></td>
                          <td colspan="2" bgcolor="#FFFFCC">&nbsp;<? echo "$Time";?>  </td>
                          </tr>
                        <tr>
                          <td bgcolor="#F8F8F8"><p align="right">อุปกรณ์ที่ใช้  </p></td>
                          <td colspan="2" bgcolor="#FFFFCC"><p align="left">&nbsp;<? echo "$EqSupport ";?></p>                            </td>
                          </tr>
                        <tr>
                          <td bgcolor="#F8F8F8"><p align="right">ลงชื่อผู้จอง  </p></td>
                          <td bgcolor="#FFFFCC">&nbsp;<? echo "$RsName";?></td>
                          <td bgcolor="#FFFFCC"><table width="100" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td>เบอร์ต่อภายใน</td>
                                <td><? echo "$TelNum";?></td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
					</form>
                    </td>
                  </tr>
                  
                  
                </table>
</fieldset>
</body>
</html>