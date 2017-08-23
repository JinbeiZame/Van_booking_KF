<link href="css/autocomplete.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

    <script>
    $(function() {
        $( "#notiMail" ).autocomplete({
            source: "data.php",
            minLength: 1
        });
    });
    </script>



<script language="javascript" SRC="javafunction.js"></script>
<script language="javascript">
var xmlHttp;
var dataDiv;
var dataTable
var dataTableBody;
var offsetEI;
	function createXMLHttpRequest(){
		if(window.ActiveXObject){
				xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		else if (window.XMLHttpRequest){
			xmlHttp = new XMLHttpRequest();
		}
	}
	function initVars(){
			dataDiv = document.getElementById("popup");
		}
		function getCouresData(){
		//alert("eeeeeee");
			Room 	= document.getElementsByName('Room')[0].value;
			day 	 = document.getElementsByName('day')[0].value;
			kwm 	 = document.getElementsByName('kwm')[0].value;
			year 	= document.getElementsByName('year')[0].value;
			eday 	= document.getElementsByName('eday')[0].value;
			ekwm 	= document.getElementsByName('ekwm')[0].value;
			eyear   = document.getElementsByName('eyear')[0].value;
			Start   = document.getElementsByName('StartTime')[0].value;
			EndTime = document.getElementsByName('EndTime')[0].value;

				if(Room ==''){
						alert("Please select the Notebook");
						return false;
				}
				else if((day&&kwm&&year&&eday&&ekwm&&eyear&&Start&&EndTime)==''){
						alert("Please input date and time.");
						return false;
				}

			sTime = year+"-"+kwm+"-"+day+" "+Start;
			eTime = eyear+"-"+ekwm+"-"+eday+" "+EndTime;
			var d= sTime+"/"+eTime+"/"+Room;
			createXMLHttpRequest();
					var url = "chk_reser.php?d="+d;
				xmlHttp.open("GET",url,true);
				xmlHttp.onreadystatechange = callback;
				xmlHttp.send(null);
		}

		function getEq(){
		//alert(q);
			day = document.getElementsByName('day')[0].value;
			kwm = document.getElementsByName('kwm')[0].value;
			year = document.getElementsByName('year')[0].value;
			Start = document.getElementsByName('StartTime')[0].value;
			EndTime = document.getElementsByName('EndTime')[0].value;
			sTime = year+"-"+kwm+"-"+day+" "+Start;
			eTime = year+"-"+kwm+"-"+day+" "+EndTime;
			var d= sTime+"/"+eTime;

			createXMLHttpRequest();
					var url = "chk_ajex.php?d="+d;
				xmlHttp.open("GET",url,true);
				xmlHttp.onreadystatechange = calleq;
				xmlHttp.send(null);
		}

		function callback(){
			if(xmlHttp.readyState == 4){
				if(xmlHttp.status == 200){
					setData(1);
				}
			}
		}
		function calleq(){
		//alert("eq");
			if(xmlHttp.readyState == 4){
				if(xmlHttp.status == 200){
					setData(2);
				}
			}
		}

		function setData (e){
			if(e==1){
				document.getElementById("popup").innerHTML = xmlHttp.responseText;
			}else
				document.getElementById("txt").innerHTML = xmlHttp.responseText;
		}
</script>

<!--<script type="text/javascript">               Start Validate Form
				function validateForm() {

				var x=document.forms["form1"]["name"].value;
				if (x==null || x=="")
				 {
				  alert("Name must be filled out");
				  return false;
				 }

				var y=document.forms["form1"]["position"].value;
				if (y==null || y=="") {
				  alert("Position  must be filled out");
				  return false;
				}

				var y=document.forms["form1"]["department"].value;
				if (y==null || y=="") {
				  alert("Department  must be filled out");
				  return false;
				}

				var y=document.forms["form1"]["tel"].value;
				if (y==null || y=="") {
				  alert("Phone number must be filled out");
				  return false;
				}

				var y=document.forms["form1"]["ext"].value;
				if (y==null || y=="") {
				  alert("Extension No. must be filled out");
				  return false;
				}

				var y=document.forms["form1"]["email"].value;
				if (y==null || y=="") {
				  alert("E-mail must be filled out");
				  return false;
				}

				var y=document.forms["form1"]["day"].value;
				if (y==null || y=="") {
				  alert("Day must be filled out");
				  return false;
				}

				var y=document.forms["form1"]["kwm"].value;
				if (y==null || y=="") {
				  alert("Month must be filled out");
				  return false;
				}

				var y=document.forms["form1"]["year"].value;
				if (y==null || y=="") {
				  alert("Year must be filled out");
				  return false;
				}

				var y=document.forms["form1"]["eday"].value;
				if (y==null || y=="") {
				  alert("End-day must be filled out");
				  return false;
				}

				var y=document.forms["form1"]["ekwm"].value;
				if (y==null || y=="") {
				  alert("End-month must be filled out");
				  return false;
				}

				var y=document.forms["form1"]["eyear"].value;
				if (y==null || y=="") {
				  alert("End-year must be filled out");
				  return false;
				}

				var y=document.forms["form1"]["StartTime"].value;
				if (y==null || y=="") {
				  alert("Start-Time must be filled out");
				  return false;
				}

				var y=document.forms["form1"]["EndTime"].value;
				if (y==null || y=="") {
				  alert("End-Time must be filled out");
				  return false;
				}

				var y=document.forms["form1"]["place"].value;
				if (y==null || y=="") {
				  alert("Place must be filled out");
				  return false;
				}

				var y=document.forms["form1"]["reason"].value;
				if (y==null || y=="") {
				  alert("Reason must be filled out");
				  return false;
				}

				var y=document.forms["form1"]["people_total"].value;
				if (y==null || y=="") {
				  alert("Number of attendes must be filled out");
				  return false;
				}

				var y=document.forms["form1"]["people_name1"].value;
				if (y==null || y=="") {
				  alert("people_name1 must be filled out");
				  return false;
				}

				var y=document.forms["form1"]["people_position1"].value;
				if (y==null || y=="") {
				  alert("people_position1 must be filled out");
				  return false;
				}

				var y=document.forms["form1"]["people_company1"].value;
				if (y==null || y=="") {
				  alert("people_company1 must be filled out");
				  return false;
				}

				var y=document.forms["form1"]["driver_name"].value;
				if (y==null || y=="") {
				  alert("driver_name must be filled out");
				  return false;
				}

				var y=document.forms["form1"]["driver_position"].value;
				if (y==null || y=="") {
				  alert("driver_position must be filled out");
				  return false;
				}

				var y=document.forms["form1"]["driver_licence"].value;
				if (y==null || y=="") {
				  alert("driver_licence must be filled out");
				  return false;
				}
				}
</script>									End Start Validate Form-->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="25" align="center"><h4 align="center"><b>Make a Reservation</b></h4></td>
                  </tr>
                  <tr>
                   <!-- <td align="center"><form id="form1" name="form1" method="post" action="save.php" onsubmit="return Chk_Reser();">-->
                      <td align="center">
                      <form id="form1" name="form1" method="post" action="save.php" onsubmit="return validateForm()">
                      <table width="800" border="0" cellpadding="0" cellspacing="1">
                        <tr>
                          <td width="100"><strong>Name </strong></td>
                          <td width="317"><input name="name" id="name" value="<? echo $name;?>" /></td>
                          <td width="100"><strong>Position </strong></td>
                          <td width="178" colspan="2" align="left"><input name="position" id="position" value="<? echo $position;?>" />
                          </td>
                        </tr>

                        <tr>
                          <td><p align="left"><strong>Department</strong></p></td>
                          <td align="left">
                              <select name="department" id="department">
                              <option value="">--</option>
                              <option value="ADM">ADM</option>
                              <option value="Agency">Agency</option>
                              <option value="PM">PM</option>
                              <option value="RS">RS</option>
                              <option value="VL">VL</option>
                              </select>
                          </td>
                          <td><p align="left"><strong>Tel.</strong></p> </td>
                          <td align="left"><input name="tel" id="tel" value="<? echo $tel;?>" size="20" /></td>
                        </tr>


                        <tr>
                          <td><p align="left"><strong>Extension No.</strong></p> </td>
                          <td align="left"><input name="ext" id="ext" value="<? echo $ext;?>" size="10" /></td>
                          <td><p align="left"><strong>Email Address </strong></p></td>
                          <td align="left"><input name="email" id="v" value="<? echo $email;?>" /></td>
                        </tr>

                        <tr>
                          <td><p align="left"><strong>Start Date</strong></p></td>
                          <td align="left"><select name="day" id="day">
                            <? if($id != ''){
										for($i=1;$i<=31;$i++){?>
                            <option value="<? echo $i;?>" <? if($sd[2]==$i){echo "selected=selected";}?>><? echo $i;?></option>
                            <? }
							}else{ ?>
                            <option value=" " selected="selected">--</option>
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
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <? }?>
                          </select>
                            <select name="kwm">
                              <? if($id != ''){
										for($i=1;$i<=12;$i++){?>
                              <option value="<? echo $i;?>" <? if($sd[1]==$i){echo "selected=selected";}?>><? echo $i;?></option>
                              <? }
								}else{ ?>
                              <option value=" " selected="selected">--</option>
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
                              <? }?>
                            </select>
                            <select name="year" id="year">
                            <? if($id != ''){
										for($i=2016;$i<=2020;$i++){?>
                                <option value="<? echo $i;?>" <? if($sd[0]==$i){echo "selected=selected";}?>><? echo $i;?></option>
                              <? }
							}else{ ?>
                                <option value="" selected="selected">--</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                            <? } ?>
                            </select></td>

                        </tr>
                        <tr>
                          <td><p align="left"><strong>Due Date</strong></p></td>
                          <td align="left"><select name="eday" id="eday">
                            <? if($id != ''){
										for($i=1;$i<=31;$i++){?>
                            <option value="<? echo $i;?>" <? if($ed[2]==$i){echo "selected=selected";}?>><? echo $i;?></option>
                            <? }
							}else{ ?>
                            <option value=" " selected="selected">--</option>
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
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <? }?>
                          </select>
                            <select name="ekwm" id="ekwm">
                              <? if($id != ''){
										for($i=1;$i<=12;$i++){?>
                              <option value="<? echo $i;?>" <? if($ed[1]==$i){echo "selected=selected";}?>><? echo $i;?></option>
                              <? }
								}else{ ?>
                              <option value=" " selected="selected">--</option>
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
                              <? }?>
                            </select>
                            <select name="eyear" id="eyear">
                              <? if($id != ''){
										for($i=2016;$i<=2020;$i++){?>
                              <option value="<? echo $i;?>" <? if($sd[0]==$i){echo "selected=selected";}?>><? echo $i;?></option>
                              <? }
							}else{ ?>
                              <option value="" selected="selected">--</option>
                              <option value="2017">2017</option>
                              <option value="2018">2018</option>
                              <option value="2019">2019</option>
                              <option value="2020">2020</option>
                              <? }?>
                            </select></td>

                        </tr>
                        <tr>
                          <td><p align="left"><strong>Time</strong></p></td>
                          <td align="left"><select name="StartTime" id="StartTime">
                            <?
						  if($id != ''){
						 		 $sTime = array('08:00','08:30','09:00','09:30','10:00','10:30','11:00','11:30','12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00');
						  		 for($i=0;$i<count($sTime);$i++){
								 	$ss="$sTime[$i]:00";
						  		?>
                            <option value="<? echo $sTime[$i];?>" <? if($st == $ss){echo "selected = selected";}?> ><? echo $sTime[$i];?></option>
                            <? }
							}else{?>
                            <option value="" selected="selected">--</option>
                            <option value="08.00">08:00</option>
                            <option value="08.30">08:30</option>
                            <option value="09.30">09:00</option>
                            <option value="09.30">09:30</option>
                            <option value="10.00">10:00</option>
                            <option value="10.30">10:30</option>
                            <option value="11.00">11:00</option>
                            <option value="11.30">11:30</option>
                            <option value="12.00">12:00</option>
                            <option value="12.30">12:30</option>
                            <option value="13.00">13:00</option>
                            <option value="13.30">13:30</option>
                            <option value="14.00">14:00</option>
                            <option value="14.30">14:30</option>
                            <option value="15.00">15:00</option>
                            <option value="15.30">15:30</option>
                            <option value="16.00">16:00</option>
                            <option value="16.30">16:30</option>
                            <option value="17.00">17:00</option>
                            <option value="17.30">17:30</option>
                            <option value="18.00">18:00</option>
                            <? }?>
                          </select>
                            to  
                            <select name="EndTime" id="EndTime">
                              <?
						  if($id != ''){
						 		 $eTime = array('08:30','09:00','09:30','10:00','10:30','11:00','11:30','12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00','18:30');
						  		 for($i=0;$i<count($eTime);$i++){
								 		$sse="$eTime[$i]:00";
						  		?>
                              <option value="<? echo $eTime[$i];?>" <? if($et == $sse){echo "selected = selected";}?> ><? echo $eTime[$i];?></option>
                              <? }
							}else{?>
                              <option value="" selected="selected">--</option>
                              <option value="08.30">08:30</option>
                              <option value="09.00">09:00</option>
                              <option value="09.30">09:30</option>
                              <option value="10.00">10:00</option>
                              <option value="10.30">10:30</option>
                              <option value="11.00">11:00</option>
                              <option value="11.30">11:30</option>
                              <option value="12.00">12:00</option>
                              <option value="12.30">12:30</option>
                              <option value="13.00">13:00</option>
                              <option value="13.30">13:30</option>
                              <option value="14.00">14:00</option>
                              <option value="14.30">14:30</option>
                              <option value="15.00">15:00</option>
                              <option value="15.30">15:30</option>
                              <option value="16.00">16:00</option>
                              <option value="16.30">16:30</option>
                              <option value="17.00">17:00</option>
                              <option value="17.30">17:30</option>
                              <option value="18.00">18:00</option>
                              <option value="18.30">18:30</option>
                              <? }?>
                            </select>
                            <input type="button" name="Button" value="Check Time"  onclick="getCouresData();"/></td>
                            <td>
                        </tr>
                        <tr>
                          <td><p align="left"><strong>Van Status</strong></p></td>
						  <td align="left"><span id="popup"></span></td>
                        </tr>


                        <tr>
                          <td valign="top"><p align="left"><strong>Place</strong></p></td>
                          <td align="left" colspan="3"><textarea name="place" id="place" cols="50" rows="3" ></textarea>
                          </td>

                        </tr>

                        <tr>
                          <td valign="top"><p align="left"><strong>Reason</strong></p></td>
                          <td align="left" colspan="3"><textarea name="reason" id="reason" cols="50" rows="3" ></textarea>
                          </td>
                        </tr>

                        <tr>
                          <td colspan="4"><div id="popup"></div></td>
                        </tr>

                        <tr>
                          <td><p align="left"><strong>Number of attendes</strong></p> </td>
                          <td align="left"><input name="people_total" id="people_total" value="<? echo $people_total;?>" size="10" /></td>
                          <td></td>
                          <td align="left"></td>
                        </tr>

                        <tr bgcolor="">
                          <td colspan="4">
                          <fieldset style="border:2px solid #666666;">
                            <legend><span class="text_form_red"></span></legend>
                            <table width="750"border="0" align="center" cellpadding="1" cellspacing="1">

                                <tr>
                                    <td width="31"></td>
                                    <td width="255" align="center"><strong>Name</strong></td>
                                    <td width="233" align="center"><strong>Position</strong></td>
                                    <td width="218" align="center"><strong>Company</strong></td>
                                </tr>

                                <tr>
                                	<td align="center"><strong>1.</strong></td>
                                    <td align="center"><input name="people_name1" id="people_name1" size="30" value="<? echo $people_name1;?>" /></td>
                                    <td align="center"><input name="people_position1" id="people_position1" size="30" value="<? echo $people_position1;?>" /></td>
                                    <td align="center"><input name="people_company1" id="people_company1" size="30" value="<? echo $people_company1;?>" /></td>
                                </tr>

                                <tr>
                                	<td align="center"><strong>2.</strong></td>
                                    <td align="center"><input name="people_name2" id="people_name2" size="30" value="<? echo $people_name2;?>" /></td>
                                    <td align="center"><input name="people_position2" id="people_position2" size="30" value="<? echo $people_position2;?>" /></td>
                                    <td align="center"><input name="people_company2" id="people_company2" size="30" value="<? echo $people_company2;?>" /></td>
                                </tr>

                                <tr>
                                	<td align="center"><strong>3.</strong></td>
                                    <td align="center"><input name="people_name3" id="people_name3" size="30" value="<? echo $people_name3;?>" /></td>
                                    <td align="center"><input name="people_position3" id="people_position3" size="30" value="<? echo $people_position3;?>" /></td>
                                    <td align="center"><input name="people_company3" id="people_company3" size="30" value="<? echo $people_company3;?>" /></td>
                                </tr>

                                <tr>
                                	<td align="center"><strong>4.</strong></td>
                                    <td align="center"><input name="people_name4" id="people_name4" size="30" value="<? echo $people_name4;?>" /></td>
                                    <td align="center"><input name="people_position4" id="people_position4" size="30" value="<? echo $people_position4;?>" /></td>
                                    <td align="center"><input name="people_company4" id="people_company4" size="30" value="<? echo $people_company4;?>" /></td>
                                </tr>

                                <tr>
                                	<td align="center"><strong>5.</strong></td>
                                    <td align="center"><input name="people_name5" id="people_name5" size="30" value="<? echo $people_name5;?>" /></td>
                                    <td align="center"><input name="people_position5" id="people_position5" size="30" value="<? echo $people_position5;?>" /></td>
                                    <td align="center"><input name="people_company5" id="people_company5" size="30" value="<? echo $people_company5;?>" /></td>
                                </tr>

                                <tr>
                                	<td align="center"><strong>6.</strong></td>
                                    <td align="center"><input name="people_name6" id="people_name6" size="30" value="<? echo $people_name6;?>" /></td>
                                    <td align="center"><input name="people_position6" id="people_position6" size="30" value="<? echo $people_position6;?>" /></td>
                                    <td align="center"><input name="people_company6" id="people_company6" size="30" value="<? echo $people_company6;?>" /></td>
                                </tr>


                                <tr>
                                	<td colspan="4" height="20" align="center"></td>

                                </tr>

                            </table>
                            </fieldset>

                           </td>
                        </tr>


                        <tr>
                          <td  colspan="4" height="20"></td>
                        </tr>

                        <tr>
                          <td colspan="4">In case driver is not company's driver</td>
                        </tr>

                        <tr>
                          <td>Name</td>
                          <td align="left"><input name="driver_name" id="driver_name" value="<? echo $driver_name;?>" size="20" /></td>
                          <td>Position</td>
                          <td align="left"><input name="driver_position" id="driver_position" value="<? echo $driver_position;?>" size="20" /></td>
                        </tr>

                        <tr>
                          <td>Driver Licence NO.</td>
                          <td align="left" colspan="2"><input name="driver_licence" id="driver_licence" value="<? echo $driver_licence;?>" size="20" /></td>
                        </tr>

                        <tr>
                          <td> </td>
                          <td colspan="2">
                              <input type="submit" value="Submit" name="<? if($id != ''){ echo Res_up;}?>" />
                              <input type="reset" value="Reset" name="Submit2" />
                            
                           <input type="hidden" name="id" value="<? echo $van_reserve_id;?>"/>                            

                        </tr>
                            
                      </table>
                     </form>
                    </td>
                  </tr>


                </table>
</body>
</html>
