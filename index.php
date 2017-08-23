<?php 
@session_start();
$page = $_GET[page]; 
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Van Reservation</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="images/favicon.ico" REL="SHORTCUT ICON"/> 
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />	
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
</head>
<body>
	<!--start-main-->
 <?php include("header.php");?>

<!-- technology -->
<div class="technology-1">
	<div class="container">
    <div class="business">
    <!-- Start Content -->
<?php

				//*************** Main Menu Section ***************//	
										
						if($page == "") {
							// include ("_index.php");		
							include ("result_reserves.php");	
						
						} else if($page == "reserves") {
							
							include ("reserves.php");									
							
						} else if($page == "resv_room") {
							
							include ("reserves.php");
							
						} else if($page == "resv_eq") {
							
							include ("Reserves_Eq.php");
							
						} else if($page == "result_resv") {
							
							include ("result_reserves.php");

						} else if($page == "chk_resv") {
							
							include ("Chk_reserves.php");

						} else if($page == "chk_eq") {
							
							include ("ChkEq.php");

						} else if($page == "user_edit") {
							
							include ("user_edit.php");					

						} else if($page == "admin") {
							
							include ("admin_approve.php");

						} else if($page == "calendar") {
							
							include ("calendar.php");

						}
				
				
				
				?>

    <!-- End Content -->
    </div>
	</div>
</div>
<!-- technology -->

<?php include("footer.php"); ?>	

</body>
</html>