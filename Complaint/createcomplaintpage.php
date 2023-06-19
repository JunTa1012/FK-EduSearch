<?php
// Database connection settings
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
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FK-EduSearch | Knowledge Sharing System</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <!-- external stylesheet -->
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
<!-- title bar -->
<div id="title-bar">
    <!-- FK-EduSearch -->
    <a id="FK-EduSearch" class="FK Edu-Search">FK-EduSearch</a>

    <!-- search bar -->
    <div class="searchbar">
        <input type="search" class="" placeholder="Search..." aria-label="Search" aria-describedby="search-addon" />
        <span class="input-group-text border-0" id="search-addon">
            <i class="fas fa-search" style="font-size:26px; color:white"></i>
        </span>
    </div>

    <!-- user profile -->
    <div>
        <a class="icon-link" href="#">
            User
            <i class="fas fa-user-circle" style="font-size:36px;color:white"></i>
        </a>
    </div>
</div>

<!-- wrapper -->
<div class="wrapper">
    <!-- navigation bar (left side) -->
    <nav id="nav-bar">
        <ul>
            <li><a class="nav-link" href="User/UserHomepage.php">Home</a></li>
            <li><a class="nav-link" href="User/UserAccountProfile.php">Account Profile</a></li>
            <li><a class="nav-link" href="User/UserDiscussionBoard.php">Discussion Board</a></li>
            <li><a class="nav-link active" href="User/UserComplaint.php">Complaint</a></li>
            <li><a class="nav-link" href="User/TotalPost.php">Total Post</a></li>
            <li><a class="nav-link" href="User/PostReport.php">Post Report</a></li>
            <li><a class="nav-link" href="login.php">Log Out</a></li>
        </ul>
    </nav>

    <!-- content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <h1>Create a New Complaint</h1>
            </div>
        </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="col-md-6">
                <div class="">
                    <div class="form-body">
                        <form action="createcomplaintpage.php" method="POST">
                            <div class="form-group">
                                <label for="description">User: Izzan</label><br>                 
                                <label for="date">Date: <?php echo date('Y-m-d'); ?></label><br>
                                <label for="time">Time: <?php echo date('H:i:s'); ?></label>
                            </div>
                            <div class="form-group">
                                <label for="complainttype">Type of Complaints</label>
                                <select id="complainttype" name="complainttype" class="form-control custom-select">
                                    <option selected disabled>Choose the type of complaint</option>
                                    <option value="Unsatisfied Expert's Feedback">Unsatisfied Expert's Feedback</option>
                                    <option value="Wrongly Assigned Research Area">Wrongly Assigned Research Area</option>
                                    <option value="Misleading or Incorrect Information">Misleading or Incorrect Information</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" class="form-control" row="4" placeholder="Write a description of the complaint" required></textarea>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a href="complaintmainpage.php" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </section>
    </div>
</body>
</html>
