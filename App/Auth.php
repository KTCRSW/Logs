<?php 


    session_start();
    require_once '../DB/db.php';
    include '../Asset/Header.php';

    $USR_NAME = $_POST['__Username'];
    $USR_PWD = $_POST['__Password'];

    $Auth = "SELECT * FROM users where USR_NAME = '{$USR_NAME}' and `password` = '".md5($USR_PWD)."' ";
    $query = $db->query($Auth);

    if(!$Auth){
        echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');</script>";
    } else {
        header('location: ../index.php');
    }


?>