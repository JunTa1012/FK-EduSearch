<?php

// Create connection
$conn = mysqli_connect('localhost', 'root', '', 'fkedudb'); 
// Check connection
if (!$conn) {
   echo 'Connection error: ' . mysqli_connect_error();
}
