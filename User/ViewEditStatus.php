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

                .header{
                    background-color: #2e94f3;
                    color: black;
                    padding: 10px 8px;

                }

                .pagination {
                     display: inline-block;
                 
                     margin-left: 300px;
                }

                .pagination a {
                    color: black;
                    float: left;
                    padding: 10px 16px;
                    text-decoration: none;
                    transition: background-color .3s;
                    border: 1px solid #ddd;
                }

                .pagination a.active {
                    background-color: lightskyblue;
                    color: white;
                    border: 1px solid lightskyblue;
                }

                .pagination a:hover:not(.active) {background-color: grey;}

                table{
                    width:84%;

                }

                td{
                    background-color:lightskyblue;
                    padding:10px 10px;
                }
                th{
                    background-color: lightpink;
                    text-align: left;
                }

                []{
                    
                    background-color: lightgreen;
                }
                
                input[type=button]{
                    background-color: #2e94f3;
                    float:left;
                    color:black;
                    font-size: 15px;
                    padding: 10px 35px;
                    border:none;
                    margin-top: 10px;
                    border-radius: 10%;
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
                <li><a class="nav-link" href="#">Home</a></li>
                <li><a class="nav-link active" href="../User/UserAccountProfile.php">Account Profile</a></li>
                <li><a class="nav-link" href="../User/DiscussionBoard.php">Discussion Board</a></li>
                <li><a class="nav-link" href="../Complaint/UserComplaint.php">Complaint</a></li>
                <li><a class="nav-link" href="../User/TotalPost.php">Total Post</a></li>
                <li><a class="nav-link" href="../User/PostReport.php">Post Report</a></li>
                <li><a class="nav-link" href="../login.php">Log Out</a></li>
            </ul>
        </nav>
            </div>
         <!-- main content (right side) -->
        <div id="column main-content">
          <div class="header"> <h1>User Profile Details In Getting Approve Process</h1></div>
           <table>
            <tr><td>Area Of Research : Software Engineering <i class='far fa-eye' style='font-size:36px'></i></td></tr>
            <tr><th><i class='far fa-edit' style='font-size:36px'></i>Already Validate And Approve By Admin</th></tr>
            <br>
            <tr><td>Current Academic Status : PHD  <i class='far fa-eye' style='font-size:36px'></i></td></tr>
            <tr><th><i class='far fa-edit' style='font-size:36px'></i>Not Validate And Approve By Admin Yet</th></tr>
            <br>
            <tr><td>Social Media Account : Facebook : Atikah <i class='far fa-eye' style='font-size:36px'></i></td></tr>
            <tr><th><i class='far fa-edit' style='font-size:36px'></i>Not Validate And Approve By Admin Yet</th></tr>
            <br>
        
            </table>

            <input type="button" name="Back" value="Back" onclick="window.location='../User/UserAccountProfile.php'" >
           <br>
            <div class="pagination">
            <a href="#">&laquo;</a>
            <a href="#" class="active">1</a>
            <a href="#" >2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">6</a>
            <a href="#">&raquo;</a>
            </div>

        </div>


</body>
</html>