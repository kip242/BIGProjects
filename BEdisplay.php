<?php
/**
 * Created by PhpStorm.
 * User: kipta
 * Date: 12/22/2017
 * Time: 10:08 AM
 */
include('connect.php');
try {
    $pId2 = filter_input(INPUT_GET, 'pId');

    //SQL SELECT statement
    $result = $conn->prepare("SELECT * FROM projecttable");
    $result->execute();
    // assign returned array elements to variables
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Table Retrieval Failed: " . $e->getMessage();
}

function IsChecked($chkname, $dateId)
{
    if (!empty($_GET[$chkname])) {
        foreach ($_GET[$chkname] as $chkval) {
            if ($chkval == $dateId) {
                return true;
            }
        }
    }
    return false;
}

if(isset($_GET['milestone'])) {
    $aDates = $_GET['dateId'];

        if (IsChecked('mDate', '1')) {
            echo ' 1 is checked. ';

            $dateId = $aDates[0];
            echo $dateId;
            $sql = "DELETE FROM datetable 
                    WHERE dateId  = :dateId";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':dateId', $dateId);
            $stmt->execute();
            $stmt->closeCursor();
        }
        if (IsChecked('mDate', '2')) {
            echo ' 2 is checked. ';

            $dateId = $aDates[1];
            $sql = "DELETE FROM datetable 
                    WHERE dateId  = :dateId";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':dateId', $dateId);
            $stmt->execute();
            $stmt->closeCursor();
        }
        if (IsChecked('mDate', '3')) {
            echo ' 3 is checked. ';

            $dateId = $aDates[2];
            $sql = "DELETE FROM datetable 
                    WHERE dateId  = :dateId";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':dateId', $dateId);
            $stmt->execute();
            $stmt->closeCursor();
        }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>Back End Insert</title>
    <link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>
<br>
<h1>Project Dashboard</h1>
<form action="index.php">
    <button class="buttonAdd" type="submit" name="add">Add Project</button><br><br>
</form>
<?php
foreach ($rows as $row) {
    $pId = $row['pId'];
    $pName = $row['pName'];
    $pDesc = $row['pDesc'];
    $dDate = $row['dDate'];
    ?>
    <div class="project-container">
        <label class="boldLabel">Project ID:</label>
        <span><?php echo $pId; ?></span><br>
        <label class="boldLabel">Project Owner:</label>
        <span><?php echo $pName; ?></span><br>
        <label class="boldLabel">Project Description:</label>
        <span><?php echo $pDesc; ?> </span><br><br>
        <label class="boldLabel">Project Due Date:</label>
        <span><?php echo $dDate; ?> </span><br>
        <input type="hidden" name="pId" value="<?php echo $pId; ?>">
        <TABLE BORDER="0">
            <tr>
                <td>
                    <form action="process.php" method="GET">
                        <input type="hidden" name="pId" value="<?php echo $pId; ?>">
                        <input type="hidden" name="action" value="delete">
                        <input class="buttonDelete" type="submit" value="Delete">
                    </form>
                </td>
                <td>
                    <form action="process.php" method="GET">
                        <input type="hidden" name="pId" value="<?php echo $pId; ?>">
                        <input type="hidden" name="pName" value="<?php echo $pName; ?>">
                        <input type="hidden" name="pDesc" value="<?php echo $pDesc; ?>">
                        <input type="hidden" name="dDate" value="<?php echo $dDate; ?>">
                        <input type="hidden" name="action" value="update">
                        <input class="buttonUpdate" type="submit" value="Update">
                    </form>
                </td>
            </tr>
        </TABLE>
    </div>
    <div class="milestone-container">
        <form action="#" method="GET">
            <label class="boldLabel">Project Milestone Dates:</label><br><br>

                <?php
                $result2 = $conn->prepare("SELECT * FROM datetable WHERE pId = '$pId' AND mDate <> '0000-00-00'");
                $result2->execute();
                $rows2 = $result2->fetchAll(PDO::FETCH_ASSOC);
                $count = 0;

                foreach ($rows2 as $row2) {
                    $count++;
                    $pId = $row2['pId'];
                    $dateId = $row2['dateId'];
                    $mDate = $row2['mDate'];
                    ?>

                    <input type="hidden" name="pId" value="<?php echo $pId; ?>"
                    <input type="hidden" name="dateId[]" value="<?php echo $dateId; ?>">
                    <input type="hidden" name="mDate[]" value="<?php echo $mDate; ?>">
                    <br><input type="checkbox" name="mDate[]" value="<?php echo $count ?>"><?php echo $mDate; ?>
                    <input type="text" name="dateId[]" value="<?php echo $dateId?>"><?php echo $count?>

                <?php } ?>
                <br><br>
                <button type="submit" name="milestone">Delete</button>

        </form>
    </div>
<?php } ?>
</body>
</html>


