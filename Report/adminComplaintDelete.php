<?php

include 'dbconnection.php';

// Disable foreign key checks
$conn->query('SET FOREIGN_KEY_CHECKS = 0');

// Delete data from the database
$id = $_GET['complaint_id'];

$sql = "DELETE FROM complaint_list WHERE Complaint_ID=$id";

if ($conn->query($sql) === TRUE) {
  header("Location: adminComplaintList.php");
} else {
  echo "Error: " . $sql . "<br>";
}


// Re-enable foreign key checks
$conn->query('SET FOREIGN_KEY_CHECKS = 1');

$conn->close();
?>