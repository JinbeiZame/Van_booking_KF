<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="images/favicon.ico" REL="SHORTCUT ICON"/> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="JavaScript" SRC="javafunction.js"></Script>
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
		
		function getCouresDataChk(){
				Room = document.getElementsByName('Room')[0].value;
				day = document.getElementsByName('day')[0].value;
				kwm = document.getElementsByName('kwm')[0].value;
				year = document.getElementsByName('year')[0].value;
				Start = document.getElementsByName('StartTime')[0].value;
				EndTime = document.getElementsByName('EndTime')[0].value;
				
				if(Room ==''){
					alert("กรุณาเลือกห้องประชุมด้วยครับ");
					return false;
				}
			  if((day&&kwm&&year&&Start&&EndTime)==''){
						alert("กรุณาเลือกวันเดือนปีและเวลาที่จองด้วยครับ");
						return false;
				}
				
				sTime = year+"-"+kwm+"-"+day+" "+Start;
				eTime = year+"-"+kwm+"-"+day+" "+EndTime;
				var d= sTime+"/"+eTime+"/"+Room;
				createXMLHttpRequest();
				
				var url = "chk_reser.php?d="+d;
				xmlHttp.open("GET",url,true);
				xmlHttp.onreadystatechange = callback;
				xmlHttp.send(null); 
		}
		
		function getCouresData(){
				day = document.getElementsByName('day')[0].value;//วันที่ต้องการยืม
				kwm = document.getElementsByName('kwm')[0].value;
				year = document.getElementsByName('year')[0].value;
				
				eday = document.getElementsByName('eday')[0].value;
				ekwm = document.getElementsByName('ekwm')[0].value;
				eyear = document.getElementsByName('eyear')[0].value;
				//------------------------ช่วงเวลาที่ใช้
				Start = document.getElementsByName('StartTime')[0].value;
				EndTime = document.getElementsByName('EndTime')[0].value;
				Room='';
							
				if((day  && kwm && year && eday && ekwm && eyear && Start && EndTime)==''){
						//alert("กรุณาเลือกช่วงเวลาที่ท่านต้องการยืม");
						return;
				}
				
				
				
				sTime = year+"-"+kwm+"-"+day+" "+Start;
				eTime = eyear+"-"+ekwm+"-"+eday+" "+EndTime;
				var d= sTime+"/"+eTime+"/"+Room;
				createXMLHttpRequest();
				
				var url = "chk_ajex.php?d="+d;
				xmlHttp.open("GET",url,true);
				xmlHttp.onreadystatechange = callback;
				xmlHttp.send(null);
		}
		function callback(){
			if(xmlHttp.readyState == 4){
				if(xmlHttp.status == 200){
				clearData();
					setData(1);
				}
			}
		}
		function setData (){		
				//document.getElementById("popup").innerHTML = xmlHttp.responseText;
				//document.getElementById("chkTime").innerHTML = xmlHttp.responseText;
		}
		function clearData(){
				//document.getElementById("popup").innerHTML = "";
				//document.getElementById("chkTime").innerHTML = "";
		}	
		
function chkEq(){
	location.href="ChkEq.php";
}
</script>

<title>จองห้องประชุม</title>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="25"><p align="center"><strong>แบบฟอร์มการจองอุปกรณ์ออนไลน์ </strong><br /><br />
                      คำแนะนำ: ท่านจะต้องทำการตรวจสอบตารางการจองห้องอุปกรณ์ก่อนทุกครั้งว่าในวันที่ท่านต้องการ<br />
ใช้งานอุปกรณ์ดังกล่าว   มีฝ่ายใดจองใช้งานตรงกับท่านหรือไม่ <a href="index.php?page=chk_eq" target="_blank"> เพื่อตรวจสอบสถานะอุปกรณ์</a><br /><br /></p>
					</td>
                  </tr>
                  <tr>
                    <td align="center"><form id="form1" name="form1" method="post" action="save.php" onsubmit="return Chk_eq();">
                      <table border="0" cellpadding="1" cellspacing="1">
                        <tr>
                          <td><p align="right">กลุ่มงาน/หน่วยงาน  </p></td>
                          <td align="left"><input name="Group" id="Group" size="30" value="<? echo $Group;?>" /></td>
                          <td> </td>
                        </tr>
                        <tr>
                          <td><p align="right">ใช้วันที่  </p></td>
                          <td align="left"><select name="day" id="day" onchange="getCouresData();">
                            <? if($id != ''){
										for($i=1;$i<=31;$i++){?>
                            <option value="<? echo $i;?>" <? if($sd[2]==$i){echo "selected=selected";}?>><? echo $i;?></option>
                            <? }
							}else{ ?>
                            <option value=" " selected="selected">วันที่</option>
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
                            <select name="kwm" onchange="getCouresData();">
                              <? if($id != ''){
										for($i=1;$i<=12;$i++){?>
                              <option value="<? echo $i;?>" <? if($sd[1]==$i){echo "selected=selected";}?>><? echo $i;?></option>
                              <? }
								}else{ ?>
                              <option value=" " selected="selected">เดือน</option>
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
                            <select name="year" id="year" onchange="getCouresData();">
                              <? if($id != ''){
										for($i=2550;$i<=2560;$i++){?>
                              <option value="<? echo $i;?>" <? if($sd[0]==$i){echo "selected=selected";}?>><? echo $i;?></option>
                              <? }
							}else{ ?>
                              <option value="" selected="selected">ปี</option>
							  <option value="2556">2556</option>
							  <option value="2557">2557</option>
							  <option value="2558">2558</option>
							  <option value="2559">2559</option>
							  <option value="2560">2560</option>
                              <? }?>
                            </select></td>
                          <td valign="bottom"> </td>
                        </tr>
                        <tr>
                          <td><p align="right">คืนวันที่</p></td>
                          <td align="left"><select name="eday" id="eday" onchange="getCouresData();">
                            <? if($id != ''){
										for($i=1;$i<=31;$i++){?>
                            <option value="<? echo $i;?>" <? if($ed[2]==$i){echo "selected=selected";}?>><? echo $i;?></option>
                            <? }
							}else{ ?>
                            <option value=" " selected="selected">วันที่</option>
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
                            <select name="ekwm" id="ekwm" onchange="getCouresData();">
                              <? if($id != ''){
										for($i=1;$i<=12;$i++){?>
                              <option value="<? echo $i;?>" <? if($ed[1]==$i){echo "selected=selected";}?>><? echo $i;?></option>
                              <? }
								}else{ ?>
                              <option value=" " selected="selected">เดือน</option>
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
                            <select name="eyear" id="eyear" onchange="getCouresData();">
                              <? if($id != ''){
										for($i=2550;$i<=2560;$i++){?>
                              <option value="<? echo $i;?>" <? if($sd[0]==$i){echo "selected=selected";}?>><? echo $i;?></option>
                              <? }
							}else{ ?>
                              <option value="" selected="selected">ปี</option>
                              <option value="2556">2556</option>
                              <option value="2557">2557</option>
                              <option value="2558">2558</option>
                              <option value="2559">2559</option>
                              <option value="2560">2560</option>
                              <? }?>
                            </select></td>
                          <td> </td>
                        </tr>
                        <tr>
                          <td align="right">ช่วงเวลาที่ใช้  </td>
                          <td align="left"><select name="StartTime" id="StartTime" onchange="getCouresData();">
                            <? 
						  if($id != ''){
						 		 $sTime = array('08:00','08:30','09:00','09:30','10:00','10:30','11:00','11:30','12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00');
						  		 for($i=0;$i<count($sTime);$i++){
								 	$ss="$sTime[$i]:00";
						  		?>
                            <option value="<? echo $sTime[$i];?>" <? if($st == $ss){echo "selected = selected";}?> ><? echo $sTime[$i];?></option>
                            <? }
							}else{?>
                            <option value="" selected="selected">--เวลา--</option>
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
                            ถึง    
                            <select name="EndTime" id="EndTime" onchange="getCouresData();">
                              <? 
						  if($id != ''){
						 		 $eTime = array('08:30','09:00','09:30','10:00','10:30','11:00','11:30','12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00','18:30');
						  		 for($i=0;$i<count($eTime);$i++){
								 		$sse="$eTime[$i]:00";
						  		?>
                              <option value="<? echo $eTime[$i];?>" <? if($et == $sse){echo "selected = selected";}?> ><? echo $eTime[$i];?></option>
                              <? }
							}else{?>
                              <option value="" selected="selected">--เวลา--</option>
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
                            </select></td><td><div id="chkTime" >
                            <label><font color="#FF0000">กรุณากดปุ่มตรวจสอบเวลา</font></label>
                          </div></td>
                        </tr>
                        <tr>
                          <td align="right">สถานที่นำไปใช้งาน  </td>
                          <td align="left"><input name="Location" id="Location" size="30" value="<? echo $Location;?>" /></td>
                          <td><table width="100" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td><input name="btChkTime" type="button" id="btChkTime"  onclick="chkEq();" value="ตรวจสอบเวลา"/></td>
                              <td></td>
                            </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td colspan="3"><div id="popup"></div></td>
                          </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td colspan="2">&nbsp;</td>
                          </tr>
                        <tr>
                          <td><p align="right">อุปกรณ์ที่ใช้</p></td>
                        </tr>
                        <tr><td></td>
                          <td><table width="180" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td align="left"><img src="img_forpage/LCD-Projector.jpg" width="100"/></td>
                            </tr>
                            <tr>
                              <td align="left"><input name="mat1" type="checkbox" id="mat1" value="เครื่องฉายโปรเจคเตอร์" />
                                เครื่องฉายโปรเจคเตอร์</td>
                            </tr>
                          </table>                          </td>
                          <td><table width="180" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td align="left"><img src="img_forpage/projector-screen.jpg" width="100"/></td>
                            </tr>
                            <tr>
                              <td align="left"><input name="mat5" type="checkbox" id="mat5" value=" ฉากรับภาพโปรเจค" />
                                ฉากรับภาพโปรเจคเตอร์ </td>
                            </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td> </td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td></td>
                          <td >&nbsp;</td>
                        </tr>
                        <tr>
                          <td bgcolor="#e0e0e0"><p align="right">ลงชื่อผู้จอง&nbsp;</p></td>
                          <td bgcolor="#e0e0e0">&nbsp;<input name="RsName" id="RsName" value="<? echo $RsName;?>" /></td>
                          <td bgcolor="#e0e0e0">
                              <table width="200" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td>&nbsp;เบอร์ต่อภายใน</td>
                                    <td><input name="TelNum" id="TelNum" value="<? echo $TelNum;?>" size="10" /></td>
                                  </tr>
                              </table>
                          </td>
                        </tr>
                        <tr>
                          <td bgcolor="#e0e0e0"><p align="right">อีเมล์ผู้จอง&nbsp;</p></td>
                          <td bgcolor="#e0e0e0">&nbsp;<input name="notiMail" id="notiMail" value="<? echo $notiMail;?>" /></td>
                          <td></td>
                        </tr>                         
                        <tr>
                          <td>&nbsp;</td>
                          <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                          <td> </td>
                          <td colspan="2">
                              <input name="<? if($id != ''){echo "Eq_up";}else echo "Eq";?>" type="submit" id="Eq" value="จองอุปกรณ์" />
                              <input type="reset" value="ยกเลิก" name="Submit2" />
                                                                
                                    <input type="hidden" name="id"  value="<? echo $EqId;?>"/></td>
                        </tr>
                      </table>
                                        </form>                    </td>
                  </tr>
                  
                  
                </table>
</body>
</html>