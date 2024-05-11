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
        <center><h3>CUSTOMER ORDERS</h3></center><hr>
        <br>
        <?php
            $conn = mysqli_connect("localhost", "root", "", "food_delivery") or die("CONNETION FAILED");
            $sql = "SELECT c.name, m.meal_name, m.price, o.order_id
                    FROM customer c JOIN orders o ON c.customer_id = o.customer_id JOIN meals m ON o.meal_id = m.meal_id;";
            $r = mysqli_query($conn, $sql);
            
            echo "<center><table border='1'>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Meal Name</th>
                <th>Meal Price</th>
            </tr>";
            while($info=mysqli_fetch_array($r))
            {
                echo"
                    <tr>	
                        <td>".$info['order_id'] ."</td>
                        <td>".$info['name'] ."</td>
                        <td>".$info['meal_name'] ."</td>
                        <td>".$info['price'] ."</td>
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
