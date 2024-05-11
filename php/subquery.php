<!DOCTYPE HTML>
<html>

<head>
    <title>Meals Page</title>
    <link rel="stylesheet" href="main.css">
</head>

<body style="text-align: center;">
    <header>
        <h2>Mithee Meals</h2>
        <hr>
    </header>
    <center><h3>MEAL COSTING</h3></center><hr>
    <br>
    <form style="margin-left: 50%;" method="get" action="">
        <input type="number" min="1" name="searchTerm" id="mid1" required placeholder="Enter the meal Price" value="<?php echo isset($_GET['searchTerm']) ? $_GET['searchTerm'] : ''; ?>">
        <input id="searchButton" style="width: 10%;" type="submit" value="Search">
    </form>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "food_delivery") or die("CONNECTION FAILED");

    if (isset($_GET['searchTerm'])) {
        $mealID = $_GET['searchTerm'];

        $sql = "SELECT meal_id, meal_name, meal_type, price
                FROM meals
                WHERE meal_id IN (
                    SELECT meal_id
                    FROM meals 
                    WHERE price = $mealID
                )";

        $result = mysqli_query($conn, $sql);

        echo "<center><table border='1'>
        <tr>
            <th>Meal ID</th>
            <th>Meal Name</th>
            <th>Meal Type</th>
            <th>Price</th>
        </tr>";

        while ($info = mysqli_fetch_array($result)) {
            echo "
                <tr>	
                    <td>" . $info['meal_id'] . "</td>
                    <td>" . $info['meal_name'] . "</td>
                    <td>" . $info['meal_type'] . "</td>
                    <td>" . $info['price'] . "</td>
                </tr>";
        }

        echo "</table></center>";
        mysqli_close($conn);
    }
    ?>

    <footer>
        <hr>
        <div id="df2">
        </div>
    </footer>

</body>

</html>
