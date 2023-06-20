<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: ../Complaint/UserComplaint.php");
}
if(isset($_POST["submit"])){
  $username = $_POST["username"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '$username'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password === $row['user_password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["User_ID"];
      header("Location: ../Complaint/UserComplaint.php");
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
  
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
  background: #00ADA5;
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
  
  background: #0047FF;
  
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}

</style>

</head>
<body>

    

    <div class="login-page">
        <div class="form">
          <form action="" method="POST" id="login-form" class="login-form">
            <img src="umplogo.png" alt="test" width="200" height="90">
            <h1>FK-EduSearch</h1>
            <!-- <select name="user_type" required>
                <option value="" disabled selected hidden>Choose User Type</option>
                <option value="System Administrator">System Administrator</option>
                <option value="Expert">Expert</option>
                <option value="General User">General User</option>
            </select> -->
            <button onclick = "window.location.href='LoginAdmin.php';" >Admin</button>
            <button onclick = "window.location.href='LoginExpert.php';" >Expert</button>
            <button onclick = "window.location.href='LoginUser.php';" >General User</button>
            <input type="text" name="username" placeholder="Username" required/>
            <input type="password" name="password" placeholder="Password" required/>
            <button type="submit" name="submit">login</button>
            <br>
            <a class="a9 a1" href="Signup.php">Become an Expert</a> 
          </form>
        </div>
    </div>


    <script src="script.js"></script>
</body>
</html>
