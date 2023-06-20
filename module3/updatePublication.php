<?php
include './link/dbconnection.php';

// session_start();
// Check if a publication ID is provided
if (isset($_GET['publication_id'])) {
  $publicationID = $_GET['publication_id'];
  // Retrieve the publication details from the database
  $sql = "SELECT * FROM publication_list WHERE Publication_ID = $publicationID";
  $result = $conn->query($sql);
  date_default_timezone_set('Asia/Kuala_Lumpur');
  $currentdate  = date('Y-m-d'); // Get the current date

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
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Validate and sanitize user inputs
  $updatedpublicationTopic = mysqli_real_escape_string($conn, $_POST['publicationTopic']);
  $updatedpublicationAuthor = mysqli_real_escape_string($conn, $_POST['publicationAuthor']);
  $updatedpublicationDescription = mysqli_real_escape_string($conn, $_POST['publicationDescription']);
  $updatedpublicationType = mysqli_real_escape_string($conn, $_POST['publicationType']);
  $updatedpublicationContent = mysqli_real_escape_string($conn, $_POST['publicationContent']);

  // Update the publication in the database
  $updateSql = "UPDATE publication_list SET publication_topic= '$updatedpublicationTopic',publication_author= '$updatedpublicationAuthor',publication_description= '$updatedpublicationDescription', publication_type= '$updatedpublicationType',publication_date = '$currentdate', publication_content = '$updatedpublicationContent' WHERE Publication_ID = $publicationID";
  if ($conn->query($updateSql) === true) {
    echo "Publication updated successfully.";
    header("Location: publication.php");
    // You can redirect the user to a different page or display a success message here
  } else {
    echo "Error updating publication: ";
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
      <p style="margin-right:10px;margin-left:3px ;margin-top:125px;margin-bottom:10px;">Expert <img style="width:30px;height:auto;" src="image/woman.png" alt="profile picture" </p>
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
      <li><a class="nav-link" href="#">Log Out</a></li>
    </ul>
  </nav>

  <!-- main content  -->
  <p style="padding-left:5px;padding-top:7px;font-size:20px;margin-left:255px;color:black;margin-top: -550px;"><b><img style="width:25px;" src="image/edit.png" alt="Edit"> Update Publication</b> </p><br>

  <div style=" padding:10px 5px 10px 5px;margin-left:255px;font-size:17px;color:white ;background-color:#B681C1;">
    <b> &nbsp;Publication</b>
  </div>


  <div class="form-group" style="margin-left:260px;margin-top:20px">
    <label id="Description" name="Description">User: Abby</label><br>
    <label id="Date" name="Date">Date: <?php echo $publicationDate; ?></label><br>
  </div>
  <form action="updatePublication.php?publication_id=<?php echo $publicationID; ?>" method="POST">
    <div class="form-group" style="margin-left:260px;margin-top:20px">
      <label>Topic : <input type="text" id="publicationTopic" name="publicationTopic" value="<?php echo $publicationTopic; ?>"></label>
      <br> <label>Author : <input type="text" id="publicationAuthor" name="publicationAuthor" value="<?php echo $publicationAuthor; ?>"></label>
    </div>
    <div class="form-group" style="margin-left:260px;margin-top:20px">
      <label for="publicationType">Type of Publication :</label>
      <select class="form-control custom-select" id="publicationType" name="publicationType">
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
      <textarea class="form-control" id="publicationDescription" name="publicationDescription" row="4" required><?php echo $publicationDescription; ?></textarea>
    </div>
    <div class="form-group" style="margin-left:260px;margin-top:20px">
      <label for="publicationContent">Content</label>
      <textarea class="form-control" id="publicationContent" name="publicationContent" row="4" required><?php echo $publicationContent; ?></textarea>
    </div>

    <div class="row">
      <div class="col-12">
        <button style="margin-left: 92%;border: none;background-color:#D2B6D2;" class="custom-btn" type="submit"><b>Update</b></button><br><br>
        <a href="publication.php"><button style="margin-left: 92%;border: none;background-color:#D2B6D2;" class="custom-btn"><b>Cancel</b></button></a>
      </div>
    </div>
  </form>

</body>

</html>