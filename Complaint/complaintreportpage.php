<?php
    // Database connection settings
    include 'dbconnection.php';

    $query = "SELECT MONTHNAME(Complaint_date) AS month, count(Complaint_ID) AS sum FROM complaint_list GROUP BY MONTH(Complaint_date)";
    $result = mysqli_query($conn, $query);
    $num_row = mysqli_num_rows($result);
    $month = array();
    $sum = array();

    for ($i = 0; $i < $num_row; $i++) {
        while ($row = mysqli_fetch_array($result, 1)) {
            array_push($month, $row['month']);
            array_push($sum, $row['sum']);
        }
    }

    $sum_assoc = array_combine($month, $sum);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FK-EduSearch | Knowledge Sharing System</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <!-- External stylesheet -->
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <!-- Title bar -->
    <div id="title-bar">
        <!-- FK-EduSearch -->
        <a id="FK-EduSearch" class="FK Edu-Search">FK-EduSearch</a>

        <!-- Search bar -->
        <div class="searchbar">
            <input type="search" class="rounded" placeholder="Search..." aria-label="Search" aria-describedby="search-addon" />
            <span class="input-group-text border-0" id="search-addon">
                <i class="fas fa-search" style="font-size:26px; color:white"></i>
            </span>
        </div>

        <!-- User profile -->
        <div>
            <a class="icon-link" href="#">
                User
                <i class="fas fa-user-circle" style="font-size:36px;color:white"></i>
            </a>
        </div>
    </div>

    <!-- Wrapper -->
    <div class="wrapper">
        <!-- Navigation bar (left side) -->
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

        <!-- Content -->
        <div class="content-wrapper">
            <div class="header">
                <div class="header-title">
                    <h2>Complaint Report</h2> 
                </div>
            </div>

            <div class="table-wrapper">
                <div class="report">
                    <canvas id="chart" class="chart"></canvas>
                    <div class="QRCode-section">
                        <button type="button" class="btn btn-block btn-default" onclick="window.location.href='calcomplaintpage.php'">Go Back</button>
                        <br>
                        <div class="QR-background">
                            <div id="QRCode"></div>
                        </div>
                        <h4>Scan QR Code to view on phone in table form.</h4>
                        <br><br><br><br>
                        <button type="button" class="btn btn-block btn-default" onclick="downloadReport()">Download Report</button>
                    </div>
                </div>
            </div>              
        </div>
    </div>
</body>


<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>
    function downloadReport() {
        // Assuming you have the necessary data for generating the report
        var reportData = <?php echo json_encode($sum_assoc); ?>;
        var csvContent = "data:text/csv;charset=utf-8,";

        // Generate the CSV content
        csvContent += Object.keys(reportData).join(",") + "\r\n";
        csvContent += Object.values(reportData).join(",") + "\r\n";

        // Create a temporary link element to trigger the download
        var link = document.createElement("a");
        link.setAttribute("href", encodeURI(csvContent));
        link.setAttribute("download", "complaint_report.csv");
        link.style.display = "none";
        document.body.appendChild(link);
  
        // Trigger the download
        link.click();

        // Clean up
        document.body.removeChild(link);
    }

    function displayReport() {
        // Assuming you have the values for xValues, yValues, and year
        var xValues = <?php echo json_encode($month) ?>;
        var yValues = <?php echo json_encode($sum) ?>;
        var barColors = "#53acff";
        var year = new Date().getFullYear();

        // Create the bar chart
        new Chart("chart", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues,
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "Total Complaints of Each Month in year " + year
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        // Assuming you have the values for sum_assoc
        var qrCodeText = "";
        <?php foreach ($sum_assoc as $month => $sum) {
            echo 'qrCodeText += "' . $month . ' : ' . $sum . ' Complaints ' .'\r\n";';
        } ?>

        // Create the QR Code
        var qrcode = new QRCode(document.getElementById("QRCode"), {
            text: qrCodeText,
            width: 128,
            height: 128,
            colorDark: "#53acff",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });

        // Bind the downloadReport function to the QR code section
        document.getElementById("QRCode").onclick = downloadReport;
    }

    displayReport();
    // Bind the downloadReport function to the QR code section
    document.getElementById("QRCode").onclick = downloadReport;
</script>

</html>
