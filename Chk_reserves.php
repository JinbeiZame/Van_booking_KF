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

<form id="form1" name="form1" method="post" action="">
<table width="100%" border="0" cellspacing="5" cellpadding="0">
			   <tr>
                  <td height="25" align="center" bgcolor="#F8F8F8"><h4><b>Check Notebook Status</b></h4></td>
                  <!-- <td height="25" align="center" bgcolor="#F8F8F8"><strong>ตรวจเช็คการจอง Notebook</strong> -->
               </tr>
			  
				<tr>
                      <td align="center">
                        <select name="Room" id="Room">
                          <option value="">Please select</option>
                          <option value="Notebook 1">Notebook 1</option>
                          <option value="Notebook 2">Notebook 2</option>
                          <option value="Notebook 3">Notebook 3</option>
                        </select>
                        </strong>
                          <select name="m" id="m">
                            <option value="">--</option>
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
                            <option value="">--</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                          </select>
                          <input type="submit" value="Check" name="Submit" />
                          <input name="Showall" type="submit" id="Showall" value="ShowAll" /></td>
                                    </tr>
</table>
</form>
<p>&nbsp;</p>
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
									 if($Room ==''){ 
											$sqlnum = "select * from reserve where  sDate between '$udate' and '$udateto' and Status=1";
											$sql = " select * from reserve where  sDate between '$udate' and '$udateto' and Status=1 order by RsId desc";
									}
									  else if($Room && $m && $y){ 
											$sqlnum = "select * from reserve where  Room='$Room' and (sDate between '$udate' and '$udateto') and Status=1";
											$sql = " select * from reserve where  Room='$Room' and (sDate between '$udate' and '$udateto') and Status=1 order by RsId desc";
									}
									else {
											$sqlnum = "select * from reserve where  Room='$Room' and Status=1";
											$sql = " select * from reserve where  Room='$Room'  and Status=1 order by RsId desc";
									}
									//echo "##$Room-$m-$y<br>";
							}else{
								$sqlnum = " select  * from  reserve where Status=1  ";
								$sql = " select  * from  reserve where Status=1  order by sDate ";
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
    	<!-- <th class="head" align="center" width="5%">ลำดับ</th> -->
        <th class="head" width="5%"><p align="center">ID</p></th>
								<? if($session_name !=''){ ?>                                
                                	<th class="head" width=10%><p align="center">Menu</p></th>
								<? } ?>     
    	<th class="head" width="15%"><p align="center">Notebook No.</p></th>
        <th class="head" width="10%"><p align="center">Dept.</p></th>
    	<th class="head" width="20%"><p align="center">Reservation Name</p></th>        
        <th class="head" width="15%"><p align="center">Start Date</p></th>
        <th class="head" width="15%"><p align="center">Due Date</p></th>
        <th align="center" width="30%"><p align="center">Time</p></th>                                                      
    	
    </tr>
   </thead>  

<?													
								$num =0;
								while($record=mysql_fetch_array($result )){
										$num++;
										$RsId = $record[RsId];
										$Group1 = $record[Group1];
										$Story = $record[Story];
										$MeetTotal	= $record[MeetTotal];
										$Room = $record[Room];
										$sDate = $record[sDate];
										$eDate = $record[eDate];
										$EqSupport = $record[EqSupport];
										$RsName = $record[RsName];
										$TelNum = $record[TelNum];
										
										$y = split(" ",$sDate); //แยกวันที่กับเวลา
										$y2=split(":",$y[1]);
										$ey = split(" ",$eDate);
										$ey2=split(":",$ey[1]);
										
										$d = split("-",$y[0]);
										$e = split("-",$ey[0]);
										$date  = "$d[2]-$d[1]-$d[0]";  
										$edate = "$e[2]-$e[1]-$e[0]";  
										$Time="$y2[0]:$y2[1] - $ey2[0]:$ey2[1]";
										
										if($num% 2 == 0){
												$bg='#E9E9cc';
										}
										else{
												$bg='#E9E9cc';
										}
										echo"
												<tr class='gradeA'>
															<td  align=center>$RsId</td>
															"?>
															<? if($session_name !=''){ echo "
															<td align=center >[<a href=save.php?remove=31&&id=$RsId>ลบ</a>]</td>"; }?>
															<? echo "
															<td>$Room</td>
															<td align=center>$Group1</td>
															<td>$RsName</td>
															<td align=center >$date</td>
															<td align=center >$edate</td>
															<td align=center >$Time</td>
													</tr>";				
								}
								echo "</table>";
					}
					else { 
							echo"<div align=center>do not meet the database anything ";
					}
		//page($page,$total,$limit,$RsId,$Group,$Story,$MeetTotal,$Room,$sDate,$eDate,$EqSupport,$RsName,$TelNum );
	}else echo "<p align=center><font color=red>**ไม่พบข้อมูลที่ท่านค้นหา";
}
?>
					</td>
                    </tr>
                  </table>
				</form>
                </td>
              </tr>
            </table>