<?php
// Database connection settings
include 'dbconnection.php';
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
    <ul style="text-align:center;font-family: 'PT-serif' , serif;font-size:18px">
      <li><a class="nav-link" href="#">Home</a></li>
      <li><a class="nav-link" href="M3_account.php">Account Profile</a></li>
      <li><a class="nav-link" href="notification.php">Notifications</a></li>
      <li><a class="nav-link  active" href="publication.php">Discussion Board</a></li>
      <li><a class="nav-link" href="calTotal.php">Analytics</a></li>
      <br><br>
      <li><a class="nav-link" href="login.php">Log Out</a></li>
    </ul>
  </nav>

  <!-- content -->
  <!-- <div style="margin-left:300px;margin-top: -450px;background-color:white;min-height: fit-content;">Edit Profile</div> -->
  <p style="padding-left:5px;padding-top:5px;font-size:20px;margin-left:255px;color:black;margin-top: -550px;"><b>Edit Publication</b> </p><br>
  <!-- <p style="color:aliceblue;background-color: #B681C1;margin-top: -600px;"><b>My Profile</b></p> -->
  <div style="padding:5px 5px 5px 5px ;margin-left:255px;font-size:17px;color:white ;background-color:#5D0773;">
    <b>My Publication</b> &nbsp;&nbsp;&nbsp;
    <button type="button" class="create-new-button" onclick="window.location.href='createPublication.php'">Create New Publication</button>
</div>

  <div class="form-container">
    <div style="margin-left:260px;margin-top:10px">
      <!-- CRUD table -->
      <table style="border: 1px; background-color:#F3E7F4;">
        <thead>
          <tr>
            <th style="width: 250px; background-color:#B681C1;color:black;">Topic</th>
            <th style="width: 200px;background-color:#B681C1;color:black;">Author</th>
            <th style=" width:500px;background-color:#B681C1;color:black;">Brief Description</th>
            <th style="width: 50px;background-color:#B681C1;color:black;">Type of Publication</th>
            <th style=" width: 100px;background-color:#B681C1;color:black;">Date</th>
            <th style="width:100px;background-color:#B681C1;color:black;">Actions</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $sql = "SELECT * FROM publication_list";
          $result = $conn->query($sql);

          while ($row = mysqli_fetch_assoc($result)) {
            $publicationID = $row['Publication_ID'];
            $publicationDate = $row['publication_date'];
            $publicationType = $row['publication_type'];
            $publicationDescription = $row['publication_description'];
            $publicationAuthor = $row['publication_author'];
            $publicationContent = $row['publication_content'];
            $publicationTopic = $row['publication_topic'];
          ?>
            <tr>
              <td><?php echo $publicationTopic; ?></td>
              <td><?php echo $publicationAuthor; ?></td>
              <td><?php echo $publicationDescription; ?></td>
              <td><?php echo $publicationType; ?></td>
              <td><?php echo $publicationDate; ?></td>
              <td class="action-icons">
                <a href="viewPublication.php?publication_id=<?php echo $publicationID; ?>"><img src="image/show.png" alt="View"></a>&nbsp;
                <a href="updatePublication.php?publication_id=<?php echo $publicationID; ?>"><img src="image/edit.png" alt="Edit"></a>&nbsp;
                <a href="deletePublication.php?publication_id=<?php echo $publicationID; ?>" onclick="return confirm('Are you really want to delete this publication?')"> <img src="image/delete.png" alt="Delete"></a>
              </td>
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