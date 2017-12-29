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
    $result = $conn->prepare("SELECT userid, pName, pDesc, dDate, mDate FROM projecttable");
    $result->execute();
    // assign returned array elements to variables
    $rows= $result->fetchAll(PDO::FETCH_ASSOC);
}
catch(PDOException $e)
{
    echo "Table Retrieval Failed: " . $e->getMessage();
}
//$conn = null;
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
    <button class = "buttonAdd" type="submit" name="add">Add Project</button>
</form>

<?php
foreach($rows as $row){
    $userid = $row['userid'];
    $pName = $row['pName'];
    $pDesc = $row['pDesc'];
    $dDate = $row['dDate'];
    $mDate = $row['mDate'];
    ?>
<div>
    <div class="project-container">

        <label>Project ID:</label>
        <span><?php echo $userid; ?></span><br>
        <label>Project Owner:</label>
        <span><?php echo $pName; ?></span><br>
        <label>Project Description:</label>
        <span><?php echo $pDesc; ?> </span><br>
        <label>Project Due Date:</label>
        <span><?php echo $dDate; ?> </span><br>
        <label>Project Milestones:</label>
        <span><?php echo $mDate?></span>
        <br><br>
            <form action="delete.php" method="GET">
                <input type="hidden" name="userid" value="<?php echo $userid; ?>">
                <button class ="buttonDelete" type="submit" name="delete">Delete Project</button>
            </form>
            <form action="update.php" method="GET">
                <input type="hidden" name="userid" value="<?php echo $userid; ?>">
                <input type="hidden" name="pName" value="<?php echo $pName; ?>">
                <input type="hidden" name="pDesc" value="<?php echo $pDesc; ?>">
                <input type="hidden" name="dDate" value="<?php echo $dDate; ?>">
                <button class ="buttonUpdate" type="submit" name="update">Update Project</button>
            </form>
        <form action="addMilestone.php" method="GET">
            <input type="hidden" name="userid" value="<?php echo $userid; ?>">
            <input type="hidden" name="pName" value="<?php echo $pName; ?>">
            <input type="hidden" name="pDesc" value="<?php echo $pDesc; ?>">
            <input type="hidden" name="dDate" value="<?php echo $dDate; ?>">
            <button class ="buttonMilestone" type="submit" name="milestone">Add Milestone Date</button>
        </form>

    </div>
    <br>

</div><br>
<?php } ?>
</html>