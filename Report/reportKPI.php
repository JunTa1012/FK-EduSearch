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

            background-color: #EEEEEE;
        }

        /*
HEADER
*/
        #title-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: white;
            background-color: #00B232;
            height: 138px;
            width: 100%;
            padding: 30px 24px;

        }

        .FKEduSearch {
            font: 2.5rem 'Poppins', sans-serif;
            margin-left: 50px;


        }

        .searchbar {
            position: absolute;
            margin-left: 450px;
            padding-top: 60px;
        }

        input[type=search] {
            padding: 10px 110px;
            border-radius: 10px;
            text-align: left;
        }

        .iconNotification {
            position: absolute;
            left: 1000px;
            top: 88px;
        }

        .Message {
            position: absolute;
            left: 1060px;
            top: 88px;
        }

        .icon-link {
            position: absolute;
            right: 30px;
            top: 80px;
            font-size: 22px;
            text-decoration: none;
            color: white;
            font-family: sans-serif;
        }

        /*
NAVIGRATINO BAR
*/
        #nav-bar {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background-color: #D4FFAA;
            height: 100vh;
            width: 200px;
            padding: 50px 0 0 0;
        }


        .nav-link {
            display: inline-block;
            width: 100%;
            padding-top: 20px;
            padding-bottom: 20px;
            padding-left: 30px;
            color: black;
            font-family: 'PT-serif', serif;
            text-decoration: none;
            text-align: left;
            font-size: 18px;

        }

        .active,
        .nav-link:hover {
            color: black;
            background-color: #AEE874;
            transition: all ease-in 200ms;
        }

        ul {
            list-style-type: none;

        }

        .column {
            float: left;
            padding: 0px;
        }

        .centercontent::after {
            content: "";
            clear: both;
            display: table;
        }

        .LeftNavigationbar {
            width: 16%;
            float: left;
        }

        .main-content {
            background-color: white;
            width: 82%;
            float: center;
        }

        .UserTable,
        tr,
        td {
            border: none;
            color: black;
            text-align: left;
            padding: 9.6px 40px;
        }

        .UserName {
            font-size: 25px;
            padding-left: 35px;
        }

        .ViewEditStatusBtn,
        .EditProfileBtn {
            background-color: #CBD8FA;
            color: black;
            font-size: 15px;
            padding: 10px 10px;
            border: none;
            margin-right: 0px;
            float: right;
        }

        .EditProfileBtn {
            padding: 10px 27px;

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

        .titleContainer {
            width: 100%;
            background-color: #B8C9B2;
            height: 48px;
        }

        .titleFont {
            font-size: 24px;
            padding-left: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .contentTitle {
            font-size: 20px;
            padding-left: 10px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .tablePostList {
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
        }

        .tablePostList-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 6px 20px;
            background-color: #D4FFAA;
            color: #000;
        }

        .tablePostList-row:first-child {
            background-color: #D9D9D9;
            padding: 6px 20px;
            margin-left: 20px;
            margin-right: 20px;
        }

        .tablePostList-row:not(:first-child) {
            background-color: #C7FF94;
            margin-top: 10px;
            margin-left: 20px;
            margin-right: 20px;
        }

        .tablePostList-cell {
            flex-basis: 33.33%;
            padding: 10px;
        }
        
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                June
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
                    <li><a class="nav-link" href="../User/UserAccountProfile.php">Update User Profile</a></li>
                    <li><a class="nav-link" href="../Complaint/adminComplaintList.php">Complaint Menu</a></li>
                    <li><a class="nav-link" href="../Report/userReportList.php">User Report</a></li>
                    <li><a class="nav-link" href="../User/TotalPost.php">Total Post</a></li>
                    <li><a class="nav-link active" href="../Report/reportList.php">Admin Report</a></li>
                    <li><a class="nav-link" href="../login.php">User Lists</a></li>
                    <li><a class="nav-link" href="../login.php">Log Out</a></li>
                </ul>
            </nav>
        </div>
        <!-- main content (right side) -->
        <div class="titleContainer">
            <h2 class="titleFont">Key performance indicators (KPIs)</h2>
        </div>
        <br>
        <div class=" ">
            <table class="">
                <tr>
                    <th>Sorted by:</th>
                    <th>
                        <select>
                            <option value="monday">Monday</option>
                            <option value="tuesday">Tuesday</option>
                            <option value="wednesday">Wednesday</option>
                            <option value="thursday">Thursday</option>
                            <option value="friday">Friday</option>
                            <option value="saturday">Saturday</option>
                            <option value="sunday">Sunday</option>
                        </select>
                    </th>
                    <th>
                        <select>
                            <option value="week1">Week 1</option>
                            <option value="week2">Week 2</option>
                            <option value="week3">Week 3</option>
                            <option value="week4">Week 4</option>
                            <!-- Add more weeks as needed -->
                        </select>
                    </th>
                    <th><select>
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </th>
                </tr>
            </table>
        </div>
        <br>
        <div class="column main-content">
            
        <canvas id="myChart"></canvas>
        <script>
  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ['Red', 'Blue', 'Yellow'],
      datasets: [{
        label: 'My First Dataset',
        data: [12, 19, 7],
        backgroundColor: [
          'rgb(255, 99, 132)',
          'rgb(54, 162, 235)',
          'rgb(255, 205, 86)'
        ],
        hoverOffset: 4
      }]
    }
  });
</script>
        </div>

</body>

</html>