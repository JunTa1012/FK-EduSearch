<?php
    $db = new mysqli("localhost", "root", "", "fkedudb", "8111");
    if ($db->connect_errno) {
        echo "Failed to connect to MySQL: " . $db->connect_error;
        exit();
    }
?>