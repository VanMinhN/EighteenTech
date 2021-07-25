<?php

	// Include config file
	require_once "config.php";
	
	echo'
	<style>
		/* Base setup */
		@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
		@import url(//pro.fontawesome.com/releases/v5.15.0/css/all.css);
		
		/* Ratings widget */
		.rate {
			display: inline-block;
			border: 0;color: #777777;
		}
		/* Hide radio */
		.rate > input {
			display: none;
		}
		/* Order correctly by floating highest to the right */
		.rate > label {
			float: right;
		}
		/* The star of the show */
		.rate > label:before {
			display: inline-block;
			font-size: 2rem;
			padding: .3rem .2rem;
			margin: 0;
			cursor: pointer;
			font-family: FontAwesome;
			content: "\f005 "; /* full star */
			
		}

		/* Half star trick */
		.rate .half:before {
			content: "\f089 "; /* half star no outline */
			position: absolute;
			padding-right: 0;
		}
		/* Click + hover color */
		input:checked ~ label, /* color current and previous stars on checked */
		label:hover, label:hover ~ label { color: #58d090;  } /* color previous stars on hover */

		/* Hover highlights */
		input:checked + label:hover, input:checked ~ label:hover, /* highlight current and previous stars */
		input:checked ~ label:hover ~ label, /* highlight previous selected stars for new rating */
		label:hover ~ input:checked ~ label /* highlight previous selected stars */ { color: #25a087;  } 	
	</style>
	';
	echo '<title>EighteenTech: '.$row["p_name"].'</title>';
    echo '  <!-- Bootstrap -->
		   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		 </head>
		 <body>
		  <div>';
    $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/php/"; include($IPATH."navbar.php");
    echo '</div>
	<!-- body code goes here -->
    <div class="container" style="margin-top:100px">
		<div style="margin:20px">
			<button type="button" onclick="window.history.back();" class="btn btn-secondary">Go Back</button>
		</div>
	
';
	
	$pid = $_SESSION['pid'];
	
	$query = "select * from reviews where p_id=".($pid)." ORDER BY post_time;";
	$result = mysqli_query($link, $query);
	$review_cnt = $result->num_rows;
	//call and print all forms from database
	if ($result && ($review_cnt>0)){
		while($row = mysqli_fetch_assoc($result)){
			$StarNum = $row['rating']/2;
			
			echo"<hr><div id='comment'>";
			echo'		<p id="stars">';
			for($num=0;$num<$StarNum;$num++){
				if ($StarNum-$num == 0.5){
					echo'<i style="color:#58d090;" class="fas fa-star-half"></i>';
					
				}
				else{
					echo'<i style="color:#58d090;" class="fas fa-star"></i>';
				}					
			}
			echo'</p>';
			echo'		<p><b>'.($row['username']).'</b> at '.($row['post_time']).'</p>';
			echo'		<p>&nbsp&nbsp&nbsp&nbsp&nbsp'.($row['comment']).'</p>';
			echo"</div>";
		}
	}
	else{
		echo "<p>There are no Reviews on this product..</p>";
	}
	
	
	
?>