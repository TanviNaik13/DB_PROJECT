<?php
	$conn = mysqli_connect("localhost", "root", "", "food_delivery") or die("CONNETION FAILED");

	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "INSERT INTO ADMIN ( username, email, password) VALUES ('$username', '$email', '$password')";
	$r=mysqli_query($conn, $sql) or die("ERROR IN INSERTION");
	echo "New record created successfully";
	mysqli_close($conn);
	header("Location: ../admin_login.html");
	
?>
