<?php


// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if ($_SESSION["is_admin"] != true){
  header("location: user.php");
  exit;
}
if (!isset ($_GET['page']) ) {
  $adminpage = "admininfo";
} else {
  $adminpage = $_GET['page'];
  if($adminpage!="admininfo" && $adminpage!="userman" && $adminpage!="themes"  && $adminpage!="carousel" && $adminpage!="manageprod" && $adminpage!="settings"){
    header("location: admin.php");
  }
}

?>
<div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action <?php echo ($adminpage == "admininfo"? 'active':''); ?>"  href="./admin.php?page=admininfo" role="tab">Home</a>
      <a class="list-group-item list-group-item-action <?php echo ($adminpage == "userman"? 'active':''); ?>"  href="./admin.php?page=userman" role="tab">Users</a>
      <a class="list-group-item list-group-item-action <?php echo ($adminpage == "themes"? 'active':''); ?>"  href="./admin.php?page=themes" role="tab">Themes</a>
      <a class="list-group-item list-group-item-action <?php echo ($adminpage == "carousel"? 'active':''); ?>"  href="./admin.php?page=carousel" role="tab">Carousel</a>
      <a class="list-group-item list-group-item-action <?php echo ($adminpage == "manageprod"? 'active':''); ?>"  href="./admin.php?page=manageprod" role="tab">Products</a>
      <div class="dropdown-divider"></div>
      <a class="list-group-item list-group-item-action <?php echo ($adminpage == "settings"? 'active':''); ?>" href="./admin.php?page=settings" role="tab">Settings</a>
    </div>
