<?php
include 'database.php';
if(isset($_GET['id']))
{
    $house_id = $_GET['id'];
    $query = "DELETE FROM book WHERE house_id= '$house_id'";
    $result = $con->query($query);
    if($result === TRUE){
        ?>
        <script type="text/javascript">
            window.alert("Successfully Deleted");
            window.location.href="booking-admin.php";
        </script>>
        <?php
    }
    else
    {
        ?>
        <script type="text/javascript">
            window.alert("Not Deleted \n Try Again.");
            window.location.href="booking-admin.php";
        </script>>
        <?php
    }
}

?>
