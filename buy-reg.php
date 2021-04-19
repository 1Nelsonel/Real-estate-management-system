<?php
include 'protect.php';
include 'database.php';
$id = $_SESSION['id'];

$result = mysqli_query($con, "SELECT * FROM buyers WHERE id ='$id'") or die(mysqli_error($con));
$test = mysqli_fetch_array($result);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Pinhouse - booking property</title>
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
if (isset($_GET['id'])) {
    $id = $_REQUEST['id'];
    $sel = "SELECT * FROM houses WHERE id = $id";
    $rs = $con->query($sel);
    $rws = $rs->fetch_assoc();
    $id = $rws['id'];
    $location = $rws['location'];
}


?>

<div class="container">
    <div class="row">
        <div class="col-sm-7">

            <h3 size="50px;">Your Selections:</h3>

            <form method="post" action="buy.php?id=<?php echo $id ?>">

                <div class="form-group">
                    <label>Your name </label>
                    <input class="form-control" type="text" name="names" value="<?php echo $test ['names']; ?>"
                           readonly="readonly" required>
                </div>
                <div class="form-group">
                    <label>PropertyNumber: </label>
                    <input class="form-control" type="text" name="house" value="<?php echo $rws ['id']; ?>"
                           readonly="readonly" required>
                </div>

                <div class="form-group">
                    <label>Location: </label>
                    <input class="form-control" type="text" name="location" value="<?php echo $rws ['location']; ?>"
                           readonly="readonly" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="save" value="Submit">
                </div>
            </form>
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
