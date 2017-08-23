<?
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="JavaScript" SRC="javafunction.js"></Script>

<title>จองอุปกรณ์</title>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center"><form id="form1" name="form1" method="post" action="user_login.php">
					
				<? 
					$id=$_GET[id];
					$pagess=$_GET[pages];
					$remove=$_GET[remove];
					//echo "###$remove";
					?>
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                      <table width="200" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
                          <tr>
                            <td height="20" align="left">&nbsp;<strong>User Confirm</strong> </td>
                          </tr>
                          <tr>
                            <td><table width="200" border="0" cellspacing="1" cellpadding="1">
                                <tr>
                                  <td bgcolor="#FFFFCC">Username</td>
                                  <td bgcolor="#FFFFCC"><input name="Username" type="text" id="Username" /></td>
                                </tr>
                                <tr>
                                  <td bgcolor="#FFFFCC">Password</td>
                                  <td bgcolor="#FFFFCC"><input name="Password" type="password" id="Password" /></td>
                                </tr>
                                <tr>
                                  <td bgcolor="#FFFFCC">&nbsp;</td>
                                  <td align="left" bgcolor="#FFFFCC"><input type="submit" name="Submit" value="Login" />
                                      <input type="reset" name="Submit2" value="cancel" />
									  </td>
                                </tr>
                            </table></td>
                          </tr>
                        </table>
                      
                      <p>&nbsp;		   </p>
                      <p>&nbsp;</p>
                      <p>
                        <input name="id" type="hidden"  id="id" value="<? echo $id;?>" />
                        <input name="page" type="hidden" id='page' value="<? echo $pages;?>" />
						 <input name="remove" type="hidden" id='remove' value="<? echo $remove;?>" />
                      </p>
                      </form></td>
                  </tr>
                  <tr>
                    <td></td>
                  </tr>
                  
                </table>
</body>
</html>