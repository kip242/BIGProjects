<?php
/**
 * Created by PhpStorm.
 * User: kipta
 * Date: 12/12/2017
 * Time: 10:27 AM
 */

include('connect.php');

if (!isset($pName)) {$pName = "";}
if (!isset($pDesc)) {$pDesc = "";}
if (!isset($dDate)) {$dDate = "";}

//get variables from index.php
$pName = filter_input(INPUT_GET, 'pName'); //TODO change to INPUT_POST
$pDesc = filter_input(INPUT_GET, 'pDesc');
$pDesc = nl2br($pDesc, false);
$dDate = filter_input(INPUT_GET, 'dDate');


try {

    //insert data into database
    $sql = "INSERT INTO projecttable (pName, pDesc, dDate)
    VALUES ('$pName', '$pDesc', '$dDate')";
    //use exec() because no results are returned
    $conn->exec($sql);
    echo "New Project Added to the Database!";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

try {
    //SQL SELECT statement
    $result = $conn->prepare("SELECT userid, pName, pDesc, dDate FROM projecttable");
    $result->execute();
    // assign returned array elements to variables
    $rows= $result->fetchAll(PDO::FETCH_ASSOC);
}
catch(PDOException $e)
{
    echo "Table Retrieval Failed: " . $e->getMessage();
}
    $conn = null;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>Back End Insert</title>
    <link rel="stylesheet" type="text/css" href="form.css">
</head>
<br>
<h1>Project Dashboard</h1>
<?php
foreach($rows as $row){
$pName = $row['pName'];
$pDesc = $row['pDesc'];
$dDate = $row['dDate'];
?>
    <div class="project-container">
    <label>Project Owner:</label>
    <span><?php echo $pName; ?></span><br>
    <label>Project Description:</label>
    <span><?php echo $pDesc; ?> </span><br>
    <label>Project Due Date:</label>
    <span><?php echo $dDate; ?> </span><br>
        <br>
        <label>Close Project</label>
        <input type = "checkbox" name="active" value="Finish Project">
        <br>
        <br>
    <div class="progress-bar">
        <div id="myBar" class="container purple" style="height:24px;width:25%">
        </div>
    </div>
    </div><br><br><?php } ?>
</body>
</html>
