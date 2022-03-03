<?php
$nm = $_GET['a'];
$mo = $_GET['a'];
$sh = $_GET['a'];


$host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "empdb";  
    $con = mysqli_connect($host, $user, $password, $db_name);
    $sql = "delete from orders_table where orderid ='$nm'";
    $result = mysqli_query($con, $sql);
    $sql1 = "delete from invoice_table where invoice_id ='$mo'";
    $result1 = mysqli_query($con, $sql1);   
    $sql2 = "delete from shipment_table where ship_id ='$sh'";
    $result2 = mysqli_query($con, $sql2);
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    } 
    header("location:table.php");

?>