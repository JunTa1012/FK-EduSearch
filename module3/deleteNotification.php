<?php

include 'link/dbconnection.php';

// Disable foreign key checks
$conn->query('SET FOREIGN_KEY_CHECKS = 0');

// Delete data from the database
$id = $_GET['post_id'];

$sql = "DELETE FROM post WHERE Post_ID=$id";

if ($conn->query($sql) === TRUE) {
  header("Location: notification.php");
} else {
  echo "Error: " . $sql . "<br>";
}


// Re-enable foreign key checks
$conn->query('SET FOREIGN_KEY_CHECKS = 1');

$conn->close();
?>