<?php
session_start();
// Database connection settings
include 'dbconnection.php';

            $sql = "SELECT * FROM expert";
            $result = $conn->query($sql);

            while ($row = mysqli_fetch_assoc($result)) {
                $Expert_ID = $row['Expert_ID'];
                $expert_name = $row['expert_name'];
                $expert_email = $row['expert_email'];
                $expert_profile = $row['expert_profile'];
                $expert_password = $row['expert_password'];
                $expert_phoneNum = $row['expert_phoneNum'];
                $expert_researchArea1 = $row['expert_researchArea1'];
                $expert_researchArea2 = $row['expert_researchArea2'];
                $expert_researchArea3 = $row['expert_researchArea3'];
                $expert_academicStatus = $row['expert_academicStatus'];
                $expert_socialAcc1 = $row['expert_socialAcc1'];
                $expert_socialAcc2 = $row['expert_socialAcc2'];
                $expert_CV = $row['expert_CV'];
            }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FK-EduSearch | Knowledge Sharing System</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&display=swap"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
    <!-- external stylesheet -->
    <link rel="stylesheet" href="style/account.css">
    <!-- <link rel="stylesheet" href="style/profile.css"> -->


</head>

<body>
    <!-- title bar -->
    <div style="height: 170px;width: 100%;display: flex;align-items: center;justify-content: space-between;padding: 22px 14px;background-color:#9021AC">
        <a id="FK-EduSearch" class="FK Edu-Search">FK-EduSearch</a>
        <div>
            <input style="color:#5D0773;padding-left:50px;padding-top:10px;margin-bottom:12px;margin-left:1px;border:none;" type="search" placeholder="Search..." />
            <img style=" margin-right:10px ;padding-top:3px;margin-left:3px ;margin-top:128px;margin: bottom 1px;width:23px;height:23px" src="image/search.png" alt="search cant function">
        </div>
        <!-- user profile -->
        <div>
            <p style="margin-right:10px ;margin-left:3px ;margin-top:125px;margin-bottom:10px;">Expert <img style="width:30px;height:auto;" src="image/woman.png" alt="profile picture" </p>
        </div>
    </div>
    <!-- </a> -->
    </div>

    </div>

    <!-- navigation bar (left side) -->
    <nav style="background-color:#F9DFFF; position:initial; top: 4; left: 0; height: 100vh; width: 255px; padding-top: 18px; padding-bottom: 30px;">
        <ul style="text-align: center; font-family: 'PT-serif', serif; font-size: 18px;">
            <li><a class="nav-link" href="home.php">Home</a></li>
            <li><a class="nav-link active " href="account.php">Account Profile</a></li>
            <li><a class="nav-link " href="notification.php">Notifications</a></li>
            <li><a class="nav-link" href="publication.php">Discussion Board</a></li>
            <li><a class="nav-link" href="calTotal.php">Analytics</a></li>
            <br><br>
            <li><a class="nav-link" href="#">Log Out</a></li>
        </ul>
    </nav>
    <!-- content -->

    <div style="margin-top:-700px;padding:5px 5px 5px 5px ;margin-left:255px;font-size:17px;color:white ;background-color:#5D0773;">
        <b>My Profile</b> &nbsp;&nbsp;&nbsp;
        <button style="border:0;padding:2px 5px 5px 5px;"><b><a style="text-decoration:none;color:black;" href="editProfile.php?expert_id=<?php echo $Expert_ID; ?>">Edit Profile</a></b></button>
    </div>
    <div class="form-container" style="color:black;">

        <div style="margin-left:260px;">
            


            <div>

                <div style="margin-left:3px;">
                    <span>

                        <div style=" flex: 1;padding: 30px;margin-left:0px;background-color:#EFE7F0;">
                            <img src="image/woman.png" alt="" style="width: 100px;">
                            <h2 style="font-size: 20px;margin-bottom: 10px;">Personal Info</h2>
                            <p><strong>Name:</strong> <?php echo $expert_name; ?></p>
                            <p><strong>Email:</strong> <?php echo $expert_email; ?></p>
                            <p><strong>Phone:</strong> <?php echo $expert_phoneNum; ?></p>
                            <p><strong>Social Media:</strong>
                                <li><img class="image" src="image/facebook.png" alt="fb"> <span id="facebook"><a style="text-decoration:none" href="https://www.facebook.com/login/"><?php echo $expert_socialAcc1; ?></a></span></li>
                                <li><img class="image" src="image/instagram.png" alt="ig"> <span id="instagram"><a style="text-decoration:none" href="https://www.instagram.com/"><?php echo $expert_socialAcc2; ?></a></span></li>
                            </p>
                        </div>
                        <div style=" flex: 1;padding: 10px; background-color:#E1D1E4;">
                            <h2 style="font-size: 20px;margin-left: 20px;">Research Areas</h2>
                            <ul style="list-style-type: disc;margin-left:35px;">
                                <li><?php echo $expert_researchArea1; ?></li>
                                <li><?php echo $expert_researchArea2; ?></li>
                                <li><?php echo $expert_researchArea3; ?></li>
                            </ul>
                            <br>
                        </div>

                        <div style=" flex: 1;padding: 10px;background-color:#F5CFFA;">
                            <h2 style="font-size: 20px;margin-bottom: 10px;margin-left:20px;">Current Academic Status</h2>
                            <p style="margin-left:20px;"><strong>Education:</strong> <?php echo $expert_academicStatus; ?></p>
                            <br>
                            <p style="margin-left:20px;"><a href="CV.pdf">Download CV</a></p>
                            <br>
                        </div>
                    </span>

                </div>

            </div>
        </div>
    </div>
</body>

</html>