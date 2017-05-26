<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "project";

$db = mysqli_connect($server, $username, $password, $database);

if (!$db) {
	die("Couldn't connect" .mysqli_connect_error());
}
/*echo "Connected successfully";*/

?>