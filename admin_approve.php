<script language="JavaScript" SRC="javafunction.js"></Script>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
<? if($session_user==''){?>
              <tr>
                <td>
					<form id="form1" name="form1" method="post" action="login.php">
                        <table align="center">
                          <tr>
                            <td align="center" colspan="2" height="50"><h4><b>Administrator</b></h4></td>
                          </tr>
                          <tr>	
                                  <td height="50" width="100" align="center"><strong>Username</strong> </td>
                                  <td align="center"><input name="Username" type="text" id="Username" /></td>
                                </tr>
                                <tr>
                                  <td height="50" align="center"><strong>Password</strong> </td>
                                  <td align="center" width="200"><input name="Password" type="password" id="Password" /></td>
                                </tr>
                                <tr>
                                  <td align="center" colspan="2" height="50"><input type="submit" name="Submit" value="Login" />
                                      <input type="reset" name="Submit2" value="cancel" /></td>
                          </tr>
                        </table>
                      
                    </form>
					</td>
              </tr>
<? }else{?>
              <tr>
                <td><form id="form2" name="process" method="post" action="save.php">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td align="left"><table width="300" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="left"><? echo " Welcome : $session_name [<a href=login.php?logout=1>Logout</a>]"; ?></td>
                          </tr>
                        </table></td>
                    </tr>
                    
                    <tr>
                      <td align="right">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="40" align="center" bgcolor="#F8F8F8"><h4><b>Approve Van</b></h4></td>
                    </tr>
                    <tr>
                      <td><?
					  		if(!isset($start)){
								$start = 0;
							}
							 include  "config.php";
							 $link = mysql_connect($host,$user,$pass)  or die ("<div align='center' >ติต่อฐานข้อมูลไม่ได้</div>");
							mysql_select_db($dbname,$link) or die ("ตายเลย");
							mysql_query("USE minimart; ");
							mysql_query("SET NAMES 'utf8'; ");
							$sqlnum = " select  * from  reserve where Status='' ";
							$sql = " select  * from  reserve where Status='' order by RsId desc ";
							$result = mysql_query($sql) or die ("คิวรี่ไม่ได้");	
							$num=mysql_query($sqlnum) or die ("Please....");	
							$total = mysql_num_rows($num);
						//echo "$total";
							//$page = ceil($total/$limit); 
							
if($total !=0){
					//page($page,$total,$limit);
					if($result ){	
								echo "
												<table border='0' cellpadding='1' cellspacing='1' width=100% >
													<tr bgcolor='#CCCffc' >
															<td width=5% align=center>ID</td>
															<td align=center width=12%>Menu</td>
															<th align=center width=15%>Dept.</th>
															<th align=center width=20%>Reservation Name</th>        
															<th align=center width=15%>Start date</th>
															<th align=center width=15%>Due Date</th>
													</tr>	";
								$num=0;
								/*
								if(empty($_GET[page])){
									$page=1;
								}
								else{
									$num += (( $_GET[page] -1 )*20);
								}
								echo $num;
								*/
								
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
										$notiMail = $record[notify_email];
										
										$y = split(" ",$sDate); //แยกวันที่กับเวลา
										$ey = split(" ",$eDate);
										$d = split("-",$y[0]);
										$ed = split("-",$ey[0]);
										$date = "$d[2]-$d[1]-$d[0]";  
										$edate = "$ed[2]-$ed[1]-$ed[0]";  
										
										$Time="$y[1]-$ey[1]";
										
										if($num% 2 == 0){
												$bg='#E9E9cc';
										}
										else{
												$bg='#E9E9cc';
										}
										echo"
												<tr bgcolor='$bg' >
															<td  align=center>$RsId</td>
															<td align=center >
																	[<a href=save.php?save=1&&id=$RsId&&email=$notiMail>Approve</a>][<a href=save.php?remove=1&&id=$RsId&&email=$notiMail>Delete</a>]
															</td>
															<td align=center>$Group1</td>
															<td align=center>$RsName</td>
															<td align=center>$date</td>
															<td align=center>$edate</td>
													</tr>";				
								}
								echo "</table>";
								//page($page,$total,$limit);
					}		
}else
	echo "<p align=center><font color=red>**ยังไม่มีการจอง Computer Notebook";
			
?></td>

        </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    
                    <tr>
                      <td><? }?></td>
                     
                    </tr>
                    
                    
                  </table>
                </form>                </td>
              </tr>
            </table>
</body>
</html>