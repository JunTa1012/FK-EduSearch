<?php
include 'config.php';
include 'sessionAdmin.php';
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the form data
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phone_number'];
    $researchArea = $_POST['research_area'];
    $academicStatus = $_POST['academic_status'];

    // Update the user record in the database
    $updateSql = "UPDATE user SET user_name = '$username', user_email = '$email', user_phoneNum = '$phoneNumber', user_researchArea = '$researchArea', user_academicStatus = '$academicStatus' WHERE User_ID = $id";

    if ($conn->query($updateSql) === TRUE) {
        echo "Record updated successfully";
        // Redirect back to the previous page after updating
        header("Location: AdminUserLists.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Get the user ID from the URL parameter
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Fetch the user record from the database
$sql = "SELECT * FROM user WHERE User_ID = $id";
$query = $conn->query($sql);
$row = $query->fetch_assoc();

// Check if a user with the given ID exists
if (!$row) {
    echo "User not found";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Details</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 400px;
            margin: 50px auto;
        }

        h2 {
            margin-bottom: 30px;
            text-align: center;
            color: #007bff;
        }

        .form-container {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 4px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        button[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: none;
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0069d9;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Edit User Details</h2>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="id" value="<?php echo $row['User_ID']; ?>">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['user_name']; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['user_email']; ?>">
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number:</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo $row['user_phoneNum']; ?>">
                </div>
                <div class="form-group">
                    <label for="research_area">Research Area:</label>
                    <input type="text" class="form-control" id="research_area" name="research_area" value="<?php echo $row['user_researchArea']; ?>">
                </div>
                <div class="form-group">

                    <label for="academic_status">Academic Status:</label>
                    <input type="text" class="form-control" id="academic_status" name="academic_status" value="<?php echo $row['user_academicStatus']; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>

    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
