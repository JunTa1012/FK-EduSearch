<?php
session_start();
// Database connection settings
include("link/dbconnection.php");
include '../module1/sessionExpert.php';
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
  <link rel="stylesheet" href="style/report.css">
  <!-- icon library | font awesome -->
  <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>
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
      <p style="margin-right:10px ;margin-left:3px ;margin-top:125px;margin-bottom:10px;">Expert <img style="width:30px;height:auto;" src="image/woman.png" alt="profile picture"></p>
    </div>

  </div>

  <!-- navigation bar (left side) -->
  <nav style=" background-color:#F9DFFF;display: flex;flex-direction: column;justify-content: space-between;height: 100%;width: 255px;padding-top:18px;padding-bottom: 30px;">
    <ul style="text-align: center; font-family: 'PT-serif', serif; font-size: 18px;">
      <li><a class="nav-link" href="home.php">Home</a></li>
      <li><a class="nav-link " href="account.php">Account Profile</a></li>
      <li><a class="nav-link  active" href="notification.php">Notifications</a></li>
      <li><a class="nav-link" href="publication.php">Discussion Board</a></li>
      <li><a class="nav-link" href="calTotal.php">Analytics</a></li>
      <br><br>
      <li><a class="nav-link" href="#">Log Out</a></li>
    </ul>
  </nav>

  <!-- content -->
  <p style="padding-left:5px;padding-top:10px;font-size:20px;margin-left:255px;color:black;margin-top: -550px;"><b>Posts for you</b> </p><br>
  <hr style="margin-left:255px;">

  <!-- <div class="form-container"> -->
  <div class="form-container">
    <div style="margin-left:260px;margin-top:10px">
      <!-- CRUD table -->
      <table>
        <thead>
          <tr>
            <th style="width: 30%;background-color:#F9DFFF;">Question</th>
            <th style="width: 10%;background-color:#F9DFFF;">Status</th>
            <th style="width: 45%;background-color:#F9DFFF;">Expert Answer </th>
            <th style="width: 40% ;padding-left:45px;background-color:#F9DFFF;">Actions</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $sql = "SELECT * FROM post";
          $result = $conn->query($sql);

          while ($row = mysqli_fetch_assoc($result)) {
            $Post_ID = $row['Post_ID'];
            $post_content = $row['post_content'];
            $postStatus = $row['postStatus'];
            $expertAnswer = $row['expertAnswer'];
          ?>
            <tr>
              <td style="style= width: 30%;"><?php echo $post_content; ?></td>
              <?php
              $class = '';
              switch ($postStatus) {
                case 'Accepted':
                  $class = 'badge badge-success';
                  break;
                case 'Not accept yet':
                  $class = 'badge badge-warning';
                  break;
                default:
                  $class = 'badge';
              }
              ?>
              <td style=" width: 10%;"><span class="<?php echo $class; ?>"><?php echo $postStatus; ?></span></td>
              <td style="width: 40%;text-align:justify;"><?php echo $expertAnswer; ?></td>
              <td class="action-icons" style="padding-left:45px;">
                <a href="viewNotification.php?post_id=<?php echo $Post_ID; ?>"><img src="image/show.png" alt="View"></a>&nbsp;
                <a href="updateNotification.php?post_id=<?php echo $Post_ID; ?>"><img src="image/edit.png" alt="Edit"></a>&nbsp;
                <a href="deleteNotification.php?post_id=<?php echo $Post_ID; ?>" onclick="return confirm('Are you really want to delete ?')"> <img src="image/delete.png" alt="Delete"></a>
              </td>
            </tr>
          <?php } ?>
          <!-- Add more rows as needed -->
        </tbody>
      </table>
    </div>
  </div>

</body>

</html>