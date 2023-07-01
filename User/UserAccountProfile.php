<?php
include("../dbconnect.php");
session_start();
include_once '../module1/sessionUser.php';

if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE User_ID = '$id'");
  $row = mysqli_fetch_assoc($result);
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
    padding-bottom: 13px;

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

.UserTable,tr,td{
    border:none;
    color: black;
    text-align: left;
    padding:9.6px 40px;

    

}

.UserName{
    font-size: 25px;
    padding-left: 35px;
}



.ViewEditStatusBtn,.EditProfileBtn{
    background-color: #CBD8FA;
    color:black;
    font-size: 15px;
    padding: 10px 10px;
    border:none;
    margin-right: 0px;
    float:right;
}

.EditProfileBtn{
    padding: 10px 27px;
   
}

.UserDetailsTable{
    width:90%;
    border:1px solid;
    border-collapse: collapse;
    margin-left: 60px;
    text-align: center;
}
     
.UserDetailsTableTh{
    background-color:#CBD8FA ;
    width:50%;
    border:1px solid;
    padding-left: 30px;
    font-size: 23px;
    font-family: sans-serif;
}

.LoginSessionDetails{
    width: 90%;
    background-color:#CBD8FA ;
    border:none;
    margin-left: 60px;
    padding: 10px 10px;
    border-spacing: 0;
   
}
.SessionTh{
    text-align:center;
    border:none;
    border-spacing: 0;
    padding:2px 2px;
}

.SessionT{
    background-color: white;
    border:none;
    border-spacing: 0;
    text-align: center;
    padding: 2px 4px;
}

.PostOpportunityDetails{
    width: 90%;
    background-color:#CBD8FA ;
    border:none;
    margin-left: 60px;
    padding: 10px 10px;
    border-spacing: 0;
}

.PODT{
    background-color: white;
    border:none;
    border-spacing: 0;
    text-align: center;
    padding: 2px 4px;
    text-decoration: none;
    color:black;

}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa {
  padding: 5px;
  font-size: 20px;
  width: 25px;
  text-align: center;
  text-decoration: none;
  margin: 0px 10px;
  border-radius: 50%;
}

    </style>
    </head>

<body>
 <!-- title bar -->
 <div id="title-bar">
        <!-- FK-EduSearch-->
        <div id="FKEduSearch" class="FKEduSearch">FK-EduSearch</div>
        
        <!-- search bar -->
        <div class="searchbar">
        <input type="search" class="form-control rounded" aria-label="Search" aria-describedby="search-addon" />
        <span class="input-group-text border-0" id="search-addon">
        <i class="fas fa-search" style='font-size:20px; color:black'></i>
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
            <a class="icon-link">
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
        <div class="column main-content">
            <table class="UserTable" >
            <?php 
            $select = mysqli_query($conn, "SELECT * FROM `user` WHERE User_ID ='$id' ")
            or die('query failed');
            if(mysqli_num_rows($select) > 0){
              $fetch = mysqli_fetch_assoc($select);
            }
            ?>
                <tr>
                <td rowspan="4">
                    <img src="../Assets/userPic.png" width="120px" height="120px" style="padding-top:10px;">
                </td>
                <th>
                    <a class="UserName">  <?php echo $fetch['user_name'] ?> </a>
                </th>
                <td rowspan="2" style="width:300px" >
                <button class="ViewEditStatusBtn" onclick = "window.location.href='ViewEditStatus.php';"><strong>View Edit Status</strong></button></td>
                </td>
                </tr>
                <tr>
                <td> University of Malaysia Pahang | Department of Computing</td>
                </tr>
                <tr>
                <td><?php echo $fetch['user_email'] ?> &nbsp; <a>+ <?php echo $fetch['user_phoneNum'] ?></a></td>
            <td rowspan="2" style="width:300px"><button class="EditProfileBtn" onclick = "window.location.href='../User/EditProfile.php';"><strong>Edit Profile</strong></button></td>
                </tr>
                <tr> 
                    <td>
                  <a> + Create a description about yourself</a>
                   
                    </td>
                </tr>
            </table>
            <hr>
            <br>
            <div class="UserDetails">
            <table class="UserDetailsTable">
                <tr><th class="UserDetailsTableTh">Current Academic Status</th> <td class="UserDetailsTable" ><?php echo $fetch['user_academicStatus'] ?></td></tr>
                <tr><th class="UserDetailsTableTh">Research Area</th><td class="UserDetailsTable"><?php echo $fetch['user_researchArea'] ?></td></tr>
                <tr><th class="UserDetailsTableTh">Social Media Account</th><td class="UserDetailsTable" ><a href="#" class="fa fa-facebook"></a> <?php echo $fetch['user_socialMediaAcc'] ?></td></tr>
            </table>
            </div>
            <br>
            <table class="LoginSessionDetails">
                <tr><th class="SessionTh">Date</th><th class="SessionTh">Days</th><th class="SessionTh">Time</th><th class="SessionTh">Login Session</th><th class="SessionTh">Number Of Post</th></tr>
                <tr class="SessionT"><td class="SessionT">22 May 2023</td><td class="SessionT">Mon</td><td class="SessionT">8.00AM</td><td class="SessionT">1</td><td class="SessionT">2</td></tr>
            </table>
            <br>
            <table class="PostOpportunityDetails">
               <tr class="PODT"><th class="PODT">Remaining Post Question Opportunity : </th><td class="PODT">1</td><td class="PODT"><a class="PODT" href="../User/CreateNewPost.php">Let's Create The Post To Ask The Questions</a></td></tr>
            </table>

        </div>

</body>
</html>