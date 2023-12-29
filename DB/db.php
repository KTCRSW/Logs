<?php 

        /* 
        
        
        This file is connect to database don't change $db varibles. And if you want to change database name just change in Congfig same.

        @Author https://github.com/ktcrsw
        @Author https://github.com/bongkotphetr
        
        
        */

        $getStr = file_get_contents('../Config/DatabaseConfig.json');
        $database = json_decode($getStr, true);
        $db = mysqli_connect($database['db']['host'], $database['db']['root'], $database['db']['password'], $database['db']['database'] )or die(mysqli_connect_error());


?>