<?php
include_once 'config.php';

include 'sessionAdmin.php';

// Get the current page number from the URL parameter
$currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Determine the number of records to display per page
$recordsPerPage = 5;

// Calculate the offset based on the current page and records per page
$offset = ($currentPage - 1) * $recordsPerPage;

// Modify the SQL query with the LIMIT clause
$sql = "SELECT * FROM user LIMIT $offset, $recordsPerPage";

// Retrieve the total number of records
$totalRecords = $conn->query("SELECT COUNT(*) as total FROM user")->fetch_assoc()['total'];

// Calculate the total number of pages based on the total number of records and records per page
$totalPages = ceil($totalRecords / $recordsPerPage);

// Calculate the previous and next page numbers
$previousPage = ($currentPage > 1) ? $currentPage - 1 : 1;
$nextPage = ($currentPage < $totalPages) ? $currentPage + 1 : $totalPages;

// Delete functionality
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $deleteSql = "DELETE FROM user WHERE User_ID = $id";

    if ($conn->query($deleteSql) === TRUE) {
        echo "Record deleted successfully";
        // Redirect back to the current page after deletion
        header("Location: {$_SERVER['PHP_SELF']}?page=$currentPage");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Retrieve the total number of users
$totalUsers = $conn->query("SELECT COUNT(*) as total FROM user")->fetch_assoc()['total'];
$totalExperts = $conn->query("SELECT COUNT(*) as total FROM expert")->fetch_assoc()['total'];

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FK-EduSearch | Knowledge Sharing System</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <!-- external stylesheet -->
    <link rel="stylesheet" href="AdminDashboard/style/style.css">
    <!-- <link rel="stylesheet" type="text/css" href="../AdminDashboard/style/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">
    <link rel="stylesheet" href="AdminDashboard/style/tablestyle.css">
    <style>
        .pagination-button {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            margin-right: 5px;
        }

        .pagination-button:hover {
            background-color: #0069d9;
        }

        .pagination-button:disabled {
            background-color: #e9ecef;
            color: #6c757d;
            cursor: not-allowed;
        }



        .rounded-square-container {
    display: flex;
}

.rounded-square {
    width: 150px; /* Adjust width as desired */
    height: 70px; /* Adjust height as desired */
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    font-weight: bold;
    font-size: 18px;
    margin-right: 10px; /* Add margin to create space between the squares */
}

.blue {
    background-color: blue;
    color: white;
}

.purple {
    background-color: purple;
    color: white;
}

.square-text {
    margin-bottom: 2px; /* Adjust margin as desired */
}


    </style>

</head>

<body>
<!-- title bar -->
<div id="title-bar">
    <!-- FK-EduSearch-->
    <a id="FK-EduSearch" class="FK Edu-Search">FK-EduSearch</a>

    <!-- search bar -->
    <div class="searchbar12">
        <input type="search" name="search" class="" placeholder="Search..." aria-label="Search" aria-describedby="search-addon" />
        <span class="input-group-text border-0" id="search-addon">
        <i class="fa fa-search" style='font-size:26px; color:white'></i>
        </span>
    </div>
    <!-- user profile -->
    <div>
        <a class="icon-link" href="#">
            Admin 
            <i class='fas fa-user-circle' style='font-size:36px;color:white'></i>
        </a>
    </div>
</div>

<div style="display: flex;">
    <!-- navigation bar (left side) -->
    <div>
        <nav id="nav-bar">
            <ul>
                <li><a class="nav-link" href="AdminHomepage.php">Home</a></li>
                <li><a class="nav-link" href="User/UserAccountProfile.php">Update User Profile</a></li>
                <li><a class="nav-link" href="../Complaint/adminComplaintList.php">Complaint Menu</a></li>
                <li><a class="nav-link" href="User/UserComplaint.php">User Report</a></li>
                <li><a class="nav-link" href="../Report/generalKPIsReport.php">Admin Report</a></li>
                <li><a class="nav-link active" href="User/PostReport.php">User Lists</a></li>
                <li><a class="nav-link" href="Logout.php">Log Out</a></li>
            </ul>
        </nav>
    </div>

    <div style="margin-top: 30px; margin-left: 50px;">
        <div class="card">

            <div class="rounded-square-container">
                <div class="rounded-square blue">
                    <span class="square-text">Total User</span>
                    <?php echo $totalUsers; ?>
                </div>
                <div class="rounded-square purple">
                    <span class="square-text">Total Experts</span>
                    <?php echo $totalExperts; ?>
                </div>
            </div>

        </div>
    
        <div class="card">
            <div class="row">
            <h4 style="margin-left: 50px; margin-top: 20px;" class="card-title">User Lists</h4>
            <a href="CreateUser.php" style="width: 100px; margin-left: 20px;  margin-top: 20px;" class="btn btn-primary">Create User</a>
            </div>
            <table class="table header-border">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Research Area</th>
                        <th>Academic Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = $conn->query($sql);
                    while ($row = $query->fetch_assoc()) {
                        echo "<tr>
                            <td>".$row['User_ID']."</td>
                            <td>".$row['user_name']."</td>
                            <td>".$row['user_email']."</td>
                            <td>".$row['user_phoneNum']."</td>
                            <td>".$row['user_researchArea']."</td>
                            <td>".$row['user_academicStatus']."</td>
                            <td>
                                <a href='edit_page.php?id=".$row['User_ID']."' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-edit'></span> Edit</a>
                                <a href='?action=delete&id=".$row['User_ID']."' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this record?\");'><span class='glyphicon glyphicon-trash'></span> Delete</a>
                            </td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>

            <div class="pagination">
                <?php if ($currentPage > 1): ?>
                    <a class="pagination-button" href="?page=<?php echo $previousPage; ?>">Previous</a>
                <?php else: ?>
                    <span class="pagination-button disabled">Previous</span>
                <?php endif; ?>

                <?php if ($currentPage < $totalPages): ?>
                    <a class="pagination-button" href="?page=<?php echo $nextPage; ?>">Next</a>
                <?php else: ?>
                    <span class="pagination-button disabled">Next</span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<script src="jquery/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTable.bootstrap.min.js"></script>
<script>
    // Event handler for searching the table based on user input
    $('.searchbar12 input').on('input', function() {
        var searchText = $(this).val().toLowerCase();

        $('tbody tr').each(function() {
            var rowText = $(this).text().toLowerCase();

            if (rowText.indexOf(searchText) > -1) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
    </script>

    
</body>
</html>
