<script language="JavaScript" SRC="javafunction.js"></Script>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.1.js"></script>
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.1.css" media="screen" />

<script type="text/javascript">
	$(document).ready(function() {
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

<style type="text/css" title="currentStyle">
	@import "css/multi_table.css";
</style>

<script src="js/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>

		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('.example').dataTable( {
					"sPaginationType": "full_numbers"
				} );
			} );
		</script>      
<title>จองอุปกรณ์</title>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                  
          
                  <tr>
                  	<td height="25" align="center" bgcolor="#F8F8F8"><h4 align="center"><b>Reservation Result</b></h4></td>
                    <!-- <td height="20" align="center" bgcolor="#F8F8F8"><strong>ตารางการจอง Notebook</strong></td> -->
                  </tr>
                  <tr>
                    <td><?
							include  "config.php";
							 $y=date("Y") ;
							 $m=date('m') ;
							 $d=date('d')-1;
							 // $d=date('d');
							 $end ="$y-$m-$d";
							 // echo "$end";
							$link = mysql_connect($host,$user,$pass)  or die ("<div align='center' >ติต่อฐานข้อมูลไม่ได้</div>");
							mysql_select_db($dbname,$link) or die ("");
							mysql_query("USE minimart; ");
							mysql_query("SET NAMES 'utf8'; ");

							$sqlnum = " select * from van_reserve where Status='1'";
							// $sql = " select * from van_reserve where Status='1' and ( sDate > '$end' or eDate > '$end') order by sDate desc ";
							
							$sql = " select * from van_reserve  ";
							$result = mysql_query($sql) or die ("คิวรี่ไม่ได้");	
							$num=mysql_query($sqlnum) or die ("Please....");	
							$total = mysql_num_rows($num);
							
							// echo "$sql";
							// echo "$total";
							
							
							if($result){
						?>
                                <table class="example" width="100%" cellpadding="0" cellspacing="0">
                                  <thead>
                                    <tr>
                                        <!-- <th class="head" align="center" width="5%">ลำดับ</th> -->
                                        <th class="head" width="5%"><p align="center">ID</p></th>
                                        <? if($session_name !=''){ ?>                                
                                            <th align=center width=10%>Menu</th>
                                        <? } ?>     
                                        <th class="head" width="7%"><p align="center">Dept.</p></th>
                                        <th class="head" width="20%"><p align="center">Reservation Name</p></th>  
                                        <th class="head" width="20%"><p align="center">Place</p></th>
                                        <th class="head" width="20%"><p align="center">Reason</p></th>      
                                        <th class="head" width="10%"><p align="center">Start Date</p></th>
                                        <th class="head" width="10%"><p align="center">Due Date</p></th>
                                        <th class="head" width="10%"><p align="center">Time</p></th>
                                        
                                    </tr>
                                   </thead>                        
                        <?		
								
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
										$ey 	= split(" ",$end_date);
										$e 		= split("-",$ey[0]);
										$d 		= split("-",$y[0]);
										$date 	= "$d[2]-$d[1]-$d[0]";  
										$edate 	= "$e[2]-$e[1]-$e[0]";  
										$Time	= "$y[1]-$ey[1]";
										
										if($num% 2 == 0){
												$bg='#E9E9cc';
										}
										else{
												$bg='#E9E9cc';
										}
										echo"
												<tr class='gradeA' height='40'>
															<td align=center>$van_reserve_id</td>
															"?>
															<? if($session_name !=''){ echo "
															<td align=center >[<a href=save.php?remove=31&&id=$van_reserve_id>ลบ</a>]</td>"; }?>
															<? echo "
															<td align=center>$department</td>
															<td>$name</td>
															<td>$place</td>
															<td>$reason</td>
															<td align=center>$date</td>
															<td align=center>$edate</td>
															<td align=center>$Time</td>
															
													</tr>";		
													//[<a href='index.php?page=user_edit&&id=$EqId&&page=Eq'>แก้ไข</a>]
								}
								echo "</table>";
					}
					else { 
							echo"<div align=center>do not meet the database anything ";
					}
?>
                  
                  
                </table>
                  
</body>
</html>