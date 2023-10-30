<?php 

    require './DB/db.php';
    include './Asset/Header.php';


?>

<form action="App/Create.php">

    <input type="text" name="caseNumber">
    <input type="text" name="caseDate">
    <input type="text" name="caseLocation">
    <input type="text" name="caseRange">
    <input type="text" name="casePhone">
    <input type="text" name="caseTechnicain">
    <input type="submit" value="Submit">

</form>