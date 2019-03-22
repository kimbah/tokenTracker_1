<?php

session_start();

$con = mysqli_connect('localhost', 'root', 'donna35drh');

mysqli_select_db($con, 'userregistration');

$name = $_POST['user'];
$pass = $_POST['password'];

$s = "SELECT * FROM usertable WHERE name = '$name' && password = '$pass'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1) {
    $_SESSION['username'] = $name;
    header('location:tracker/index.php');
} else {
    header('location:login.php');
}

?>