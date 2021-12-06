<?php

    session_start();
    require_once("api.php");
    if(isset($_POST['loginFormSubmit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $result = login($email,$password);
        if(sizeof($result) > 0){
            $_SESSION['user'] = $result[0]['userID'];
            $_SESSION['name'] = $result[0]['userFullName'];

            header("Location:https://localhost/KitaBantuWebApplication/dashboard.php");
        }else{
            $message = "Login failed!";
            $url = "index.php";
            echo "<script type = 'text/javascript'>alert('$message');window.location = '$url'</script>";
        }
    }else{
        require_once("login.html"); 
    }


    // if(!isset($_SESSION['user'])){
    //     require_once("login.html");
    // }else{
    //     echo "ohsht";
    // }

?>