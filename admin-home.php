<?php
include 'protect.php';

include 'database.php';

$sql = "SELECT * FROM messages";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));// executing the query
$rows = mysqli_fetch_all($result, 1);//assoc array
mysqli_close($con);//close the connection

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Pinhouse - messages</title>
    <!-- Google Fonts -->
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/tabledata/jquery.dataTables.min.css">

    <!--  custom styles-->
    <link href="assets/css/style.css" rel="stylesheet">

    <script type="text/javascript">
        function sureToDelete(id){
            if(confirm("Are you sure you want to Delete this request?")){
                window.location.href ='delete-msg.php?id='+id;
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
                        <th>Names.</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                        <th>Action</th>

                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($rows as $buyers): ?>


                        <tr>
                            <td> </td>
                            <td> <?= $buyers["names"] ?> </td>
                            <td> <?= $buyers["email"] ?> </td>
                            <td> <?= $buyers["phone"] ?> </td>
                            <td> <?= $buyers["message"] ?> </td>
                            <td><a class="btn btn-danger" href="javascript:sureToDelete(<?php echo $buyers['id'];?>)">Delete</a></td>
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