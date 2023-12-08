<?php
session_start();

require_once '../DB/db.php';

if (isset($_GET['query'])) {
    $searchQuery = mysqli_real_escape_string($db, $_GET['query']);

    $sql = "SELECT * FROM mains WHERE LOGS_CASE_NUMBER LIKE '%$searchQuery%' OR LOGS_DATE LIKE '%$searchQuery%' OR LOGS_LOCATION LIKE '%$searchQuery%' OR LOGS_TECHNICIANS LIKE '%$searchQuery%'";

    $result = $db->query($sql);

    $searchResults = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $searchResults[] = $row;
    }

    echo json_encode($searchResults);
}
