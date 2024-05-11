<!DOCTYPE HTML>
<html>
<head>
    <title>Admin Meals Display</title>
    <link rel="stylesheet" href="main.css">
    
</head>
<body style="text:center">
    <header>
	<h2>Mithee Meals</h2>
    <hr>
    <br>
	</header><br>
    <form style="margin-left:-1%;" method="get" action="">
	<center>
        <input id="mid1" type="text" name="searchTerm" placeholder="Search for meals..." >
        <input id="serch" type="submit" value="Search">
	</center>
    </form><br><br>
    
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
        echo "<center><table border='1'>
			<tr>
				<th>Meal ID</th>
				<th>Meal Name</th>
				<th>Meal Type</th>
				<th>Meal Goal</th>
				<th>Meal Price</th>
				<th>Meal Imgage Url</th>
				<th>Meal quantity</th>
			</tr>";
        foreach ($meals_details as $meal) {
            echo"
			<tr>	
				<td>".$meal['meal_id'] ."</td>
				<td>".$meal['meal_name'] ."</td>
				<td>".$meal['meal_type'] ."</td>
				<td>".$meal['meal_goal'] ."</td>
				<td>".$meal['price'] ."</td>
				<td>".$meal['meal_img'] ."</td>
				<td>".$meal['quantity'] ."</td>
			</tr>";
        }
        
		echo "</table></center>";
        ?>
    </div>

    <footer>
    <hr>
    <div id="df2"></div>
	</footer>
</body>
</html>
