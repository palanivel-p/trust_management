<?php
// $website="https://atct.in/";
$website="http://localhost/atct_web/";
$servername = 'localhost';
// $username = 'developer_atct';
$username = 'root';
$password = '';
// $password = '_f4q765Oi';
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
