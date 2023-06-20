<?php
include("../dbconnect.php");
session_start();
include_once '../module1/sessionAdmin.php';
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
              
                 /* Style the tab */
                    .tab {
                    overflow: hidden;
                    border: 1px solid #ccc;
                    background-color: #f1f1f1;
                    }

                    /* Style the buttons inside the tab */
                    .tab button {
                    background-color: inherit;
                    float: left;
                    border: none;
                    outline: none;
                    cursor: pointer;
                    padding: 14px 16px;
                    transition: 0.3s;
                    font-size: 17px;
                    }

                    /* Change background color of buttons on hover */
                    .tab button:hover {
                    background-color: #ddd;
                    }

                    /* Create an active/current tablink class */
                    .tab button.active {
                    background-color: #ccc;
                    }

                    /* Style the tab content */
                    .tabcontent {
                    display: none;
                    padding: 6px 12px;
                    border: 1px solid #ccc;
                    border-top: none;
                    }

                    .container{
                        min-height: 100vh;
                        top:20px;
                        justify-content:center;
                        align-items:center;
                        flex-direction: column;

                    }

                    .container form{
                        width: 60px;
                        padding:20px;
                        border-radius:10px;
                        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.2);
                    }

                    .box{
                        width: 900px;
                    }

                    .container table{
                        padding:20px;
                        width:1000px;
                        position:absolute;
                        top:230px;
                        left: 220px;
                        border-radius: 10px;
                        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.2);
                    }

                    th,td{
                        width: 700px;
                        padding: 10px;
                        text-align:left;
                        border: none;
                    
                        
                    }



        </style>
        <?php
        include "../User/php/readUserPost.php";
        ?>
       
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
            <div class="container">
                <div class="box">
        <table>
            <?php if (mysqli_num_rows($result)) { ?>
            <tr><th>Post Questions</th><th>Post Category</th><th>Date & Time</th><th>Post Status</th><th>Actions</th></tr>
          <?php 
         $i = 0;
          while ($rows = mysqli_fetch_assoc($result)){
         $i++;
         ?>
            <tr><td><?=$i?></td><td><?=$rows['post_title']?></td><td><?php echo $rows['post_category']?></td><td><?php echo $rows['post_dateTime']?></td><td><?php echo $rows['postStatus']?></td>
            <td><a href="../User/ViewPostDetail.php"><i class='fas fa-eye' style='font-size:24px;color:darkblue'></i></a>
            <a href="../User/EditPost.php"><i class='fas fa-edit' style='font-size:24px;color:darkblue'></i></a>
            <a href="/User/DeletePost.php"><i class='far fa-trash-alt' style='font-size:24px;color:red'></i></a>
            </td></tr>
        <?php } ?>
        </table>
        <?php } ?>
        </div>
        </div>
       
        
      


</body>
</html>