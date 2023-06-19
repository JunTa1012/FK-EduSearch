<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FK-EduSearch | Knowledge Sharing System</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
  <!-- <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
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
      <p style="margin-right:10px ;margin-left:3px ;margin-top:125px;margin-bottom:10px;">Abby <img style="width:30px;height:auto;" src="image/woman.png" alt="profile picture" </p>


        <!-- </a> -->
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
  <!-- <div style="margin-left:300px;margin-top: -450px;background-color:white;min-height: fit-content;">Edit Profile</div> -->
  <p style="padding-left:5px;padding-top:7px;font-size:20px;margin-left:255px;color:black;margin-top: -550px;"><b>Create New Publication</b> </p><br>
  <!-- <p style="color:aliceblue;background-color: #B681C1;margin-top: -600px;"><b>My Profile</b></p> -->

  <div style=" padding:10px 5px 10px 5px;margin-left:255px;font-size:17px;color:white ;background-color:#B681C1;">
    <b>Share research by uploading it to your profile</b>
  </div>

  <div class="form-container">
    <div class="rectangle">
      <div class="left-side">
        <span><img style="width:140px; height:auto" src="image/document.png" alt="document"></span>
        <input type="file" Value="Upload Document">
      </div>
    </div>

    <div class="right-side">
      <label for="author">Author</label>
      <input type="text" id="author" name="author">

      <label for="topic">Topic</label>
      <input type="text" id="topic" name="topic">

      <label for="description">Description</label>
      <textarea id="description" name="description"></textarea>
    </div>
  </div>

  </div>

  <div class="leftDown-side">
    <ul>
      <li>- Published Paper</li>
      <li>- Unpublished Paper</li>
      <li>- Book</li>
      <li>- Pre-print</li>
      <li>- Book</li>
      <li>- Pre-print</li>
      <li>- Dissertation</li>
      <li>- Syllabus</li>
    </ul>
  </div>

  <div>
    <div>

      <button style="margin-left: 83%;" class="custom-btn"> <input style="border: none;background-color:#D2B6D2" type="submit" value="Submit"></button>&nbsp;<button class="custom-btn"> Cancel</button>

    </div>
  </div>
  </div>
</body>

</html>