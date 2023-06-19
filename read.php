<?php
include 'dbconnection.php';

//  $expertID = $_SESSION['Expert_ID'];

/**
 * read publication detail
 */
if (isset($_GET['publication_id'])) {
  $publicationId = $_GET['publication_id'];
  // Retrieve the publication details from the database
  $sql = "SELECT * FROM publication_list WHERE Publication_ID = $publicationId";
  $result = $conn->query($sql);

switch ($_GET['publication_id']) {
  case 1:
    $durationType = 'Date';
    $sql = "SELECT COUNT(`Publication_ID`), `publication_date`, SUM(`total_amount`) FROM `publication_list` WHERE `Publication_ID` = $publicationID AND publication_date = '" . $_POST['searchDate'] . "'";
    break;
  case 2:
    $durationType = 'Week';
    $sql = "SELECT COUNT(`Publication_ID`), WEEK(`publication_date`), SUM(`total_amount`) FROM `publication_list` WHERE `Publication_ID` = $publicationID GROUP BY WEEK(`publication_date`) ORDER BY `publication_date` DESC";
    break;
  case 3:
    $durationType = 'Month';
    $sql = "SELECT COUNT(`Publication_ID`), MONTHNAME(`publication_date`), SUM(`total_amount`) FROM `publication_list` WHERE `Publication_ID` = $publicationID GROUP BY MONTH(`publication_date`) ORDER BY `publication_date` DESC";
    break;
  default:
    $durationType = 'Day';
    $sql = "SELECT COUNT(`Publication_ID`), `publication_date`, SUM(`total_amount`) FROM `publication_list` WHERE `Publication_ID` = $publicationID GROUP BY `publication_date` ORDER BY `publication_date` DESC";
// echo $sql;
  $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  }
 }


