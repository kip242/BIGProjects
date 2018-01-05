<?php
/**
 * Created by PhpStorm.
 * User: kipta
 * Date: 12/22/2017
 * Time: 10:08 AM
 */


include('connect.php');
try {
    //SQL SELECT statement
    $result = $conn->prepare("SELECT projecttable.pId, projecttable.pName, projecttable.pDesc, projecttable.dDate, datetable.date1 
                                        FROM projecttable
                                        INNER JOIN datetable ON projecttable.pId = datetable.pId
                                        GROUP BY pId");
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
    $date1 = $row['date1'];

    ?>


    <form action="process.php" method="GET">

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

            <input type="hidden" name="action" value="delete">
            <input class="buttonDelete" type="submit" value="Delete">

            <input type="hidden" name="pId" value="<?php echo $pId; ?>">
            <input type="hidden" name="pName" value="<?php echo $pName; ?>">
            <input type="hidden" name="pDesc" value="<?php echo $pDesc; ?>">
            <input type="hidden" name="dDate" value="<?php echo $dDate; ?>">
            <input type="hidden" name="action" value="update">
            <input class="buttonUpdate" type="submit" value="Update" >


    <!--<form action="process.php" method="GET">
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


            <input type="hidden" name="pId" value="<?php echo $pId; ?>">
            <input type="hidden" name="pName" value="<?php echo $pName; ?>">
            <input type="hidden" name="pDesc" value="<?php echo $pDesc; ?>">
            <input type="hidden" name="dDate" value="<?php echo $dDate; ?>">

            <button class="buttonDelete" type="button" name="delete" onclick="buttoncheck(0)">Delete Project</button>
            <button class="buttonUpdate" type="button" name="update" onclick="buttoncheck(1)">Update Project</button>-->


        </div>
    </form>


    <div class="milestone-container">
        <form action="deleteMilestone.php" method="GET">
            <label class="boldLabel">Project Milestone Dates:</label><br><br>
            <div class="dateContainerLeft">
                <input type="checkbox" name="date[]" value="<?php echo $date1; ?>"><?php echo $date1; ?><br>
            </div>
            <br><br><br><br>

            <input type="hidden" name="pId" value="<?php echo $pId; ?>">
            <input type="hidden" name="date[]" value="<?php echo $date1; ?>">
            <button class="buttonMilestone" type="submit" name="milestone" value="delete">Delete Milestone Date</button>
        </form>
    </div>
<?php } ?>
</body>
</html>

