<?php
include 'protect.php';

include 'database.php';
$id = $_SESSION['id'];


$sql = mysqli_query($con,"SELECT * FROM admin WHERE id = '$id' ") or die(mysqli_error($con));
$selresult = mysqli_fetch_array($sql);
mysqli_close($con);//close the connection

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Pinhouse - Index</title>
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

    <div class="container p-sm-3">
        <div class="row justify-content-center">
            <div class="col-sm-5">

                <h3 class="text-success text-brand text-center">My profile</h3>

                <form action="admin-profile.php?id=<? $_SESSION['id']; ?>">
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" name="names" required class="form-control"  value="<?php echo $selresult['names']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Phone:</label>
                        <input type="tel" name="phone" required class="form-control" disabled value="<?php echo $selresult['phone']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" name="email" required class="form-control"disabled value="<?php echo $selresult['email']; ?>">
                    </div>



                </form>

            </div>
        </div>
    </div>

    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/tabledata/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            var t = $('#example').DataTable( {
                "columnDefs": [ {
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                } ],
                "order": [[ 1, 'asc' ]]
            } );

            t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();
        } );
    </script>

</main>
<?php include 'footer.php' ?>
<!--Vendor JS Files-->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/vendor/scrollreveal/scrollreveal.min.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>