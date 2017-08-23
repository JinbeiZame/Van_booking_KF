<div class="header">
		        <div class="header-top">
			        <div class="container">
						<div class="logo">
							<img src="images/lgoKnightFrank.gif">
						</div>
                        <div class="search"></div>
                        <div class="social" align="center"><h2><b>Van Reservation</b></h2></div>
						<div class="clearfix"></div>
					</div>
				</div>
			
<!--head-bottom-->
<div class="head-bottom">
      <div class="container">
      	<div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li <?php if($page == ""){ ?>class="active"<? } ?>><a href="index.php">Home</a></li>
			<li <?php if($page == "reserves"){ ?>class="active"<? } ?>><a href="index.php?page=reserves">Van Reservation</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Van Status <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li <?php if($page == "chk_resv")echo "class='active'"; ?>><a href="index.php?page=chk_resv">Table Style</a></li>
				<li <?php if($page == "calendar")echo "class='active'"; ?>><a href="index.php?page=calendar">Calendar Style</a></li>
              </ul>
            </li>
			<li <?php if($page == "result_resv"){ ?>class="active"<? } ?>><a href="index.php?page=result_resv">Result</a></li>
			<!-- <li><a href="http://10.0.0.233/it-reservations/" target="_blank">Notebook Reservation</a></li> -->
			<li <?php if($page == "admin"){ ?>class="active"<? } ?>><a href="index.php?page=admin">Admin</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
</div>
<!--head-bottom-->
</div>