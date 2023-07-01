<?php
include("../dbconnect.php");
session_start();
include_once '../module1/sessionUser.php';


?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FK-EduSearch | Knowledge Sharing System</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <script src="../../js/calculate-average-expenses/chart.js"></script>
       <style>
         * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  body {
    
    background-color: white;
  }

/*
HEADER
*/
#title-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    color: white;
    background-color: #0047FF;
    height: 138px;
    width: 100%;
    padding: 30px 24px;
    
  }

  .FKEduSearch {
    font: 2.5rem 'Poppins', sans-serif;
    margin-left: 50px;

    
  }
  
.searchbar{
    position:absolute;
    margin-left: 450px;
    padding-top:60px;
}
  input[type=search]
  {
    padding: 10px 110px;
    border-radius:10px;
    text-align: left;
  }

  .iconNotification{
    position: absolute;
    left:1000px;
    top: 88px;
  }

  .Message{
    position: absolute;
    left:1060px;
    top: 88px;


  }

  .icon-link {
    position: absolute;
    right: 30px;
    top: 80px;
    font-size: 22px;
    text-decoration: none;
    color:white;
    font-family: sans-serif;
  }

  /*
NAVIGRATINO BAR
*/
#nav-bar {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    background-color: #CBD8FA;
    height: 100%;
    width: 200px;
    padding-top: 30px;
    padding-left: 0px;
    padding-bottom: 113px;

  }
  .nav-link {
    display: inline-block;
    width: 100%;
    padding-top: 20px;
    padding-bottom: 19px;
    padding-left:35px;
    color: black;
    font-family: 'PT-serif', serif;
    text-decoration: none;
    text-align: left;
    font-size:18px;

  }
  .active, .nav-link:hover {
    color: black;
    background-color: #A6B7E4;
    transition: all ease-in 200ms;
  }

  ul{
    list-style-type:none;
   
  }

  .column {
  float: left;
  padding:0px;
}

  .centercontent::after {
  content: "";
  clear: both;
  display: table;
  }

  .LeftNavigationbar{
    width:16%

  }
  .main-content{
  background-color: white;
  width: 82%;
  
  

}

.header{
    background-color: #2e94f3;
    color: white;
    padding: 10px 10px;

}

input[type=button]{
    background-color: #CBD8FA;
    color:black;
    font-size: 15px;
    padding: 7px 15px;
    border:none;
    margin: 7px 120px;
}

.report{
  width:80%;
  height:80%;
  position:absolute;
  padding-top: 0px;
  padding-left: 250px;

}

.QRCode-section{
  position:absolute;
  padding-top: 100px;
  padding-left: 1100px;
 
}
        </style>
    </head>

<body>
 <!-- title bar -->
 <div id="title-bar">
        <!-- FK-EduSearch-->
        <a id="FKEduSearch" class="FKEduSearch">FK-EduSearch</a>
        
        <!-- search bar -->
        <div class="searchbar">
        <input type="search" class="form-control rounded" placeholder="Search..." aria-label="Search" aria-describedby="search-addon" />
        <span class="input-group-text border-0" id="search-addon">
        <i class="fas fa-search" style='font-size:26px; color:white'></i>
        </span>
        </div>
        <div class="iconNotification">
        <i class='far fa-bell' style='font-size:20px'></i>
        </div>
        <div class="Message">
        <i style='font-size:20px' class='far fa-comment'></i>
        </div>
         <!-- user profile -->
        <div>
            <a class="icon-link" href="#">
                User 
                <i class='fas fa-user-circle' style='font-size:26px;color:white'></i>
            </a>
        </div>
    </div>
    <div class="centercontent">
    <div class="column LeftNavigationbar">
         <!-- navigation bar (left side) -->
         <nav id="nav-bar">
            <ul>
                <li><a class="nav-link" href="../User/UserHomepage.php">Home</a></li>
                <li><a class="nav-link" href="../User/UserAccountProfile.php">Account Profile</a></li>
                <li><a class="nav-link" href="../User/DiscussionBoard.php">Discussion Board</a></li>
                <li><a class="nav-link" href="../Complaint/UserComplaint.php">Complaint</a></li>
                <li><a class="nav-link" href="../User/TotalPost.php">Total Post</a></li>
                <li><a class="nav-link active" href="../User/PostReport.php">Post Report</a></li>
                <li><a class="nav-link" href="../module1/logout.php">Log Out</a></li>
            </ul>
        </nav>
        </div>

         <!-- main content (right side) -->
        <div id="column main-content">
        <a href="../User/UserHomePage.php">&laquo; Home</a><br><br>
          <strong>Group By: Month </strong> 

        

      <div class="report">
        <canvas id="chart" class="chart"></canvas>
      
        </div>
     
      <div class="QRCode-section">
          <div class="QR-background">
            <div id="QRCode"></div>
         
          <h4>Scan QR Code to view on phone in table form.</h4>
          </div>
      <?php
      $query = "SELECT MONTHNAME(post_date) AS month, count(Post_ID) AS sum FROM post GROUP BY MONTH(post_date)";
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
    </div>
  </div>
  </div>
  <script type="text/javascript">
    var xValues = <?php echo json_encode($month) ?>;
    var yValues = <?php echo json_encode($sum) ?>;
    var barColors = "#0398fc ";
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
          text: "Total Post of Each Month in year " + year
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
      colorDark: "#011726",
      colorLight: "#ffffff",
      correctLevel: QRCode.CorrectLevel.H
    });
  </script>

</body>

</html>