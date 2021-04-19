<?php
include 'protect.php';

include 'database.php';

if(isset($_REQUEST['id']))
{
    $id = $_REQUEST['id'];
    $select = mysqli_query($con,"SELECT * FROM houses WHERE id = '$id'") or die(mysqli_error($con));
    $selresult = mysqli_fetch_array($select);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Pinhouse - Clients</title>
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
<?php include 'admin-nav.php'?>

<main id="main">

    <div class="container p-sm-3">
        <div class="row justify-content-center">
            <div class="col-sm-12">

                <form action="edit-houses-action.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Property Name:</label>
                        <input class="form-control" type="text" value="<?php echo $selresult['title']; ?>" name="title" required />
                    </div>
                    <div class="form-group">
                        <label>Location:</label>
                        <input type="text" class="form-control" value="<?php echo $selresult['location']; ?>" name="location"  required />

                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <input type="text" class="form-control" name="description" value="<?php echo $selresult['description']; ?>" required />

                    </div>
                    <div class="form-group">
                        <label>Price:</label>
                        <input type="number" class="form-control" name="price" value="<?php echo $selresult['price']; ?>" required />

                    </div>
                    <div class="form-group">
                        <!--                        <button class="btn btn-primary" value="UPDATE" name="send">Update</button>-->
                        <div class="buttons">

                            <input  type="submit" class="btn btn-danger" value="UPDATE" name="send" />
                        </div>
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