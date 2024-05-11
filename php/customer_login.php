<?php
	$conn = mysqli_connect("localhost", "root", "", "food_delivery") or die("CONNETION FAILED");
	session_start();

	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$c_id = "";
	$c_email = "";
	$c_password = "";
	$c_username = "";

	$sql = "SELECT customer_id, name, email, password FROM  CUSTOMER WHERE email='$email' AND password='$password'";
	$r = mysqli_query($conn, $sql) or die("ERROR IN LOGGING");
	if(mysqli_num_rows($r)<=0)
	{
		echo '<script>alert("Incorrect email or password. Please try again.");</script>';
		exit();
	}
	$info = mysqli_fetch_array($r);
	$_SESSION["customer_id"] = $info["customer_id"];
	$_SESSION["name"] = $info["name"];
	mysqli_close($conn);
    header("Location: meals.php");
?>
