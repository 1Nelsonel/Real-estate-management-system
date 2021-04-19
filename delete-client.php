<?php
include 'database.php';
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $query = "DELETE FROM buyers WHERE id = '$id'";
    $result = $con->query($query);
    if($result === TRUE){
        ?>
        <script type="text/javascript">
            window.alert("Successfully Deleted");
            window.location.href="buyers.php";
        </script>>
        <?php
    }
    else
    {
        ?>
        <script type="text/javascript">
            window.alert("Not Deleted \n Try Again.");
            window.location.href="buyers.php";
        </script>>
        <?php
    }
}

?>
