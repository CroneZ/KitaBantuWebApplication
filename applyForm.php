<?php 

    require_once("api.php");
    $result = select_apply_form();
    $size = sizeof($result);

?>

<div class = "tableWrapper">
    <table>
        <tr>
            <th>UserID</th>
            <th>Full Name</th>
            <th>Account Type</th>
            <th>Date Time</th>
            <th>Status</th>
        </tr>
        <?php 
            for($i = 0; $i < $size; $i++){
                ?>
                    <tr>
                        <td><?php echo $result[$i]['userID']; ?></td>
                        <td><?php echo $result[$i]['userFullName']; ?></td>
                        <td><?php echo $result[$i]['userType']; ?></td>
                        <td><?php echo $result[$i]['date']; ?></td>
                        <td>
                            <form method = "POST" action = "dashboard.php?mode=viewApplyForm&id=<?php echo $result[$i]['userID']; ?>">
                                <input class = <?php 
                                    if($result[$i]['accountStatus'] == "accepted"){
                                        echo "acceptedStatus";
                                    }elseif($result[$i]['accountStatus'] == "pending"){
                                        echo "pendingStatus";
                                    }elseif($result[$i]['accountStatus'] == "reject"){
                                        echo "rejectStatus";
                                    }
                                ?> type = "submit" value = <?php echo $result[$i]['accountStatus']; ?>>
                            </form>
                        </td>
                    </tr>
                <?php
            }
        ?>
    </table>
</div>