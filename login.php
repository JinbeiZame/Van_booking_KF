<?
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="images/favicon.ico" REL="SHORTCUT ICON"/> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>
</head>
<body>
<?
$logout=$_GET[logout];
if($Submit){
include "config.php";
	$link = mysql_connect($host,$user,$pass)  or die ("<div align='center' > �������ö�Դ��Ͱҹ�������� </div>");
	mysql_select_db($dbname,$link) or die ("���Ͱҹ�����żԴ");
	if($link){
				mysql_query("USE minimart; ");
				mysql_query("SET NAMES 'tis620'; ");
				$sql = "select  * from login where Username = '$Username' and Pass ='$Password'  " or die("<div align='center' >�Դ��Ͱҹ����������</div>");
				$result = mysql_query($sql) or die ("�����������");
				if( mysql_num_rows($result) != 0){
						$session_user = $Username;
						$session_name = mysql_result($result,0,"Name");
						session_register('session_user');//name
						session_register('session_name');//User

						echo"<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=index.php?page=admin'>";
							
				}else{
					$Err = "<br><br><br><center><img src='images/loader.gif' width='30' height='30'/><br><font color =red>User or Password  incorrect <br> Please audit again		</center>";
					echo ($Err);
						echo'<META HTTP-EQUIV="REFRESH" CONTENT="1; URL=javascript:history.back(1)">';
				}
		}
}
if($logout==1){
				Session_destroy(); 
		echo"<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=index.php?page=admin'>";
}
?>
</body>
</html>