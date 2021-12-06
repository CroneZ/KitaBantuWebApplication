<?php
    require_once("api.php");
    $result = select_all_from_user($_SESSION['user']);
?>

<div class = profileFormWrapper>
    <h4>Edit Profile</h4>
    <form method = "POST" action = "dashboard.php?mode=profile">
        <div class = "formContentWrapper">
            <div class = "leftColumn">
                <p>Full Name</p>
                <input type = "text" name = "userFullName" placeholder="Some name" value = <?php echo $result[0]['userFullName']; ?>>
                <p>Gender</p>
                <select name = "gender" id = "gender">
                    <option value = "Male"<?php if($result[0]['gender']==="Male"){echo "selected";} ?>>Male</option>
                    <option value = "Female" <?php if($result[0]['gender']==="Female"){echo "selected";} ?>>Female</option>
                </select>
                <p>Occupation</p>
                <input type = "text" name = "occupation" placeholder="Some Occupation" value = <?php echo $result[0]["occupation"]; ?>>
                <p>Phone No</p>
                <input type = "text" name = "contactNo" placeholder="Some phone number" value = <?php echo $result[0]["contactNo"]; ?>>
            </div>
            <div class = "middleColumn">
                <p>Password</p>
                <input type = "password" name = "password1" placeholder="*******">
                <p>Confirm Password</p>
                <input type = "password" name = "password2" placeholder="*******">
                <p>Email</p>
                <input type = "text" name = "email" placeholder="Some email address" value = <?php echo $result[0]["email"]; ?>>
                <p>Identity Card No.</p>
                <input type = "text" name = "userIdentityNo" placeholder="Some name" value = <?php echo $result[0]["userIdentityNo"]; ?>>
            </div>
            <div class = "rightColumn">
                <p>Address 1</p>
                <input type = "text" name = "address1" placeholder="address xxx" value = <?php echo $result[0]["address1"]; ?>>
                <p>Address 2</p>
                <input type = "text" name = "address2" placeholder="address xxx" value = <?php echo $result[0]["address2"]; ?>>
                <p>Post Code</p>
                <input type = "text" name = "addressPostCode" placeholder="Some post code" value = <?php echo $result[0]["addressPostCode"]; ?>>
                <div class = "shortInputWrapper">
                    <div class = "shortInput">
                        <p>City</p>
                        <input type = "text" name = "addressCity" placeholder="Some city" value = <?php echo $result[0]["addressCity"]; ?>>
                    </div>
                    <div class = "shortInput">
                        <p>State</p>
                        <input type = "text" name = "addressState" placeholder="Some state" value = <?php echo $result[0]["addressState"]; ?>>
                    </div>
                </div>                    
            </div>
        </div>
        <input class = "updateProfileButton" type = "submit" name = "updateProfileSubmit" value = "Update Profile">
    </form>
</div>