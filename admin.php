<?php
// Initialize the session
session_start();

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
      <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/assets/php/";
      include($IPATH . "admin_sidenav.php"); ?>
      <!-- Admin SideNav -->
    </div>
    <div class="col-xl-9">
      <div class="tab-content">
        <div class="tab-pane fade <?php echo ($page == "admininfo" ? 'show active' : ''); ?>">
          <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/admin/";
          include($IPATH . "adminInfo.php"); ?>
          <!-- Admin info -->
        </div>
        <div class="tab-pane fade <?php echo ($page == "userman" ? 'show active' : ''); ?>">
          <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/admin/";
          include($IPATH . "adminUserManagement.php"); ?>
          <!-- Admin User Management -->
        </div>
        <div class="tab-pane fade <?php echo ($page == "themes" ? 'show active' : ''); ?>">Themes</div>
        <div class="tab-pane fade <?php echo ($page == "manageprod" ? 'show active' : ''); ?>">
          <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/admin/";
          include($IPATH . "adminProductManagement.php"); ?>
          <!-- Admin Product Management -->
        </div>
        <div class="tab-pane fade <?php echo ($page == "settings" ? 'show active' : ''); ?>">Settings</div>
        <div class="tab-pane fade <?php echo ($page == "carousel" ? 'show active' : ''); ?>">
          <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/admin/";
          include($IPATH . "carouselManagement.php"); ?>
        </div>
        <div class="tab-pane fade <?php echo ($page == "documentation" ? 'show active' : ''); ?>">
          <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/admin/";
          include($IPATH . "adminDocumentation.php"); ?>
          <!-- Admin Documentation -->
        </div>
      </div>
    </div>
  </div>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap-4.4.1.js"></script>
</body>

</html>