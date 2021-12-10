<?php
    require_once("api.php");

    if(isset($_GET['mode']) && $_GET['mode'] == "viewApplyClaim"){
        if(isset($_GET['id'])){
            $result = select_claim_items_based_on_claim_id($_GET['id']);
            $size = sizeof($result);
        }
    }
?>

<div class = "detailTableWrapper">
    <h1>Apply Claim Detail</h1>

    <div class = "rowWrapper">
        <table class = "tableWrapper">
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            <?php 
            for($i = 0;$i < $size;$i++){
                ?>
                <tr>
                    <td><?php echo $result[$i]['itemName']; ?></td>
                    <td><?php echo $result[$i]['quantity']; ?></td>
                    <td><?php echo $result[$i]['price']; ?></td>
                </tr>
                <?php
            }
            ?>
            
        </table>
        <div class = "receiptWrapper">
            <img src="700x980.jpg"/>
        </div>
    </div>

    <div class = "claimStatusButtonGroup">
        <form method = "POST" action = "dashboard.php?mode=acceptClaim&id=<?php echo $_GET['id']; ?>">
            <input type = "submit" class = "acceptButton" value = "Accept"/>
        </form>
        <form method = "POST" action = "dashboard.php?mode=rejectClaim&id=<?php echo $_GET['id']; ?>">
            <input type = "submit" class = "rejectButton" value = "Reject"/>
        </form>
    </div>
</div>