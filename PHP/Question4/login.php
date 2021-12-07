<?php
$host = "localhost";
$user = "root";
$password = '';
$db_name = "database";

$con = mysqli_connect($host, $user, $password, $db_name);
if (mysqli_connect_errno()) {
    die("Failed to connect with MySQL: " . mysqli_connect_error());
}

$username = $_POST['user'];
$password = $_POST['pass'];
$sql = "select *from login where username = '$username' and password = '$password'";
$result = mysqli_query($con, $sql);
$count = mysqli_num_rows($result);

if ($count == 1) {
    echo "<h1><center> Login successful! Welcome :) </center></h1>";
} else {
    echo "<h1> Login failed. Invalid username or password.</h1>";
}