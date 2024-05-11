<!DOCTYPE HTML>
<html>
    <head>
        <title>Meals Page</title>
        <link rel="stylesheet" href="main.css">
    </head>	
    <body style="text:center">
         <header>
		<h2>Mithee Meals</h2>
        <hr>
		</header>
        <br>
		<form style="margin-left:40%;" method="get" action="">
        <input type="text" name="searchTerm" id="mid1" placeholder="  Enter the Name" value="<?php echo isset($_GET['searchTerm']) ? $_GET['searchTerm'] : ''; ?>">
        <input id="Profile_Button" style="width:10%;" type="submit" value="Search">
    </form>
        
        <div id="meals">
		<?php
            $conn = mysqli_connect("localhost", "root", "", "food_delivery") or die("CONNECTION FAILED");
            $meals_details = array();

            if (isset($_GET['searchTerm'])) 
            {
                $searchTerm = $_GET['searchTerm'];

                $sql = "SELECT * FROM meals WHERE meal_name LIKE '%$searchTerm%'";
                $result = mysqli_query($conn, $sql);

                while ($info = mysqli_fetch_array($result)) 
                    $meals_details[] = $info;
            } 
            else 
            {
                $sql = "SELECT * FROM meals";
                $result = mysqli_query($conn, $sql);

                while ($info = mysqli_fetch_array($result)) 
                    $meals_details[] = $info;
            }
            mysqli_close($conn);

            foreach ($meals_details as $meal) {
                echo '<form method="post" action="meal_display.php" class="meal">';
                echo '<h2 class="m1">' . $meal['meal_name'] . '<br><img src="../img/' . $meal['meal_img'] . '" alt="' . $meal['meal_name'] . '">' . '</h2>';
                echo '<p>Price: ₹' . $meal['price'] . '</p>';
                echo '<input id="Profile_Button" type="submit" value="Order Now">';
                echo '<input type="text" name="meal_id" value="' . $meal['meal_id'] . '" hidden>';
                echo '</form>';
            }
        ?>
		</div>
        <input id="Profile_Button" style="width:10%; margin-left:85%;" type="button" value="My Profile" onclick="window.location.href='../customer_profile.html'">
		<footer>
		<hr>
        <div id="df2">
        </div>
		</footer>
    </body>
</html>
