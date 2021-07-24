<script>
	window.onload = function () {
		var current_page=window.location.pathname;
		if(current_page === "/aboutus.php")
		{
			console.log("aboutus");
			document.getElementById("nav_aboutus").className = "nav-link active";
			console.log("done");
		}
		if(current_page === "/categories.php")
		{
			console.log("categories");
			document.getElementById("nav_categories").className = "nav-link active";
			console.log("done");
		}
	}
};

</script>
<!-- Navbar for Home page -->

	<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="./index.php">
			<img src="../../images/horizontal-logo.png" style="width: 250px">
		</a>
	  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent1">
		 	<ul class="navbar-nav mr-auto">
		      <li class="nav-item" > <a class="nav-link" id="nav_aboutus" href="./aboutus.php">About us</a> </li>
		      <li class="nav-item" > <a class="nav-link" id="nav_categories" href="./categories.php">Categories</a> </li>

	        </ul>

		    <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
		      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="query" required >
		      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Search">Search</button>
	        </form>&nbsp;&nbsp;
					<div id="loginButton">
					<?php
					// Initialize the session
					session_start();

					// shows username if logged in, otherwise shows login button
					if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
					    echo '<a href="./login.php"><button class="btn btn-outline-dark my-2 my-sm-0">Login/Signup</button></a>';

					}
					else{
						echo '<div class="dropdown">
  									<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.htmlspecialchars($_SESSION["username"]).'</button>
  									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
    									<a class="dropdown-item" href="./user.php">View profile</a>
    									<a class="dropdown-item" href="./logout.php">Log out</a>
  									</div>
									</div>';
					}
					?>
				</div>
      </div>
    </nav>

<!-- End of navbar -->
