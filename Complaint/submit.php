include 'dbconnection.php';

date_default_timezone_set('Asia/Kuala_Lumpur');
$date = date('Y-m-d'); // Get the current date
$time = date('H:i:s'); // Get the current time
  
// Create a new complaint
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get form data
        $complaintType = mysqli_real_escape_string($conn, $_POST['complainttype']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $status = "In Investigation";
        $userid = "1";
        $adminid = "1";

        $sql = "INSERT INTO complaint_list (Complaint_date, Complaint_time, Complaint_type, Complaint_description, Complaint_status, User_ID, Admin_ID)
                VALUES ('$date', '$time', '$complaintType', '$description', '$status', '$userid', '$adminid')";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: complaintmainpage.php");
          } else {
            echo "Error: " . $sql . "<br>";
          }
          
          $conn->close();
}<?php
// Database connection settings
include 'dbconnection.php';
session_start();

date_default_timezone_set('Asia/Kuala_Lumpur');
$date = date('Y-m-d'); // Get the current date
$time = date('H:i:s'); // Get the current time
  
// Create a new complaint
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get form data
        $complaintType = mysqli_real_escape_string($conn, $_POST['complainttype']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $status = "In Investigation";
        $userid = "1";
        $adminid = "1";

        $sql = "INSERT INTO complaint_list (Complaint_date, Complaint_time, Complaint_type, Complaint_description, Complaint_status, User_ID, Admin_ID)
                VALUES ('$date', '$time', '$complaintType', '$description', '$status', '$userid', '$adminid')";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: complaintmainpage.php");
          } else {
            echo "Error: " . $sql . "<br>";
          }
          
          $conn->close();
}
?>