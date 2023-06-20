<?php
// Database connection settings
include 'dbconnection.php';


// Check if a complaint ID is provided
if (isset($_GET['Publication_ID'])) {
  $publicationId = $_GET['Publication_ID'];
  // Retrieve the complaint details from the database
  $sql = "SELECT * FROM publication WHERE Publication_ID = $publicationId";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $publicationType = $row['publication_type'];
    $publicationTopic = $row['publication_topic'];
    $publicationAuthor = $row['publication_author'];
    $description = $row['publication_description'];
    $date = $row['publication_date'];
  } else {
    echo "publication not found.";
    exit;
  }
} else {
  echo "No publication ID provided.";
  exit;
}


$conn->close();
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
</head>

<body>
  <!-- title bar -->
  <div id="title-bar">
    <!-- FK-EduSearch -->
    <a id="FK-EduSearch" class="FK Edu-Search">FK-EduSearch</a>

    <!-- search bar -->
    <div>
      <input style="color:#5D0773;padding-left:50px;padding-top:10px;margin-bottom:12px;margin-left:1px;border:none;" type="search" placeholder="Search..." />
      <img style=" margin-right:10px ;padding-top:3px;margin-left:3px ;margin-top:128px;margin: bottom 1px;width:23px;height:23px" src="image/search.png" alt="search cant function">
    </div>
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

  <!-- content -->
  <p style="padding-left:5px;padding-top:5px;font-size:20px;margin-left:255px;color:black;margin-top: -550px;"><b>Edit Publication</b> </p><br>
  <div style="margin-left:255px;font-size:17px;color:white ;background-color:#B681C1;">
    <b style="padding:5px 5px 5px 5px">My Publication</b> &nbsp;&nbsp;&nbsp;<button class="create-new-button"> <a href="M3_createNew.php">Create New</a></button>
  </div>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <h1>View Publication</h1>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="col-md-6">
      <div class="">
        <div class="form-body">
          <div class="form-group">
            <label for="description">User: Abby</label><br>
            <label for="date">Date: <?php echo $date; ?></label><br>
          </div>
          <div class="form-group">
            <label for="publicationTopic">Topic</label>
            <label for="publicationAuthor">Author</label>
            <label for="publicationType">Type of Publication</label>
            <select id="publicationtype" class="form-control custom-select" disabled>
              <option selected disabled>Choose the type of publication</option>
              <option value="Publication Paper" <?php if ($publicationType === "Publication Paper") echo 'selected'; ?>>Publication Paper</option>
              <option value="Syllabus" <?php if ($publicationType === "Syllabus") echo 'selected'; ?>>Syllabus</option>
              <option value="Jornal" <?php if ($publicationType === "Jornal") echo 'selected'; ?>>Jornal</option>
              <option value="Thesis" <?php if ($publicationType === "Thesis") echo 'selected'; ?>>Thesis</option>
              <option value="Article" <?php if ($publicationType === "Article") echo 'selected'; ?>>Article</option>
            </select>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" class="form-control" row="4" placeholder="Write a description of the publication" disabled><?php echo $description; ?></textarea>
          </div>
          <div class="row">
            <div class="col-12">
              <a href="create.php" class="btn btn-secondary">Back</a>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </section>
  </div>
</body>

</html>