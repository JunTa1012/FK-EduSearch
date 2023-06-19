<?php
// Database connection settings
include 'dbconnection.php';
    // Number of complaints to display per page
    $complaintsPerPage = 8;

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
    $sql = "SELECT * FROM complaint_list LIMIT $offset, $complaintsPerPage";
    $result = $conn->query($sql);
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
            <input type="search" class="rounded" placeholder="Search..." aria-label="Search" aria-describedby="search-addon" />
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
            <div class="header">
                <div class="header-title">
                    <h2>Complaints</h2>
                </div>
                <div class="header-button">
                    <button type="button" class="btn btn-block btn-default" onclick="window.location.href='createcomplaintpage.php'">New Complaint</button>
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
                        <button type="button" class="btn btn-default" style="float: right;" onclick="window.location.href='calcomplaintpage.php'">Calculate Complaint</button> 
                    </div>
                    <!-- CRUD tabcle -->
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 30%">Type of Complaints</th>
                                <th style="width: 30%">Brief Description</th>
                                <th style="width: 7%">Date</th>
                                <th style="width: 7%">Time</th>
                                <th style="width: 7%">Status</th>
                                <th style="width: 19%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Unsatisfied Expert's Feedback</td>
                                <td>The expert's feedback is lacking details</td>
                                <td>05 Jan 2023</td>
                                <td>07:38 A.M</td>
                                <td><span class="badge badge-success">Resolved</span></td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="viewcomplaintpage.php">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm" href="updatecomplaintpage.php">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="#">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
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
                                            <a class="btn btn-primary btn-sm" href="viewcomplaintpage.php?complaint_id=<?php echo $complaintID; ?>">
                                                <i class="fas fa-folder">
                                                </i>
                                                View
                                            </a>
                                            <a class="btn btn-info btn-sm" href="updatecomplaintpage.php?complaint_id=<?php echo $complaintID; ?>">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="delete.php?complaint_id=<?php echo $complaintID; ?>" onclick="return confirm('Are you sure you want to delete this complaint?')">
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                            <?php } ?>
                            <!-- Add more rows as needed -->
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
<script src="style/js.js"></script>
</html>

