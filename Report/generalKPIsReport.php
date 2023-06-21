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
    <link href="../as../sets/vendor/quill/quill.snow.css" rel="stylesheet">
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
                            <a class="dropdown-item d-flex align-items-center" href="#">
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
                <a class="nav-link collapsed" href="index.html">
                    <i class="bi bi-grid"></i>
                    <span>User Lists</span>
                </a>
            </li>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="index.html">
                    <i class="bi bi-grid"></i>
                    <span>Log Out</span>
                </a>
            </li><!-- End Components Nav -->
        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">
        <?php
        include("connection.php");

        $query = "SELECT COUNT(*) AS total_users FROM user";
        $result = mysqli_query($db, $query) or die("Query failed: " . mysqli_error($db));

        $result && mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        $total_users = $row["total_users"];

        $query = "SELECT COUNT(*) AS total_posts FROM post";
        $result = mysqli_query($db, $query) or die("Query failed: " . mysqli_error($db));

        $result && mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        $total_posts = $row["total_posts"];

        $engagementRate = $total_posts / $total_users * 100;

        // Get the june month and current year
        $targetMonth = '06'; //June
        $currentYear = date('Y');

        // Construct the start and end dates of the month
        $startDate = $currentYear . '-' . $targetMonth . '-01';
        $endDate = $currentYear . '-' . $targetMonth . '-30';

        // Query to count the active users within the specified month
        $query = "SELECT COUNT(*) AS active_users FROM user WHERE user_LastLogin BETWEEN '$startDate' AND '$endDate'";
        $result = mysqli_query($db, $query);

        $result && mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        $activeUsersCount = $row['active_users'];

        $retentionRate = $activeUsersCount / $total_users * 100;
        ?>

        <div class="pagetitle">
            <h1>General KPIs</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="../Report/reportKPIs.php">Home</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <!-- Default Card -->
        <section class="section dashboard">
            <div class="row">
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Engagement Rate <span> | This month (June)</span></h5>

                            <div class="d-flex align-items-center">

                                <div class="ps-3">
                                    <h6>
                                        <?php
                                        echo $engagementRate . "%";
                                        ?>
                                    </h6>
                                    <span class="text-success small pt-1 fw-bold">10%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Retention Rate <span> | This month (June)</span></h5>

                            <div class="d-flex align-items-center">

                                <div class="ps-3">
                                    <h6>
                                        <?php
                                        echo $retentionRate . '%';
                                        ?>
                                    </h6>
                                    <span class="text-success small pt-1 fw-bold">5%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Stats <span> | This month (June)</span></h5>

                            <div class="d-flex align-items-center">

                                <div class="ps-3">
                                    <span class="text-success small pt-1 fw-bold">
                                        <?php
                                        echo $activeUsersCount;
                                        ?>
                                    </span>
                                    <span class="text-muted small pt-2 ps-1">Active Users</span><br>
                                    <span class="text-success small pt-1 fw-bold">
                                    <?php
                                        echo $total_users;
                                        ?>
                                    </span>
                                    <span class="text-muted small pt-2 ps-1">Total Users</span><br>
                                    <span class="text-success small pt-1 fw-bold"><?php
                                        echo $total_posts;
                                        ?>
                                    </span>
                                    <span class="text-muted small pt-2 ps-1">Total Posts</span>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section class="section">

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Engagement Rate</h5>

                            <!-- Donut Chart -->
                            <div id="donutChart"></div>

                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    const engagementRate = <?php echo $engagementRate; ?>;
                                    new ApexCharts(document.querySelector("#donutChart"), {
                                        series: [engagementRate, 100 - engagementRate],
                                        chart: {
                                            height: 350,
                                            type: 'donut',
                                            toolbar: {
                                                show: true
                                            }
                                        },
                                        labels: ['Posts rate', 'Inactive'],
                                    }).render();
                                });
                            </script>
                            <!-- End Donut Chart -->

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Retention Rate</h5>

                            <!-- Pie Chart -->
                            <div id="pieChart"></div>

                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    const activeUsersCount = <?php echo $activeUsersCount; ?>;
                                    const total_users = <?php echo $total_users; ?>;
                                    new ApexCharts(document.querySelector("#pieChart"), {
                                        series: [activeUsersCount, total_users - activeUsersCount],
                                        chart: {
                                            height: 350,
                                            type: 'pie',
                                            toolbar: {
                                                show: true
                                            }
                                        },
                                        labels: ['Active users', 'Inactive users']
                                    }).render();
                                });
                            </script>
                            <!-- End Pie Chart -->

                        </div>
                    </div>
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