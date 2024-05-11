<?php
	//session_start();
	$conn = new mysqli("localhost", "root", "", "food_delivery");

	if ($conn) {
		echo ("Connection success ");
	}
	else{
		
		echo ("Connection failed ");
		exit();
	}
	//$meal_id = $_SESSION["meal_id"];
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
	for ($i = 0; $i < count($chckbox); $i++)
		echo "<br>". $chckbox[$i];
	$q1="UPDATE TABLE meals set ";
	echo "<br>";
	//print_r($values) ;	
	echo "<br>";
	//print_r($chckbox) ;
	echo "<br>";
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
	$q1 .= "where meal_id = '3'";
	echo $q1;
	exit();


	//$sql = "UPDATE TABLE MEALS VALUES (NULL,'$name', '$type', '$goal', '$price', '$img', '$qty')";
	$r=mysqli_query($conn,$sql);
	if ($r) {
		echo "New record created successfully";
	} else {
		echo "Error in insertion ";
	}
	mysqli_close($conn);
?>