<?php 

    require_once '../DB/db.php';

    $sql = "INSERT INTO mains(LOGS_ID, LOGS_DATE, LOGS_CASE_NUMBER, LOGS_CASE_CONTACT, LOGS_LOCATION, LOGS_RANGE_TIME, LOGS_PHONE, LOGS_TECHNICIANS)
    VALUE ('', '".$_POST['__caseDate']."', '".$_POST['__caseNumber']."', '".$_POST['__caseContact']."', '".$_POST['__caseLocation']."', '".$_POST['__caseRange']."'
    , '".$_POST['__casePhone']."', '".$_POST['__caseTechnician']."')
    ";
    $query = $db->query($sql);
    if($query){
        echo json_encode(array('status' => '1', 'message' => 'Success'));
    } else {
        echo json_encode(array('status' => '0', 'message' => 'Error'));
    }

?>
