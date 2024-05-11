<?php
	$conn = new mysqli("localhost", "root", "", "food_delivery") or die("CONNECTION FAILED");
		
	$name = $_POST['mealname'];
	$type = $_POST['mealtype'];
	$goal = $_POST['mealgoal'];
	$price = $_POST['price'];
	$img = $_POST['mealimg'];
	$qty = $_POST['quantity'];

	$sql = "INSERT INTO MEALS VALUES (NULL,'$name', '$type', '$goal', '$price', '$img', '$qty')";
	$r=mysqli_query($conn,$sql)or die("ERROR IN INSERTION)");
	echo "<script>confirm('Meal Added')</script>";
	mysqli_close($conn);
	header("Location: ../admin_home.html");
?>

