<?php
	// Include config file
	require_once "config.php";
	session_start();
	
	if(!empty($_POST['rating']) && !empty($_POST['review'])){
			$rating = trim($_POST['rating']);
			$review = trim($_POST['review']);
			
			// Prepare an insert statement
			$sql = "INSERT INTO reviews (r_id, p_id,id,username,rating,comment) VALUES (?,?,?,?,?,?)";
			
			if($stmt = mysqli_prepare($link, $sql)){
				// Bind variables to the prepared statement as parameters
				mysqli_stmt_bind_param($stmt, "ssssss",$param_reviewid , $param_productid, $param_userid, $param_username, $param_rating, $param_comment);

				// Set parameters
				$param_reviewid = 0;
				$param_productid = $_SESSION['pid'];
				$param_userid = $_SESSION['id'];
				$param_username = $_SESSION['username'];
				$param_rating = htmlspecialchars($rating); 
				$param_comment = htmlspecialchars($review);
				
				// Attempt to execute the prepared statement
				if(mysqli_stmt_execute($stmt)){
					// Redirect to product page
					header("location: product.php?pid=".$_SESSION['pid']."#reviews");
					
				} else{
					echo "Oops! Something went wrong. Please try again later.";
				}

				// Close statement
				mysqli_stmt_close($stmt);
			}			
		}
?>