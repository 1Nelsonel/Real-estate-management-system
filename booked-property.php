<?php
include 'protect.php';
require 'database.php';
$sql = "SELECT * FROM houses where status='booked'";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));// executing the query
$rows = mysqli_fetch_all($result, 1);//assoc array
mysqli_close($con);//close the connection
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Pinhouse - property</title>
    <!-- Google Fonts -->
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/tabledata/jquery.dataTables.min.css">

    <!--  custom styles-->
    <link href="assets/css/style.css" rel="stylesheet">

    <script type="text/javascript">
        function sureToApprove(id){
            if(confirm("Are you sure you want to approve this Property?")){
                window.location.href ='approve1.php?id='+id;
            }
        }
        function sureToDelete(id){
            if(confirm("Are you sure you want to delete this Property?")){
                window.location.href ='delete-houses.php?id='+id;
            }
        }
        function sureToEdit(id){
            if(confirm("Are you sure you want to Edit this Property?")){
                window.location.href ='edit-houses.php?id='+id;
            }
        }

    </script>

</head>
<body>
<!--header and nav-->
<?php include 'admin-nav.php' ?>

<main id="main">
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <a href="add-property.php" class="btn btn-info btn-sm mb-3 mt-sm-3 p-sm-2">Add-Property</a>
            </div>
            <div class="col-sm-2">
                <a href="vacate-property.php" class="btn btn-success btn-sm mb-3 mt-sm-3 p-sm-2">Add Vacant-property</a>
            </div>
            <div class="col-sm-2">
                <a href="booked-property.php" class="btn btn-success btn-sm mb-3 mt-sm-3 p-sm-2">Booked property</a>
            </div>

        </div>
    </div>


    <div class="container">
        <div class="row">
            <?php foreach ($rows as $houses): ?>
                <div class="col-sm-4 mb-sm-4">
                    <div class="card">

                        <div class="list-inline">
                            <a href="#">
                                <img class="img-fluid img" src="<?= $houses['picture'] ?>" width=""
                                     height="" alt="">

                                <div class="card-body">
                                    <p class="card-title"><font class="font-weight-bold" color="teal">Property Name: </font> <span
                                            class=""> <?= $houses["title"] ?></span></p>
                                    <p class="card-text"><font class="font-weight-bold" color="teal">Location: </font> <span
                                            class=""> <?= $houses["location"] ?></span></p>
                                    <p class="card-text"><font class="font-weight-bold" color="teal">Description: </font> <span
                                            class=""> <?= $houses["description"] ?></span></p>
                                    <p class="card-text"><font class="font-weight-bold" color="teal">Price: </font> <span
                                            class=""><?= $houses["price"] ?> </span></p>
                                    <p>
                                        <button class="btn btn-primary"> <a href="javascript:sureToEdit(<?php echo $houses['id'];?>)"> Update</a></button>
                                        <button class="btn btn-danger m-3"><a href="javascript:sureToDelete(<?php echo $houses['id'];?>)">Delete</a></button>
                                    </p>

                                </div>
                            </a>
                        </div>


                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/tabledata/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            var t = $('#example').DataTable({
                "columnDefs": [{
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                }],
                "order": [[1, 'asc']]
            });

            t.on('order.dt search.dt', function () {
                t.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();
        });
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