<?php
session_start();
// Database connection settings
include("link/dbconnection.php");
include '../module1/sessionExpert.php';
$expertid = 1;
$sql = "SELECT pl.*, e.expert_name FROM publication_list AS pl JOIN expert AS e ON pl.Expert_ID = e.Expert_ID WHERE pl.Expert_ID = $expertid";
$result = $conn->query($sql);
$rows = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
$expert_name = $row['expert_name'];
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
  <!-- icon library | font awesome -->
  <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
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
      <p style="margin-right:10px ;margin-left:3px ;margin-top:125px;margin-bottom:10px;">Expert <img style="width:30px;height:auto;" src="image/woman.png" alt="profile picture"> </p>
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

  <!-- content -->
  <p style="padding-left:5px;padding-top:10px;padding-bottom:10px;font-size:20px;margin-left:255px;color:black;margin-top: -550px;"><b>Calculate total publication</b></p><br>
  <hr style="margin-left:255px;">

  <div class="form-container">
    <div style="margin-left:260px;margin-top:10px;width:1900px;">
      <div class="content">
        <div style="margin-bottom: 12px; ">
          <label for="filter-date">Search the category:</label>
          <select id="filter-date" class="btn btn-default" style="background-color:#EFE7F0;color:#4C0A5C;">
            <option value="all">All publications</option>
            <option value="month">Month</option>
            <option value="week">Week</option>
            <option value="day">Day</option>
          </select>
          <button type="button" class="btn btn-default" style="float: right;background-color:#D2B6D2;" onclick="window.location.href='calReport.php'">Generate Month Report</button>
        </div>
        <!-- table -->
        <table id="publicationTableAll" style="background-color:#F7F0F9;width:100%;">
          <thead>
            <tr>
              <th style="background-color:#5A0068;color:white;">Date</th>
              <th style="background-color:#5A0068;color:white;">Publication Type</th>
              <th style="background-color:#5A0068;color:white;">Number of Publications</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT SUM(Total_Publication) AS Total FROM (SELECT COUNT(*) AS Total_Publication FROM publication_list WHERE Expert_ID = $expertid GROUP BY Publication_ID) AS subquery";
            $result = $conn->query($sql);
            $row = mysqli_fetch_assoc($result);
            $totalPublication = $row['Total'];
            $sql = "SELECT publication_date, publication_type, COUNT(*) AS Total_Publication FROM publication_list WHERE Expert_ID = $expertid GROUP BY Publication_ID ORDER BY publication_date ASC";
            $result = $conn->query($sql);

            

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
            while ($row = mysqli_fetch_assoc($result)) {
              $date = $row['publication_date'];
              $publication_type = $row['publication_type'];
              $totalPublication = $row['Total_Publication'];

            ?>
              <tr data-date="<?php echo $date; ?>">
                <td><?php echo $date; ?></td>
                <td><?php echo $publication_type; ?></td>
                <td><?php echo $totalPublication; ?></td>
              </tr>
            <?php } ?>
            <tr>
              <td style=" text-align: center; ;width: 70%;" colspan="2"><b>Total Publication</b></td>
              <td><?php echo $totalPublication; ?></td>
            </tr>
          </tbody>
        </table>
        <table id="publicationTableDay">
          <thead>
            <tr>
              <th style="width: 20%">Day</th>
              <th style="width: 50%">Publication Type</th>
              <th style="width: 30%">Number of Publications</th>
            </tr>
          </thead>
          <tbody>
            <?php       
            $sql = "SELECT DAYNAME(publication_date) AS hari, publication_type, COUNT(*) AS Total_Publication FROM publication_list WHERE Expert_ID = $expertid GROUP BY DAYNAME(publication_date), publication_type ORDER BY publication_date DESC";
            $result = $conn->query($sql);
           
            while ($row = mysqli_fetch_assoc($result)) {
              $date = $row['hari'];
              $publication_type = $row['publication_type'];
              $totalPublication = $row['Total_Publication'];
            ?>
              <tr >
                <td><?php echo $date; ?></td>
                <td><?php echo $publication_type; ?></td>
                <td><?php echo $totalPublication; ?></td>
              </tr>
            <?php } ?>          
          </tbody>
        </table>
        <table id="publicationTableWeek">
          <thead>
            <tr>
              <th style="width: 20%">Week</th>
              <th style="width: 50%">Publication Type</th>
              <th style="width: 30%">Number of Publications</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Get the total number of Publications
            $sql = "SELECT WEEK(publication_date) AS minggu, publication_type, COUNT(*) AS Total_Publication FROM publication_list WHERE Expert_ID = $expertid GROUP BY WEEK(publication_date), publication_type";
            $result = $conn->query($sql);
           
            while ($row = mysqli_fetch_assoc($result)) {
              $date = $row['minggu'];
              $publication_type = $row['publication_type'];
              $totalPublication = $row['Total_Publication'];
            ?>
              <tr data-date="<?php echo $date; ?>">
                <td><?php echo $date; ?></td>
                <td><?php echo $publication_type; ?></td>
                <td><?php echo $totalPublication; ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
        <table id="publicationTableMonth">
          <thead>
            <tr>
              <th style="width: 20%">Month</th>
              <th style="width: 50%">Publication Type</th>
              <th style="width: 30%">Number of Publications</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Get the total number of Publications
            $sql = "SELECT MONTHNAME(publication_date) AS bulan, publication_type, COUNT(*) AS Total_Publication FROM publication_list WHERE Expert_ID = $expertid GROUP BY MONTHNAME(publication_date), publication_type ORDER BY publication_date ASC";
            $result = $conn->query($sql);

            while ($row = mysqli_fetch_assoc($result)) {
              $date = $row['bulan'];
              $publication_type = $row['publication_type'];
              $totalPublication = $row['Total_Publication'];
            ?>
              <tr data-date="<?php echo $date; ?>">
                <td><?php echo $date; ?></td>
                <td><?php echo $publication_type; ?></td>
                <td><?php echo $totalPublication; ?></td>
              </tr>
            <?php } ?>
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
    $('#publicationTableDay').hide();
    $('#publicationTableWeek').hide();
    $('#publicationTableMonth').hide();

    $('#filter-date').change(function() {
      var selectedValue = $(this).val();

      // Hide all tables
      $('#publicationTableAll').hide();
      $('#publicationTableDay').hide();
      $('#publicationTableWeek').hide();
      $('#publicationTableMonth').hide();

      // Show the table based on the selected value
      if (selectedValue === 'all') {
        $('#publicationTableAll').show();
      } else if (selectedValue === 'day') {
        $('#publicationTableDay').show();
      } else if (selectedValue === 'week') {
        $('#publicationTableWeek').show();
      } else if (selectedValue === 'month') {
        $('#publicationTableMonth').show();
      }
    });

    $('#filter-date').trigger('change');
  });
</script>

</html>