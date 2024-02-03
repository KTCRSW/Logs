<?php 

    require_once '../DB/db.php';

    $sql = "DELETE FROM mains  WHERE LOGS_ID ='".$_POST['__caseID']."'";
    $query = $db->query($sql);
    if($query){
        echo json_encode(array('status' => '1', 'message' => 'Success'));
    } else {
        echo json_encode(array('status' => '0', 'message' => 'Error'));
    }

?>