<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: user.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, emailaddress, first_name, last_name, password, is_admin FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username,$emailaddress, $firstname, $lastname, $hashed_password, $is_admin);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["emailaddress"] = $emailaddress;
                            $_SESSION["first_name"] = $firstname;
                            $_SESSION["last_name"] = $lastname;
                            $_SESSION["is_admin"]= $is_admin;
                            // Redirect user to user page
                            if ($is_admin == TRUE) {
                                header("location: admin.php");
                              }
                              else  {
                                header("location: user.php");
                              }


                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>EighteenTech</title>
<meta charset="UTF-8">
  		<meta name="description" content="Technology reviews">
  		<meta name="keywords" content="appliances, tech, review, tv, mobile, headphone, laptop, phone">
  		<meta name="author" content="Nitin Ramesh">
 		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	</head>
	<body style="background-color: #f0f0f0">
	<div class="container">
	<div class="card" style=" position: fixed;
    top: 50%;
    left: 50%;
	min-width: 350px;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);">
		<a href="./index.php" class="float-left btn btn-outline-dark">Go Back</a>
		<article class="card-body">
		<a href="./signup.php" class="float-right btn btn-secondary">Sign up</a>
		<h4 class="card-title mb-4 mt-1">&nbsp;Sign in</h4>
    <?php
    if(!empty($login_err)){
        echo '<div class="alert alert-danger">' . $login_err . '</div>';
    }
    ?>
	 	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    		<div class="form-group">
    			<label>Username</label>
        		<input name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" placeholder="john312" type="text">
            <span class="invalid-feedback"><?php echo $username_err; ?></span>
    		</div> <!-- form-group// -->
    		<div class="form-group">
    			<a class="float-right" href="#">Forgot password?</a>
    			<label>Your password</label>
        		<input name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" placeholder="******" type="password">
            <span class="invalid-feedback"><?php echo $password_err; ?></span>
    		</div> <!-- form-group// -->
    		<div class="form-group">
        		<button type="submit" class="btn btn-primary btn-block"> Login  </button>
    		</div> <!-- form-group// -->
		</form>
		</article>
	</div></div>
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap-4.4.1.js"></script>
	</body>
</html>
