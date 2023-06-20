<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: ExpertHomepage.php");
}
if(isset($_POST["submit"])){
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $researcharea = $_POST["researcharea"];
  $contactnumber = $_POST["contactnumber"];
  $academicstatus = $_POST["academicstatus"];
  $duplicate = mysqli_query($conn, "SELECT * FROM expert WHERE expert_name = '$username' OR expert_email = '$email'");
  
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO expert (expert_email, expert_password, expert_name, expert_researchArea, expert_academicStatus) VALUES ('$email', '$password','$username','$researcharea','$academicstatus')";
      mysqli_query($conn, $query);
      echo "<script>alert('Registration Successful');</script>";
      echo "<script>window.location.href = 'LoginExpert.php';</script>";
    exit;
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
    <!-- <link rel="stylesheet" type="text/css" href="../Login/login.css"> -->

    <style>
@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;

}

.login-page .form{
  border-radius: 12px;
  border: 100px;
}

.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

.form h1{
    color: #2E0249;
    font: bold;

}

.form select {
    font-family: "Roboto", sans-serif;
    width: 200px;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #00ADA5;
    color: white;
    margin-bottom: 10px;

}

.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #9021AC;
  width: 70%;
  border-radius: 12px;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
  border: none;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 4px 2px; 
  
}
.form button:hover,.form button:active,.form button:focus {
  background: #0e4553;
}
/* .form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
} */

.form .a9 {
    margin: 15px 0 0;
    color: #2E0249;
    font-size: 12px;
}

.form .a1 {
    margin: 15px 0 0;
    color: #2E0249;
    font-size: 12px;
    float: left;
}

.form .a2 {
    margin: 15px 0 0;
    color: #2E0249;
    font-size: 12px;
    float: right;
}

.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  
  background: #9021AC;
  
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}

    </style>

  </head>
  <body>
    

<div class="login-page">

      <div class="form">
      <img src="umplogo.png" alt="test" width="200" height="90">
      <h1>Registration</h1>
      <form class="" action="" method="POST" autocomplete="off">

      <label for="email">Email : </label>
      <input type="email" name="email" id = "email" required value=""> <br>

      <label for="username">Username : </label>
      <input type="text" name="username" id = "username" required value=""> <br>

      <label for="password">Password : </label>
      <input type="password" name="password" id = "password" required value=""> <br>

      <label for="confirmpassword">Confirm Password : </label>
      <input type="password" name="confirmpassword" id = "confirmpassword" required value=""> <br>

      <label for="researcharea">Research Area : </label>
      <input type="text" name="researcharea" id = "researcharea" required value=""> <br>
      
      <label for="contactnumber">Contact Number : </label>
      <input type="text" name="contactnumber" id = "contactnumber" required value=""> <br>

      <label for="academicstatus">Academic Status : </label>
      <input type="text" name="academicstatus" id = "academicstatus" required value=""> <br>
      
      <button type="submit" name="submit">Sign Up</button><br>
      <a class="a9 a1" href="LoginExpert.php">Login</a> 
    </form>

      </div>


</div>

    


    <br>
    <a href="Login.php">Login</a>
  </body>
</html>