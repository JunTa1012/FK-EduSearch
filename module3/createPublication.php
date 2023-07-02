<?php
session_start();
// Database connection settings
include("./link/dbconnection.php");
include '../module1/sessionExpert.php';
date_default_timezone_set('Asia/Kuala_Lumpur');
$publicationDate = date('Y-m-d'); // Get the current date

$expertid = 1;
$sql = "SELECT pl.*, e.expert_name FROM publication_list AS pl JOIN expert AS e ON pl.Expert_ID = e.Expert_ID WHERE pl.Expert_ID = $expertid";
$result = $conn->query($sql);
$rows = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
$expert_name = $row['expert_name'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get form data
  $publicationTopic = mysqli_real_escape_string($conn, $_POST['publication_topic']);
  $publicationAuthor = mysqli_real_escape_string($conn, $_POST['publication_author']);
  $publicationType = mysqli_real_escape_string($conn, $_POST['publication_type']);
  $publicationDescription = mysqli_real_escape_string($conn, $_POST['publication_description']);
  $publicationContent = mysqli_real_escape_string($conn, $_POST['publication_content']);
  $expertid = "1";
  $adminid = "1";
  $sql = "SELECT pl.*, e.expert_name FROM publication_list AS pl JOIN expert AS e ON pl.Expert_ID = e.expert_ID WHERE pl.Expert_ID = $expertid";
  $sql = "INSERT INTO publication_list ( publication_date, publication_topic, publication_author, publication_type, publication_description, publication_content, Expert_ID, Admin_ID)
                VALUES ('$publicationDate', '$publicationTopic', '$publicationAuthor', '$publicationType','$publicationDescription', '$publicationContent', '$expertid', '$adminid')";

  if ($conn->query($sql) === TRUE) {
    header("Location: publication.php");
  } else {
    echo "Error: " . $sql . "<br>";
  }

  $conn->close();
}
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
      <input style="color:#5D0773;padding-left:50px;padding-top:10px;margin-bottom:12px;margin-left:1px;border:none;" type="search" placeholder="Search..." />
      <img style=" margin-right:10px ;padding-top:3px;margin-left:3px ;margin-top:128px;margin: bottom 1px;width:23px;height:23px" src="image/search.png" alt="search cant function">
    </div>
    <!-- user profile -->
    <div>
      <p style="margin-right:10px ;margin-left:3px ;margin-top:125px;margin-bottom:10px;"><?php echo $expert_name; ?><img style="width:30px;height:auto;" src="image/woman.png" alt="profile picture"></p>
    </div>
  </div>

  <!-- navigation bar (left side) -->
  <nav style=" background-color:#F9DFFF;display: flex;flex-direction: column;justify-content: space-between;height: 100%;width: 255px;padding-top:18px;padding-bottom: 30px;">
    <ul style="text-align: center; font-family: 'PT-serif', serif; font-size: 18px;">
      <li><a class="nav-link" href="home.php">Home</a></li>
      <li><a class="nav-link  " href="account.php">Account Profile</a></li>
      <li><a class="nav-link " href="notification.php">Notifications</a></li>
      <li><a class="nav-link active" href="publication.php">Discussion Board</a></li>
      <li><a class="nav-link" href="calTotal.php">Analytics</a></li>
      <br><br>
      <li><a class="nav-link" href="../module1/logout.php">Log Out</a></li>
    </ul>
  </nav>

  <!-- main content  -->
  <p style="padding-left:5px;padding-top:7px;font-size:20px;margin-left:255px;color:black;margin-top: -550px;"><b>Create New Publication</b> </p><br>

  <div style=" padding:10px 5px 10px 5px;margin-left:255px;font-size:17px;color:white ;background-color:#B681C1;">
    <b>Share research by uploading it to your profile</b>
  </div>

  <form action="createPublication.php" method="POST">
    <div class="form-container">
      <div style="margin-left:260px;margin-top:20px">
        <p><b>Expert: </b><?php echo $expert_name; ?></p>
        <label for="publication_date"><b>Date: <?php echo date('Y-m-d'); ?></b></label><br>
        <span><img style="width:120px; height:auto" src="image/document.png" alt="document"></span>
      </div>


      <div class="right-side">
        <label for="publication_topic">Topic :</label>
        <input type="text" id="publication_topic" name="publication_topic">

        <label for="publication_author">Author :</label>
        <input type="text" id="publication_author" name="publication_author">

        <label for="publication_type">Type of Publication :</label>
        <select id="publication_type" name="publication_type">
          <option selected disabled>Choose the type of publication</option>
          <option value="Publication Paper">Publication Paper</option>
          <option value="Syllabus">Syllabus</option>
          <option value="Jornal">Jornal</option>
          <option value="Thesis">Thesis</option>
          <option value="Article">Article</option>
        </select>
        <br>
        <label for="publication_description">Description :</label>
        <textarea name="publication_description" rows="5" cols="40" placeholder="Write a description of the publication" required></textarea>

        <label for="publication_content ">Content :</label>
        <textarea name="publication_content" rows="5" cols="40" placeholder="Write the content" required></textarea>

        <button style="margin-left: 92%;border: none;background-color:#D2B6D2;" class="custom-btn" type="submit">Add</button><br>
        <a href="publication.php"><button style="margin-left: 92%;border: none;background-color:#D2B6D2;" class="custom-btn">Cancel</button></a>
      </div>
    </div>
  </form>
  </div>
</body>

</html>