<?php
/**
 * Created by PhpStorm.
 * User: kipta
 * Date: 12/27/2017
 * Time: 9:27 AM
 */

include('connect.php');
$userid = $_GET['userid'];
$pName = $_GET['pName'];
$pDesc = $_GET['pDesc'];
$dDate = $_GET['dDate'];

$sql = "UPDATE projecttable
        SET pName = '$pName',
        pDesc = '$pDesc',
        dDate = '$dDate'
        WHERE userid = '$userid'";
$stmt = $conn->prepare($sql);
$stmt->execute();

header("Location: BEdisplay.php");