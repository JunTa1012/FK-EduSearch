<?php
include("../dbconnect.php");
session_start();
include_once '../module1/sessionUser.php';
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
    padding-bottom: 100px;

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
    padding: 10px 10px;

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

input[type=text]{
    border:none;
    width: 80%;
    text-align: center;

}

input[type=datetime-local]{
    border:none;
    width: 80%;
    text-align: center;

}

textarea{
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
    margin: 7px 160px;
}

input[type=reset]{
    background-color: #CBD8FA;
    color:black;
    font-size: 15px;
    padding: 7px 15px;
    border:none;
    margin: 7px 130px;

}

input[type=button]{
    background-color: #CBD8FA;
    color:black;
    font-size: 15px;
    padding: 7px 15px;
    border:none;
    margin: 7px 120px;
}

.star{
  color:red;
    }

.note {
  color: #ff0000
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
                <li><a class="nav-link" href="../User/UserAccountProfile.php">Account Profile</a></li>
                <li><a class="nav-link active" href="../User/DiscussionBoard.php">Discussion Board</a></li>
                <li><a class="nav-link" href="../Complaint/UserComplaint.php">Complaint</a></li>
                <li><a class="nav-link" href="../User/TotalPost.php">Total Post</a></li>
                <li><a class="nav-link" href="../User/PostReport.php">Post Report</a></li>
                <li><a class="nav-link" href="../module1/logout.php">Log Out</a></li>
            </ul>
        </nav>
        </div>

         <!-- main content (right side) -->
        <div id="column main-content">
           <h1>Create New Post  &nbsp;<i class='fas fa-plus-circle' style='font-size:36px;color:grey'></i></h1>
           <div class="header2">
           <h2>My Post</h2>
            </div>
            <h3><span class="note">* - Must Fill Out</span></h3>
           <table>
           <form name="myForm" method="POST" action="../User/php/ValidatePost.php" >
           <?php if(isset($_GET['error'])){ ?>
           <div class="alert alert-danger" role="alert">
              <?php echo $_GET['error']; ?>
            </div>
            <?php } ?>
           <tr><th>Question Subtitle <a class="star">*</a></th><td><input type="text"  id="post_title" name="postTitle" placeholder="Enter Question"></td></tr>
            <tr><th>Content<a class="star">*</a> </th><td> <input type="text" name="postContent" id="post_content" placeholder="Content of the question that you want to ask"></td></tr>
            <tr><th>Keyword<a class="star">*</a> </th><td><input type="text"  id="post_keyword" name="postKeyword" placeholder="Software Engineering, AI, etc."></td></tr>
            <tr><th>Category<a class="star">*</a></th><td><input type="text"  id="post_category" name="postCategory" placeholder="Insert Your Post Category"></td></tr>
            <tr><th>Date<a class="star">*</a></th><td><input type="date"  id="PostDate" name="postDate"></td></tr>
            <tr><th>Time<a class="star">*</a></th><td><input type="time"  id="PostTime" name="postTime"></td></tr>
            <tr><th>Comment<a class="star">*</a></th><td><textarea rows="5" cols="50" name="postComment" id="postComment"Comment......></textarea></td>
            <br><br>
            
            </table>
            <button type ="submit" name="create" value="Submit" class= "button">Submit</button>
            <input type="reset" value="Reset">
            <input type="button" name="cancel" value="Cancel" onclick="window.location='../User/DiscussionBoard.php'" >
            </form>
        </div>
       
 
</body>
</html>

