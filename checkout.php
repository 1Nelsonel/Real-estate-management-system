<?php
include 'protect.php';
require 'database.php';

if (isset($_REQUEST["buyer_id"]))
{
    $buyer_id = $_REQUEST["buyer_id"];
    $house_id = $_SESSION["houses"];
    $sale_date = date("Y-m-d");

    foreach($house_id as $pid){

        $query = "INSERT INTO `sales`(`id`, `house_id`, `buyer_id`, `sale_date`) VALUES (null,$pid,$buyer_id,'$sale_date')";
        mysqli_query($con, $query) or die(mysqli_errno($con));
    }

    $_SESSION["houses"] = [];

}
if (isset($_GET["id"])){
    $_SESSION["houses"] = array_diff($_SESSION["houses"], [$_GET["id"]]);
}
if (count($_SESSION["houses"]) == 0){
    header("location:sales.php");
}

$ids = array_unique($_SESSION["houses"]);

//print_r($ids);
//die();
$data = implode(",", $ids);
//echo $data;
//die();
//$con = mysqli_connect("localhost","root","root","complete") or die(mysqli_connect_error());
$sql = "SELECT * FROM houses WHERE id IN($data)";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));// executing the query
$rows = mysqli_fetch_all($result, 1);//assoc array

//fetch members
$sql2 = "SELECT * FROM buyers";
$result2 = mysqli_query($con, $sql2) or die(mysqli_error($con));// executing the query
$buyers = mysqli_fetch_all($result2, 1);//assoc array

mysqli_close($con);//close the connection

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Pinhouse - checkout</title>
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

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">

                <form action="checkout.php" method="post" class="form-inline mt-2 mb-2"  >
                    <div class="form-group">

                        <select name="buyer_id" class="form-control">
                            <option value="<?=$_SESSION["id"]?>"><?=$_SESSION["names"]?></option>
                        </select>

                    </div>
                    <button class="btn btn-info btn-sm ml-2">Complete Transaction</button>
                </form>


                <table id="example" class="table table-striped table-bordered">

                    <thead>
                    <tr>
                        <th>Sno.</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Remove</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($rows as $house): ?>
                        <tr>
                            <td></td>
                            <td> <?= $house["title"] ?> </td>
                            <td> <?= $house["location"] ?> </td>
                            <td> <?= $house["description"] ?> </td>
                            <td> <?= $house["price"] ?> </td>
                            <td><img src="<?= $house['picture'] ?>" width="60" height="60" alt=""></td>
                            <td><a class="btn btn-danger btn-sm" href="checkout.php?id=<?= $house["id"] ?>">Remove</a>
                            </td>
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
