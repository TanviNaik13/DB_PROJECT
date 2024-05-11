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
        <input type="text" name="searchTerm" id="mid1" placeholder="  Enter the meal ID" value="<?php echo isset($_GET['searchTerm']) ? $_GET['searchTerm'] : ''; ?>">
        <input id="searchButton" style="width:10%;" type="submit" value="Search">
    </form>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "food_delivery") or die("Connection failed ");

    if (isset($_GET['searchTerm'])) {
        $searchTerm =  $_GET['searchTerm'];

        $sql = "SELECT * FROM meals WHERE meal_id = '$searchTerm';";
        $r = mysqli_query($conn, $sql);

        if (mysqli_num_rows($r) >= 1) 
        {
            $info = mysqli_fetch_array($r);

            echo '<br><br><center>
                <div id="dr">
                    <img id="dri" src="../img/' . $info['meal_img'] . '" alt="' . $info['meal_name'] . '">
                    <p class="dr2"><b>Name: </b>' . $info['meal_name'] . '<br><br>
                    <b>Quantity: </b>' . $info['quantity'] . '<br><br>
                    <b>Price: </b>₹' . $info['price'] . '/-<br><br>
                    </p>
                    
                </div>
                <form method="post" action="">
                        <input id="deleteButton" type="submit" name="deleteMeal" value="Delete">
                </form></center>';

            if (isset($_POST['deleteMeal'])) 
            {
                $deleteSql = "DELETE FROM meals WHERE meal_id = '$searchTerm'";
                if (mysqli_query($conn, $deleteSql)) 
                {
                    echo "<br><h2>Record Successfully Deleted!</h2>";
                    //header("Location: ../admin_home.html");
                }
                    
                 else 
                    echo "<br>Failed in Deletion";
            }
        } 
        else 
            echo "<script>alert('Incorrect ID')</script>";
        
    }

    mysqli_close($conn);
    ?>

    <footer>
        <hr>
        <div id="df2">
        </div>
    </footer>

</body>

</html>
