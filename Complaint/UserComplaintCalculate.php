<?php
// Database connection settings
include 'dbconnection.php';
session_start();
$userid = 1;
$sql = "SELECT cl.*, u.user_name FROM complaint_list AS cl JOIN user AS u ON cl.User_ID = u.user_ID WHERE cl.User_ID = $userid";
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
    <link rel="stylesheet" href="../assets/css/module5.css">
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
                <li><a class="nav-link" href="../User/UserHomepage.php">Home</a></li>
                <li><a class="nav-link" href="../User/UserAccountProfile.php">Account Profile</a></li>
                <li><a class="nav-link" href="../User/DiscussionBoard.php">Discussion Board</a></li>
                <li><a class="nav-link active" href="UserComplaint.php">Complaint</a></li>
                <li><a class="nav-link" href="../User/TotalPost.php">Total Post</a></li>
                <li><a class="nav-link" href="../User/PostReport.php">Post Report</a></li>
                <li><a class="nav-link" href="../login.php">Log Out</a></li>
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
                        <label for="filter-date">Calculate by:</label>
                        <select id="filter-date" class="btn btn-default">
                            <option value="all">All</option>
                            <option value="month">Month</option>
                            <option value="week">Week</option>
                            <option value="day">Day</option>
                        </select>
                        <button type="button" class="btn btn-default" style="float: right;" onclick="window.location.href='UserComplaintReport.php'">Generate Report</button> 
                        <button type="button" class="btn btn-default" style="float: right; margin-right:10px; " onclick="window.location.href='UserComplaint.php'">Go Back</button> 
                    </div>
                    <!-- CRUD table -->
                    <table id="complaintTableAll">
                        <thead>
                            <tr>
                                <th style="width: 20%">Date</th>
                                <th style="width: 50%">Type of Complaints</th>
                                <th style="width: 30%">Number of Complaints</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT SUM(Total_Complaints) AS Total FROM (SELECT COUNT(*) AS Total_Complaints FROM complaint_list WHERE User_ID = $userid GROUP BY Complaint_ID) AS subquery";
                                $result = $conn->query($sql);
                                $row = mysqli_fetch_assoc($result);
                                $totalComplaints = $row['Total'];
                                $sql = "SELECT Complaint_date, Complaint_type, COUNT(*) AS Total_Complaints FROM complaint_list WHERE User_ID = $userid GROUP BY Complaint_ID ORDER BY Complaint_date ASC";
                                $result = $conn->query($sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $date = $row['Complaint_date']; 
                                    $complaintType = $row['Complaint_type'];
                                    $totalComplaint = $row['Total_Complaints']; 
                                    
                                    ?>
                                    <tr data-date="<?php echo $date; ?>">
                                        <td><?php echo $date; ?></td>
                                        <td><?php echo $complaintType; ?></td>
                                        <td><?php echo $totalComplaint; ?></td>
                                    </tr>
                            <?php } ?>
                            <tr>
                                <td style=" text-align: center; ;width: 70%;" colspan="2">Total Complaints</td>
                                <td><?php echo $totalComplaints; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <table id="complaintTableDay">
                        <thead>
                            <tr>
                                <th style="width: 20%">Day</th>
                                <th style="width: 50%">Type of Complaints</th>
                                <th style="width: 30%">Number of Complaints</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Get the total number of complaints
                                $sql = "SELECT DAYNAME(Complaint_date) AS hari, Complaint_type, COUNT(*) AS Total_Complaints FROM complaint_list WHERE User_ID = $userid GROUP BY DAYNAME(Complaint_date), Complaint_type ORDER BY Complaint_date DESC";
                                $result = $conn->query($sql);
                                // Assuming you have the appropriate SQL query to fetch the data from the database
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $date = $row['hari']; // Replace 'Date' with the appropriate column name from your database
                                    $complaintType = $row['Complaint_type'];
                                    $totalComplaint = $row['Total_Complaints']; // Replace 'Total_Complaints' with the appropriate column name from your database
                                    ?>
                                    <tr data-date="<?php echo $date; ?>">
                                        <td><?php echo $date; ?></td>
                                        <td><?php echo $complaintType; ?></td>
                                        <td><?php echo $totalComplaint; ?></td>
                                    </tr>
                            <?php } ?>
                            <tr>
                                <td style=" text-align: center; ;width: 70%;" colspan="2">Total Complaints</td>
                                <td><?php echo $totalComplaints; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <table id="complaintTableWeek">
                        <thead>
                            <tr>
                                <th style="width: 20%">Week</th>
                                <th style="width: 50%">Type of Complaints</th>
                                <th style="width: 30%">Number of Complaints</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Get the total number of complaints
                                $sql = "SELECT WEEK(Complaint_date) AS minggu, Complaint_type, COUNT(*) AS Total_Complaints FROM complaint_list WHERE User_ID = $userid GROUP BY WEEK(Complaint_date), Complaint_type";
                                $result = $conn->query($sql);
                                // Assuming you have the appropriate SQL query to fetch the data from the database
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $date = $row['minggu']; // Replace 'Date' with the appropriate column name from your database
                                    $complaintType = $row['Complaint_type'];
                                    $totalComplaint = $row['Total_Complaints']; // Replace 'Total_Complaints' with the appropriate column name from your database
                                    ?>
                                    <tr data-date="<?php echo $date; ?>">
                                        <td><?php echo $date; ?></td>
                                        <td><?php echo $complaintType; ?></td>
                                        <td><?php echo $totalComplaint; ?></td>
                                    </tr>
                            <?php } ?>
                            <tr>
                                <td style=" text-align: center; ;width: 70%;" colspan="2">Total Complaints</td>
                                <td><?php echo $totalComplaints; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <table id="complaintTableMonth">
                        <thead>
                            <tr>
                                <th style="width: 20%">Month</th>
                                <th style="width: 50%">Type of Complaints</th>
                                <th style="width: 30%">Number of Complaints</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Get the total number of complaints
                                $sql = "SELECT MONTHNAME(Complaint_date) AS month, Complaint_type, COUNT(*) AS Total_Complaints FROM complaint_list WHERE User_ID = $userid GROUP BY MONTHNAME(Complaint_date), Complaint_type ORDER BY Complaint_date ASC";
                                $result = $conn->query($sql);
                                // Assuming you have the appropriate SQL query to fetch the data from the database
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $date = $row['month']; // Replace 'Date' with the appropriate column name from your database
                                    $complaintType = $row['Complaint_type'];
                                    $totalComplaint = $row['Total_Complaints']; // Replace 'Total_Complaints' with the appropriate column name from your database
                                    ?>
                                    <tr data-date="<?php echo $date; ?>">
                                        <td><?php echo $date; ?></td>
                                        <td><?php echo $complaintType; ?></td>
                                        <td><?php echo $totalComplaint; ?></td>
                                    </tr>
                            <?php } ?>
                            <tr>
                                <td style=" text-align: center; ;width: 70%;" colspan="2">Total Complaints</td>
                                <td><?php echo $totalComplaints; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>              
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    // Hide all tables initially except the 'All' table
    $('#complaintTableDay').hide();
    $('#complaintTableWeek').hide();
    $('#complaintTableMonth').hide();

    // Listen for changes in the filter-date select element
    $('#filter-date').change(function() {
        var selectedValue = $(this).val();

        // Hide all tables
        $('#complaintTableAll').hide();
        $('#complaintTableDay').hide();
        $('#complaintTableWeek').hide();
        $('#complaintTableMonth').hide();

        // Show the table based on the selected value
        if (selectedValue === 'all') {
        $('#complaintTableAll').show();
        } else if (selectedValue === 'day') {
        $('#complaintTableDay').show();
        } else if (selectedValue === 'week') {
        $('#complaintTableWeek').show();
        } else if (selectedValue === 'month') {
        $('#complaintTableMonth').show();
        }
    });

    // Trigger the change event on page load to display the initial table
    $('#filter-date').trigger('change');
    });
</script>
</html>

