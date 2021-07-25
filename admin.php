<?php
include("config.php");
// Initialize the session
session_start();
/*if(!isset($_SESSION["ThemeStyle"])){
  $saveT = "default";
  $_SESSION["ThemeStyle"] = $saveT;

}

// A theme has been select to save
if(isset($_POST["ThemeMode"])){
  $saveT = $_POST["ThemeMode"];
  $_SESSION["ThemeStyle"] = $saveT;

}*/



//a theme has been selected to save(Update SQL in order to get the value)
if(isset($_POST["ThemeMode"])){
  $saveT = $_POST["ThemeMode"];
  //$theme = mysqli_real_escape_string($link, $saveT);
  $query = "UPDATE theme SET THEMENAME = '$saveT' where id ='1'"; //create sql
  if(mysqli_query($link,$query)){
    console_log("Success updating the Theme");
  }else{
    console_log("query error". mysqli_error($link));
  }
}
//make query get result
$select = "SELECT THEMENAME FROM theme where id = '1'";
$result = mysqli_query($link, $select);
//fetch the result
$themefile_object = mysqli_fetch_all($result, MYSQLI_ASSOC);
//free result from memory
mysqli_free_result($result);
//close connection

foreach($themefile_object as $value){
  $themefile_name = $value["THEMENAME"];
  console_log("Testing: $themefile_name");
}

console_log("Testing to see if themefile_name variable is global: $themefile_name");
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: login.php");
  exit;
}
if ($_SESSION["is_admin"] != true) {
  header("location: user.php");
  exit;
}
if (!isset($_GET['page'])) {
  $page = "admininfo";
} else {
  $page = $_GET['page'];
}

function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}
//console_log($_SESSION["ThemeStyle"]); //testing to see if the global variable has the correct value

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
      <link rel="shortcut icon" href="./images/favicon.ico">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link id="ThemeStyle" rel="stylesheet" href="./css/<?= $themefile_name?>.css">
      

</head>

<body>
  <div>
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/assets/php/";
    include($IPATH . "navbar.php"); ?>
    <!-- Navbar -->
  </div>
  <!--
 -->
  <div class="row" style="margin-top:100px">

	  <div class="col-xl-3">
		  <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/php/"; include($IPATH."admin_sidenav.php"); ?> <!-- Admin SideNav -->
	  </div>
	  <div class="col-xl-9">
		  <div class="tab-content">
      		<div class="tab-pane fade <?php echo ($page == "admininfo"? 'show active':''); ?>">
		  		      <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/admin/"; include($IPATH."adminInfo.php"); ?> <!-- Admin info -->
			    </div>
          <div class="tab-pane fade <?php echo ($page == "userman"? 'show active':''); ?>">
            <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/admin/"; include($IPATH."adminUserManagement.php"); ?> <!-- Admin User Management -->
          </div>
          <div class="tab-pane fade <?php echo ($page == "themes"? 'show active':''); ?>">Themes
            <form action="./admin.php" method="post">
              <select name="ThemeMode" id="ThemeMode">
                <option value="default" <?= $themefile_name === "default"? "selected": ""?>>Default</option>
                <option value="halloween"<?= $themefile_name === "halloween"? "selected": ""?>>Halloween</option>
                <option value="christmas"<?= $themefile_name === "christmas"? "selected": ""?>>Christmas</option>
              </select>        
              <input type ="submit" value="Save Theme">
            </form>
            <script type="text/javascript" src="./js/theme.js"></script>
          </div>
          <div class="tab-pane fade <?php echo ($page == "manageprod"? 'show active':''); ?>">
            <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/admin/"; include($IPATH."adminProductManagement.php"); ?> <!-- Admin Product Management -->
          </div>
		      <div class="tab-pane fade <?php echo ($page == "settings"? 'show active':''); ?>">Settings</div>
		      <div class="tab-pane fade <?php echo ($page == "carousel"? 'show active':''); ?>">Carousel content</div>
          <div class="tab-pane fade <?php echo ($page == "documentation"? 'show active':''); ?>">
              <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/admin/"; include($IPATH."adminDocumentation.php"); ?> <!-- Admin Documentation -->
          </div>
    </div>
	  </div>
</div>
   <script src="js/jquery-3.4.1.min.js"></script>

  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap-4.4.1.js"></script>

</body>

</html>
