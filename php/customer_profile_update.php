<?php
	$conn = new mysqli("localhost", "root", "", "food_delivery") or die("Failed To Connect to server");
	session_start();
	$id = $_SESSION["customer_id"];
	$name = isset($_POST['cust_name']) ? trim($_POST['cust_name']) : null;
	$email = isset($_POST['cust_email']) ? trim($_POST['cust_email']) : null;
	$passwd = isset($_POST['cust_passwd']) ? trim($_POST['cust_passwd']) : null;
	$dob = isset($_POST['cust_dob']) ? trim($_POST['cust_dob']) : null;
	$phone = isset($_POST['cust_phone']) ? trim($_POST['cust_phone']) : null;
	$gender = isset($_POST['cust_gender']) ? trim($_POST['cust_gender']) : null;
	$district = isset($_POST['cust_dist']) ? trim($_POST['cust_dist']) : null;
	$address = isset($_POST['cust_address']) ? trim($_POST['cust_address']) : null;

	$chckbox = $_POST['cust'];
	$values = array();

	$values['name'] = $name;
	$values['email'] = $email;
	$values['password'] = $passwd;
	$values['dob'] = $dob;
	$values['phone'] = $phone;
	$values['gender'] = $gender;
	$values['district'] = $district;
	$values['address'] = $address;
	$k = 0;

	$q1="UPDATE CUSTOMER set ";
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
	$q1 .= "where customer_id = '$id'";
	echo $q1;

	$r=mysqli_query($conn,$q1) or die("ERROR IN UPDATING");
	echo "Record Updated";
	mysqli_close($conn);
	header("Location: ../customer_profile.html");
?>