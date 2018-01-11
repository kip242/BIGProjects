<?php
/**
 * Created by PhpStorm.
 * User: v-datatu
 * Date: 1/5/2018
 * Time: 9:31 AM
 */

include('connect.php');

$pId = filter_input(INPUT_GET, 'pId');
$pName = filter_input(INPUT_GET, 'pName');
$pDesc = filter_input(INPUT_GET, 'pDesc');
$dDate = filter_input(INPUT_GET, 'dDate');


$action = filter_input(INPUT_GET, 'action');

switch ($action) {

    case 'delete' :
        echo $pId;
        $sql = "DELETE FROM projecttable WHERE pId  = '$pId'";
        $conn->exec($sql);
        header("Location: BEdisplay.php");
        break;

    case 'update' :
        ?>

        <!DOCTYPE html>
        <html>
        <head>
            <title>Update Form</title>
        </head>
        <body>
        <h1>Update Project # <?php echo $pId ?></h1>
        <form action="updateSQL.php" method="GET"><!--TODO change to POST -->
            <input type="hidden" name="pId" value="<?php echo $pId; ?>">
            <label>Project Owner:</label>
            <input type="text" name="pName"
                   value="<?php echo htmlspecialchars($pName); ?>">
            <br>
            <br>
            <label>Project Description:</label>
            <textarea name="pDesc" maxlength="1000" rows="4" cols="50"><?php echo htmlspecialchars($pDesc) ?></textarea>
            <br>
            <br>
            <label>Project Due Date:</label>
            <input type="date" name="dDate"
                   value="<?php echo htmlspecialchars($dDate) ?>">
            <br>
            <br>
            <input type="submit" value="Submit Update">
            <br>
            <br>
        </form>
        <form action="insertDate.php" method="GET">
            <label>Project Milestone Dates:</label>
            <input type="hidden" name="pId" value="<?php echo $pId; ?>">
            <input type="date" name="date" value="<?php echo htmlspecialchars($date); ?>">
            <input type="date" name="date2" value="<?php echo htmlspecialchars($date2); ?>">
            <input type="date" name="date3" value="<?php echo htmlspecialchars($date3); ?>">
            <input type="date" name="date4" value="<?php echo htmlspecialchars($date4); ?>">
            <input type="date" name="date5" value="<?php echo htmlspecialchars($date5); ?>">
            <input type="date" name="date6" value="<?php echo htmlspecialchars($date6); ?>">
            <input type="date" name="date7" value="<?php echo htmlspecialchars($date7); ?>">
            <input type="date" name="date8" value="<?php echo htmlspecialchars($date8); ?>">
            <input type="date" name="date9" value="<?php echo htmlspecialchars($date9); ?>">
            <input type="date" name="date10" value="<?php echo htmlspecialchars($date10); ?>">
            <input type="submit" name="submit" value="Add Date">
        </form>

        </body>
        </html>


        <?php

        break;
} ?>