<?php

$hostname_connections = "localhost";
$database_connections = "dbcheck";
$username_connections = "root";
$password_connections = "";
$connections = mysqli_connect($hostname_connections, $username_connections, $password_connections) or trigger_error(mysqli_error(),E_USER_ERROR); 
?>