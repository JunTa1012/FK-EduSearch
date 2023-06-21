<<<<<<< HEAD
<?php 
        if (isset($_POST['Submit'])){

            include "../../dbconnect.php";

            function validate($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            $user_rating = validate($_POST['rating']);
        

                $sql = "INSERT INTO post(user_rating) 
                        VALUES ('$user_rating') WHERE Post_ID=$Post_ID";
                $result = mysqli_query($conn, $sql);

                if($result){
                    echo "Success";
                }else{
                    header("Location:../User/Rating.php?error=unknown error occured&");
                }
            }
        
        
        ?>



=======
<?php
include("../dbconnect.php");
session_start();
include_once '../module1/sessionAdmin.php';
?>
>>>>>>> 6cff52b188c20bffff7d1f4e0852086689d77e5b
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FK-EduSearch | Knowledge Sharing System</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- external stylesheet -->
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

                form{
                     width:84%;
                }

                label{
    
                display: inline-block;
                width: 350px;
                margin-left: 150px;
                text-align: left;
                font-weight: bold;
                padding: 10px 10px;
                
                }


                input[type=text]{
                    border:1px solid;
                    text-align: center;
                    margin: 6px;
                    width: 300px;
                    padding: 10px 10px;

                }

                textarea{
                    border:1px solid;
                    text-align: center;
                    margin: 5px;
                    width: 300px;
                    padding: 10px 10px;
                }

                button[type=submit]{
                    background-color: #2e94f3;
                    color:black;
                    font-size: 15px;
                    padding: 10px 50px;
                    border:none;
                    margin: 7px 0px;
                    float:right;
                    border-radius: 5px;
                }

                input[type=button]{
                    background-color: #2e94f3;
                    color:black;
                    font-size: 15px;
                    padding: 10px 50px;
                    border:none;
                    margin: 7px 10px;
                    float:left;
                    border-radius: 5px;
                }

                .header{
                    background-color: #2e94f3;
                    color: black;
                    padding: 10px 10px;

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
        <i class="fas fa-search" style='font-size:20px; color:white'></i>
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
                <li><a class="nav-link" href="../User/UserAccountProfile.php">Account Profile</a></li>
                <li><a class="nav-link active" href="../User/DiscussionBoard.php">Discussion Board</a></li>
<<<<<<< HEAD
                <li><a class="nav-link" href="../Complaint/UserComplaint.php"">Complaint</a></li>
=======
                <li><a class="nav-link" href="../Complaint/UserComplaint.php">Complaint</a></li>
>>>>>>> 6cff52b188c20bffff7d1f4e0852086689d77e5b
                <li><a class="nav-link" href="../User/TotalPost.php">Total Post</a></li>
                <li><a class="nav-link" href="../User/PostReport.php">Post Report</a></li>
                <li><a class="nav-link" href="../module1/logout.php">Log Out</a></li>
            </ul>
        </nav>
            </div>
         <!-- main content (right side) -->
        <div id="column main-content">
           <div class="header"><h1>Rating</h1> </div>
          
           <form action="../User/Rating.php?Post_ID=<?php echo $Post_ID;?>" method="POST">
           
            <label>Category: </label> <input type="text"  id="post_category" name="topic"><br><br>
            <label>Question: </label> <input type="text"  id="post_content" name="question"><br><br>
            <label>Expert's Answer</label> <input type="text"  id="expert_answer" name="expertAns"><br><br>
            <label>Expert's Name </label> <input type="text"  id="expert_name" name="expertName"><br><br>
            <label>Rating: </label> <input type="text"  id="user_rating" name="rating"><br><br>
            <br>
           <input type="button" name="back" value="Back" onclick="window.location='../User/ManageRatingAndFeedback.php'">
             <button type ="submit" name="Submit" value="Submit" class= "button">Add</button>
            </form>
         

        </div>


</body>
</html>