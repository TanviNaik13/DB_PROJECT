	<?php
		$conn = mysqli_connect("localhost", "root", "", "food_delivery")or die("CONNECTION ERROR");
		$mid = $_POST['search_id'];
			
		$sql = "SELECT * FROM MEALS WHERE meal_id = '$mid'";
		$r = mysqli_query($conn, $sql);
		if(mysqli_num_rows($r) <= 0) {
			echo "<h1>No Record Found! Please check the Meal ID</h1>";
			exit();
		}
		session_start();
		$_SESSION["meal_id"] = $mid;
		$info=mysqli_fetch_array($r);
		echo "<table border='1'>
			<tr>
				<th>Meal ID</th>
				<th>Meal Name</th>
				<th>Meal Type</th>
				<th>Meal Goal</th>
				<th>Meal Price</th>
				<th>Meal Imgage Url</th>
				<th>Meal quantity</th>
			</tr>
			<tr>	
				<td>".$info[0] ."</td>
				<td>".$info[1] ."</td>
				<td>".$info[2] ."</td>
				<td>".$info[3] ."</td>
				<td>".$info[4] ."</td>
				<td>".$info[5] ."</td>
				<td>".$info[6] ."</td>
			</tr>
		</table>";
		mysqli_close($conn);
	?>
