<?php
// Database connection settings
include 'dbconnection.php';


// Check if a complaint ID is provided
if (isset($_GET['complaint_id'])) {
    $complaintId = $_GET['complaint_id'];
    // Retrieve the complaint details from the database
    $sql = "SELECT * FROM complaint_list WHERE Complaint_ID = $complaintId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $complaintType = $row['Complaint_type'];
        $description = $row['Complaint_description'];
        $time = $row['Complaint_time'];
        $date = $row['Complaint_date'];
    } else {
        echo "Complaint not found.";
        exit;
    }
} else {
    echo "No complaint ID provided.";
    exit;
}


$conn->close();
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
                <h1>View Complaint</h1>
            </div>
        </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="col-md-6">
                <div class="">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="description">User: Izzan</label><br>                 
                            <label for="date">Date: <?php echo $date; ?></label><br>
                            <label for="time">Time: <?php echo $time; ?></label>
                        </div>
                        <div class="form-group">
                            <label for="complainttype">Type of Complaints</label>
                            <select id="complainttype" class="form-control custom-select" disabled>
                                <option selected disabled>Choose the type of complaint</option>
                                <option value="Unsatisfied Expert's Feedback" <?php if ($complaintType === "Unsatisfied Expert's Feedback") echo 'selected'; ?>>Unsatisfied Expert's Feedback</option>
                                    <option value="Wrongly Assigned Research Area" <?php if ($complaintType === "Wrongly Assigned Research Area") echo 'selected'; ?>>Wrongly Assigned Research Area</option>
                                    <option value="Misleading or Incorrect Information" <?php if ($complaintType === "Misleading or Incorrect Information") echo 'selected'; ?>>Misleading or Incorrect Information</option>
                                 </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" class="form-control" row="4" placeholder="Write a description of the complaint" disabled><?php echo $description; ?></textarea>
                        </div>
                        <div class="row">
                            <div class="col-12">
                            <a href="complaintmainpage.php" class="btn btn-secondary">Back</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </section>
    </div>
</body>
</html>
