<?php
// Database connection settings
include 'dbconnection.php';
session_start();
    // Number of complaints to display per page
    $complaintsPerPage = 8;
    $userid = 1;

    // Get the total number of complaints
    $sql = "SELECT * FROM complaint_list";
    $result = $conn->query($sql);
    $totalComplaints = mysqli_num_rows($result);
    
    // Calculate the total number of pages
    $totalPages = ceil($totalComplaints / $complaintsPerPage);

    // Get the current page from the query string
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

    // Calculate the offset for the SQL query
    $offset = ($currentPage - 1) * $complaintsPerPage;

    // Fetch only the complaints for the current page
    $sql = "SELECT cl.*, u.user_name FROM complaint_list AS cl JOIN user AS u ON cl.User_ID = u.user_ID WHERE cl.User_ID = $userid LIMIT $offset, $complaintsPerPage";
    $result = $conn->query($sql);
    $rows =  mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $username = $row['user_name'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FK-EduSearch | Knowledge Sharing System</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <!-- external stylesheet -->
    <link rel="stylesheet" href="style/module5.css">
</head>
<body>
    <!-- title bar -->
    <div id="title-bar">
        <!-- FK-EduSearch -->
        <a id="FK-EduSearch" class="FK Edu-Search">FK-EduSearch</a>

        <!-- search bar -->
        <div class="searchbar">
            <input type="search" id="search" class="rounded" placeholder="Search..." aria-label="Search" aria-describedby="search-addon" />
            <span class="input-group-text border-0" id="search-addon">
                <i class="fas fa-search" style="font-size:26px; color:white"></i>
            </span>
        </div>

        <!-- user profile -->
        <div>
            <a class="icon-link" href="#">
                <?php echo $username?>
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
            <div class="header">
                <div class="header-title">
                    <h2>Complaints</h2>
                </div>
                <div class="header-button">
                    <button type="button" class="btn btn-block btn-default" onclick="window.location.href='UserComplaintCreate.php'">New Complaint</button>
                </div>
            </div>
            <div class="table-wrapper">
                <div class="content">
                    <div style="margin-bottom: 12px;">
                        <label for="filter-status">Filter by Status:</label>
                        <select id="filter-status" class="btn btn-default" >
                            <option value="all">All</option>
                            <option value="On Hold">On Hold</option>
                            <option value="In Investigation">In Investigation</option>
                            <option value="Resolved">Resolved</option>
                        </select>
                        <label for="filter">Filter by Type of Complaint:</label>
                        <select id="filter" class="btn btn-default">
                            <option value="all">All</option>
                            <option value="Unsatisfied Expert's Feedback">Unsatisfied Expert's Feedback</option>
                            <option value="Wrongly Assigned Research Area">Wrongly Assigned Research Area</option>
                            <option value="Misleading or Incorrect Information">Misleading or Incorrect Information</option>
                        </select>
                        <button type="button" class="btn btn-default" style="float: right;" onclick="window.location.href='UserComplaintCalculate.php'">Calculate Complaint</button> 
                    </div>
                    <!-- CRUD tabcle -->
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 20%">Type of Complaints</th>
                                <th style="width: 40%">Brief Description</th>
                                <th style="width: 7%">Date</th>
                                <th style="width: 7%">Time</th>
                                <th style="width: 7%">Status</th>
                                <th style="width: 19%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $complaintID = $row['Complaint_ID'];
                                    $complaintType = $row['Complaint_type'];
                                    $description = $row['Complaint_description'];
                                    $complaintDate = $row['Complaint_date'];
                                    $complaintTime = $row['Complaint_time'];
                                    $status = $row['Complaint_status'];
                                    ?>
                                    <tr>
                                        <td><?php echo $complaintType; ?></td>
                                        <td><?php echo $description; ?></td>
                                        <td><?php echo $complaintDate; ?></td>
                                        <td><?php echo $complaintTime; ?></td>
                                        <td><span class="<?php echo getStatusBadgeClass($status); ?>"><?php echo $status; ?></span></td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="UserComplaintView.php?complaint_id=<?php echo $complaintID; ?>">
                                                <i class="fas fa-folder">
                                                </i>
                                                View
                                            </a>
                                            <a class="btn btn-info btn-sm" href="UserComplaintUpdate.php?complaint_id=<?php echo $complaintID; ?>">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="UserComplaintDelete.php?complaint_id=<?php echo $complaintID; ?>" onclick="return confirm('Are you sure you want to delete this complaint?')">
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!-- Pagination links -->
                    <div class="pagination">
                        <ul>
                            <?php if ($currentPage > 1) { ?>
                            <li>
                                <a href="?page=<?php echo ($currentPage - 1); ?>">Previous</a>
                            </li>
                            <?php } ?>
                            <?php for ($page = 1; $page <= $totalPages; $page++) { ?>
                            <li>
                                <a <?php if ($currentPage == $page) { echo 'class="active"'; } ?> href="?page=<?php echo $page; ?>"><?php echo $page; ?></a>
                            </li>
                            <?php } ?>
                            <?php if ($currentPage < $totalPages) { ?>
                            <li>
                                <a href="?page=<?php echo ($currentPage + 1); ?>">Next</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>              
        </div>
    </div>
    <?php
        function getStatusBadgeClass($status) {
        switch ($status) {
            case 'Resolved':
            return 'badge badge-success';
            case 'In Investigation':
            return 'badge badge-warning';
            case 'On Hold':
            return 'badge badge-danger';
            default:
            return 'badge';
        }
        }
    ?>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="style/module5.js"></script>
</html>

