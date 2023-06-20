<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FK-EduSearch | Knowledge Sharing System</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">

  <!-- external stylesheet -->
  <link rel="stylesheet" href="style/style.css">
</head>

<body>

  <!-- title bar -->
  <div style="height: 170px;width: 100%;display: flex;align-items: center;justify-content: space-between;padding: 22px 14px;background-color:#9021AC">
    <!-- FK-EduSearch-->
    <h3 id="FK-EduSearch" class="FK Edu-Search">FK-EduSearch</h3>

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
    <ul style="text-align: center; font-family: 'PT-serif', serif; font-size: 18px;">
      <li><a class="nav-link" href="home.php">Home</a></li>
      <li><a class="nav-link active " href="account.php">Account Profile</a></li>
      <li><a class="nav-link " href="notification.php">Notifications</a></li>
      <li><a class="nav-link" href="publication.php">Discussion Board</a></li>
      <li><a class="nav-link" href="calTotal.php">Analytics</a></li>
      <br><br>
      <li><a class="nav-link" href="#">Log Out</a></li>
    </ul>
  </nav>

  <!-- content -->
  <!-- <div style="margin-left:300px;margin-top: -450px;background-color:white;min-height: fit-content;">Edit Profile</div> -->
  <p style="padding-left:5px;padding-top:5px;font-size:20px;margin-left:255px;color:black;margin-top: -550px;"><b>Edit Profile</b> </p><br>
  <!-- <p style="color:aliceblue;background-color: #B681C1;margin-top: -600px;"><b>My Profile</b></p> -->
  <table style="color:#5D0773;padding-left:5px;padding-top:5px;margin-left:255px;">
    <tr>
      <th style="margin-left:10px;font-size:17px;color:white ;background-color:#B681C1;" colspan=" 2"><b>My Profile</b></th>
    </tr>
    <tr>
      <th>Name</th>

      <td style="margin-right:270px"><input style="color:#5D0773;margin-left:1px;margin-right:50px;border: none;" type="text" placeholder="Abby" required /></td>
    </tr>
    <tr>
      <th>Profile Picture</th>
      <td><input style="color:#5D0773;margin-left:1px;margin-right:50px;border: none;" type="file" placeholder="Upload profile picture" /></td>
    </tr>
    <tr>
      <th>University and Department</th>
      <td><input style="color:#5D0773;margin-left:1px;border: none;" type="text" placeholder="Add University and Department" required /></td>
    </tr>
    <tr>
      <th>Contact Detail</th>
      <td><input style="color:#5D0773;margin-left:1px;border: none;" type="email" placeholder="Add email" required /></td>
    </tr>
    <tr>
      <th>Password</th>
      <td><input style="color:#5D0773;margin-left:1px;border: none;" type="text" placeholder="********" required /></td>
    </tr>
    <tr>
      <th>Social Media Accounts</th>
      <td>
        <ul>
          <li><img class="image" src="image/facebook.png" alt="fb"> <span id="facebook"><input style="color:#5D0773;margin-left:1px;margin-right:50px;border: none;" type="text" placeholder="Add Facebook Acc" /></span></li>
          <li><img class="image" src="image/instagram.png" alt="ig"> <span id="instagram"><input style="color:#5D0773;margin-left:1px;margin-right:50px;border: none;" type="text" placeholder="Add Instagram Acc" /></span></li>
        </ul>
      </td>
    </tr>
    <tr>
      <th style="margin-left:30px;font-size:17px;color:white ;background-color:#B681C1;" colspan=" 2"><b>Area of research</b></th>
    </tr>
    <tr>
      <th>Current Academic Status</th>
      <td><input style="color:#5D0773;margin-left:1px;border: none;" type="text" placeholder="Add Current Academic Status" required /></td>
    </tr>
    <tr>
      <th>Credentials</th>
      <td><input style="color:#5D0773;margin-left:1px;border: none;" type="text" placeholder="Add Credentials" required /></td>
    </tr>
    <tr>
      <th>Research Areas</th>
      <td><input style="color:#5D0773;margin-left:1px;border: none;" type="text" placeholder="Add Research Areas" /></td>
    </tr>
    <tr>
      <th>CV</th>
      <td> <input style="color:#5D0773;margin-left:1px;padding-top:2px;border: none;" type="text" placeholder="Add CV" /></td>
    </tr>
    <tr>
      <td style="padding-top:50px">
      </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button class="custom-btn "> <input style="border: none;background-color:#D2B6D2" type="submit" value="Update"></button>&nbsp;&nbsp;&nbsp;<button class="custom-btn"> Cancel</button>
      </td>
    </tr>

  </table>

  <!-- <button onclick=" editProfile()">Edit Profile</button> -->

  <script src="index.js"></script>

  </div>


</body>

</html>