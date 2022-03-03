<?php

// Inialize session

// Include database connection settings
include('connection.php');
$username = $_POST['username'];  
$password = md5($_POST['password']); 

$username = mysqli_real_escape_string($con, $username);  
$password = mysqli_real_escape_string($con, $password);  

// Retrieve username and password from database according to user's input
$login = mysqli_query($con,"SELECT * FROM users_table WHERE username = '$username' and password = '$password'");
$row = $login->fetch_assoc();
// Check username and password match
 if (mysqli_num_rows($login) == 1) {
// Set username session variable
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
    $identi = $row['role_id'];
    session_start();
    $_SESSION['sid']=session_id();
    $user1 = $_SESSION['sid'];
    $_SESSION["role_id"] = $identi;
// Jump to secured page
    if($_SESSION['role_id'] == 1 ){
        header("Location: http://localhost/table.php",true,301);
        $update = "INSERT INTO accesslog (username) values ('$user1')";
        $resu = mysqli_query($con,$update);
        $sql="UPDATE accesslog SET timelogin = 1 WHERE username = '$user1'";
        $result = mysqli_query($con,$sql);
    }
    elseif ($_SESSION['role_id'] == 2 ) {
        header("Location: http://localhost/orders.php", true, 301);
    }             
    elseif ($_SESSION['role_id'] == 3 ) {
        header("Location: http://localhost/invoice.php", true, 301);
    }  
    elseif ($_SESSION['role_id'] == 4 ) {
        header("Location: http://localhost/shipment.php", true, 301);
    }  
    else{
         echo "error!!!";
    }
}
else {
// Jump to login page
    echo "wrong";
}

?>
