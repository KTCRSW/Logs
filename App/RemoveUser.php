<?php 

    require_once '../DB/db.php';

    $sql = "DELETE FROM technician WHERE TechnicianID ='".$_POST['__UserID']."'";
    $query = $db->query($sql);
    if($query){
        echo json_encode(array('status' => '0', 'message' => 'Error'));
    } else {
        echo json_encode(array('status' => '1', 'message' => 'Success'));
    }

?>