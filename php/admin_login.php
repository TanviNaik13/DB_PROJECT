<?php
$conn = mysqli_connect("localhost", "root", "", "food_delivery") or die("CONNETION FAILED");

session_start();
$email = $_POST['email'];
$password = $_POST['password'];

$a_email = "";
$a_password = "";
$a_username = "";

$sql = "SELECT admin_id, username, email, password FROM ADMIN WHERE email='$email' AND password='$password'";
$r = mysqli_query($conn, $sql) or die("ERROR IN FETCHING");
if (mysqli_num_rows($r) <= 0) 
    echo '<script>alert("Incorrect email or password. Please try again.");</script>';
else 
{
    echo "Logged In";
    $info = mysqli_fetch_array($r);
    $_SESSION["admin_id"] = $info['admin_id'];
    $_SESSION["username"] = $info['username'];   
    header("Location: ../admin_home.html");
}
mysqli_close($conn);
?>
