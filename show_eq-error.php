<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<script language="JavaScript" SRC="javafunction.js"></Script>
<link rel="stylesheet" href="css.css" type="text/css" />
<title>�ͧ��ͧ��Ъ��</title>
<style type="text/css">
<!--
.style3 {font-size: 12px}
-->
</style>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><table width="600" border="0" cellspacing="0" cellpadding="0">
      
      <tr>
        <td colspan="2" valign="top" bgcolor="#FFFFFF"><table width="610" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td background="images/bgtop_main.gif">&nbsp;</td>
          </tr>
          <tr>
            <td align="right" background="images/bgcenter_main.gif"><table width="585" border="0" cellspacing="5" cellpadding="0">
              <tr>
                <td><table width="600%" border="0" cellspacing="0" cellpadding="0">
                  
                  <tr>
                    <td align="left"><form id="form1" name="form1" method="post" action="save.php" onsubmit="return Chk_Reser();">
                      <table width="560" border="0" cellpadding="0" cellspacing="1">
                        <tr>
                          <td height="25" colspan="3" align="center"><strong>��������´��èͧ�ػ�ó��͹�Ź� 
						  <?
						    $EqId=$_GET[EqId];
							 include  "config.php";
							 $link = mysql_connect($host,$user,$pass)  or die ("<div align='center' >�Ե�Ͱҹ�����������</div>");
							mysql_select_db($dbname,$link) or die ("������");
							mysql_query("USE minimart; ");
							mysql_query("SET NAMES 'tis620'; ");
							$sql = " select  * from  eq where EqId='$EqId' ";
							$result = mysql_query($sql) or die ("�����������");	
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
										$y = split(" ",$sDate); //�¡�ѹ���Ѻ����
										$ey = split(" ",$eDate);
										$d = split("-",$y[0]);
										$date = "$d[2]-$d[1]-$d[0]";  
										$Time="$y[1]-$ey[1]";
						  ?>
						  </strong></td>
                          </tr>
                        <tr>
                          <td bgcolor="#F8F8F8"><p align="right">������ҹ/˹��§ҹ��</p></td>
                          <td colspan="2" bgcolor="#FFFFCC"><? echo "$Group";?>�</td>
                          </tr>
                        <tr>
                          <td bgcolor="#F8F8F8"><p align="right">���ѹ��蠠</p></td>
                          <td colspan="2" bgcolor="#FFFFCC"><? echo "$sDate";?> <div id="popup" ></div></td>
                          </tr>
                        <tr>
                          <td align="right" bgcolor="#F8F8F8">�׹�ѹ���</td>
                          <td colspan="2" bgcolor="#FFFFCC"><? echo "$eDate";?></td>
                        </tr>
                        <tr>
                          <td align="right" bgcolor="#F8F8F8">ʶҹ�������ҹ</td>
                          <td colspan="2" bgcolor="#FFFFCC"><? echo "$Location";?></td>
                        </tr>
                        <tr>
                          <td bgcolor="#F8F8F8"><p align="right">��ǧ���ҷ���頠</p></td>
                          <td colspan="2" bgcolor="#FFFFCC"><? echo "$Time";?> �</td>
                          </tr>
                        <tr>
                          <td bgcolor="#F8F8F8"><p align="right">�ػ�ó�����</p></td>
                          <td colspan="2" bgcolor="#FFFFCC"><p align="left">�<? echo "$EqSupport ";?></p>                            </td>
                          </tr>
                        <tr>
                          <td bgcolor="#F8F8F8"><p align="right">ŧ���ͼ��ͧ</p></td>
                          <td bgcolor="#FFFFCC"><? echo "$RsName";?></td>
                          <td bgcolor="#FFFFCC"><table width="100" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td>����������</td>
                                <td><? echo "$TelNum";?></td>
                              </tr>
                            </table></td>
                        </tr>
                      </table>
                                        </form>                    </td>
                  </tr>
                  
                  
                </table></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left"><img src="images/SAINT_78_28.gif" width="600" height="29" /></td>
          </tr>
          <tr>
            <td align="center"><span class="style3">Copyright 2009 - 2012 &copy; Knight Frank Chartered
                (Thailand) Co.,Ltd</span></td>
          </tr>
        </table></td>
        </tr>
      
    </table></td>
  </tr>
</table>
</body>
</html>