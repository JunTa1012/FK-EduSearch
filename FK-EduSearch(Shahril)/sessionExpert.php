<?php
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM expert WHERE Expert_ID = '$id'");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: LoginExpert.php");
}
?>