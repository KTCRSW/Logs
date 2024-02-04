<?php 
require_once "../DB/db.php";

$fullName = $_POST['__Prefix'] . $_POST['__FullName'];
$address = $_POST['__Address'];
$position = $_POST['__Position'];
$status = $_POST['__Status'];

$checkSql = "SELECT COUNT(*) as count FROM technician WHERE TechnicianName = ? AND TechnicianAddress = ? AND TechnicianPosition = ? AND TechnicianStatus = ?";
$checkStmt = $db->prepare($checkSql);
$checkStmt->bind_param("ssss", $fullName, $address, $position, $status);
$checkStmt->execute();
$checkResult = $checkStmt->get_result();
$row = $checkResult->fetch_assoc();
$count = $row['count'];

if ($count > 0) {
    echo json_encode(array('status' => '0', 'message' => 'Data already exists'));
} else {
    $insertSql = "INSERT INTO technician(TechnicianName, TechnicianAddress, TechnicianPosition, TechnicianStatus) 
                  VALUES (?, ?, ?, ?)";
    $insertStmt = $db->prepare($insertSql);
    $insertStmt->bind_param("ssss", $fullName, $address, $position, $status);

    if ($insertStmt->execute()) {
        echo json_encode(array('status' => '1', 'message' => 'success'));
    } else {
        echo json_encode(array('status' => '0', 'message' => 'error'));
    }

    $insertStmt->close();
}

$checkStmt->close();
$db->close();
?>
