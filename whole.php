<?php
include('connection.php');

// SQL query to select data from database
$sql1 = "SELECT * FROM orders_table";
$result1 = $con->query($sql1);

$sql2 = "SELECT * FROM invoice_table";
$result2 = $con->query($sql2);

$sql3 = "SELECT * FROM shipment_table";
$result3 = $con->query($sql3);
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
				while($rows=$result1->fetch_assoc())
				{
			?>
			<tr>
				<!--FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN-->
				<td><?php echo $rows['order_id'];?></td>
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
	<section>
		<h1>INVOICES TABLE</h1>
		<!-- TABLE CONSTRUCTION-->
		<table>
			<tr>
				<th>invoice id</th>
				<th>order id</th>
				<th>customer</th>
				<th>invoice value </th>
				<th>created at</th>
				<th>status</th>
			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS-->
			<?php // LOOP TILL END OF DATA
				while($rows=$result2->fetch_assoc())
				{
			?>
			<tr>
				<!--FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN-->
				<td><?php echo $rows['invoice_id'];?></td>
				<td><?php echo $rows['order_id'];?></td>
				<td><?php echo $rows['customer'];?></td>
				<td><?php echo $rows['invoice_value'];?></td>
				<td><?php echo $rows['created_at'];?></td>
				<td><?php echo $rows['status'];?></td>
			</tr>
			<?php
				}
			?>
		</table>
	</section>
	<section>
		<h1>SHIPMENT TABLE</h1>
		<!-- TABLE CONSTRUCTION-->
		<table>
			<tr>
				<th>ship id</th>
				<th>invoice id</th>
				<th>order id</th>
				<th>customer</th>
				<th>value </th>
				<th>created at</th>
				<th>status</th>
			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS-->
			<?php // LOOP TILL END OF DATA
				while($rows=$result3->fetch_assoc())
				{
			?>
			<tr>
				<!--FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN-->
				<td><?php echo $rows['ship_id'];?></td>
				<td><?php echo $rows['invoice_id'];?></td>
				<td><?php echo $rows['order_id'];?></td>
				<td><?php echo $rows['customer'];?></td>
				<td><?php echo $rows['value'];?></td>
				<td><?php echo $rows['created_at'];?></td>
				<td><?php echo $rows['status'];?></td>
			</tr>
			<?php
				}
			?>
		</table>
	</section>
</body>

</html>
