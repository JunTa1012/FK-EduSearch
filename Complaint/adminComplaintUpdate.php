<?php
include("dbconnection.php");
session_start();
include_once '../module1/sessionAdmin.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>FK-EduSearch/ReportList</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <span class="d-none d-lg-block">FK-EduSearch</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">4</span>
                    </a><!-- End Notification Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have 4 new notifications
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-exclamation-circle text-warning"></i>
                            <div>
                                <h4>Lorem Ipsum</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>30 min. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-x-circle text-danger"></i>
                            <div>
                                <h4>Atque rerum nesciunt</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>1 hr. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-check-circle text-success"></i>
                            <div>
                                <h4>Sit rerum fuga</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>2 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-info-circle text-primary"></i>
                            <div>
                                <h4>Dicta reprehenderit</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer">
                            <a href="#">Show all notifications</a>
                        </li>

                    </ul><!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-chat-left-text"></i>
                        <span class="badge bg-success badge-number">3</span>
                    </a><!-- End Messages Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                        <li class="dropdown-header">
                            You have 3 new messages
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="../assets/img/messages-1.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>Maria Hudson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>4 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="../assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>Anna Nelson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>6 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="../assets/img/messages-3.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>David Muldon</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>8 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="dropdown-footer">
                            <a href="#">Show all messages</a>
                        </li>

                    </ul><!-- End Messages Dropdown Items -->

                </li><!-- End Messages Nav -->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="../assets/img/reportList/user.png" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">June</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>June</h6>
                            <span>Web Designer</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="../module1/logout.php">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="../module1/AdminHomepage.php">
                    <i class="bi bi-grid"></i>
                    <span>Home</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="index.html">
                    <i class="bi bi-grid"></i>
                    <span>Update User Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="../Complaint/adminComplaintList.php">
                    <i class="bi bi-grid"></i>
                    <span>Complaint Menu</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="index.html">
                    <i class="bi bi-grid"></i>
                    <span>User Report</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="index.html">
                    <i class="bi bi-grid"></i>
                    <span>Total Post</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Admin Report</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="../Report/generalKPIsReport.php">
                            <i class="bi bi-circle"></i><span>General KPIs</span>
                        </a>
                    </li>
                    <li>
                        <a href="../Report/KPIsReport.php">
                            <i class="bi bi-circle"></i><span>KPIs Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="../Report/adminReportList.php">
                            <i class="bi bi-circle"></i><span>Report List</span>
                        </a>
                    </li>
                </ul>
            </li>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="../module1/AdminUserLists.php">
                    <i class="bi bi-grid"></i>
                    <span>User Lists</span>
                </a>
            </li>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="../module1/logout.php">
                    <i class="bi bi-grid"></i>
                    <span>Log Out</span>
                </a>
            </li><!-- End Components Nav -->
        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Complaint</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="../Report/reportKPIs.php">Home</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <?php

        if (isset($_GET['complaint_id'])) {
            $complaintID = $_GET['complaint_id'];

            // Retrieve the report data
            $sql = "SELECT c.Complaint_ID, c.Complaint_type, c.Complaint_date, c.Complaint_time, c.Complaint_description, c.Complaint_status, u.user_id, u.user_name
                  FROM complaint_list AS c JOIN user AS u ON c.User_ID = u.User_ID;";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
            } else {
                echo "Complaint not found.";
            }
        } else {
            echo "Complaint ID not provided.";
        }

        if (isset($_POST["submit"])) {
            //get POST Data
            $type = $_POST["Complaint_type"];
            $username = $_POST["user_name"];
            $description = $_POST["Complaint_description"];
            $status = $_POST["Complaint_status"];

            // Update the report
            $updateQuery = "UPDATE complaint_list SET Complaint_status = '$status' WHERE Complaint_ID = $complaintID";

            if (mysqli_query($conn, $updateQuery)) {
                $message = "Complaint status updated successfully.";
                echo "<script>alert('$message');</script>";
                echo "<script type='text/javascript'>window.location='adminComplaintList.php'</script>";
            } else {
                echo "Error updating complaint status: " . mysqli_error($conn);
            }
        }
        ?>

        <section class="section">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Complaint Status</h5>
                    <form class="row g-3" method="POST">
                        <div class="col-sm-6">
                            <label for="inputName4" class="form-label">Report ID</label>
                            <input type="text" class="form-control" name="Complaint_type" value="<?php echo isset($row['Complaint_ID']) ? $row['Complaint_ID'] : ''; ?>" readonly>
                        </div>
                        <div class="col-sm-6">
                            <label for="inputName5" class="form-label">Report Type</label>
                            <input type="text" class="form-control" name="Complaint_type" value="<?php echo isset($row['Complaint_type']) ? $row['Complaint_type'] : ''; ?>" readonly>
                        </div>
                        <div class="col-sm-6">
                            <label for="inputName4" class="form-label">Complainant Name</label>
                            <input type="text" class="form-control" name="user_name" value="<?php echo isset($row['user_name']) ? $row['user_name'] : ''; ?>" readonly>
                        </div>
                        <div class="col-sm-6">
                            <label for="inputName4" class="form-label">Date</label>
                            <input type="text" class="form-control" name="Complaint_date" value="<?php echo isset($row['Complaint_date']) ? $row['Complaint_date'] : ''; ?>" readonly>
                        </div>
                        <div class="col-12">
                            <label for="inputName4" class="form-label">Report Description</label>
                            <input type="text" class="form-control" name="Complaint_description" value="<?php echo isset($row['Complaint_description']) ? $row['Complaint_description'] : ''; ?>" readonly>
                        </div>
                        <div class="col-sm-6">
                            <label for="inputName5" class="form-label">Report Status</label>
                            <select class="form-select" name="Complaint_status" aria-label="Default select example">
                                <option value="In Investigation" <?php echo isset($row['Complaint_status']) && $row['Complaint_status'] == 'In Investigation' ? 'selected' : ''; ?>>In Investigation</option>
                                <option value="Resolved" <?php echo isset($row['Complaint_status']) && $row['Complaint_status'] == 'Resolved' ? 'selected' : ''; ?>>Resolved</option>
                                <option value="On Hold" <?php echo isset($row['Complaint_status']) && $row['Complaint_status'] == 'On Hold' ? 'selected' : ''; ?>>On Hold</option>
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a type="reset" class="btn btn-dark" href="adminComplaintList.php">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>FK_EduSearch</span></strong>. All Rights Reserved
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/chart.js/chart.umd.js"></script>
    <script src="../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/vendor/quill/quill.min.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>

</html>