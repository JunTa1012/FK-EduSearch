<?php
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM admin WHERE Admin_ID = '$id'");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: LoginAdmin.php");
}
?>