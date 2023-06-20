<?php
	include 'config.php';
    include 'sessionAdmin.php';
	if(isset($_POST['add'])){
		$user_name = $_POST['val-username'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $researcharea = $_POST['researcharea'];
		$user_password = $_POST['val-password'];
		$user_type = $_POST['val-user-type'];
		$user_academic_status = $_POST['val-academic-status'];
		$user_social = $_POST['user_social'];
		$sql = "INSERT INTO user (user_name, user_password, user_type, user_academicStatus, user_socialMediaAcc, user_email, user_phoneNum, user_researchArea) VALUES ('$user_name', '$user_password', '$user_type', '$user_academic_status', '$user_social', '$email', '$phonenumber', '$researcharea')";

		//use for MySQLi OOP
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            // Redirect back to the previous page after updating
            header("Location: AdminUserLists.php");
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User Registration</title>
    <style>
        /* Styles for the form */
        .form-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 30px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-control:focus {
            outline: none;
            border-color: #8dbdff;
        }

        .form-btn {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-btn:hover {
            background-color: #0056b3;
        }

        /* Additional Styles */
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <h1>New User Registration</h1>
    <div class="form-container">
        <form class="form-valide" action="" method="POST">
            <div class="form-group">
                <label class="form-label" for="user_name">Username <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="user_name" name="val-username"
                    placeholder="Enter a username..">
            </div>
            <div class="form-group">
                <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="email" name="email"
                    placeholder="Enter a email..">
            </div>
            <div class="form-group">
                <label class="form-label" for="phonenumber">Phone Number <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="phonenumber" name="phonenumber"
                    placeholder="Enter a phone number..">
            </div>
            <div class="form-group">
                <label class="form-label" for="researcharea">Research Area <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="researcharea" name="researcharea"
                    placeholder="Enter a research area..">
            </div>
            <div class="form-group">
                <label class="form-label" for="user_password">Account Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="user_password" name="val-password"
                    placeholder="Enter password">
            </div>
            <div class="form-group">
                <label class="form-label" for="user_type">User Type <span class="text-danger">*</span></label>
                <select class="form-control" id="user_type" name="val-user-type">
                    <option value="">Select User Type</option>
                    <option value="Student">Student</option>
                    <option value="Staff">Staff</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label" for="user_academic_status">Academic Status <span
                        class="text-danger">*</span></label>
                <select class="form-control" id="user_academic_status" name="val-academic-status">
                    <option value="">Select Academic Status</option>
                    <option value="Undergraduate">Undergraduate</option>
                    <option value="Graduate">Graduate</option>
                    <option value="Postgraduate">Postgraduate</option>
                    <option value="Doctoral">Doctoral Candidate</option>
                    <option value="Alumni">Alumni</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label" for="user_social">User Social</label>
                <textarea class="form-control" id="user_social" name="user_social" rows="5"
                    placeholder="User Social Media Account"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" name="add" class="form-btn">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>
