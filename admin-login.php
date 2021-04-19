<?php
if  (isset($_REQUEST["email"]))
{
    $email = $_REQUEST["email"];
    $password = $_REQUEST["password"];

    include 'database.php';

    $stmt = mysqli_prepare($con, "SELECT * FROM admin WHERE email=? LIMIT 1");
    mysqli_stmt_bind_param($stmt,"s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) == 1)

    {
        $users = mysqli_fetch_assoc($result);
        $hash = $users["password"];
        if (password_verify($password, $hash))
        {
            //success
            session_start();
            $_SESSION["names"] = $users["names"];
            //store users data in a session
            $_SESSION["id"]= $users["id"];
            //redirect to home page
            header("location:admin-home.php");
        }else{
            //failed
            setcookie("error","Invalid login credentials", time()+3);
            header("location:admin-login.php");
        }

    }
    else{
        //failed
        setcookie("error","Invalid login credentials", time()+3);
        header("location:admin-login.php");
    }

    mysqli_close($con);
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pinhouse Admin login</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/tabledata/jquery.dataTables.min.css">

    <!--  custom styles-->
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<!--include header to the index file-->
<?php include 'home-nav.php' ?>

<!--include login form-->
<div class="container shadow p-sm-5 m-5">
    <div class="row justify-content-center">
        <div class="col-sm-6">


            <?php include 'alert.php' ?>

            <form action="admin-login.php" method="post">
                <h4 class="text-success text-center text-brand">Admin login</h4>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="email" class="form-control required">
                </div>
                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-success btn-block">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--include the footer-->
<?php include 'footer.php'  ?>

</body>
</html>