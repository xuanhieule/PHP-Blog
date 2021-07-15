<?php 
session_start();
$server = "localhost";
$username = "root";
$password = "123456";
$db_name = "blog";

$connection = new mysqli($server, $username, $password, $db_name);

if ($connection->connect_error) {
	die ("<h5 class='error'>Kết nối không thành công</h5><br />" . $connection->connect_error);
	mysqli_query($connection,"SET NAMES 'UTF8'");
}
?>
