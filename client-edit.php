<?php
include 'database.php';
$id = $_REQUEST['id'];
if(isset($_POST['send'])){

    $names = $_REQUEST['names'];
    $phone = $_REQUEST['phone'];
    $email = $_REQUEST['email'];





    $qry = "UPDATE buyers SET names='$names', email='$email', phone='$phone'  WHERE id='$id' ";
    $result=mysqli_query($con,$qry) or die(mysqli_error($con));
    if($result){
        echo "<script type = \"text/javascript\">
											alert(\"Client Details Successfully Updated.\");
											window.location = (\"buyers.php\")
											</script>";
    } else{
        echo "<script type = \"text/javascript\">
											alert(\"Client Update Failed. Try Again\");
											window.location = (\"buyers.php\")
											</script>";
    }
}

?>