<?php
	session_start();
	$conn = mysqli_connect("localhost", "root", "", "food_delivery") or die("Connection failed: ");
	
    session_start();
    $c_id = $_SESSION['customer_id'];
	$sql = "SELECT * FROM  CUSTOMER WHERE customer_id='$c_id'";
	$r = mysqli_query($conn, $sql) or die("ERROR IN FETCHING");
	if(mysqli_num_rows($r)<=0)
	{
			echo "No Records Found";
			exit();
	}
	$sql = "DELETE FROM CUSTOMER WHERE customer_id='$c_id'";
    $r = mysqli_query($conn, $sql);
    if ($r)
        echo"Deleted Successfully";
    else
        echo "could not delete";

	mysqli_close($conn);
    header("Location: customer_logout.php");
?>
