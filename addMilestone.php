<?php

/**
 * Created by PhpStorm.
 * User: kipta
 * Date: 12/27/2017
 * Time: 6:45 PM
 */

include('connect.php');
$userid = $_GET['userid'];

$result = $conn->prepare("SELECT userid, pName, pDesc, dDate, mDate FROM projecttable WHERE userid = '$userid'");
$result->execute();
// assign returned array elements to variables
$rows = $result->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>Milestone Add</title>
    <link rel="stylesheet" type="text/css" href="form.css">
</head>
<?php
foreach ($rows as $row) {
    $userid = $row['userid'];
    $pName = $row['pName'];
    $pDesc = $row['pDesc'];
    $dDate = $row['dDate'];
    $mDate = $row['mDate'];

    ?>
    <body>
<form action="BEdeisplay.php" method="GET">

    <div class="project-container">

        <label>Project ID:</label>
        <span><?php echo $userid; ?></span><br>
        <label>Project Owner:</label>
        <span><?php echo $pName; ?></span><br>
        <label>Project Description:</label>
        <span><?php echo $pDesc; ?> </span><br>
        <label>Project Due Date:</label>
        <span><?php echo $dDate; ?> </span><br>
        <label>Project Milestone Dates:</label>
        <span><?php echo $mDate; ?></span>

    </div>

</form>
    </body><?php } ?>
</html>