<?php
    require_once("api.php");

    if(isset($_GET['mode']) && $_GET['mode'] == "viewApplyForm"){
        if(isset($_GET['id'])){
            $result = select_apply_form_based_on_id($_GET['id']);
        }
    }
?>

<div class = "detailTableWrapper">
    <h1>Apply Form Detail</h1>
    <div class = "rowWrapper">
        <table class = "detailTable">
            <tr>
                <td class = "labelCell">Account Type</td>
                <td class = "detailCell"><?php echo $result[0]['userType']; ?></td>
            </tr>
            <tr>
                <td class = "labelCell">Full Name</td>
                <td class = "detailCell"><?php echo $result[0]['userFullName']; ?></td>
            </tr>
            <tr>
                <td class = "labelCell">Identity Card</td>
                <td class = "detailCell"><?php echo $result[0]['userIdentityNo']; ?></td>
            </tr>
            <tr>
                <td class = "labelCell">Gender</td>
                <td class = "detailCell"><?php echo $result[0]['gender']; ?></td>
            </tr>
            <tr>
                <td class = "labelCell">Occupation</td>
                <td class = "detailCell"><?php echo $result[0]['occupation']; ?></td>
            </tr>
            <tr>
                <td class = "labelCell">Address 1</td>
                <td class = "detailCell"><?php echo $result[0]['address1']; ?></td>
            </tr>
            <tr>
                <td class = "labelCell">Address 2</td>
                <td class = "detailCell"><?php echo $result[0]['address2']; ?></td>
            </tr>
            <tr>
                <td class = "labelCell">Contact No</td>
                <td class = "detailCell"><?php echo $result[0]['contactNo']; ?></td>
            </tr>
            <tr>
                <td class = "labelCell">Email Address</td>
                <td class = "detailCell"><?php echo $result[0]['email'] ?></td>
            </tr>
        </table>
        <div class = "statusButtonGroup">
            <form method = "POST" action = "dashboard.php?mode=acceptForm&id=<?php echo $_GET['id']; ?>">
                <input type = "submit" class = "acceptButton" value = "Accept"/>
            </form>
            <form method = "POST" action = "dashboard.php?mode=rejectForm&id=<?php echo $_GET['id']; ?>">
                <input type = "submit" class = "rejectButton" value = "Reject"/>
            </form>
        </div>
    </div>
    
</div>