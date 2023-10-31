<?php 


    session_start();
    require_once '../DB/db.php';
    include '../Asset/Header.php';

    $USR_NAME = $_POST['__Username'];
    $USR_PWD = $_POST['__Password'];

    $Auth = "SELECT * FROM users where USR_NAME = '{$username}' and USR_PWD = '".md5($password)."' ";
    $query = $db->query($Auth);

    if(!$Auth){
        echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');</script>";
    } else {
        header("Refresh:1.3; url=../index.php");
                    include("../Asset/Header.php");
                    echo "<script>setTimeout(function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'สำเร็จ',
                        text: 'ระบบกำลังพาคุณไป' ,
                        showCancelButton: false,
                        showConfirmButton: false
                    }, function() {
                        window.location = '../../Frontend/teacher/index.php';
                    });
                     });</script>";   
    }


?>
