<?php
session_start();
// Database connection settings
include("./link/dbconnection.php");
include '../module1/sessionExpert.php';

// Check if a publication ID is provided
$expertid = 1;
$sql = "SELECT pl.*, e.expert_name FROM publication_list AS pl JOIN expert AS u ON pl.Expert_ID = e.Exprt_ID WHERE pl.Expert_ID = $expertid";
if (isset($_GET['publication_id'])) {
  $publicationId = $_GET['publication_id'];
  // Retrieve the publication details from the database
  $sql = "SELECT * FROM publication_list WHERE Publication_ID = $publicationId";
  $result = $conn->query($sql);
  $expert_name = $row['expert_name'];

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $publicationTopic = $row['publication_topic'];
    $publicationAuthor = $row['publication_author'];
    $publicationDescription = $row['publication_description'];
    $publicationType = $row['publication_type'];
    $publicationDate = $row['publication_date'];
    $publicationContent = $row['publication_content'];
  } else {
    echo "Publication not found.";
    exit;
  }
} else {
  echo "No Publication ID provided.";
  exit;
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
      <li><a class="nav-link " href="account.php">Account Profile</a></li>
      <li><a class="nav-link " href="notification.php">Notifications</a></li>
      <li><a class="nav-link active " href="publication.php">Discussion Board</a></li>
      <li><a class="nav-link" href="calTotal.php">Analytics</a></li>
      <br><br>
      <li><a class="nav-link" href="../module1/logout.php">Log Out</a></li>
    </ul>
  </nav>

  <!-- main content  -->
  <p style="padding-left:5px;padding-top:7px;font-size:20px;margin-left:255px;color:black;margin-top: -550px;"><b>View Publication</b> <img style="width:25px;" src="image/show.png" alt="View"></p><br>

  <div style=" padding:10px 5px 10px 5px;margin-left:255px;font-size:17px;color:white ;background-color:#B681C1;">
    <b> &nbsp;Publication </b>
  </div>
  </div>
  <section class="content">
    <div class="col-md-6">
      <div class="">
        <div class="form-body">
          <div class="form-group" style="margin-left:260px;margin-top:20px">
            <label for="description">User: Abby</label><br>
            <label for="publicationDate">Date: <?php echo $publicationDate; ?></label><br>
          </div>

          <div class="form-group" style="margin-left:260px;margin-top:20px">
            <label for="publicationTopic">Topic : <?php echo $publicationTopic; ?></label><br>
            <label for="publicationAuthor">Author : <?php echo $publicationAuthor; ?></label><br>
          </div>

          <div class="form-group" style="margin-left:260px;margin-top:20px">
            <label for="publicationType">Type of Publication :</label>
            <select id="publicationType" name="publicationType" class="form-control custom-select" disabled>
              <option selected disabled>Choose the type of publication</option>
              <option value="Publication Paper" <?php if ($publicationType === "Publication Paper") echo 'selected'; ?>>Publication Paper</option>
              <option value="Syllabus" <?php if ($publicationType === "Syllabus") echo 'selected'; ?>>Syllabus</option>
              <option value="Jornal" <?php if ($publicationType === "Jornal") echo 'selected'; ?>>Jornal</option>
              <option value="Thesis" <?php if ($publicationType === "Thesis") echo 'selected'; ?>>Thesis</option>
              <option value="Article" <?php if ($publicationType === "Article") echo 'selected'; ?>>Article</option>
            </select>
            <br>
          </div>

          <div class="form-group" style="margin-left:260px;margin-top:20px">
            <label for="publicationDescription">Description</label>
            <textarea class="form-control" id="publicationDescription" row="4" disabled><?php echo $publicationDescription; ?></textarea>
          </div>
          <div class="form-group" style="margin-left:260px;margin-top:20px">
            <label for="publicationContent">Content</label>
            <textarea class="form-control" id="publicationContent" row="4" disabled><?php echo $publicationContent; ?></textarea>
          </div>

          <div>
            <a href="publication.php" style="padding: 0.5% 1% 1% 0.5%;margin-left:96%;margin-top:20px; width: 100px;height: 30px; font-family: 'PT-serif', serif;font-weight: 500; background: #D2B6D2;border: none;outline: none;"><b> Back</b> </a>
          </div>

        </div>
      </div>
    </div>
  </section>
  </div>

</body>

</html>