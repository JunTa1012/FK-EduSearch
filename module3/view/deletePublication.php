<?php

include 'dbconnection.php';

// Disable foreign key checks
$conn->query('SET FOREIGN_KEY_CHECKS = 0');

// Delete data from the database
$id = $_GET['publication_id'];

$sql = "DELETE FROM publication_list WHERE Publication_ID=$id";

if ($conn->query($sql) === TRUE) {
  header("Location: publication.php");
} else {
  echo "Error: " . $sql . "<br>";
}


// Re-enable foreign key checks
$conn->query('SET FOREIGN_KEY_CHECKS = 1');

$conn->close();
