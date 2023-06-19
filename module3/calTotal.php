<?php
// session_start();
// Database connection settings
// $expert_ID = $_SESSION['Expert_ID'];
include("connect-database.php");
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FK-EduSearch | Knowledge Sharing System</title>

  <!-- external stylesheet -->
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="style/calTotal.css">
  <!-- icon library | font awesome -->
  <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
  <script src="./js/main.js"></script>
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
      <p style="margin-right:10px ;margin-left:3px ;margin-top:125px;margin-bottom:10px;">Expert <img style="width:30px;height:auto;" src="image/woman.png" alt="profile picture" </p>


        <!-- </a> -->
    </div>

  </div>

  <!-- navigation bar (left side) -->
  <nav style=" background-color:#F9DFFF;display: flex;flex-direction: column;justify-content: space-between;height: 100%;width: 255px;padding-top:18px;padding-bottom: 30px;">
    <ul style="text-align: center; font-family: 'PT-serif', serif; font-size: 18px;">
      <li><a class="nav-link" href="home.php">Home</a></li>
      <li><a class="nav-link active " href="account.php">Account Profile</a></li>
      <li><a class="nav-link " href="notification.php">Notifications</a></li>
      <li><a class="nav-link" href="publication.php">Discussion Board</a></li>
      <li><a class="nav-link" href="calTotal.php">Analytics</a></li>
      <br><br>
      <li><a class="nav-link" href="#">Log Out</a></li>
    </ul>
  </nav>



  <!-- main content (right side) -->
  <div id="content-wrapper">

    <div id="main-content">
      <div style="padding:15px 10px 10px 10px ;font-size:17px;color:white ;background-color:#5D0773;">
        <b>Calculate Total Publication</b> &nbsp;&nbsp;&nbsp;
      </div>

      <div class="button-section">
        <div class="calculate-button">
          <form method="POST" action="set-date.php">
            <select name="month" class="month-selection">
              <option value="select-month">SELECT MONTH</option>
              <option value="Jan" class="option">January</option>
              <option value="Feb" class="option">February</option>
              <option value="March" class="option">March</option>
              <option value="Apr" class="option">April</option>
              <option value="May" class="option">May</option>
              <option value="June" class="option">June</option>
              <option value="July" class="option">July</option>
              <option value="Aug" class="option">August</option>
              <option value="Sep" class="option">September</option>
              <option value="Oct" class="option">October</option>
              <option value="Nov" class="option">November</option>
              <option value="Dec" class="option">December</option>
            </select>
            <select name="week" class="week-selection">
              <option value="select-week">SELECT WEEK</option>
              <option value="Week 1" class="option">Week 1</option>
              <option value="Week 2" class="option">Week 2</option>
              <option value="Week 3" class="option">Week 3</option>
              <option value="Week 4" class="option">Week 4</option>
              <option value="Week 5" class="option">Week 5</option>
            </select>
            <button type="submit" name="calculate">Calculate</button>
          </form>
        </div>
        <a href="calReport.php"><button class="generate-report">Total Expenses Of Each Month</button></a>
      </div>


      <div class="output">
        <div class="header">
          <h4 class="title">Topic</h4>
          <h4 class="date">Date</h4>
        </div>

        <br />
        <hr />
        <br />
        <div class="content">

          <?php
          if (isset($_SESSION['start-date']) && isset($_SESSION['end-date'])) {
            $startDate = $_SESSION['start-date'];
            $endDate = $_SESSION['end-date'];

            $query = "SELECT publication_topic, publication_date, Publication_ID FROM publication_list WHERE  publication_date BETWEEN '$startDate' AND '$endDate' ";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($result, 1)) {
          ?>
              <div class="row">
                <p class="title"><?php echo $row['publication_topic'] ?></p>
                <p class="date"><?php echo $row['publication_date'] ?></p>
              </div>
          <?php }
          } ?>


        </div>

        <hr />

        <div class="average-expenses">
          <h4>Total publications</h4>
          <?php
          if (isset($_SESSION['start-date']) && isset($_SESSION['end-date'])) {
            $query = "SELECT Publication_ID FROM publication_list ORDER BY Publication_ID";
            $query_run =  mysqli_query($con, $query);
            $row1 = mysqli_num_rows($query_run);

            $result = $row1;
            echo '<h1 style="text-align:center">'  . $result . '</h1>';
          ?>

            <?php echo '<h1 style="text-align:center">'  . $result . '</h1>' ?>
        </div>
      </div>

    <?php } ?>
    </div>
  </div>
</body>

</html>

<!-- content -->
<!-- <div style="margin-left:300px;margin-top: -450px;background-color:white;min-height: fit-content;">Edit Profile</div> -->
<!-- <p style="padding-left:5px;padding-top:5px;font-size:20px;margin-left:255px;color:black;margin-top: -550px;"><b>Calculate Publication</b> </p><br> -->
<!-- <p style="color:aliceblue;background-color: #B681C1;margin-top: -600px;"><b>My Profile</b></p> -->
<!-- <div style="padding:15px 5px 5px 5px ;margin-left:255px;font-size:17px;color:white ;background-color:#5D0773;margin-top: -540px;">
  <b>Calculate Total Publication</b> &nbsp;&nbsp;&nbsp;
</div>

<div class="form-container">
  <div style="margin-left:260px;margin-top:10px">

    <div style=" display: flex;justify-content: space-between;">
      <div style="  box-shadow: 2px 2px 12px 4px rgb(191, 190, 190);border-radius: 10px; border: none;  background-color: var(--primary-bg); margin-bottom: 10px; width: 150px; height: 50px; margin: 10px;  color: white;"> 
      <form method="POST" action="set-date.php">
        <div>
          <span> <select name="month" style="width:170px;margin-top:5%; border:none;background-color:#F3DDF4; padding:5px 5px 5px 5px;" value="select-month">SELECT MONTH</option>
              <option value="Jan" style="background-color:aliceblue;text-align: left;">January</option>
              <option value="Feb" style="background-color:aliceblue;text-align: left;">February</option>
              <option value="March" style="background-color:aliceblue;text-align: left;">March</option>
              <option value="Apr" style="background-color:aliceblue;text-align: left;">April</option>
              <option value="May" style="background-color:aliceblue;text-align: left;">May</option>
              <option value="June" style="background-color:aliceblue;text-align: left;">June</option>
              <option value="July" style="background-color:aliceblue;text-align: left;">July</option>
              <option value="Aug" style="background-color:aliceblue;text-align: left;">August</option>
              <option value="Sep" style="background-color:aliceblue;text-align: left;">September</option>
              <option value="Oct" style="background-color:aliceblue;text-align: left;">October</option>
              <option value="Nov" style="background-color:aliceblue;text-align: left;">November</option>
              <option value="Dec" style="background-color:aliceblue;text-align: left;">December</option>
            </select></span>
          <span><select name="week" style="width:170px;margin-top:5%; border:none;background-color:#F3DDF4; padding:5px 5px 5px 5px;">
              <option value="select-week">SELECT WEEK</option>
              <option value="Week 1" style="background-color:aliceblue;text-align: left;">Week 1</option>
              <option value="Week 2" style="background-color:aliceblue;text-align: left;">Week 2</option>
              <option value="Week 3" style="background-color:aliceblue;text-align: left;">Week 3</option>
              <option value="Week 4" style="background-color:aliceblue;text-align: left;">Week 4</option>
              <option value="Week 5" style="background-color:aliceblue;text-align: left;">Week 5</option>
            </select></span>
          <span> <button style="width:150px;  border:none;background-color:#D2B6D2; padding:5px 5px 5px 5px;" type="submit" name="calculate">Calculate</button></span>
        </div>
      </form>
    </div>

  </div>
  <a href="calReport.php"><button style=" width:250px; margin-top:20%;margin-left:200%;border:none;color:white;background-color:#634694; padding:5px 5px 5px 5px;">Total Expenses Of Each Month</button></a>
</div>
</div>
<div style=" display: flex;justify-content: space-between;margin-left:260px;margin-top:30px">
  <table style="color:black;">
    <tr>
      <th style="background-color:#F6F7CE;">Title</th>
      <th style="background-color:#F6F7CE;">Date</th>
      <th style="background-color:#F6F7CE;">Publications</th>
    </tr>
    <tr>
      <td>Title 2</td>
      <td>June 11, 2023</td>
      <td>8</td>
    </tr>
    <tr>
      <td>
        
      </td>
    </tr>

    <tr>
      <th style="background-color:#D9D9D9;">Total Publications:</th>
      <td>

      </td>
    </tr>
  </table>
</div>




</div>
</div>
</body>

</html> -->