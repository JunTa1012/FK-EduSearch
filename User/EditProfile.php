
<?php
include("../dbconnect.php");
session_start();

include_once '../module1/sessionUser.php';

if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE User_ID = '$id'");
  $row = mysqli_fetch_assoc($result);
}

//validate first, then update to database.
if(isset($_POST['Update'])){

            function validate($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            $user_name = validate($_POST['user_name']);
            $user_phoneNum = validate($_POST['user_phoneNum']);
            $user_password = validate($_POST['user_password']);
            $user_socialMediaAcc = validate($_POST['user_socialMediaAcc']);
            $user_email = validate($_POST['user_email']);
            $user_academicStatus = validate($_POST['user_academicStatus']);
            $user_researchArea = validate($_POST['user_researchArea']);

            if(empty($user_name)){
                header("Location:../User/EditProfile.php?error= Name is required");
            }else if(empty($user_phoneNum)){
                header("Location:../User/EditProfile.php?error= Phone Num is required");
            }else if(empty($user_password)){
                header("Location:../User/EditProfile.php?error= Password is required");
            }else if(empty($user_socialMediaAcc)){
                header("Location:../User/EditProfile.php?error= Social Media Account is required");
            }else if(empty($user_email)){
                header("Location:../User/EditProfile.php?error= Email is required");
            }else if(empty($user_academicStatus)){
                header("Location:../User/EditProfile.php?error= Academic Status is required");
            }
            else if(empty($user_researchArea)){
                header("Location:../User/EditProfile.php?error= Research Area is required");
            }else{

            $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
            $user_phoneNum = mysqli_real_escape_string($conn,$_POST['user_phoneNum']);
            $user_password = mysqli_real_escape_string($conn,$_POST['user_password']);
            $user_socialMediaAcc = mysqli_real_escape_string($conn,$_POST['user_socialMediaAcc']);
            $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
            $user_academicStatus = mysqli_real_escape_string($conn,$_POST['user_academicStatus']);
            $user_researchArea = mysqli_real_escape_string($conn, $_POST['user_researchArea']);
              
           $updateSql =  "UPDATE `user` SET user_name = '$user_name', user_phoneNum = '$user_phoneNum', user_password = '$user_password', user_socialMediaAcc = '$user_socialMediaAcc',  user_email = '$user_email', user_academicStatus = '$user_academicStatus', user_researchArea = '$user_researchArea' WHERE User_ID = '$id'";

            if ($conn->query($updateSql) === true) {
              header("refresh:1;url= ../User/EditProfile.php");
              echo '<script type="text/javascript">';
              echo 'alert("Profile Updated Successfully.")';
              echo '</script>';
              
              // You can redirect the user to a different page or display a success message here
          } else {
              echo "Sorry, Error updating Profile: ";
              // You can handle the error scenario as per your requirements
          }
              
        }
}


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FK-EduSearch | Knowledge Sharing System</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      
        <style>
             * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  body {
    
    background-color: white;
  }

/*
HEADER
*/
#title-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    color: white;
    background-color: #0047FF;
    height: 138px;
    width: 100%;
    padding: 30px 24px;
    
  }

  .FKEduSearch {
    font: 2.5rem 'Poppins', sans-serif;
    margin-left: 50px;

    
  }
  
.searchbar{
    position:absolute;
    margin-left: 450px;
    padding-top:60px;
}
  input[type=search]
  {
    padding: 10px 110px;
    border-radius:10px;
    text-align: left;
  }

  .iconNotification{
    position: absolute;
    left:1000px;
    top: 88px;
  }

  .Message{
    position: absolute;
    left:1060px;
    top: 88px;


  }

  .icon-link {
    position: absolute;
    right: 30px;
    top: 80px;
    font-size: 22px;
    text-decoration: none;
    color:white;
    font-family: sans-serif;
  }

  /*
NAVIGRATINO BAR
*/
#nav-bar {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    background-color: #CBD8FA;
    height: 100%;
    width: 200px;
    padding-top: 30px;
    padding-left: 0px;
    padding-bottom: 17px;

  }
  .nav-link {
    display: inline-block;
    width: 100%;
    padding-top: 20px;
    padding-bottom: 19px;
    padding-left:35px;
    color: black;
    font-family: 'PT-serif', serif;
    text-decoration: none;
    text-align: left;
    font-size:18px;

  }
  .active, .nav-link:hover {
    color: black;
    background-color: #A6B7E4;
    transition: all ease-in 200ms;
  }

  ul{
    list-style-type:none;
   
  }

  .column {
  float: left;
  padding:0px;
}

  .centercontent::after {
  content: "";
  clear: both;
  display: table;
  }

  .LeftNavigationbar{
    width:16%

  }
  .main-content {
  background-color: white;
  width: 84%;

}

.header2{
    background-color: #2e94f3;
    color: white;
    padding: 2px 10px;

}
table,td,tr{
    border: 1px solid;
    width:84%;
    border-collapse: collapse;
    padding: 10px 10px;
    
}

th{
    width:50%;
    border: 1px solid;
    text-align:left;
    padding-left: 10px;
}

textarea{
    border:none;
    width: 80%;
    text-align: center;
}

input[type=text]{
    border:none;
    width: 80%;
    text-align: center;

}

button[type=submit]{
    background-color: #CBD8FA;
    color:black;
    font-size: 15px;
    padding: 7px 15px;
    border:none;
    margin: 7px;
    float: right;
}


input[type=button]{
    background-color: #CBD8FA;
    color:black;
    font-size: 15px;
    padding: 7px 15px;
    border:none;
    margin: 7px;
    float: right;
}

.alert-danger{
  color:darkred;
  background-color: pink;
  padding: 20px;
  border-radius: 5px;
  text-align: center;

}
</style>
    </head>

<body>
 <!-- title bar -->
 <div id="title-bar">
        <!-- FK-EduSearch-->
        <a id="FKEduSearch" class="FKEduSearch">FK-EduSearch</a>
        
        <!-- search bar -->
        <div class="searchbar">
        <input type="search" class="form-control rounded" placeholder="Search..." aria-label="Search" aria-describedby="search-addon" />
        <span class="input-group-text border-0" id="search-addon">
        <i class="fas fa-search" style='font-size:26px; color:white'></i>
        </span>
        </div>
        <div class="iconNotification">
        <i class='far fa-bell' style='font-size:20px'></i>
        </div>
        <div class="Message">
        <i style='font-size:20px' class='far fa-comment'></i>
        </div>
         <!-- user profile -->
        <div>
            <a class="icon-link" href="#">
                User 
                <i class='fas fa-user-circle' style='font-size:26px;color:white'></i>
            </a>
        </div>
    </div>
    <div class="centercontent">
    <div class="column LeftNavigationbar">
         <!-- navigation bar (left side) -->
         <nav id="nav-bar">
            <ul>
                <li><a class="nav-link" href="../User/UserHomepage.php">Home</a></li>
                <li><a class="nav-link active" href="../User/UserAccountProfile.php">Account Profile</a></li>
                <li><a class="nav-link" href="../User/DiscussionBoard.php">Discussion Board</a></li>
                <li><a class="nav-link" href="../Complaint/UserComplaint.php">Complaint</a></li>
                <li><a class="nav-link" href="../User/TotalPost.php">Total Post</a></li>
                <li><a class="nav-link" href="../User/PostReport.php">Post Report</a></li>
                <li><a class="nav-link" href="../module1/logout.php">Log Out</a></li>
            </ul>
        </nav>
</div>
         <!-- main content (right side) -->
        <div id="column main-content">
           <h1>Edit Profile</h1>
           <div class="header2"><h2>My Profile</h2></div>
           <table>
            <?php 
            $select = mysqli_query($conn, "SELECT * FROM `user` WHERE User_ID ='$id' ")
            or die('query failed');
            if(mysqli_num_rows($select) > 0){
              $fetch = mysqli_fetch_assoc($select);
            }
            ?>
           <form action="../User/EditProfile.php" method="POST">
           <?php if(isset($_GET['error'])){ ?>
           <div class="alert alert-danger" role="alert">
              <?php echo $_GET['error']; ?>
            </div>
            <?php } ?>
            <tr><th>Name</th><td><input type="text"  id="user_name" name="user_name" value="<?php echo $fetch['user_name'] ?>"><i class='fas fa-pencil-alt' style='color:darkblue'></i></td></tr>
            <tr><th>Profile Picture</th><td> <input type="file" name="fileToUpload" id="fileToUpload" value="Upload your profile picture"></td></tr>
            <tr><th>University and Department</th><td><a>University Of Malaysia Pahang | Department Of Computing</a></td></tr>
            <tr><th>Contact Details</th><td><input type="text"  id="user_phoneNum" name="user_phoneNum" value="<?php echo $fetch['user_phoneNum']?>"><i class='fas fa-pencil-alt' style='color:darkblue'></i></td></tr>
            <tr><th>Password</th><td><input type="text"  id="user_password" name="user_password" value="<?php echo $fetch['user_password']?>"> <i class='fas fa-pencil-alt' style='color:darkblue'></i></td></tr>
            <tr><th>Social Media Account</th><td><input type="text"  id="user_socialMediaAcc" name="user_socialMediaAcc" value="<?php echo $fetch['user_socialMediaAcc']?>"><i class='fas fa-pencil-alt' style='color:darkblue'></i></td></tr>
            <tr><th>Email Address</th><td><input type="text"  id="user_email" name="user_email" value="<?php echo $fetch['user_email'] ?>"><i class='fas fa-pencil-alt' style='color:darkblue'></i></td></tr>
            <tr><th>Current Academic Status</th><td><input type="text"  id="user_academicStatus" name="user_academicStatus" value="<?php echo $fetch['user_academicStatus']?>"><i class='fas fa-pencil-alt' style='color:darkblue'></i></td></tr>
            <tr><th>Research Area</th><td><input type="text"  id="user_researchArea" name="user_researchArea" value="<?php echo $fetch['user_researchArea']?>"><i class='fas fa-pencil-alt' style='color:darkblue'></i></td></tr>
            </table>
            <button type ="submit" name="Update" value="Update" class= "button">Update</button>
           <input type="button" name="cancel" value="Cancel" onclick="window.location='../User/UserAccountProfile.php'" >
            </form>
          

        </div>


</body>
</html>