<?php
    session_start();
    require_once("api.php");
    if(isset($_GET['mode']) && $_GET['mode'] === "logout"){
        logout();
        header("Location:https://localhost/KitaBantuWebApplication/index.php");
    }elseif(isset($_POST['updateProfileSubmit'])){
        $userID = $_SESSION['user'];
        $userFullName = $_POST['userFullName']; 
        $userPassword1 =  $_POST['password1'];
        $userPassword2 = $_POST['password2'];
        $userIdentityNo = $_POST['userIdentityNo'];
        $gender = $_POST['gender'];
        $occupation = $_POST['occupation'];
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $addressPostCode = $_POST['addressPostCode'];
        $addressCity = $_POST['addressCity'];
        $addressState = $_POST['addressState'];
        $contactNo = $_POST['contactNo']; 
        $email = $_POST['email'];

        if($userPassword1 == $userPassword2){

            $userPassword = $userPassword1;
            $result = update_profile_detail($userID , $userFullName, $userPassword, $userIdentityNo, 
            $gender, $occupation,$address1, $address2, $addressPostCode, 
            $addressCity, $addressState,  $contactNo, $email);

            if($result === TRUE){
                $message = "Update Success!";
                $url = "dashboard.php?mode=profile";
                echo "<script type = 'text/javascript'>alert('$message');window.location = '$url'</script>";
            }else{
                $message = "Update failed!";
                $url = "dashboard.php?mode=profile";
                echo "<script type = 'text/javascript'>alert('$message');window.location = '$url'</script>";
            }
        }
    }elseif(isset($_GET['mode']) && $_GET['mode'] === "acceptForm"){
        if(isset($_GET['id'])){
            $result = update_user_status($_GET['id'], "accepted");

            if($result === TRUE){
                $message = "Update Success!";
                $url = "dashboard.php?mode=applyForm";
                echo "<script type = 'text/javascript'>alert('$message');window.location = '$url'</script>";
            }else{
                $message = "Update failed!";
                $url = "dashboard.php?mode=applyForm";
                echo "<script type = 'text/javascript'>alert('$message');window.location = '$url'</script>";
            }
        }
    }elseif(isset($_GET['mode']) && $_GET['mode'] === "rejectForm"){
        if(isset($_GET['id'])){
            $result = update_user_status($_GET['id'], "reject");

            if($result === TRUE){
                $message = "Update Success!";
                $url = "dashboard.php?mode=applyForm";
                echo "<script type = 'text/javascript'>alert('$message');window.location = '$url'</script>";
            }else{
                $message = "Update failed!";
                $url = "dashboard.php?mode=applyForm";
                echo "<script type = 'text/javascript'>alert('$message');window.location = '$url'</script>";
            }
        }
    }elseif(isset($_GET['mode']) && $_GET['mode'] === "acceptClaim"){
        if(isset($_GET['id'])){
            $result = update_claim_status($_GET['id'], "accepted");

            if($result === TRUE){
                $message = "Update Success!";
                $url = "dashboard.php?mode=applyClaim";
                echo "<script type = 'text/javascript'>alert('$message');window.location = '$url'</script>";
            }else{
                $message = "Update failed!";
                $url = "dashboard.php?mode=applyClaim";
                echo "<script type = 'text/javascript'>alert('$message');window.location = '$url'</script>";
            }
        }
    }elseif(isset($_GET['mode']) && $_GET['mode'] === "rejectClaim"){
        if(isset($_GET['id'])){
            $result = update_claim_status($_GET['id'], "reject");

            if($result === TRUE){
                $message = "Update Success!";
                $url = "dashboard.php?mode=applyClaim";
                echo "<script type = 'text/javascript'>alert('$message');window.location = '$url'</script>";
            }else{
                $message = "Update failed!";
                $url = "dashboard.php?mode=applyClaim";
                echo "<script type = 'text/javascript'>alert('$message');window.location = '$url'</script>";
            }
        }
    }
?>

<!DOCTYPE html5>
<html>
    <head>
        <link rel="stylesheet" href="dashboard.css">
        <script type = "text/javascript">
            function navigateDashboard(){
                window.location.href = "https://localhost/KitaBantuWebApplication/dashboard.php";                
            }

            function navigateProfile(){
                window.location.href = "https://localhost/KitaBantuWebApplication/dashboard.php?mode=profile";                
            }

            function navigateApplyForm(){
                window.location.href = "https://localhost/KitaBantuWebApplication/dashboard.php?mode=applyForm";                
            }

            function navigateApplyClaim(){
                window.location.href = "https://localhost/KitaBantuWebApplication/dashboard.php?mode=applyClaim";                
            }

            function logout(){
                window.location.href = "https://localhost/KitaBantuWebApplication/dashboard.php?mode=logout";                              
            }
        </script> 
    </head>
    <body class = "greenBody">
        <div class = "mainWrapper">
            <div class = "contentWrapper">
                <div class = "leftContainer">
                    <div class = "sideBarWrapper">
                        <div class = "sideBar">
                            <h3 class = "sideBarTitle">Kita Bantu Web Application</h3>
                            <button id = "dashboardButton" onclick="navigateDashboard()" class = <?php
                            if(!isset($_GET['mode']) || $_GET['mode'] === "dashboard"){
                                echo "active";
                            }
                            ?>>Dashboard</button>
                            <button id = "profileButton" onclick = "navigateProfile()" class = <?php
                            if(isset($_GET['mode']) && $_GET['mode'] === "profile"){
                                echo "active";
                            }
                            ?>>Edit Profile</button>
                            <button id = "applyFormButton" onclick = "navigateApplyForm()" class = <?php
                            if(isset($_GET['mode']) && ($_GET['mode'] === "applyForm" || $_GET['mode'] === "viewApplyForm")){
                                echo "active";
                            }
                            ?>>Manage Apply Form</button>
                            <button id = "applyClaimButton" onclick = "navigateApplyClaim()" class = <?php
                            if(isset($_GET['mode']) && ($_GET['mode'] === "applyClaim" || $_GET['mode'] === "viewApplyClaim" )){
                                echo "active";
                            }
                            ?>>Manage Apply Claim</button>
                            <button id = "logoutButton" class = "logoutButton" onclick = "logout()">Log out</button>
                        </div>
                    </div>
                </div>
                <div class = "rightContainer">
                    <!-- search bar -->
                    <div class = "searchBarWrapper">
                        <div class = "searchBar">
                            search bar
                        </div>
                        <div class = "columnBar">
                            column
                        </div>
                        <div class = "searchButton">
                            search
                        </div>
                    </div>
                    <div class = "contentWrapper">
                        <?php 
                            if(isset($_GET['mode']) && $_GET['mode'] === "profile"){
                                require_once("profile.php");
                            }elseif(isset($_GET['mode']) && $_GET['mode'] === "applyForm"){
                                require_once("applyForm.php");
                            }elseif(isset($_GET['mode']) && $_GET['mode'] === "applyClaim"){
                                require_once("applyClaim.php");
                            }elseif(isset($_GET['mode']) && $_GET['mode'] === "viewApplyForm"){
                                require_once("viewApplyForm.php");
                            }elseif(isset($_GET['mode']) && $_GET['mode'] === "viewApplyClaim"){
                                require_once("viewApplyClaim.php");
                            }
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>