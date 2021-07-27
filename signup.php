<?php
// Include config file
require_once "config.php";
include("getDB.php");

// Define variables and initialize with empty values
$firstname = $lastname = $emailaddress = $username = $password = $confirm_password = "";
$firstname_err = $lastname_err = $emailaddress_err = $username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

  //validate first name
  if(empty(trim($_POST["firstname"]))){
      $firstname_err = "Please enter a first name.";
  } elseif(!preg_match('/^[a-zA-Z]+$/', trim($_POST["firstname"]))){
      $firstname_err = "First name can only contain letters. ";
  } else{
      $firstname = trim($_POST["firstname"]);
  }

  //validate last name
  if(empty(trim($_POST["lastname"]))){
      $lastname_err = "Please enter a last name.";
  } elseif(!preg_match('/^[a-zA-Z]+$/', trim($_POST["lastname"]))){
      $lastname_err = "Last name can only contain letters. ";
  } else{
    $lastname = trim($_POST["lastname"]);
  }

  //validate email address
  if(empty(trim($_POST["emailaddress"]))){
      $emailaddress_err = "Please enter an email address.";
  } elseif(!filter_var(trim($_POST["emailaddress"]), FILTER_VALIDATE_EMAIL)){
      $emailaddress_err = "Invalid email address. ";
  } else{
    // Prepare a select statement
    $sql = "SELECT id FROM users WHERE emailaddress = ?";

    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_emailaddress);

        // Set parameters
        $param_emailaddress = trim($_POST["emailaddress"]);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            /* store result */
            mysqli_stmt_store_result($stmt);

            if(mysqli_stmt_num_rows($stmt) == 1){
                $emailaddress_err = "This email address is already being used.";
            } else{
                $emailaddress = trim($_POST["emailaddress"]);
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
  }





    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if(empty($firstname_err) && empty($lastname_err) && empty($emailaddress_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO users (username,emailaddress, first_name, last_name, password, is_admin) VALUES (?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_username, $param_emailaddress, $param_firstname, $param_lastname, $param_password, $param_isadmin);

            // Set parameters
            $param_firstname= $firstname;
            $param_lastname= $lastname;
            $param_emailaddress= $emailaddress;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_isadmin = 0;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
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
        <link id="ThemeStyle" rel="stylesheet" href="./css/<?= $themefile_name?>.css">
    </head>
	<body style="background-color: #f0f0f0" >
	<div class="container">
	<div class="card" style=" position: fixed;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);">
		<a href="./login.php" class="float-left btn btn-outline-dark">Go Back</a>
		<article class="card-body">

		<h4 class="card-title mb-4 mt-1">&nbsp;Sign up</h4>
	 	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<div class="row">
    			<div class="col">
      				<div class="form-group">
    					<label>First name</label>
              <input type="text" name="firstname" class="form-control <?php echo (!empty($firstname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $firstname; ?>">
              <span class="invalid-feedback"><?php echo $firstname_err; ?></span>
    				</div> <!-- form-group// -->
    			</div>
    			<div class="col">
      				<div class="form-group">
    					<label>Last name</label>
              <input type="text" name="lastname" class="form-control <?php echo (!empty($lastname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $lastname; ?>">
              <span class="invalid-feedback"><?php echo $lastname_err; ?></span>
    				</div> <!-- form-group// -->
    			</div>
  			</div>
    		<div class="form-group">
    			<label>Your email</label>
        		<input name="emailaddress" class="form-control <?php echo (!empty($emailaddress_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $emailaddress; ?>" placeholder="Email" type="email">
            <span class="invalid-feedback"><?php echo $emailaddress_err; ?></span>
    		</div> <!-- form-group// -->
    		<div class="form-group">
    					<label>Username</label>
        				<input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
    				</div> <!-- form-group// -->
			<div class="row">
    			<div class="col">
      				<div class="form-group">
    					<label>Your password</label>
              <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
              <span class="invalid-feedback"><?php echo $password_err; ?></span>
    				</div> <!-- form-group// -->
    			</div>
    			<div class="col">
      				<div class="form-group">
    					<label>Re-enter your password</label>
              <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
              <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
    				</div> <!-- form-group// -->
    			</div>
  			</div>

    		<div class="form-group">
        		<button type="submit" class="btn btn-primary btn-block"> Register  </button>
    		</div> <!-- form-group// -->
		</form>
		</article>
	</div></div>
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap-4.4.1.js"></script>
	</body>
</html>
