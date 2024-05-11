//addmeal.php
<?php
	$conn = new mysqli("localhost", "root", "", "food_delivery");

	if ($conn) {
		echo ("Connection success ");
	}
	else{
		
		echo ("Connection failed ");
		exit();
	}
		

	$name = $_POST['mealname'];
	$type = $_POST['mealtype'];
	$goal = $_POST['mealgoal'];
	$price = $_POST['price'];
	$img = $_POST['mealimg'];
	$qty = $_POST['quantity'];

	$sql = "INSERT INTO MEALS VALUES (NULL,'$name', '$type', '$goal', '$price', '$img', '$qty')";
	$r=mysqli_query($conn,$sql);
	if ($r) {
		echo "New record created successfully";
	} else {
		echo "Error in insertion ";
	}
	mysqli_close($conn);
?>
