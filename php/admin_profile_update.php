<?php
	session_start();
	$conn = new mysqli("localhost", "root", "", "food_delivery") or die("CONNETION FAILED");
	$id = $_SESSION["admin_id"];

	$name = isset($_POST['admin_name']) ? trim($_POST['admin_name']) : null;
	$email = isset($_POST['admin_email']) ? trim($_POST['admin_email']) : null;
	$passwd = isset($_POST['admin_passwd']) ? trim($_POST['admin_passwd']) : null;
	$chckbox = $_POST['admin'];
	
	$values = array();
	$values['username'] = $name;
	$values['email'] = $email;
	$values['password'] = $passwd;
	$k = 0;
	
	$q1="UPDATE ADMIN set ";

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
	$q1 .= "where admin_id = '$id'";

	$r=mysqli_query($conn,$q1) or die("ERROR UPDATING");
	echo "Record updated succsefully";
	mysqli_close($conn);
	header("Location: ../admin_profile.html");
?>