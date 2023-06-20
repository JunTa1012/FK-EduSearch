<?php
// session_start();
include("./link/connect-database.php");
// $expert_ID = $_SESSION['Expert_ID'];
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FK-EduSearch | Knowledge Sharing System</title>

  <!-- external stylesheet -->
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="style/calReport.css">
  <!-- icon library | font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
  <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <script src="../../js/calculate-average-expenses/chart.js"></script>
</head>

<body>
  <!-- title bar -->
  <div style="height: 170px;width: 100%;display: flex;align-items: center;justify-content: space-between;padding: 22px 14px;background-color:#9021AC">
    <!-- FK-EduSearch-->
    <a id="FK-EduSearch" class="FK Edu-Search">FK-EduSearch</a>

    <!-- search bar -->
    <div>
      <input style="color:#5D0773;padding-left:50px;padding-top:10px;margin-bottom:12px;margin-left:1px;border:none;" type="search" placeholder="Search..." />
      <img style=" margin-right:10px ;padding-top:3px;margin-left:3px ;margin-top:128px;margin: bottom 1px;width:23px;height:23px" src="image/search.png" alt="search cant function">
    </div>
    <!-- user profile -->
    <div>
      <!-- <a class="icon-link" href="#"> -->
      <p style="margin-right:10px ;margin-left:3px ;margin-top:125px;margin-bottom:10px;">Expert<img style="width:30px;height:auto;" src="image/woman.png" alt="profile picture" </p>


        <!-- </a> -->
    </div>

  </div>

  <!-- navigation bar (left side) -->
  <nav style=" background-color:#F9DFFF;display: flex;flex-direction: column;justify-content: space-between;height: 100%;width: 255px;padding-top:18px;padding-bottom: 30px;">
    <ul style="text-align: center; font-family: 'PT-serif', serif; font-size: 18px;">
      <li><a class="nav-link" href="home.php">Home</a></li>
      <li><a class="nav-link " href="account.php">Account Profile</a></li>
      <li><a class="nav-link " href="notification.php">Notifications</a></li>
      <li><a class="nav-link" href="publication.php">Discussion Board</a></li>
      <li><a class="nav-link active " href="calTotal.php">Analytics</a></li>
      <br><br>
      <li><a class="nav-link" href="#">Log Out</a></li>
    </ul>
  </nav>

  <!-- main content (right side) -->
  <div id="content-wrapper">

    <div id="main-content">
      <div style="padding:0px 10px 10px 10px ;font-size:17px;color:white ;background-color:#5D0773;">
        <b>Report Total Publication</b> &nbsp;&nbsp;&nbsp;
      </div>

      <div class="report">
        <canvas id="chart" class="chart"></canvas>
        <div class="QRCode-section">
          <div class="QR-background">
            <div id="QRCode"></div>
          </div>
          <h4>Scan QR Code to view on phone in table form.</h4>
        </div>
      </div>

      <?php
      $query = "SELECT MONTHNAME(publication_date) AS month, count(Publication_ID) AS sum FROM publication_list GROUP BY MONTH(publication_date)";
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
      <a href="calTotal.php"><button type="button" class="back-button">Back</button></a>
    </div>
  </div>

  <script type="text/javascript">
    var xValues = <?php echo json_encode($month) ?>;
    var yValues = <?php echo json_encode($sum) ?>;
    var barColors = "#6C5A8A";
    var year = new Date().getFullYear();

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
          text: "Total Publication of Each Month in year " + year
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

    

    var qrcode = new QRCode(document.getElementById("QRCode"), {
      text: "<?php foreach ($sum_assoc as $month => $sum) {echo $month . ' : ' . $sum . '\r\n';} ?>",
      width: 128,
      height: 128,
      colorDark: "#6C5A8A",
      colorLight: "#ffffff",
      correctLevel: QRCode.CorrectLevel.H
    });
  </script>
</body>

</html>