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
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&display=swap"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
  <!-- external stylesheet -->
  <link rel="stylesheet" href="style/account.css">
  <!-- <link rel="stylesheet" href="style/profile.css"> -->

</head>

<body>
  <!-- title bar -->
  <div style="height: 170px;width: 100%;display: flex;align-items: center;justify-content: space-between;padding: 22px 14px;background-color:#9021AC">
    <a id="FK-EduSearch" class="FK Edu-Search">FK-EduSearch</a>
    <div>
      <input style="color:#5D0773;padding-left:50px;padding-top:10px;margin-bottom:12px;margin-left:1px;border:none;" type="search" placeholder="Search..." />
      <img style=" margin-right:10px ;padding-top:3px;margin-left:3px ;margin-top:128px;margin: bottom 1px;width:23px;height:23px" src="image/search.png" alt="search cant function">
    </div>
    <!-- user profile -->
    <div>
      <p style="margin-right:10px ;margin-left:3px ;margin-top:125px;margin-bottom:10px;"><?php echo $expert_name; ?><img style="width:30px;height:auto;" src="image/woman.png" alt="profile picture" </p>
    </div>
  </div>
  <!-- </a> -->
  </div>

  </div>

  <!-- navigation bar (left side) -->
  <nav style="background-color:#F9DFFF; position:initial; top: 4; left: 0; height: 100vh; width: 255px; padding-top: 18px; padding-bottom: 30px;">
    <ul style="text-align: center; font-family: 'PT-serif', serif; font-size: 18px;">
      <li><a class="nav-link active" href="home.php">Home</a></li>
      <li><a class="nav-link  " href="account.php">Account Profile</a></li>
      <li><a class="nav-link " href="notification.php">Notifications</a></li>
      <li><a class="nav-link" href="publication.php">Discussion Board</a></li>
      <li><a class="nav-link" href="calTotal.php">Analytics</a></li>
      <br><br>
      <li><a class="nav-link" href="../module1/logout.php">Log Out</a></li>
    </ul>
  </nav>
  <!-- content -->
  <div style="margin-top:-700px;padding:5px 5px 5px 5px ;margin-left:255px;">

    <div style=" flex: 1;padding: 30px 30px 30px 30px;margin-left:0px;background-color:#EFE7F0;height:500px;">
      <h1 style="color:#9021AC;text-align:center;margin-top:120px;">Welcome To FK-EduSearch</h1>
      <h4 style="color:#9021AC;text-align:center;margin-top:100px;">You cannot teach people everthing they need to know but FK-EduSearch can help them to find what they need to know when they need to know it</h4>
    </div>
  </div>
</body>

</html>