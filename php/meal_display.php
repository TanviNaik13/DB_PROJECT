<!DOCTYPE HTML>
<html>
    <head>
        <title>Meals Page</title>
        <link rel="stylesheet" type="text/css" href="main.css">
		<script>
            function buy()
            {
                alert("Meal Bought!");
                window.location.href="order_placed.php"
            }
        </script>
    </head>	
    <body style="text:center">
        <header>
		<h2>Mithee Meals</h2>
        <hr>
		</header>
        <br><br>
		
        <?php
			
            $conn = mysqli_connect("localhost", "root", "", "food_delivery") or die("Connection failed: " . mysqli_connect_error());
            
            $mid = $_POST['meal_id'];
            $sql = "CREATE OR REPLACE VIEW meal_order AS
                    SELECT meal_name, meal_type, meal_goal, meal_img, price, quantity
                    FROM MEALS where meal_id='$mid'";

            $result = mysqli_query($conn, $sql) or die("unable to create view");

            $sql = "SELECT * FROM meal_order";
            $r = mysqli_query($conn, $sql) or die("ERROR IN DISPLAYING");

            if (mysqli_num_rows($r) <= 0) 
                echo '<script>alert("Error in displaying");</script>';
            else 
            {
                    $info = mysqli_fetch_array($r);
                    session_start();
                    $_SESSION["order_meal_id"] = $mid;
                    $_SESSION["order_meal_qty"] = $info["quantity"];

                    $description = $info['meal_type'] . ', ' . $info['meal_goal'];
                    echo '<center>
                    <div id="dr">
                        <img id= "dri" src=\'../img/' . $info['meal_img'] . '\' alt=\'' . $info['meal_name'] . '\'>
                        <p class="dr2"><b>Name: </b>' . $info['meal_name'] . '<br><br>
                        <b>Description: </b>' . $description . '<br><br>
						<b>Price: </b>₹' . $info['price'] . '/-<br><br>
                        <input id="Profile_Button" type="button" value="Buy Now!" onclick="buy()"></input>						
						</p>
                    </div></center>
                    ';
                
            }         
            mysqli_close($conn);
        ?>
        <div id="df1"></div>
        <footer>
		<hr>
        <div id="df2">
        </div>
		</footer>

    </body>
</html>
