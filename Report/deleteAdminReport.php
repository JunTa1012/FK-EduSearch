<?php
include("connection.php");

if (isset($_GET['R_ID'])) {
  $reportID = $_GET['R_ID'];

  $sql = "DELETE FROM report WHERE R_ID = $reportID";

  if (mysqli_query($db, $sql)) {
    // Deletion successful
    $message = "You have delete a report";
    echo "<script>alert('$message');</script>";
    echo "<script type = 'text/javascript'> window.location='adminReportList.php' </script>";

  } else {
    // Error occurred during deletion
    echo "Error: " . mysqli_error($db);
  }
} else {
  echo "Report ID not provided.";
}
?>