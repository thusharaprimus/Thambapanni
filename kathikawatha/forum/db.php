<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (!$conn){
    die("Database Connection Failed" . mysqli_error($conn));
}
$select_db = mysqli_select_db($conn, 'project');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($conn));
}
?>