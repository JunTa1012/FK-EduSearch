<?php
    // Database connection settings
    include 'dbconnection.php';
    $userid = 1;
    $sql = "SELECT cl.*, u.user_name FROM complaint_list AS cl JOIN user AS u ON cl.User_ID = u.user_ID WHERE cl.User_ID = $userid";
    $result = $conn->query($sql);
    $rows =  mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $username = $row['user_name'];

    $query = "SELECT MONTHNAME(Complaint_date) AS month, Complaint_type, count(Complaint_ID) AS sum FROM complaint_list WHERE User_ID = $userid GROUP BY MONTH(Complaint_date), Complaint_type";
    $result = mysqli_query($conn, $query);
    $num_rows = mysqli_num_rows($result);
    $months = array();
    $complaintTypes = array();
    $sums = array();

    for ($i = 0; $i < $num_rows; $i++) {
        while ($row = mysqli_fetch_array($result, 1)) {
            $month = $row['month'];
            $complaintType = $row['Complaint_type'];
            $sum = $row['sum'];

            // Add the month if it's not already in the array
            if (!in_array($month, $months)) {
                $months[] = $month;
            }

            // Add the complaint type if it's not already in the array
            if (!in_array($complaintType, $complaintTypes)) {
                $complaintTypes[] = $complaintType;
            }

            // Store the sum for the specific month and complaint type combination
            $sums[$month][$complaintType] = $sum;
        }
    }

    // Generate the JavaScript variables for the chart
    $monthData = json_encode($months);
    $complaintTypeData = json_encode($complaintTypes);
    $sumData = json_encode($sums);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FK-EduSearch | Knowledge Sharing System</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <!-- External stylesheet -->
    <link rel="stylesheet" href="style/module5.css">
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
                <?php echo $username?>
                <i class="fas fa-user-circle" style="font-size:36px;color:white"></i>
            </a>
        </div>
    </div>

    <!-- Wrapper -->
    <div class="wrapper">
        <!-- Navigation bar (left side) -->
        <nav id="nav-bar" >
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
                        <button type="button" class="btn btn-block btn-default" onclick="window.location.href='UserComplaintCalculate.php'">Go Back</button>
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
        var monthData = <?php echo $monthData; ?>;
        var complaintTypeData = <?php echo $complaintTypeData; ?>;
        var sumData = <?php echo $sumData; ?>;
        var csvContent = "data:text/csv;charset=utf-8,";

        // Generate the CSV content
        var headers = ["Month"].concat(complaintTypeData);
        csvContent += headers.join(",") + "\r\n";
        monthData.forEach(function(month) {
            var row = [month];
            complaintTypeData.forEach(function(complaintType) {
                var sum = sumData[month][complaintType] || 0;
                row.push(sum);
            });
            csvContent += row.join(",") + "\r\n";
        });

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
        // Assuming you have the values for monthData, complaintTypeData, and sumData
        var months = <?php echo $monthData; ?>;
        var complaintTypes = <?php echo $complaintTypeData; ?>;
        var sums = <?php echo $sumData; ?>;
        var barColors = ["#53acff", "#ff5b5b", "#f9c851"]; // Adjust the colors as needed

        // Create the datasets
        var datasets = [];
        for (var i = 0; i < complaintTypes.length; i++) {
            var complaintType = complaintTypes[i];
            var data = [];
            for (var j = 0; j < months.length; j++) {
                var month = months[j];
                var sum = sums[month][complaintType] || 0; // Handle missing sums
                data.push(sum);
            }

            datasets.push({
                label: complaintType,
                backgroundColor: barColors[i % barColors.length], // Loop through colors
                data: data
            });
        }

        // Create the bar chart
        new Chart("chart", {
            type: "bar",
            data: {
                labels: months,
                datasets: datasets
            },
            options: {
                title: {
                    display: true,
                    text: "Total Complaints of Each Month"
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

        // Generate the QR code text
        var qrCodeText = "";
        var months = <?php echo $monthData; ?>;
        var complaintTypes = <?php echo $complaintTypeData; ?>;
        var sums = <?php echo $sumData; ?>;

        for (var i = 0; i < months.length; i++) {
            var month = months[i];
            var complaintTypes = <?php echo $complaintTypeData; ?>;
            var sums = <?php echo $sumData; ?>;

            qrCodeText += month + ":\r\n";

            for (var j = 0; j < complaintTypes.length; j++) {
                var complaintType = complaintTypes[j];
                var sum = sums[month][complaintType] || 0; // Set undefined sums to 0
                qrCodeText += complaintType + ": " + sum + " Complaints\r\n";
            }

            qrCodeText += "\r\n";
        }

        // Create the QR Code
        var qrcode = new QRCode(document.getElementById("QRCode"), {
            text: qrCodeText,
            width: 128,
            height: 128,
            colorDark: "#53acff",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });
    }
    displayReport();
    // Bind the downloadReport function to the QR code section
    document.getElementById("QRCode").onclick = downloadReport;
</script>

</html>
