<?php
include 'protect.php';

include 'database.php';


//$sql = "SELECT book.house_id,book.names,book.user_id,houses.id,houses.price,buyers.names
//       FROM book JOIN houses ON book.house_id = houses.id JOIN buyers ON book.user_id = buyers.names";
$sql = "SELECT book.house_id,book.user_id,houses.price,book.names FROM book JOIN houses ON book.house_id = houses.id";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));// executing the query
$rows = mysqli_fetch_all($result, 1);//assoc array
mysqli_close($con);//close the connection

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Pinhouse - bookings</title>
    <!-- Google Fonts -->
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/tabledata/jquery.dataTables.min.css">

    <!--  custom styles-->
    <link href="assets/css/style.css" rel="stylesheet">

    <!--edit and delete items-->
    <script type="text/javascript">
        function sureToApprove(house_id){
            if(confirm("Are you sure you want to Approve this request?")){
                window.location.href ='approve.php?id='+house_id;
            }
        }
        function sureToDelete(house_id){
            if(confirm("Are you sure you want to Delete this request?")){
                window.location.href ='admin-delete-client.php?id='+house_id;
            }
        }
    </script>

</head>
<body>
<!--header and nav-->
<?php include 'admin-nav.php'?>

<main id="main">

    <div class="container p-sm-3">
        <div class="row justify-content-center">
            <div class="col-sm-12">

                <table id="example" class="table table-striped ">

                    <thead>
                    <tr>
                        <th>Sno.</th>
                        <th>Property Id</th>
                        <th>Clients id</th>
                        <th>Price</th>
                        <th>Client name</th>
                        <th>Update</th>
                        <th>Delete</th>

                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($rows as $buyers): ?>


                        <tr>
                            <td> </td>
                            <td> <?= $buyers["house_id"] ?> </td>
                            <td> <?= $buyers["user_id"] ?> </td>
                            <td> <?= $buyers["price"] ?> </td>
                            <td> <?= $buyers["names"] ?> </td>
                            <td><a class="btn btn-primary btn-sm" href="javascript:sureToApprove(<?php echo $buyers['house_id'];?>)">Approve</a></td>
                            <td><a class="btn btn-danger btn-sm" href="javascript:sureToDelete(<?php echo $buyers['house_id'];?>)">Delete</a></td>
                        </tr>


                    <?php endforeach; ?>
                    </tbody>


                </table>
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