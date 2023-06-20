<?php
include 'config.php';
include 'sessionAdmin.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FK-EduSearch | Knowledge Sharing System</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <!-- external stylesheet -->
    <link rel="stylesheet" href="AdminDashboard/style/style.css">
    <!-- <link rel="stylesheet" type="text/css" href="../AdminDashboard/style/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">
    <link rel="stylesheet" href="AdminDashboard/style/tablestyle.css">
    <style>
        .pagination-button {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            margin-right: 5px;
        }

        .pagination-button:hover {
            background-color: #0069d9;
        }

        .pagination-button:disabled {
            background-color: #e9ecef;
            color: #6c757d;
            cursor: not-allowed;
        }

        
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.container123 {
    width: 100%;
    min-height: 100vh;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    
}

.content123{
    width: 100%;
    min-height: 100vh;
    position: absolute;
    top:0;
    left:0;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.content123 h1{
    font-size: 45px;
    color: #fff;
    font-weight: 400;
    margin-bottom: 20px;
}

.content123 p{
    font-size: 16px;
    color: #fff;
}
/* this is the text, when you hover on button */
.hover-text {
  position: absolute;
  box-sizing: border-box;
  content: attr(data-text);
  color: var(--animation-color);
  width: 0%;
  inset: 0;
  border-right: var(--border-right) solid var(--animation-color);
  overflow: hidden;
  transition: 0.5s;
  -webkit-text-stroke: 1px var(--animation-color);
}
/* hover */
.button:hover .hover-text {
  width: 100%;
  filter: drop-shadow(0 0 23px var(--animation-color))
}



/*  */

.square {
position: relative;
margin: 0 10px;
margin-top: 20px;
width: 400px; height: 400px;
display: flex;
justify-content: center;
align-items: center;
}

.square .one {
position: absolute;
width: 100%;
height: 100%;
border: 2px solid black;
border-radius: 32% 58% 69% 43% / 48% 32% 59% 55%;
transition: 0.5s;
animation: animate 6s linear infinite;

}

.twitch:hover .one {
border: none;
background:rgb(20, 36, 50);;
}

.square .two {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
border: 2px solid black;
border-radius: 38% 62% 63% 37% / 41% 44% 56% 59%;
transition: 0.5s;
animation: animate 6s linear infinite;
}

.twitch:hover .two {
border: none;
background: rgb(20, 36, 50);;

}




.square .three {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
border: 2px solid black;
border-radius: 31% 45% 74% 35% / 38% 56% 51% 37%;
transition: 0.5s;
animation: animate2 10s linear infinite;
}
.twitch:hover .three {
border: none;
background:rgb(20, 36, 50);;
}

.circle {
position: relative;
padding: 40px 60px;
text-align: center;
transition: 0.5s;
z-index: 1000;
}

.square:hover{
color: white;
}

.content:hover {

color: #ffffff;
}

@keyframes animate {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

@keyframes animate2 {
    0% {
        transform: rotate(360deg);
    }
    100% {
        transform: rotate(0deg);
    }

}

.DrugRadar{
    font-size: 50px;
}


    </style>
</head>

<body>
<!-- title bar -->
<div id="title-bar">
    <!-- FK-EduSearch-->
    <a id="FK-EduSearch" class="FK Edu-Search">FK-EduSearch</a>

    <!-- search bar -->
    <div class="searchbar12">
        <input type="search" class="" placeholder="Search..." aria-label="Search" aria-describedby="search-addon" />
        <span class="input-group-text border-0" id="search-addon">
        <i class="fa fa-search" style='font-size:26px; color:white'></i>
        </span>
    </div>
    <!-- user profile -->
    <div>
        <a class="icon-link" href="#">
            Admin 
            <i class='fas fa-user-circle' style='font-size:36px;color:white'></i>
        </a>
    </div>
</div>

<div style="display: flex;">
    <!-- navigation bar (left side) -->
    <div>
        <nav id="nav-bar">
            <ul>
                <li><a class="nav-link active" href="AdminHomepage.php">Home</a></li>
                <li><a class="nav-link" href="User/UserAccountProfile.php">Update User Profile</a></li>
                <li><a class="nav-link" href="User/UserDiscussionBoard.php">Complaint Menu</a></li>
                <li><a class="nav-link" href="User/UserComplaint.php">User Report</a></li>
                <li><a class="nav-link" href="User/TotalPost.php">Admin Report</a></li>
                <li><a class="nav-link " href="AdminUserLists.php">User Lists</a></li>
                <li><a class="nav-link" href="Logout.php">Log Out</a></li>
            </ul>
        </nav>
    </div>

    <div style="margin-top: 30px; margin-left: 200px;">
        
    <div class="container123">
       
            <div class="square twitch" style="margin-bottom: 5px;">
                <span class="one" ></span>
                <span class="two"></span>
                <span class="three"></span>
                <div class="circle">
                    <h2 class="DrugRadar"> Welcome
               
                    </h2>
                    <p>Fk-Edusearch Admin System</p>
                </div>
            </div>
      
    </div>


    </div>
</div>

<script src="jquery/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTable.bootstrap.min.js"></script>

</body>
</html>
