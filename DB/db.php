<?php 

    //logDataBase

        $getStr = file_get_contents('../Config/DatabaseConfig.json');
        $database = json_decode($getStr, true);
        $db = mysqli_connect($database['db']['host'], $database['db']['root'], $database['db']['password'], $database['db']['database'] )or die(mysqli_connect_error());


?>