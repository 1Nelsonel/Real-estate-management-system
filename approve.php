<?php
	include 'database.php';
	$house_id = $_REQUEST['id'];
	$query = "UPDATE houses SET status = 'Approved' WHERE id = '$house_id'";

	$result = $con->query($query) or die(mysqli_error($con));
	$query1 = mysqli_query($con, "UPDATE book SET status='Approved' WHERE house_id = '$house_id'") or die(mysqli_error($con));
	if($result AND $query1){
	  ?>
	  <script>
	  window.alert("Request successfully approved");
	  window.location.href="booking-admin.php";
	  </script>
		<?php
	?>
		<meta content="4; booking-admin.php" http-equiv="refresh" />
	<?php
	}
?>
