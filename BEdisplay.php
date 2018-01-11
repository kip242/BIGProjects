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
    <button class="buttonAdd" type="submit" name="add">Add Project</button>
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
        <form action="deleteMilestone.php" method="GET">
            <label class="boldLabel">Project Milestone Dates:</label><br><br>
            <div class="dateContainerLeft">
                <?php
                $result2 = $conn->prepare("SELECT date FROM datetable WHERE pId = '$pId' AND date <> '0000-00-00'");
                $result2->execute();
                $rows2 = $result2->fetchAll(PDO::FETCH_ASSOC);
                foreach ($rows2 as $row2) {
                    $date = $row2['date'];
                    ?>
                    <input type="checkbox" name="date"><?php echo $date; ?><br>


                <input type="hidden" name="pId" value="<?php echo $pId; ?>">
                <input type="hidden" name="date" value="<?php echo $date; ?>">
                <?php } ?>
                <br><br>
                <button class="buttonMilestone" type="submit" name="milestone" value="delete">Delete Milestone Date</button>

            </div>


        </form>
    </div>
<?php } ?>
</body>
</html>


