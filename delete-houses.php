<?php
include 'database.php';
$id = $_REQUEST['id'];
$query = "DELETE FROM houses WHERE id = '$id'";
$result = $con->query($query);
if($result === TRUE){
    echo "<script type = \"text/javascript\">
					alert(\"Property Successfully deleted\");
					window.location = (\"admin-property.php\")
				</script>";
}
?>
