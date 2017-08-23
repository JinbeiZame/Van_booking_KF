<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="images/favicon.ico" REL="SHORTCUT ICON"/> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script language="JavaScript" SRC="javafunction.js"></Script>

	<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
	<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.1.js"></script>
	<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.1.css" media="screen" />

	<script type="text/javascript">
		$(document).ready(function() {
			/*
			*   Examples - various
			*/

			$(".various3").fancybox({
				'width'				: '53%',
				'height'			: '52%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});
		});
	</script>

<link rel="stylesheet" href="css/form/screen.css" type="text/css" media="screen" />    
<link rel="stylesheet" href="css/demo_table.css" type="text/css" media="screen" />       


<script src="js/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>

		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable( {
					"sPaginationType": "full_numbers"
				} );
			} );
		</script> 
<title>จองห้องประชุม</title>

</head>
<body>
<table width="100%" border="0" cellspacing="5" cellpadding="0">
              <tr>
                <td><form id="form1" name="form1" method="post" action="">
                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                    <tr>
                      <td height="25" align="center" bgcolor="#F8F8F8"><strong>ตรวจเช็คการจองอุปกรณ์</strong></td>
                    </tr>
                    
                    <tr>
                      <td align="center"> 
                        <select name="m" id="m">
                            <option value="10" selected="selected">เดือน</option>
                            <option value="1">01</option>
                            <option value="2">02</option>
                            <option value="3">03</option>
                            <option value="4">04</option>
                            <option value="5">05</option>
                            <option value="6">06</option>
                            <option value="7">07</option>
                            <option value="8">08</option>
                            <option value="9">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                          </select>
                        <select name="y" id="y">
                          <? if($id != ''){
										for($i=2550;$i<=2560;$i++){?>
                          <option value="<? echo $i;?>" <? if($sd[0]==$i){echo "selected=selected";}?>><? echo $i;?></option>
                          <? }
							}else{ ?>
                          <option value="" selected="selected">ปี</option>
                          <option value="2007">2007</option>
                            <option value="2008">2008</option>
							<option value="2009">2009</option>
                            <option value="2010">2010</option>
                            <option value="2011">2011</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                          <? }?>
                        </select>
                        <input type="submit" value="ตรวจเช็ค" name="Submit" />
                          <input name="Showall" type="submit" id="Showall" value="ShowAll" />
                          [<a href="javascript:history.back()">Back</a>]</td>
                    </tr>
                    <tr>
                      <td><p align="center"><strong> </strong>  </p></td>
                    </tr>
                    <tr>
                      <td>
				<?
	if($Showall  || $Submit){		
							$udate="$y-$m-1";
							$udateto="$y-$m-31";
							 include  "config.php";
							 $link = mysql_connect($host,$user,$pass)  or die ("<div align='center' >ติต่อฐานข้อมูลไม่ได้</div>");
							mysql_select_db($dbname,$link) or die ("ตายเลย");
							mysql_query("USE minimart; ");
							mysql_query("SET NAMES 'utf8'; ");
							if($Submit){	
									$sqlnum = "select * from eq where (sDate between '$udate' and '$udateto' )and Status=1 ";
									$sql = " select * from eq where (sDate between '$udate' and '$udateto') and Status=1 order by sDate ";
							}else{
								$sqlnum = " select  * from  eq  where Status=1";
								$sql = " select  * from  eq  where Status=1 order by sDate  ";
							}
							$result = mysql_query($sql) or die ("คิวรี่ไมไ้ด้");	
							$num=mysql_query($sqlnum) or die ("Please....");	
							$total = mysql_num_rows($num);
						//echo "$sql";
							//$page = ceil($total/$limit); 			
		if($total != 0){
						//page($page,$total,$limit,$RsId,$Group,$Story,$MeetTotal,$Room,$sDate,$eDate,$EqSupport,$RsName,$TelNum);
							if($result ){
?>								
<table id="example" class="display" width="100%" cellpadding="0" cellspacing="0">
  <thead>
	<tr>
    	<th class="head" align="center" width="5%">ลำดับ</th>
								<? if($session_name !=''){ ?>                                
                                	<th align=center width=10%>Menu</th>
								<? } ?>     
    	<th class="head" width="20%">หน่วยงาน</th>
    	<th class="head" align="center" width="20%"> อุปการณ์ที่จอง</th>        
    	<th class="head" align="center" width="10%"> ผู้จอง</th>
		<th align="center" width="10%">วันที่จอง</th>        
    	<th class="head" align="center" width="10%"> วันที่คืน</th>                                       
    </tr>
   </thead>  
<?
								$num=0;
								while($record=mysql_fetch_array($result )){
										$num++;
										$EqId = $record[EqId];
										$Group = $record[Group1];
										$Story = $record[Story];
										$MeetTotal	= $record[MeetTotal];
										$Room = $record[Room];
										$sDate = $record[sDate];
										$eDate = $record[eDate];
										$EqSupport = $record[EqSupport];
										$RsName = $record[RsName];
										$TelNum = $record[TelNum];
										$Location= $record[Location];
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
												<tr class='gradeA'>
															<td  align=center>$num</td>
															"?>
															<? if($session_name !=''){ echo "
															<td align=center >[<a href=save.php?remove=41&&id=$EqId>ลบ</a>]</td>"; }?>
															<? echo "
															
															<td align=left ><a class='various3' href='show_eq.php?EqId=$EqId'>$Group</a></td>
															<td align=center >$Location</td>
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
		//page($page,$total,$limit,$RsId,$Group,$Story,$MeetTotal,$Room,$sDate,$eDate,$EqSupport,$RsName,$TelNum );
	}else echo "<p align=center><font color=red>**ไม่พบข้อมูลที่ท่านค้นหา";
}else{
?></td>
                    </tr>
                    <tr>
                      <td align="center"><table width="200" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
                        <tr>
                          <td align="center">วิธีการใช้งาน</td>
                        </tr>
                        <tr>
                          <td><table width="250" border="0" cellspacing="1" cellpadding="0">
                              <tr>
                                <td width="10" bgcolor="#FFFFCC">1</td>
                                <td align="left" bgcolor="#FFFFCC">เลือกเดือนและปีที่ต้องการทราบ</td>
                              </tr>
                              <tr>
                                <td bgcolor="#FFFFCC">2</td>
                                <td align="left" bgcolor="#FFFFCC">จากนนั้นกด ตรวจเช็ค </td>
                              </tr>
                              <tr>
                                <td bgcolor="#FFFFCC">3</td>
                                <td align="left" bgcolor="#FFFFCC">ถ้าต้องการดูทั้งหมดให้กด ShowAll </td>
                              </tr>
                          </table></td>
                        </tr>
                      </table>
                        <p>
                          <? }?>
                        </p></td>
                    </tr>
                  </table>
                                </form>
                </td>
              </tr>
            </table>
</body>
</html>