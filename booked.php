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
						
							$query1 = mysqli_query($con,"SELECT * FROM book WHERE user_id =$id AND status='booked' ") or die(mysqli_error($con));
							$result1 = mysqli_fetch_array($query1);
							

							if($result1)
							{
								?>
								<script>
									window.alert("You cant book now because You have a pending booking request.");
									window.location.href="index11.php";
								</script>
								<?php
							}
							else
							{
								$result = mysqli_query($con,"INSERT INTO book (names,user_id,house_id,location,status)
							                                              VALUES('$names','$id','$house_id','$location','booked')") or die(mysqli_error($con));

//                                $stmt = mysqli_prepare($con, "INSERT INTO `book`(`names`, `id`, `house_id`, `location`, `status`) VALUES (?,?,?,?,?)");
//                                //bind data
//                                mysqli_stmt_bind_param($stmt,"sssss" ,$names,$id,$house_id,$location,$status);
//                                mysqli_stmt_execute($stmt);

							if($result)
							{
								$house_id = $_REQUEST['id'];
								$query=mysqli_query($con,"UPDATE houses SET status='booked' WHERE id='$house_id'") or die(mysqli_error($con));


							}
							if($query)
							{
								//$id=$_GET['id'];
								
								 ?>
								 
								 <script>
											window.alert("Successfully booked. \n We will contact you once your booking request is approved");
											window.location = "index11.php";
											</script>
											<?php
											
											
							} else{
								?>
								       <script>
										window.alert("Booking request failed. Try Again");
											window.location ="bookreq.php";
											</script>
											<?php
							}
							}
							
							
						}
						
					  ?>