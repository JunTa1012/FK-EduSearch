<?php
include_once 'config.php';

$searchText = $_POST['searchText'];

// Modify the SQL query to include the search filter
$sql = "SELECT * FROM user WHERE user_name LIKE '%$searchText%' OR user_email LIKE '%$searchText%' OR user_phoneNum LIKE '%$searchText%' OR user_researchArea LIKE '%$searchText%' OR user_academicStatus LIKE '%$searchText%' LIMIT $offset, $recordsPerPage";

$query = $conn->query($sql);
while ($row = $query->fetch_assoc()) {
    echo "<tr>
        <td>".$row['User_ID']."</td>
        <td>".$row['user_name']."</td>
        <td>".$row['user_email']."</td>
        <td>".$row['user_phoneNum']."</td>
        <td>".$row['user_researchArea']."</td>
        <td>".$row['user_academicStatus']."</td>
        <td>
            <a href='edit_page.php?id=".$row['User_ID']."' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-edit'></span> Edit</a>
            <a href='?action=delete&id=".$row['User_ID']."' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this record?\");'><span class='glyphicon glyphicon-trash'></span> Delete</a>
        </td>
    </tr>";
}
?>
