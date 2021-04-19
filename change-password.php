<?php
include 'protect.php';
include 'database.php';
$id =$_SESSION['id'];



$result = mysqli_query($con,"SELECT * FROM buyers WHERE id ='$id'")or die(mysqli_error($con));
$test = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Pinhouse - contact</title>
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
<?php include 'nav.php'?>

<main id="main">
    <div class="container p-sm-2 mt-sm-3">
        <div class="row justify-content-center">
            <div class="col-sm-5">
                <h4>Change Password</h4>
                <?php include 'alert.php' ?>

                <form method="post" action="password11.php?id=<?php echo $test['id']; ?>">

                    <div class="form-group">
                        <label>Old password</label>
                        <input class="form-control" type="password" name="opass" required>
                    </div>
                    <div class="form-group">
                        <label>New password</label>
                        <input type="password" class="form-control" name="npass" required>
                    </div>
                    <div class="form-group">
                        <label>Confirm password</label>
                        <input type="password" class="form-control" name="cpass">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" name="change" value="Change">
                    </div>
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