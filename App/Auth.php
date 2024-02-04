<?php

session_start();
require_once '../DB/db.php';
include '../Asset/Header.php';

$USR_NAME = $_POST['__Username'];
$USR_PWD = $_POST['__Password'];

$sql = "SELECT * FROM users WHERE USR_NAME = ? AND USR_PWD = ?";
$stmt = $db->prepare($sql);
$stmt->bind_param("ss", $USR_NAME, md5($USR_PWD));
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

if ($result->num_rows > 0) {
    echo json_encode(array('status' => '1', 'message' => 'Success'));
} else {
    echo json_encode(array('status' => '0', 'message' => 'Error'));
}

?>
