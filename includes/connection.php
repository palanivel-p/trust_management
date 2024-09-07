<?php
$website="https://atct.in/";
$servername = 'localhost';
$username = 'developer_atct';
$password = '_f4q765Oi';
$dbname = 'atct';
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
	die("connection failed:".mysqli_connect_error());
}
// else
// {
// 	echo "connection success";
// }
?>
