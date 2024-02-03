<?php 

    session_start();
    require_once '../DB/db.php';
    include '../Asset/Header.php';
    
    $USR_NAME = $_POST['__Username'];
    $USR_PWD = $_POST['__Password'];  

    $sql = "SELECT * FROM users WHERE USR_NAME = '".$USR_NAME."' AND USR_PWD = '".md5($USR_PWD)."' ";
    $result = $db->query($sql);
    $obj = mysqli_fetch_array($result);
    $num = mysqli_num_rows($result);

    if($obj){  
        echo json_encode(array('status' => '1', 'message' => 'Success'));
    } else {
        echo json_encode(array('status' => '0', 'message' => 'Error'));
    }

?>
