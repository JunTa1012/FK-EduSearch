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
  <p style="padding-left:5px;padding-top:5px;font-size:20px;margin-left:255px;color:black;margin-top: -550px;"><b>Edit Publication</b> </p><br>
  <!-- <p style="color:aliceblue;background-color: #B681C1;margin-top: -600px;"><b>My Profile</b></p> -->
  <div style="margin-left:255px;font-size:17px;background-color:#B681C1;">
    <b style="padding:5px 5px 5px 5px ;color:white ;">My Publication</b> &nbsp;&nbsp;&nbsp;<button class="create-new-button"> <a href="M3_createNew.php">Create New</a></button>
  </div>
  <table style="border:1;color:#5D0773;padding-left:5px;padding-top:5px;margin-left:255px;margin-right:2px;">
    <tbody>
      <tr>
        <th>
        </th>
        <th style="padding-right:100px;">Date</th>
        <th style="padding-right:350px;">Action</th>
      </tr>
      <tr>
        <td>
          <div style=" background: #F0C7FF; padding-left:5px; padding-bottom:5px;"><img style=" width: 65px;height: auto;" src="image/file.png" alt=" file"><br><b style=" padding-left:5px; padding-bottom:5px;">Topic: Web Engineering in Computer Science <br>
            </b>&nbsp;by Dr.Abby Lee Tan Ta & Dr.Nurul Ain Bin Aman
          </div>
        </td>
        <td>2023-05-26</td>
        <td class="action-icons">
          <img src="image/show.png" alt="View">&nbsp;
          <img src="image/edit.png" alt="Edit">&nbsp;
          <img src="image/delete.png" alt="Delete">
        </td>
      </tr>

      <tr>
        <td>
          <div style=" background: #F0C7FF; padding-left:5px; padding-bottom:5px;"><img style=" width: 65px;height: auto;" src="image/file.png" alt=" file"><br><b style=" padding-left:5px; padding-bottom:5px;">Topic: Data Analysis <br>
            </b>&nbsp;by Dr.Abby Lee Tan Ta
          </div>
        </td>
        <td>2023-06-20</td>
        <td class="action-icons">
          <img src="image/show.png" alt="View">&nbsp;
          <img src="image/edit.png" alt="Edit">&nbsp;
          <img src="image/delete.png" alt="Delete">
        </td>
      </tr>

      <tr>
        <td>
          <div style=" background: #F0C7FF; padding-left:5px; padding-bottom:5px;"><img style=" width: 65px;height: auto;" src="image/file.png" alt=" file"><br><b style=" padding-left:5px; padding-bottom:5px;">Topic: Software System Computer Science <br>
            </b>&nbsp;by Dr.Abby Lee Tan Ta & Dr.Tom Aan
          </div>
        </td>
        <td>2023-06-25</td>
        <td class="action-icons">
          <img src="image/show.png" alt="View">&nbsp;
          <img src="image/edit.png" alt="Edit">&nbsp;
          <img src="image/delete.png" alt="Delete">
        </td>
      </tr>


    </tbody>

  </table>

  <!-- <button onclick=" editProfile()">Edit Profile</button> -->

  <script src="index.js"></script>

  </div>


</body>

</html>