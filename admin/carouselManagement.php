<?php
session_start();
// Include config file
require_once "config.php";
$msg = '';
if (isset($_POST['upload'])) {
    $imagelink = $_POST['image'];
    //counting the number of rows 
    $len = $link->query("SELECT COUNT(c_image) FROM carousel");
    $row = mysqli_fetch_array($len);
    $total = $row[0];
    //regex pattern for valid links for images
    $pattern = "/(https?:\/\/.*\.(?:png|jpg))/i";
    //checking if the link is valid
    if (preg_match($pattern, $imagelink)) {
        if ((int)$total < 6) {
            //inserting into sql database 
            $sql = $link->query("INSERT INTO carousel (c_image) VALUES ('$imagelink')");

            if ($sql) {
                $msg = 'Success';
            } else {
                $msg = 'Unsuccessful';
            }
        } else {
            $msg = "Max length of 6 is reached";
        }
    } else {
        $msg = "Enter a valid link to an image (png, jpg)";
    }
}
?>
<div class="container">
    <h2>Carousel management</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input class="form-control" type="text" name="image" placeholder="Enter a valid link for an image (png/jpg)" required>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-secondary" name="upload" value="Upload Image">
        </div>
        <div class="form-group">
            <h5><?= $msg; ?> </h5>
        </div>
    </form>
    <hr>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Initialize the session

            //retrieve the selected results from database
            $query = "SELECT c_id, c_image FROM carousel";
            $result = mysqli_query($link, $query);

            //display the retrieved result on the webpage
            while ($row = mysqli_fetch_array($result)) {
                echo '<tr>
              <th scope="row">' . $row['c_id'] . '</th>
              <td><img src="' . $row['c_image'] . '" width="25px"></td>';
                echo '<td>
                      <div class="dropdown">
                        <button type="button" class="btn btn-default" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i style="font-size:20px;" class="fa fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="/admin/removeitem.php?userid=' . $row['c_id'] . '">Delete item</a>
                        </div>
                      </div>
                      </td>';
                echo '</tr>';
            }

            ?>
        </tbody>
    </table>
</div>