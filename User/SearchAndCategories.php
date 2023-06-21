<?php

include ("../dbconnect.php");

$output = '';
//collect

if(isset($_POST['search'])) {

    $searchq = $_POST['search'];
    $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);

    $query = "SELECT * FROM post WHERE post_keyword LIKE '%$searchq%'";

    $query_run = mysqli_query($conn,$query);
    $count = mysqli_num_rows($query_run);

    if($count ==0){
        $output ='There was no search results!';
    }
    else{
        while($row = mysqli_fetch_array($query_run)){
            $postQuestion = $row['post_title'];
            $postDate = $row['post_date'];
            $postTime = $row['post_time'];
            $postKeyword = $row['post_keyword'];
           

            $output .= 'Post Question : &nbsp;' . $postQuestion . '<br> Post Date : &nbsp;'  . $postDate. '<br> Post Time : &nbsp;' . $postTime . '<br> Post Keyword : &nbsp;' . $postKeyword . '<br><br><br>'; 
        }
    }

}


?>

=======
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
                    padding-bottom: 1500px;

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
                .main-content{
                background-color: white;
                width: 84%;

                }


                input[type=button]{
                    background-color: #CBD8FA;
                    color:black;
                    font-size: 15px;
                    padding: 7px 15px;
                    border:none;
                    margin: 7px 120px;
                    float:right;
                }
                
                .btn{
                    padding: 10px 100px;
                   
                }

                .searchkeywordbar{
                    padding: 10px 100px;
                    float: left;
                    margin-right: 10px;
                }

                .searchoutput{
                    border:solid 1px;
                    border-color: black;
                    padding:10px 10px;

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
            <h2>Search By Keyword: </h2>
          <form class='form' action='SearchAndCategories.php' method="POST">
                
                <br><br>
                <button class='btn' type='submit' name='search' style='margin-right: 2rem;'>Search Keywords </button>

                <input class='searchkeywordbar' id='search-bar' type="text" name="search" placeholder="Search for Keywords">

                


            </form>
                <br>
            <div class="searchoutput">
             <?php print("$output");?>
            </div>

            <br><br>
            <hr>
            <div class="UserSearchCategory">
          <label>Categories By: </label>
                <form action='SearchAndCategories.php' method="POST">
                    
            <select id="searchcategory" name="searchcategory">
                <option value="" disabled>--Select The Category Of The Post--</option>
                <option value="All Categories">All Categories</option>
                <option value="Software Engineering">Software Engineering</option>
                <option value="Graphics And Multimedia">Graphics And Multimedia</option>
                <option value="Human Computer Interaction">Human Computer Interaction</option>
                <option value="Systems And Networking">Systems And Networking</option>
                <option value="Artificial Intelligence And Machine Learning">Artificial Intelligence And Machine Learning</option>
                </select>
                <button type ="submit" name="Submit" value="Submit" class= "button">Submit</button>
            </form>
        </div>
        <div class="searchCategoryOutput">
             <?php 

             ?>
            </div>
       <script src="../User/Javascript/script.js"></script>
        <a href="../User/DiscussionBoard.php">&laquo; Home</a>
        
        </div>


</body>
</html>