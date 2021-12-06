<?php
// Function to check database for user * Does not send response to allow for website proc 
function login($email, $userPassword){

    require_once("database.php");

    $sql = "SELECT * FROM user WHERE email = '$email' AND userPassword = '$userPassword'";

    $result = mysqli_query($conn, $sql);
	$rows = array();
    while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}

    return $rows;

}

function logout(){
    session_unset();
}

// Function to register user into database
function register($userFullName, $userType, $userPassword, $userIdentityNo, $gender, $occupation,$address1, $address2, $addressPostCode, $addressCity, $addressState,  $contactNo, $email, $date, $accountStatus){

    require_once("database.php");

    $sql = "INSERT INTO user (userFullName, userType, userPassword, userIdentityNo, gender, occupation, address1, address2, addressPostCode, addressCity, addressState, contactNo, email, date, accountStatus) 
    VALUES ('$userFullName', '$userType', '$userPassword' , '$userIdentityNo', '$gender', '$occupation' ,  '$address1' , '$address2', '$addressPostCode', '$addressCity', '$addressState' 
    , '$contactNo' , '$email' , '$date' , '$accountStatus')";

    // Only applicable to insert, update, delete (query that do not retrieve from database)
    if($conn->query($sql) === TRUE){
        return TRUE;
    }else{
        return FALSE;
    }

}

// Sample select query function
function select_all_from_user($user){

    require_once("database.php");

    $sql = "SELECT * FROM user WHERE userID = '$user'";

    // Only applicable to select query
    $result = mysqli_query($conn, $sql);
	$rows = array();
    while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}

    return $rows;
}

// Sample update query function
function update_table($newValue){

    require_once("database.php");

    $sql = "UPDATE user SET userPassword = '$newValue' WHERE userID = 2";

    // Only applicable to insert, update, delete (query that do not retrieve from database)
    if($conn->query($sql) === TRUE){
        return TRUE;
    }else{
        return FALSE;
    }
}

// Sample delete query function
function delete_from_table($userID){
    
    require_once("database.php");

    $sql = "DELETE from user WHERE userID = '$userID'";

    // Only applicable to insert, update, delete (query that do not retrieve from database)
    if($conn->query($sql) === TRUE){
        return TRUE;
    }else{
        return FALSE;
    }
}

function update_profile_detail($userID , $userFullName, $userPassword, $userIdentityNo, $gender, $occupation,$address1, $address2, $addressPostCode, $addressCity, $addressState,  $contactNo, $email){
    require_once("database.php");
    
    $sql = "UPDATE user SET userFullName = '$userFullName', userPassword = '$userPassword', 
    userIdentityNo = '$userIdentityNo', gender = '$gender', occupation = '$occupation',
    address1 = '$address1', address2 = '$address2', addressPostCode = '$addressPostCode', 
    addressCity = '$addressCity', addressState = '$addressState',  contactNo = '$contactNo', email = '$email' 
    WHERE userID = '$userID'";

    if($conn->query($sql) === TRUE){
        return TRUE;
    }else{
        return FALSE;
    }
}

function select_apply_form(){

    require_once("database.php");

    $sql = "SELECT * FROM user WHERE userType = 'volunteer' OR userType = 'supplier'";

    $result = mysqli_query($conn, $sql);
	$rows = array();
    while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}

    return $rows;
}

function select_apply_claim(){

    require_once("database.php");

    $sql = "SELECT * FROM claim";

    $result = mysqli_query($conn, $sql);
	$rows = array();
    while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}

    return $rows;

}

?>