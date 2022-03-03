<?php

// Inialize session
session_start();
include('connection.php');
// Check, if username session is NOT set then this page will jump to login page
?>

<?php      
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "empdb";  
    $con = mysqli_connect($host, $user, $password, $db_name);
    $sql = "select * from orders_table";
    $result = mysqli_query($con, $sql);  
    $sql1 = "select * from invoice_table";
    $result1 = mysqli_query($con, $sql1);
    $sql2 = "select * from shipment_table";
    $result2 = mysqli_query($con, $sql2);
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>

<h2>ORDERS TABLE</h2>
<table border =1>

	<tr>
		<th>order id </th>
		<th>customer</th>
		<th>order value</th>
		<th>created at</th>
		<th>status</th>

		<th>delete</th>
		<th>update</th>
	</tr>

<?php while($r = mysqli_fetch_array($result,MYSQLI_ASSOC))
{
?>
   	<tr>
   		<td><?php echo $r['orderid']; ?></td>
   		<td><?php echo $r['customer']; ?></td>
   		<td><?php echo $r['order_value']; ?></td>
   		<td><?php echo $r['created_at']; ?></td>
   		<td><?php echo $r['status']; ?></td>

   		<td><a href="del.php?a=<?php echo $r['orderid']; ?>">Remove</a></td>
   		<td><a href="update.php?a=<?php echo $r['orderid']; ?>">change</a></td>
   	</tr>

<?php } ?>
</table>
<br>
<br>
<br>


<h2>INVOICES TABLE</h2>
<table border=1>
	<tr>
		<th>invoice id</th>
		<th>order id</th>
		<th>customer</th>
		<th>invoice value </th>
		<th>created at</th>
		<th>status</th>

		<th>delete</th>
		<th>update</th>
	</tr>
<?php while($rows = mysqli_fetch_array($result1,MYSQLI_ASSOC))
{
?>
	<tr>
		<td><?php echo $rows['invoice_id'];?></td>
		<td><?php echo $rows['order_id'];?></td>
		<td><?php echo $rows['customer'];?></td>
		<td><?php echo $rows['invoice_value'];?></td>
		<td><?php echo $rows['created_at'];?></td>
		<td><?php echo $rows['status'];?></td>
				
		<td><a href="del.php?a=<?php echo $rows['invoice_id']; ?>">Remove</a></td>
   		<td><a href="update.php?a=<?php echo $rows['invoice_id']; ?>">change</a></td>
	</tr>
<?php
}?>
    </table>
<br>
<br>
<br>


<h2>SHIPMENT TABLE</h2>

<table border =1>

	<tr>
		<th>ship id</th>
		<th>invoice id</th>
		<th>order id</th>
		<th>customer</th>
		<th>value </th>
		<th>created at</th>
		<th>status</th>

		<th>delete</th>
		<th>update</th>
	</tr>

<?php while($r1 = mysqli_fetch_array($result2,MYSQLI_ASSOC))
{
?>
   	<tr>
   		<td><?php echo $r1['ship_id'];?></td>
		<td><?php echo $r1['invoice_id'];?></td>
		<td><?php echo $r1['order_id'];?></td>
		<td><?php echo $r1['customer'];?></td>
		<td><?php echo $r1['value'];?></td>
		<td><?php echo $r1['created_at'];?></td>
		<td><?php echo $r1['status'];?></td>>

   		<td><a href="del.php?a=<?php echo $r1['ship_id']; ?>">Remove</a></td>
   		<td><a href="update.php?a=<?php echo $r1['ship_id']; ?>">change</a></td>
   	</tr>

<?php } ?>
</table>
<html>

<head>
</head>

<body>

<p><a href="logout.php">Logout</a></p>
</body>

</html>