<?php

include 'protect.php';
require 'database.php';
$id = $_SESSION['id'];
$result = mysqli_query($con, "SELECT * FROM buyers WHERE id ='$id'") or die(mysqli_error($conn));
$test = mysqli_fetch_array($result);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Pinhouse - property details</title>
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

<?php include 'nav.php' ?>


<?php

include 'database.php';
$id = $_SESSION['id'];
$sel = "SELECT * FROM houses WHERE id = '$_GET[id]'";
$rs = $con->query($sel);
$rws = $rs->fetch_assoc();
$id = $rws['id'];
$status = $rws['status'];
$title = $rws['title'];
$location = $rws['location'];

?>

<div class="container mt-sm-3">
    <div class="row">
        <div class="col-sm-5">

            <div class="card">

                <div class="list-inline">
                    <a href="buy-reg.php?id=<?php echo $rws['id']?>">
                        <img class=" img" src="<?= $rws['picture']; ?>" width="440"
                             height="300" alt="">

                        <div class="card-body">
                            <p class="card-title"><font class="font-weight-bold" color="teal">Property Name: </font>
                                <span
                                    class=""> <?= $rws["title"] ?></span></p>
                            <p class="card-text"><font class="font-weight-bold" color="teal">Location: </font> <span
                                    class=""> <?= $rws["location"] ?></span></p>
                            <p class="card-text"><font class="font-weight-bold" color="teal">Description: </font> <span
                                    class=""> <?= $rws["description"] ?></span></p>
                            <p class="card-text"><font class="font-weight-bold" color="teal">Price: </font> <span
                                    class=""><?= $rws["price"] ?> </span></p>
                            <p>
                                <button class="btn btn-success"><a href="buy-reg.php?id=<?php echo $rws['id']?>">Buy property</a></button>
                            </p>

                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'footer.php' ?>
<!--Vendor JS Files-->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/vendor/scrollreveal/scrollreveal.min.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
