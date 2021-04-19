<?php


include 'protect.php';
$id =$_SESSION['id'];
require"database.php";



$result = mysqli_query($con,"SELECT * FROM buyers WHERE id ='$id'")or die(mysqli_error($con));
$test = mysqli_fetch_array($result);
?>
<?php
include'database.php';

if(isset($_GET['id']) AND isset($_POST['save']))
{


    //$id = $_GET['id'];
    include 'database.php';
    $names = $_POST['names'];
    $house_id = $_POST['house'];
    $location = $_POST['location'];
    $id = $_SESSION['id'];
    $sale_date = date("Y-m-d");

    $query1 = mysqli_query($con,"SELECT * FROM sales WHERE house_id =$house_id ") or die(mysqli_error($con));
    $result1 = mysqli_fetch_array($query1);


    if($result1)
    {
        ?>
        <script>
            window.alert("You cant buy now because You have a pending request.");
            window.location.href="sales.php";
        </script>
        <?php
    }
    else
    {
        $result = mysqli_query($con,"INSERT INTO sales (id,buyer_id,house_id,sale_date)
							                                              VALUES(null,'$id','$house_id','$sale_date')") or die(mysqli_error($con));

//                                $stmt = mysqli_prepare($con, "INSERT INTO `book`(`names`, `id`, `house_id`, `location`, `status`) VALUES (?,?,?,?,?)");
//                                //bind data
//                                mysqli_stmt_bind_param($stmt,"sssss" ,$names,$id,$house_id,$location,$status);
//                                mysqli_stmt_execute($stmt);

        if($result)
        {
            $house_id = $_REQUEST['id'];
            $query=mysqli_query($con,"UPDATE houses SET status='sold' WHERE id='$house_id'") or die(mysqli_error($con));


        }
        if($query)
        {
            //$id=$_GET['id'];

            ?>

            <script>
                window.alert("Successfully bought a property. \n We will contact you once your booking request is approved");
                window.location = "sales.php";
            </script>
            <?php


        } else{
            ?>
            <script>
                window.alert("Booking request failed. Try Again");
                window.location ="buy-re.php";
            </script>
            <?php
        }
    }


}

?>