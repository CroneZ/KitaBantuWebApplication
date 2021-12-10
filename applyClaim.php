<?php 

    require_once("api.php");
    $result = select_apply_claim();
    $size = sizeof($result);

?>

<div class = "tableWrapper">
    <table>
        <tr>
            <th>ClaimID</th>
            <th>Volunteer</th>
            <th>Total Claim</th>
            <th>Status</th>
        </tr>
        <?php 
            for($i = 0; $i < $size; $i++){
                ?>
                    <tr>
                        <td><?php echo $result[$i]['claimID']; ?></td>
                        <td><?php echo $result[$i]['volunteerID']; ?></td>
                        <td><?php echo $result[$i]['totalClaim']; ?></td>
                        <td>
                            <form method = "POST" action = "dashboard.php?mode=viewApplyClaim&id=<?php echo $result[$i]['claimID']; ?>">
                                <input class = <?php 
                                    if($result[$i]['status'] == "accepted"){
                                        echo "acceptedStatus";
                                    }elseif($result[$i]['status'] == "pending"){
                                        echo "pendingStatus";
                                    }elseif($result[$i]['status'] == "reject"){
                                        echo "rejectedStatus";
                                    }
                                ?> type = "submit" value = <?php echo $result[$i]['status']; ?>>
                            </form>
                        </td>
                    </tr>
                <?php
            }
        ?>
    </table>
</div>