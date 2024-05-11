<?php
	$conn = mysqli_connect("localhost", "root", "", "food_delivery") or die("Connection failed: ");

    session_start();
    $a_id = $_SESSION['admin_id'];
	$sql = "DELETE FROM ADMIN WHERE admin_id='$a_id'";
    $r = mysqli_query($conn, $sql) or die("could not delete");
	mysqli_close($conn);
    header("Location: admin_logout.php");
?>
