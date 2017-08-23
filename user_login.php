<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="images/favicon.ico" REL="SHORTCUT ICON"/> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?
$id=$_POST[id];
$remove=$_POST[remove];
$pages=$_POST[pages];
//echo "#$page#$id##$remove";
include "config.php";
	$link = mysql_connect($host,$user,$pass)  or die ("<div align='center' > ไม่สามารถติดต่อฐานข้อมูลได้ </div>");
	mysql_select_db($dbname,$link) or die ("ชื่อฐานข้อมูลผิด");

				mysql_query("USE minimart; ");
				mysql_query("SET NAMES 'tis620'; ");
				if($pages ==Reser){

					$sql = "select  * from reserve where  RsId ='$id' and Rsname = '$Username' and TelNum ='$Password'  " or die("<div align='center' >ติดต่อฐานข้อมูลไมได้</div>");
					$url = "index.php?page=resv_room&id=$id'";
				}
				else if($pages ==Eq){
					$sql = "select  * from eq where  EqId ='$id' and Rsname = '$Username' and TelNum ='$Password'  " or die("<div align='center' >ติดต่อฐานข้อมูลไมได้</div>");
					$url = "index.php?page=resv_eq&id=$id'";
				}
				else if($remove==3){
						$sql = "select  * from reserve where  RsId ='$id' ";
						$url = "save.php?id=$id&&remove=$remove ";
				}
				else {
						$sql = "select  * from eq where  EqId ='$id' ";
						$url = "save.php?id=$id&&remove=$remove ";
				}
				//echo $sql;
				$result = mysql_query($sql) or die ("คิวรี่ไม่ได้");
				if( mysql_num_rows($result) != 0){
						echo"<META HTTP-EQUIV='REFRESH' CONTENT='1; URL=$url'>";
							
				}else{
					$Err = "<br><br><br><center><br><font color =red>User or Password  incorrect <br> Please audit again</center>";
					echo "$Err <META HTTP-EQUIV='REFRESH' CONTENT='0; URL=index.php?page=user_edit&user_edit.php?id=$id&pages=$page'> ";
				}
?>
</html>