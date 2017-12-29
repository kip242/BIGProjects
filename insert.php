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
if (!isset($date)) {$date = "";}

//get variables from index.php
$pName = filter_input(INPUT_GET, 'pName'); //TODO change to INPUT_POST
$pDesc = filter_input(INPUT_GET, 'pDesc');
$pDesc = nl2br($pDesc, false);
$dDate = filter_input(INPUT_GET, 'dDate');
$mDate = filter_input(INPUT_GET, 'date');
try {

    //insert data into database
    $sql = "INSERT INTO projecttable (pName, pDesc, dDate, mDate)
    VALUES ('$pName', '$pDesc', '$dDate', '$mDate')";
    //use exec() because no results are returned
    $conn->exec($sql);
    header("Location: BEdisplay.php");
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>


