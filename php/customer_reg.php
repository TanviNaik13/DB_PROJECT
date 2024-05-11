<?php
    $conn = new mysqli("localhost", "root", "", "food_delivery") or die("CONNETION FAILED");

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $district = $_POST['district'];
    $address = $_POST['address'];
    $langSelected = $_POST['lang'];
    $languages = "";

    for( $i = 0; $i < count($langSelected); $i++ )
        $languages = $languages ." ". $langSelected[$i];

    $sql =  "INSERT INTO CUSTOMER (name, email, password, dob, phone, gender, district, address, language) VALUES 
    ('$name', '$email', '$password', '$dob', '$phone', '$gender', '$district', '$address', '$languages')";

    $r = mysqli_query($conn, $sql) or die("ERROR IN INSERTING");
    echo "<br>New record created successfully";
    mysqli_close($conn);
    header("Location: ../customer_login.html");
?>
