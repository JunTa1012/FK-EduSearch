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

                .pagination {
                     display: inline-block;
                }

                .pagination a {
                    color: black;
                    float: left;
                    padding: 8px 16px;
                    text-decoration: none;
                    transition: background-color .3s;
                    border: 1px solid #ddd;
                }

                .pagination a.active {
                    background-color: #4CAF50;
                    color: white;
                    border: 1px solid #4CAF50;
                }

                .pagination a:hover:not(.active) {background-color: #CBD8FA;}
              
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
                <li><a class="nav-link" href="../User/UserComplaint.php">Complaint</a></li>
                <li><a class="nav-link" href="../User/TotalPost.php">Total Post</a></li>
                <li><a class="nav-link" href="../User/PostReport.php">Post Report</a></li>
                <li><a class="nav-link" href="../login.php">Log Out</a></li>
            </ul>
        </nav>
            </div>
         <!-- main content (right side) -->
        <div id="column main-content">
           <div class="SearchKeywordForm">
          <label>Search Keywords: </label><input type="text" id="searchkeyword" name="searchkeyword" placeholder="Enter The Keyword......"><button type ="submit" name="Submit" value="Submit" class= "button">Submit</button>
            </div>
          <div class="UserSearchCategory">
          <label>Categories By: </label>
          <select id="searchcategory">
            <option value="" disabled>--Select The Category Of The Post--</option>
            <option value="Software Engineering">Software Engineering</option>
            <option value="Graphics And Multimedia">Graphics And Multimedia</option>
            <option value="Human Computer Interaction">Human Computer Interaction</option>
            <option value="Systems And Networking">Systems And Networking</option>
            <option value="Artificial Intelligence And Machine Learning">Artificial Intelligence And Machine Learning</option>
            </select>
            <button type ="submit" name="Submit" value="Submit" class= "button">Submit</button>
            </div>
        <table>
            <tr><th>Post Questions</th><th>Date</th><th>Time</th><th>Post Status</th><th>Category</th></tr>
            <tr><td><strong>How Can I Get Resources For Research?</strong><br>Software Engineering</td><td>16 April 2023</td><td>8:00 A.M.</td><td>Accepted</td><td>Software Engineering</td></tr>
            <tr><td><strong>Are My Datasets Suitable For Research?</strong><br>Human Computer Interaction</td><td>16 April 2023</td><td>10:30 P.M.</td><td>Completed</td><td>Human Computer Interaction</td></tr>
            <tr><td><strong>How Can I Do Fuzzy Logic Research?</strong><br>Artificial Intelligence And Machine Learning</td><td>16 April 2023</td><td>11:30 P.M.</td><td>Completed</td><td>Artificial Inteligence And Machine Learning</td></tr>
            <tr><td><strong>What Element Must Include In Graphics?</strong><br>Graphics And Multimedia</td><td>17 April 2023</td><td>10:00 P.M.</td><td>Completed</td><td>Graphics And Multimedia</td></tr>
        
        </table>
        <a href="../User/DiscussionBoard.php">&laquo; Home</a>
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