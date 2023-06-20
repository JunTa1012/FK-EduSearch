<?php 

include "../dbconnect.php";

$sql = "SELECT * FROM post ORDER BY Post_ID ASC";
$result = mysqli_query($conn,$sql);


?>