<?php
include("config.php");
//make query get result
$select = "SELECT THEMENAME FROM theme where id = '1'";
$result = mysqli_query($link, $select);
//fetch the result
$themefile_object = mysqli_fetch_all($result, MYSQLI_ASSOC);
foreach($themefile_object as $value){
  $themefile_name = $value["THEMENAME"];
  console_log("Testing: $themefile_name");
}
//free result from memory
mysqli_free_result($result);

function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
  }

?>