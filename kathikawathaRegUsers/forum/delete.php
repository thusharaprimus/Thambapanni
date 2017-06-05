<?php
require_once ("connection.php");

$id = $_GET['id'];

// sql to delete a record
$sql = "DELETE FROM topics WHERE topic_id=$id";

if ($db->query($sql) === TRUE) {
header('Location: forumTopics.php');
} else {
    echo "Error deleting record: " . $db->error;
}


$db->close();
?>