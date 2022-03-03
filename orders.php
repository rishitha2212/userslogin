<?php
include('connection.php');

session_start();
   
   if( isset( $_SESSION['counter'] ) ) {
      $_SESSION['counter'] += 1;
   }else {
      $_SESSION['counter'] = 1;
   }
	

// SQL query to select data from database
$sql = "SELECT * FROM orders_table";
$result = $con->query($sql);
$con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>User Details</title>
	<!-- CSS FOR STYLING THE PAGE -->
	<style>
		table {
			margin: 0 auto;
			font-size: large;
			border: 1px solid black;
		}

		h1 {
			text-align: center;
			color: black;
			font-size: xx-large;
			font-family: 'Gill Sans', 'Gill Sans MT',
			' Calibri', 'Trebuchet MS', 'sans-serif';
		}

		td {
			background-color: #E4F5D4;
			border: 1px solid black;
		}

		th,
		td {
			font-weight: bold;
			border: 1px solid black;
			padding: 10px;
			text-align: center;
		}

		td {
			font-weight: lighter;
		}
	</style>
</head>

<body>
	<section>
		<h1>ORDERS TABLE</h1>
		<!-- TABLE CONSTRUCTION-->
		<table>
			<tr>
				<th>order id</th>
				<th>customer</th>
				<th>order value</th>
				<th>created at</th>
				<th>status</th>
			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS-->
			<?php // LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
				<!--FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN-->
				<td><?php echo $rows['orderid'];?></td>
				<td><?php echo $rows['customer'];?></td>
				<td><?php echo $rows['order_value'];?></td>
				<td><?php echo $rows['created_at'];?></td>
				<td><?php echo $rows['status'];?></td>
			</tr>
			<?php
				}
			?>
		</table>
	</section>
	<p><a href="logout.php" class="f90-logout-button">Logout</a></p>

<?php echo($msg); ?>
</body>

</html>
