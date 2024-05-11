<?php
        $conn = mysqli_connect("localhost", "root", "", "food_delivery") or die("CONNECTION FAILED");
        $sql = "";
        session_start();
        $mid = $_SESSION["order_meal_id"];
        $cid = $_SESSION["customer_id"];

        if($_SESSION["order_meal_qty"] <= 1) 
            $sql = "DELETE FROM MEALS where meal_id='$mid'";
        else
            $sql = "UPDATE MEALS set quantity = quantity - 1 where meal_id='$mid'";
        
        $r = mysqli_query($conn, $sql) or die("UNABLE TO BUY");
        
        $sql = "INSERT INTO ORDERS(meal_id, customer_id) VALUES ('$mid', '$cid')";
        $r = mysqli_query($conn, $sql) or die("UNALBLE TO REGISTER ORDER ENTRY");
        mysqli_close($conn);
        header("Location: meals.php");
?>

