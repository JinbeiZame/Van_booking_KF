<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<script language="JavaScript" SRC="javafunction.js"></Script>
<link rel="stylesheet" href="css.css" type="text/css" />
<title>จองห้องประชุม</title>
</head>
<?
function d(){			
					$today_date = date(" d-m-y");
					$thai_w = array("อาทิตย์"," จันทร์"," อังคาร"," พุธ"," พฤหัสบดี"," ศุกร์"," เสาร์");
					$thai_m = array(" มกราคม"," กุมภาพันธ์"," มีนาคม","เมษายน "," พฤษภาคม"," มิถุนายน"," กรกฎาคม"," สิงหาคม"," กันยายน"," ตุลาคม"," พฤศจิกายน"," ธันวาคม");
					$w = $thai_w[ date(" w " ) - 0]; 
					$d = date("j" ) ;
					$n=$thai_m[date("n") - 1];
					$y=date("Y") + 543;
						echo "<font color=red size=2px>วัน$w ที่ $d $n พ.ศ. $y ";
			}
?>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left"><table width="759" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="27" align="center" background="images/h1.gif"><table width="560" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left"><? d();?></td>
            <td align="left" background="admin_approve.php"><a href="index.php">Home</a>|<a href="admin_approve.php">Admin</a></td>
            <td width="25%">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><img src="images/h2.gif" width="800" height="122" /></td>
      </tr>
      <tr>
        <td background="images/tt2.gif"><img src="images/tt2.gif" height="11" /></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>