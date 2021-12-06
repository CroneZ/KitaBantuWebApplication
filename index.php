<?php
    require_once("database.php");
    if(!isset($_SESSION['user'])){
        require_once("login.html");
    }else{
        echo "ohsht";
    }

?>