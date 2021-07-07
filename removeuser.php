<?php
// Include config file
require_once "config.php";
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if ($_SESSION["is_admin"] != true){
  header("location: user.php");
  exit;
}
if (!isset ($_GET['userid']) ) {
header("location: admin.php?page=userman");exit;
} else {
  $user_id = $_GET['userid'];
}

// query to get product info
$query = "select * from users where id=".$user_id;
$result = mysqli_query($link, $query);
$row_cnt = $result->num_rows;
if($row_cnt!=1) //go back if user not found
{
  echo "Oops! User not found. Please try again later.";
  exit;
}


  $update_stmt="DELETE FROM users WHERE id=".$user_id;



if ($link->query($update_stmt) === TRUE) {
  header("location: admin.php?page=userman");exit;
} else {
  echo "Error updating record: " . $conn->error;
}


?>
