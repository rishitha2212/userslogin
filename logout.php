<?php

session_start();
// Inialize session
include('connection.php');
// Delete certain session

 $_SESSION['sid']=session_id(); 
 $sql1="UPDATE accesslog SET timelogin = 0 WHERE username = '".$_SESSION['sid']."'";
$result1 = mysqli_query($con,$sql1);
unset($_SESSION['sid']);
// Jump to login page
session_destroy();
header("Location: http://localhost/index.php", true, 301);
die;

?>