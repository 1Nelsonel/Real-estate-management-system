<?php
include 'protect.php';

if ( isset($_REQUEST["title"]) )
{
    //Get our form data
    $title = $_REQUEST["title"]; //$_GET $_POST
    $location = $_REQUEST["location"];
    $description = $_REQUEST["description"];
    $price = $_REQUEST["price"];//
    $target_dir = "uploads/";
    $target_file = $target_dir .rand(1000000,10000000). basename($_FILES["picture"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed_types = ["png", "jpeg", "jpg", "gif","svg"];
    $allowed = in_array($imageFileType, $allowed_types);
    if ($allowed and move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
        $status = 1;
    } else {
        $status = 2;
    }
    require_once 'database.php';

    $stmt = mysqli_prepare($con , "INSERT INTO `houses`(`title`, `location`,`description`,`picture`,`price`) 
                                    VALUES (?,?,?,?,?)");
    //bind data
    mysqli_stmt_bind_param($stmt, "ssssi", $title, $location, $description, $target_file, $price);
    mysqli_stmt_execute($stmt);

    mysqli_close($con);//close the connection
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Pinhouse - Add property</title>
    <!-- Google Fonts -->
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/tabledata/jquery.dataTables.min.css">

    <!--  custom styles-->
    <link href="assets/css/style.css" rel="stylesheet">

</head>
<body>
<!--header and nav-->
<?php include 'admin-nav.php'?>

<main id="main">
    <div class="container mt-sm-2">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-md-5">
                <h4>New Property</h4>
                <form action="add-property.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>

                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control" name="location" required>
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" accept="*/*" max-size="2024" class="form-control-file border" name="picture" required>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description"  class="form-control"></textarea>
                    </div>


                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" name="price" required>
                    </div>

                    <button class="btn btn-success btn-block">Add Property</button>

                </form>
            </div>
        </div>
    </div>

</main>
<?php include 'footer.php' ?>
<!--Vendor JS Files-->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/vendor/scrollreveal/scrollreveal.min.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
