<?php


if ( isset($_REQUEST["email"]) )
{
//Get our form data
    $names = $_REQUEST["names"]; //$_GET $_POST
    $email = $_REQUEST["email"];
    $phone = $_REQUEST["phone"];
    $message = $_REQUEST["message"];

    require_once 'database.php';


    $stmt = mysqli_prepare($con, "INSERT INTO `messages`(`names`, `email`, `phone`, `message`) VALUES (?,?,?,?)");
    //bind data
    mysqli_stmt_bind_param($stmt,"ssss", $names,$email,$phone,$message);
    mysqli_stmt_execute($stmt);

    setcookie("success!","message send successfully", time()+3);
    header("location:index.php");


    mysqli_close($con);//close the connection
}
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
<?php include 'home-nav.php'?>

<main id="main">
    <div class="container p-sm-2">
        <div class="row justify-content-center">
            <div class="col-sm-5">
                <h4>Contact us</h4>
                <?php include 'alert.php' ?>
                <form action="contact.php" method="post">

                    <div class="form-group">
                        <label>Names</label>
                        <input type="text" class="form-control" name="names" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>

                    <div class="form-group">
                        <label>Phone Number:</label>
                        <input type="tel" class="form-control" name="phone" required>
                    </div>

                    <div class="form-group">
                        <label>Message</label>
                        <textarea name="message" type="text" class="form-control" required >message here</textarea>

                    </div>

                    <button class="btn btn-success btn-block">Submit</button>

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
