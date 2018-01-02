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
    $result = $conn->prepare("SELECT userid, pName, pDesc, dDate, date1, date2, date3,
                                       date4, date5, date6, date7, date8, date9, date10 FROM projecttable");
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
    $userid = $row['userid'];
    $pName = $row['pName'];
    $pDesc = $row['pDesc'];
    $dDate = $row['dDate'];

    $date1 = $row['date1'];
    $date2 = $row['date2'];
    $date3 = $row['date3'];
    $date4 = $row['date4'];
    $date5 = $row['date5'];
    $date6 = $row['date6'];
    $date7 = $row['date7'];
    $date8 = $row['date8'];
    $date9 = $row['date9'];
    $date10 = $row['date10'];

    echo $date1;
    ?>
    <div class="project-container">
        <label class="boldLabel">Project ID:</label>
        <span><?php echo $userid; ?></span><br>
        <label class="boldLabel">Project Owner:</label>
        <span><?php echo $pName; ?></span><br>
        <label class="boldLabel">Project Description:</label>
        <span><?php echo $pDesc; ?> </span><br><br>
        <label class="boldLabel">Project Due Date:</label>
        <span><?php echo $dDate; ?> </span><br>
        <div>
            <form action="delete.php" method="GET">
                <input type="hidden" name="userid" value="<?php echo $userid; ?>">
                <button class="buttonDelete" type="submit" name="delete">Delete Project</button>
            </form>
            <form action="update.php" method="GET">
                <input type="hidden" name="userid" value="<?php echo $userid; ?>">
                <input type="hidden" name="pName" value="<?php echo $pName; ?>">
                <input type="hidden" name="pDesc" value="<?php echo $pDesc; ?>">
                <input type="hidden" name="dDate" value="<?php echo $dDate; ?>">
                <button class="buttonUpdate" type="submit" name="update">Update Project</button>
            </form>
        </div>
    </div>
    <div class="milestone-container">
        <form action="deleteMilestone.php" method="GET">
        <label class="boldLabel">Project Milestone Dates:</label><br><br>
        <div class="dateContainerLeft">
        <input type="checkbox" name="date[]" value="<?php echo $date1; ?>"><?php echo $date1; ?><br>
        <input type="checkbox" name="date[]" value="<?php echo $date2; ?>"><?php echo $date2; ?><br>
        <input type="checkbox" name="date[]" value="<?php echo $date3 ?>"><?php echo $date3 ?><br>
        <input type="checkbox" name="date[]" value="<?php echo $date4 ?>"><?php echo $date4 ?><br>
        <input type="checkbox" name="date[]" value="<?php echo $date5 ?>"><?php echo $date5 ?><br>
        </div>
        <div class="dateContainerRight">
        <input type="checkbox" name="date[]" value="<?php echo $date6 ?>"><?php echo $date6 ?><br>
        <input type="checkbox" name="date[]" value="<?php echo $date7 ?>"><?php echo $date7 ?><br>
        <input type="checkbox" name="date[]" value="<?php echo $date8 ?>"><?php echo $date8 ?><br>
        <input type="checkbox" name="date[]" value="<?php echo $date9 ?>"><?php echo $date9 ?><br>
        <input type="checkbox" name="date[]" value="<?php echo $date10 ?>"><?php echo $date10 ?><br>
        </div>
        <br><br><br><br>

            <input type="hidden" name="userid" value="<?php echo $userid; ?>">
            <!--<input type="hidden" name="date[]" value="<?php echo $date1; ?>">
            <input type="hidden" name="date[]" value="<?php echo $date2; ?>">
            <input type="hidden" name="date[]" value="<?php echo $date3; ?>">
            <input type="hidden" name="date[]" value="<?php echo $date4; ?>">
            <input type="hidden" name="date[]" value="<?php echo $date5; ?>">
            <input type="hidden" name="date[]" value="<?php echo $date6; ?>">
            <input type="hidden" name="date[]" value="<?php echo $date7; ?>">
            <input type="hidden" name="date[]" value="<?php echo $date8; ?>">
            <input type="hidden" name="date[]" value="<?php echo $date9; ?>">
            <input type="hidden" name="date[]" value="<?php echo $date10; ?>">-->
            <button class="buttonMilestone" type="submit" name="milestone" value="delete">Delete Milestone Date</button>
        </form>
    </div>
<?php } ?>
</body>
</html>

