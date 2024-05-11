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
    <center><h3>CUSTOMER AVG SPENDING</h3></center><hr>
    <br>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "food_delivery") or die("CONNETION FAILED");
    $sql = "SELECT
            c.customer_id AS customer_id,
            c.name AS customer_name, SUM(m.price) AS totalprice
            FROM customer c JOIN orders o 
                ON c.customer_id = o.customer_id
            JOIN meals m 
                ON o.meal_id = m.meal_id
            GROUP BY c.customer_id, c.name;";

    $r = mysqli_query($conn, $sql);
    
    echo "<center><table border='1'>
    <tr>
        <th>Customer ID</th>
        <th>Customer Name</th>
        <th>Average Price Bought</th>
    </tr>";
    while($info=mysqli_fetch_array($r)){
        echo"
			<tr>	
				<td>".$info['customer_id'] ."</td>
				<td>".$info['customer_name'] ."</td>
				<td>".$info['totalprice'] ."</td>
			</tr>";
    }
    echo "</table>";
    mysqli_close($conn);
    ?>

    <footer>
        <hr>
        <div id="df2">
        </div>
    </footer>

</body>

</html>
