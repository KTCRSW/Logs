<?php 

    require_once '../DB/db.php';

    $sql = "DELETE FROM mains  WHERE LOGS_ID ='".$_POST['__caseID']."'";
    $query = $db->query($sql);
    if($query){
        header("Refresh:1.3; url=../page/Home.php");
                include("../Asset/Header.php");
                echo "<script>setTimeout(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'สำเร็จ',
                    text: 'ระบบกำลังพาคุณไป' ,
                    showCancelButton: false,
                    showConfirmButton: false
                }, function() {
                    window.location = '../index.php';
                });
                 });</script>";   
        
    } else {
        echo "Err";
    }
    

?>