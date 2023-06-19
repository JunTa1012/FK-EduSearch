<?php
include 'dbconnection.php';
// session_start();
// Check if a Expert_ID is provided
if (isset($_GET['expert_id'])) {
  $Expert_ID = $_GET['expert_id'];
  // Retrieve the post details from the database
  $sql = "SELECT * FROM expert WHERE Expert_ID = $Expert_ID";
  $result = $conn->query($sql);
  date_default_timezone_set('Asia/Kuala_Lumpur');
  $currentdate  = date('Y-m-d'); // Get the current date

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $Expert_ID = $row['Expert_ID'];
    $expert_profile = $row['expert_profile'];
    $expert_name = $row['expert_name'];
    $expert_password = $row['expert_password'];
    $expert_email = $row['expert_email'];
    $expert_phoneNum = $row['expert_phoneNum'];
    $expert_researchArea = $row['expert_researchArea'];
    $expert_academicStatus = $row['expert_academicStatus'];
    $expert_socialAcc1 = $row['expert_socialAcc1'];
    $expert_socialAcc2 = $row['expert_socialAcc2'];
    $expert_CV = $row['expert_CV'];
  } else {
    echo "Not found.";
    exit;
  }
} else {
  echo "No Expert_ID provided.";
  exit;
}
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Validate and sanitize user inputs
  $updatedexpert_name = mysqli_real_escape_string($conn, $_POST['expert_name']);
  $updatedexpert_profile = mysqli_real_escape_string($conn, $_POST['expert_profile']);
  $updatedexpert_password = mysqli_real_escape_string($conn, $_POST['expert_password']);
  $updatedexpert_email = mysqli_real_escape_string($conn, $_POST['expert_email']);
  $updatedexpert_phoneNum = mysqli_real_escape_string($conn, $_POST['expert_phoneNum']);
  $updatedexpert_researchArea = mysqli_real_escape_string($conn, $_POST['expert_researchArea']);
  $updatedexpert_academicStatus = mysqli_real_escape_string($conn, $_POST['expert_academicStatus']);
  $updatedexpert_socialAcc1 = mysqli_real_escape_string($conn, $_POST['expert_socialAcc1']);
  $updatedexpert_socialAcc2 = mysqli_real_escape_string($conn, $_POST['expert_socialAcc2']);
  $updatedexpert_CV = mysqli_real_escape_string($conn, $_POST['expert_CV']);

  // Update the database
  $updateSql = "UPDATE expert SET expert_name= '$updatedexpert_name',expert_profile= '$updatedexpert_profile',expert_password= '$updatedexpert_password',expert_email= '$updatedexpert_email',expert_phoneNum= ' $updatedexpert_phoneNum',expert_researchArea= '$updatedexpert_researchArea',expert_academicStatus= '$updatedexpert_academicStatus',expert_socialAcc1= '$updatedexpert_socialAcc1',expert_socialAcc2= '$updatedexpert_socialAcc2',
  expert_CV= '$updatedexpert_CV'WHERE Expert_ID = $Expert_ID";
  if ($conn->query($updateSql) === true) {
    echo "Updated successfully.";
    header("Location: account.php");
    // You can redirect the user to a different page or display a success message here
  } else {
    echo "Error updating : ";
    // You can handle the error scenario as per your requirements
  }
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
      <th>Profile Picture</th>

      <td style="margin-right:270px"><input style="color:#5D0773;margin-left:1px;margin-right:50px;border: none;" type="image" required /><?php echo $expert_profile; ?></td>
    </tr>
    <tr>
      <th>Name</th>

      <td style="margin-right:270px"><input style="color:#5D0773;margin-left:1px;margin-right:50px;border: none;" type="text" placeholder="<?php echo $expert_name; ?>" required /></td>
    </tr>
    <tr>
      <th>Contact Number</th>
      <td><input style="color:#5D0773;margin-left:1px;border: none;" type="text" placeholder="<?php echo $expert_phoneNum; ?>" required /></td>
    </tr>
    <tr>
      <th>Email</th>
      <td><input style="color:#5D0773;margin-left:1px;border: none;" type="email" placeholder="<?php echo $expert_email; ?>" required /></td>
    </tr>
    <tr>
      <th>Social Media Accounts</th>
      <td>
        <ul>
          <li><img class="image" src="image/facebook.png" alt="fb"> <span id="facebook"><input style="color:#5D0773;margin-left:1px;margin-right:50px;border: none;" type="text" placeholder="<?php echo $expert_socialAcc1; ?>" /></span></li>
          <li><img class="image" src="image/instagram.png" alt="ig"> <span id="instagram"><input style="color:#5D0773;margin-left:1px;margin-right:50px;border: none;" type="text" placeholder="<?php echo $expert_socialAcc2; ?>" /></span></li>
        </ul>
      </td>
    </tr>
    <tr>
      <th>Password</th>
      <td><input style="color:#5D0773;margin-left:1px;border: none;" type="text" placeholder="<?php echo $expert_password; ?>" required /></td>
    </tr>

    <tr>
      <th style="margin-left:30px;font-size:17px;color:white ;background-color:#B681C1;" colspan=" 2"><b>Area of research</b></th>
    </tr>
    <tr>
      <th>Research Areas</th>
      <td><input style="color:#5D0773;margin-left:1px;border: none;" type="text" placeholder=" <?php echo $expert_researchArea; ?>" /></td>
    </tr>
    <tr>
      <th>Current Academic Status</th>
      <td><input style="color:#5D0773;margin-left:1px;border: none;" type="text" placeholder="<?php echo $expert_academicStatus; ?>" required /></td>
    </tr>
    <tr>
      <th>CV</th>
      <td> <input style="color:#5D0773;margin-left:1px;padding-top:2px;border: none;" type="file" /></td>
    </tr>

    <tr>
      <td style="padding-top:50px">
      </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button class="custom-btn "> <input style="border: none;background-color:#D2B6D2" type="submit" value="Update"></button>&nbsp;&nbsp;&nbsp;<button class="custom-btn"> Cancel</button>
      </td>
    </tr>

  </table>


</body>

</html>