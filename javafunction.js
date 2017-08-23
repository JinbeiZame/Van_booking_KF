// JavaScript Document
function deletedata() {
	check=false;
	for (var i=0;i < document.process.elements.length;i++)		{
		var e = document.process.elements[i];
		if (e.type == "checkbox")			{
				if(e.checked==true) {	check=true;	}
		}
	}
	if(check==false) { 
		alert("Please select checkbox.");
		return false;
	}
	if (confirm("Would you like to delete this record?")) {
		return true;
	}
	else {
		return false;
	}   
}

var newWind;
function newWindows(id){
		newWind = window.open("show_room.php?RsId="+id,"subwindows","height=250,width=610;scrollbars=yes");
}

function neweq(id){
		newWind = window.open("show_eq.php?EqId="+id,"subwindows","height=220,width=610;scrollbars=yes");
}

function newShow(iday,dmonth,year){
	if(!newWind || newWind.close){
		newWind = window.open("show_reserves.php?d="+iday+"&m="+dmonth+"&y="+year,"subwindows","height=250,width=680;scrollbars=yes");
		//newWind.moveTo((screen.width/2)-200,(screen.height/2)-200);
		}else{
			newWind.focus();
	}
}

function closeIt() {
	  			self.window.close();
			}
			function setfocus(courses){
				self.window.focus();
				for(a=0;a<document.addit.courses.options.length;a++){
					if(document.addit.courses.options[a].value==courses){
						document.addit.courses.options[a].selected=true;
				}
			}
}

function deletedata() {
	check=false;
	for (var i=0;i < document.process.elements.length;i++)		{
		var e = document.process.elements[i];
		if (e.type == "checkbox")			{
				if(e.checked==true) {	check=true;	}
		}
	}
	if(check==false) { 
		alert("Please select checkbox.");
		return false;
	}
	if (confirm("Would you like to delete this record?")) {
		return true;
	}
	else {
		return false;
	}   
}
function MouseOut(where){
		//if(!where.contains(event.toElement)){
			//where.style.cursor='default';
			where.bgColor="#FFFFCC";
			//}
}
function Mouse_in(where){ 
		where.bgColor="#FFCC00";
}

function Chk_Reser(){
	Group = document.getElementsByName('Group')[0].value;
	Story = document.getElementsByName('Story')[0].value;	
	MeetTotal = document.getElementsByName('MeetTotal')[0].value;	
	day = document.getElementsByName('day')[0].value;
	kwm = document.getElementsByName('kwm')[0].value;
	year = document.getElementsByName('year')[0].value;
	StartTime = document.getElementsByName('StartTime')[0].value;
	EndTime = document.getElementsByName('EndTime')[0].value;
	RsName = document.getElementsByName('RsName')[0].value;
	TelNum = document.getElementsByName('TelNum')[0].value;
	notiMail = document.getElementsByName('notiMail')[0].value;
	if((Group&&Story&&MeetTotal&&day&&kwm&&year&&StartTime&&EndTime&&RsName&&TelNum&&notiMail) == ''){
		alert("คุณยังกรอกข้อมูลไม่ครบ...\nกรุณาตรวจสอบอีกครั้ง...");
		return false;
	}
	else{
		return true;	
	}
}
function check_number() {
	e_k=event.keyCode
//if (((e_k < 48) || (e_k > 57)) && e_k != 46 ) {
	if (e_k != 13 && (e_k < 48) || (e_k > 57)) {
		event.returnValue = false;
		alert("ต้องเป็นตัวเลขเท่านั้น... \nกรุณาตรวจสอบข้อมูลของท่านอีกครั้ง..");
	}
} 

function Chk_eq(){
	Group = document.getElementsByName('Group')[0].value;
	day = document.getElementsByName('day')[0].value;
	kwm = document.getElementsByName('kwm')[0].value;
	year = document.getElementsByName('year')[0].value;
	eday = document.getElementsByName('eday')[0].value;
	ekwm = document.getElementsByName('ekwm')[0].value;
	eyear = document.getElementsByName('eyear')[0].value;
	StartTime = document.getElementsByName('StartTime')[0].value;
	EndTime = document.getElementsByName('EndTime')[0].value;
	RsName = document.getElementsByName('RsName')[0].value;
	TelNum = document.getElementsByName('TelNum')[0].value;
	notiMail = document.getElementsByName('notiMail')[0].value;	
	if((Group&&day&&kwm&&year&&eday&&ekwm&&eyear&&StartTime&&EndTime&&RsName&&TelNum&&notiMail) == ''){
		alert("คุณยังกรอกข้อมูลไม่ครบ...\nกรุณาตรวจสอบอีกครั้ง...");
		return false;
	}
	else{
		return true;	
	}
}