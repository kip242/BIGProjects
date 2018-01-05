<?php
/**
 * Created by PhpStorm.
 * User: kipta
 * Date: 12/27/2017
 * Time: 9:27 AM
 */

include('connect.php');

$pId = $_GET['pId'];
$pName = $_GET['pName'];
$pDesc = $_GET['pDesc'];
$dDate = $_GET['dDate'];
$mDate = $_GET['mDate'];

echo $pId;
echo $pName;
echo $pDesc;
echo $dDate;


$sql = "UPDATE projecttable
        SET pName = '$pName',
        pDesc = '$pDesc',
        dDate = '$dDate'
        WHERE pId = '$pId'";
$stmt = $conn->prepare($sql);
$stmt->execute();



header("Location: BEdisplay.php");