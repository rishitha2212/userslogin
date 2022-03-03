<?php      
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "empdb";  
    $con = mysqli_connect($host, $user, $password, $db_name);
    $orderid = $_GET['a'];
    $invoice_id = $_GET['a'];
    $ship_id = $_GET['a'];
    $sql = "select * from orders_table where orderid = '$orderid'";
    $result = mysqli_query($con, $sql);
    $sql1 = "select * from invoice_table where invoice_id ='$invoice_id'";
    $result1 = mysqli_query($con, $sql1); 
    $sql2 = "select * from shipment_table where ship_id ='$ship_id'";
    $result2 = mysqli_query($con, $sql2);  
?>

<form action="" method="post">
<table border=1>
	<?php while($r1 = mysqli_fetch_array($result2,MYSQLI_ASSOC))
{
	?>

	<tr>
		<td><input type="hidden" name=sh value="<?php echo $r1['ship_id']; ?>">
		<input type="text" name=in value="<?php echo $r1['invoice_id']; ?>"></td>
	</tr>
	<tr>
		<td><input type="text" name=or value="<?php echo $r1['order_id']; ?>"></td>
	</tr>
	<tr>
		<td><input type="text" name=cu value="<?php echo $r1['customer']; ?>"></td>
	</tr>
	<tr>
		<td><input type="text" name=va value="<?php echo $r1['value']; ?>"></td>
	</tr>
	<tr>
		<td><input type="text" name=at value="<?php echo $r1['created_at']; ?>"></td>
	</tr>
	<tr>
		<td><input type="text" name=st value="<?php echo $r1['status']; ?>"></td>
	</tr>
	<td><input type="submit" name="s" value="change now"></td>
	</tr>

<?php } ?>
</table>
</form>
<?php
if(isset($_POST['s']))
{
	$i = $_POST['in'];
	$o = $_POST['or'];
	$c = $_POST['cu'];
	$v = $_POST['va'];
	$a = $_POST['at'];
	$s = $_POST['st'];


	$sh = $_POST['sh'];
	$host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "empdb";  
    $con = mysqli_connect($host, $user, $password, $db_name);
	$resul2 = "update shipment_table set invoice_id='$i',order_id='$o',customer='$c', value='$v', created_at='$a', status='$s' where ship_id='$sh'";
	$a2 = mysqli_query($con,$resul2);
	echo "<script>window.location.href='table.php'</script>";

}?>



<form action="" method="post">
<table border=1>
	<?php while($r = mysqli_fetch_array($result,MYSQLI_ASSOC))
{
	?>

	<tr>
		<td><input type="hidden" name=nm value="<?php echo $r['orderid']; ?>">
		<input type="text" name=cu value="<?php echo $r['customer']; ?>"></td>
	</tr>
	<tr>
		<td><input type="text" name=va value="<?php echo $r['order_value']; ?>"></td>
	</tr>
	<tr>
		<td><input type="text" name=at value="<?php echo $r['created_at']; ?>"></td>
	</tr>
	<tr>
		<td><input type="text" name=st value="<?php echo $r['status']; ?>"></td>
	</tr>
	<td><input type="submit" name="s" value="change now"></td>
	</tr>

<?php } ?>
</table>
</form>
<?php
if(isset($_POST['s']))
{
	$c = $_POST['cu'];
	$v = $_POST['va'];
	$a = $_POST['at'];
	$s = $_POST['st'];


	$nm = $_POST['nm'];
	$host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "empdb";  
    $con = mysqli_connect($host, $user, $password, $db_name);
	$resul = "update orders_table set customer='$c', order_value='$v', created_at='$a', status='$s' where orderid='$nm'";
	$a = mysqli_query($con,$resul);
	echo "<script>window.location.href='table.php'</script>";

}
?>



<form action="" method="post">
<table border=1>
	<?php while($rows = mysqli_fetch_array($result1,MYSQLI_ASSOC))
{
	?>

	<tr>
		<td><input type="hidden" name=mo value="<?php echo $rows['invoice_id']; ?>">
		<input type="text" name=or value="<?php echo $rows['order_id']; ?>"></td>
	</tr>
	<tr>
		<td><input type="text" name=cu value="<?php echo $rows['customer']; ?>"></td>
	</tr>
	<tr>
		<td><input type="text" name=va value="<?php echo $rows['invoice_value']; ?>"></td>
	</tr>
	<tr>
		<td><input type="text" name=at value="<?php echo $rows['created_at']; ?>"></td>
	</tr>
	<tr>
		<td><input type="text" name=st value="<?php echo $rows['status']; ?>"></td>
	</tr>
	<td><input type="submit" name="s" value="change now"></td>
	</tr>

<?php } ?>
</table>
</form>
<?php
if(isset($_POST['s']))
{
	$o = $_POST['or'];
	$c = $_POST['cu'];
	$v = $_POST['va'];
	$a = $_POST['at'];
	$s = $_POST['st'];


	$mo = $_POST['mo'];
	$host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "empdb";  
    $con = mysqli_connect($host, $user, $password, $db_name);
	$resul1 = "update invoice_table set order_id='$o',customer='$c',invoice_value='$v',created_at='$a', status='$s' where invoice_id='$mo'";
	$a1 = mysqli_query($con,$resul1);
	echo "<script>window.location.href='table.php'</script>";

}
?>



