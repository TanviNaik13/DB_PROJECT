<?php
	$conn = new mysqli("localhost", "root", "", "food_delivery") or die("CONNETCION FAILED");
	session_start();
	if (!isset($_SESSION["meal_id"])) {
		header("Location: ../meal_update.html");
		exit();
	}
	$meal_id = $_SESSION["meal_id"];
	$name = isset($_POST['m_name']) ? trim($_POST['m_name']) : null;
	$type = isset($_POST['m_type']) ? trim($_POST['m_type']) : null;
	$goal = isset($_POST['m_goal']) ? trim($_POST['m_goal']) : null;
	$price = isset($_POST['m_price']) ? trim($_POST['m_price']) : null;
	$img = isset($_POST['m_img']) ? trim($_POST['m_img']) : null;
	$qty = isset($_POST['m_qty']) ? trim($_POST['m_qty']) : null;
	$chckbox = $_POST['meal'];

	$values = array();
	$values['meal_name'] = $name;
	$values['meal_type'] = $type;
	$values['meal_goal'] = $goal;
	$values['price'] = $price;
	$values['meal_img'] = $img;
	$values['quantity'] = $qty;
	$k = 0;

	$q1="UPDATE meals set ";

	for ($i = 0; $i < count($chckbox); $i++) {
		if(!is_null($chckbox[$i])){
			$tmp = $chckbox[$i];
			$q1 .= "$tmp = '" . $values[$tmp] . "'";
			if($k == count($chckbox) - 1){
				$q1 = $q1. " ";
				break;
			}
			else
				$q1 = $q1. ", ";
			$k++;
		}
	}
	$q1 .= "where meal_id = '".$_SESSION['meal_id']."'";
	unset($_SESSION["meal_id"]);
	$r=mysqli_query($conn,$q1) or die("ERROR IN UPDATION");
	mysqli_close($conn);
	header("Location: ../admin_home.html");
?>