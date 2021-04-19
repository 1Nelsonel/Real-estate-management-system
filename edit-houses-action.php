<?php
include 'database.php';
$id = $_GET['id'];
if(isset($_POST['send'])){

    $title = $_POST['title'];
    $price = $_POST['price'];
    $location = $_POST['location'];
    $description = $_POST['description'];

    $qr = "UPDATE houses SET title='$title', price='$price',location='$location' , description='$description' WHERE id = '$id'";
    $res =mysqli_query($con,$qr) or die(mysqli_error($con));
    if($res){
        echo "<script type = \"text/javascript\">
											alert(\"Property Updated successfully\");
											window.location = (\"admin-property.php\")
											</script>";
    }
    else
    {
        echo "<script type = \"text/javascript\">
											alert(\"Property not Updated. Try again.\");
											window.location = (\"admin-property.php\")
											</script>";
    }
}
?>