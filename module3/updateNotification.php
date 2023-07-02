<?php
session_start();
// Database connection settings
include("./link/dbconnection.php");
include '../module1/sessionExpert.php';

$expertid = 1;
$sql = "SELECT pl.*, e.expert_name FROM publication_list AS pl JOIN expert AS e ON pl.Expert_ID = e.Expert_ID WHERE pl.Expert_ID = $expertid";
$result = $conn->query($sql);
$rows = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
$expert_name = $row['expert_name'];

// Check if a post ID is provided
if (isset($_GET['post_id'])) {
  $Post_ID = $_GET['post_id'];
  // Retrieve the post details from the database
  $sql = "SELECT * FROM post WHERE Post_ID = $Post_ID";
  $result = $conn->query($sql);
  date_default_timezone_set('Asia/Kuala_Lumpur');
  $currentdate  = date('Y-m-d'); // Get the current date

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $Post_ID = $row['Post_ID'];
    $post_content = $row['post_content'];
    $postStatus = $row['postStatus'];
    $expertAnswer = $row['expertAnswer'];
    $post_date = $row['post_date'];
  } else {
    echo "Post not found.";
    exit;
  }
} else {
  echo "No Post ID provided.";
  exit;
}
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Validate and sanitize user inputs
  $updatedexpertAnswer = mysqli_real_escape_string($conn, $_POST['expertAnswer']);
  $updatedpostStatus = mysqli_real_escape_string($conn, $_POST['postStatus']);

  // Update the postin the database
  $updateSql = "UPDATE post SET postStatus= '$updatedpostStatus',expertAnswer= '$updatedexpertAnswer' WHERE Post_ID = $Post_ID";
  if ($conn->query($updateSql) === true) {
    echo "Updated successfully.";
    header("Location: notification.php");
    // You can redirect the user to a different page or display a success message here
  } else {
    echo "Error updating : ";
    // You can handle the error scenario as per your requirements
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FK-EduSearch | Knowledge Sharing System</title>

  <!-- external stylesheet -->
  <link rel="stylesheet" href="style/style.css">
  <!-- icon library | font awesome -->
  <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>
</head>

<body>
  <!-- title bar -->
  <div style="height: 170px;width: 100%;display: flex;align-items: center;justify-content: space-between;padding: 22px 14px;background-color:#9021AC">
    <a id="FK-EduSearch" class="FK Edu-Search">FK-EduSearch</a>
    <div>
      <input style="color:#5D0773;padding-left:50px;padding-top:10px;margin-bottom:12px;margin-left:1px;border:none;" type="search" value="Search..." />
      <img style=" margin-right:10px ;padding-top:3px;margin-left:3px ;margin-top:128px;margin: bottom 1px;width:23px;height:23px" src="image/search.png" alt="search cant function">
    </div>
    <!-- user profile -->
    <div>
      <p style="margin-right:10px ;margin-left:3px ;margin-top:125px;margin-bottom:10px;"><?php echo $expert_name; ?><img style="width:30px;height:auto;" src="image/woman.png" alt="profile picture" </p>
    </div>
  </div>

  <!-- navigation bar (left side) -->
  <nav style=" background-color:#F9DFFF;display: flex;flex-direction: column;justify-content: space-between;height: 100%;width: 255px;padding-top:18px;padding-bottom: 30px;">
    <ul style="text-align: center; font-family: 'PT-serif', serif; font-size: 18px;">
      <li><a class="nav-link" href="home.php">Home</a></li>
      <li><a class="nav-link" href="account.php">Account Profile</a></li>
      <li><a class="nav-link  active " href="notification.php">Notifications</a></li>
      <li><a class="nav-link" href="publication.php">Discussion Board</a></li>
      <li><a class="nav-link" href="calTotal.php">Analytics</a></li>
      <br><br>
      <li><a class="nav-link" href="../module1/logout.php">Log Out</a></li>
    </ul>
  </nav>

  <!-- main content  -->
  <p style="padding-left:5px;padding-top:7px;font-size:20px;margin-left:255px;color:black;margin-top: -550px;"><b><img style="width:25px;" src="image/edit.png" alt="Edit"> Add answer</b> </p><br>

  <div style=" padding:10px 5px 10px 5px;margin-left:255px;font-size:17px;color:white ;background-color:#B681C1;">
    <b> &nbsp;Expert Answer Box</b>
  </div>


  <div class="form-group" style="margin-left:260px;margin-top:20px">
    <label id="Description" name="Description">User: Abby</label><br>
    <label id="Date" name="Date">Date: <?php echo $post_date; ?></label><br>
  </div>
  <form action="updateNotification.php?post_id=<?php echo $Post_ID; ?>" method="POST">
    <div class="form-group" style="margin-left:260px;margin-top:20px">
      <label for="post_content">Question :</label>
      <textarea class="form-control" id="post_content" name="post_content" row="4" disabled><?php echo $post_content; ?></textarea>
    </div>
    <div class="form-group" style="margin-left:260px;margin-top:20px">
      <label for="publicationType">Status :</label>
      <select class="form-control custom-select" id="postStatus" name="postStatus">
        <option selected disabled>Choose the status</option>
        <option value="Accepted" <?php if ($postStatus === "Accepted") echo 'selected'; ?>>Accepted</option>
        <option value="Not accept yet" <?php if ($postStatus === "Not accept yet") echo 'selected'; ?>>Not accept yet</option>
      </select>
      <br>
    </div>
    <div class="form-group" style="margin-left:260px;margin-top:20px">
      <label for="expertAnswer">Expert Answer :</label>
      <textarea class="form-control" id="expertAnswer" name="expertAnswer" row="4" required><?php echo $expertAnswer; ?></textarea>
    </div>

    <div class="row">
      <div class="col-12">
        <button style="margin-left: 92%;border: none;background-color:#D2B6D2;" class="custom-btn" type="submit"><b>Add</b></button><br><br>
        <a href="notification.php"><button style="margin-left: 92%;border: none;background-color:#D2B6D2;" class="custom-btn"><b>Cancel</b></button></a>
      </div>
    </div>
  </form>

</body>

</html>