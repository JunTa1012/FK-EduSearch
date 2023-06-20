<?php
include_once 'dbconnection.php';
session_start();


if (isset($_POST['Add'])) {


  $topic = mysqli_real_escape_string($con, $_POST['publicationTopic']);
  $author = mysqli_real_escape_string($con, $_POST['publicationAuthor']);
  $description = mysqli_real_escape_string($con, $_POST['publicationDescription']);
  $content  = mysqli_real_escape_string($con, $_POST['publicationContent']);
  $type = mysqli_real_escape_string($con, $_POST['publicationType']);


  $query = "INSERT INTO publication(publication_topic, publication_author, publication_description, publication_content, publication_type) VALUES ('$topic', '$author', '$description', '$content', '$type')";
  $result = mysqli_query($con, $query);

  if ($result) {
    echo "
                    <script>
                    alert('Data Added Success!');
                    window.location = 'publicationList.php';
                    </script>";
  } else {
    echo "<script>alert('Data Added FAILED'); <script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
      <p style="margin-right:10px ;margin-left:3px ;margin-top:125px;margin-bottom:10px;">Abby <img style="width:30px;height:auto;" src="image/woman.png" alt="profile picture" </p>
    </div>
  </div>

  <!-- navigation bar (left side) -->
  <nav style=" background-color:#F9DFFF;display: flex;flex-direction: column;justify-content: space-between;height: 100%;width: 255px;padding-top:18px;padding-bottom: 30px;">
    <ul style="text-align:center;font-family: 'PT-serif' , serif;font-size:18px">
      <li><a class="nav-link" href="#">Home</a></li>
      <li><a class="nav-link" href="M3_account.php">Account Profile</a></li>
      <li><a class="nav-link" href="M3_notification.php">Notifications</a></li>
      <li><a class="nav-link  active" href="M3_discussionBoard.php">Discussion Board</a></li>
      <li><a class="nav-link" href="M3_analytics.php">Analytics</a></li>
      <br><br>
      <li><a class="nav-link" href="login.php">Log Out</a></li>
    </ul>
  </nav>

  <!-- main content  -->
  <p style="padding-left:5px;padding-top:7px;font-size:20px;margin-left:255px;color:black;margin-top: -550px;"><b>Create New Publication</b> </p><br>

  <div style=" padding:10px 5px 10px 5px;margin-left:255px;font-size:17px;color:white ;background-color:#B681C1;">
    <b>Share research by uploading it to your profile</b>
  </div>

  <form action="#" method="post">
    <div class="form-container">
      <!-- <div class="rectangle"> -->
      <div style="margin-left:280px;margin-top:50px">
        <span><img style="width:140px; height:auto" src="image/document.png" alt="document"></span>
        <!-- <input type="file" Value="Upload Document"> -->
      </div>
      <!-- </div> -->

      <div class="right-side">
        <label for="ftopic">Topic :</label>
        <input type="text" id="ftopic" name="topic">

        <label for="fauthor">Author :</label>
        <input type="text" id="fauthor" name="author">


        <label for="ftype">Type of Publication :</label>
        <select id="ftype" name="type">
          <option selected disabled>Choose the type of publication</option>
          <option value="Publication Paper">Publication Paper</option>
          <option value="Syllabus">Syllabus</option>
          <option value="Jornal">Jornal</option>
          <option value="Thesis">Thesis</option>
          <option value="Article">Article</option>
        </select>
        <br>
        <label for="description">Description :</label>
        <textarea name="description" rows="5" cols="40"></textarea>

        <label for="content">Content :</label>
        <textarea name="content" rows="5" cols="40"></textarea>

        <button style="margin-left: 92%;border: none;background-color:#D2B6D2;" class="custom-btn" type="submit" name="Add" value="Add Publication">Add</button>
        <a href="#"><button style="margin-left: 92%;border: none;background-color:#D2B6D2;" class="custom-btn"> Cancel</button></a>
      </div>
    </div>

  </form>
  </div>
</body>

</html>