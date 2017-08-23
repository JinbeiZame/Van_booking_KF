<?php

    $conn = mysql_connect("10.0.0.251", "root", "wvmu123")  or die(mysql_error());
    mysql_select_db("personal", $conn) or die(mysql_error());
    $q = strtolower($_GET["term"]);

	$return = array();
    $query = mysql_query("select DISTINCT(Email) from personal where Email like '%$q%'") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
		$row['Email'] = str_replace("[at]", "@", $row['Email']);
		$row['Email'] = strtolower($row['Email']);
    	array_push($return,array('label'=>$row['Email'],'value'=>$row['Email']));
	}
	echo(json_encode($return));

?>


