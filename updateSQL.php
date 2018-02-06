<?php
/**
 * Created by PhpStorm.
 * User: kipta
 * Date: 12/27/2017
 * Time: 9:27 AM
 */

include('connect.php');

$pId = $_GET['pId'];
$cdiv = filter_input(INPUT_GET, 'divSelect');

$pName = $_GET['pName'];
$pDesc = $_GET['pDesc'];
$dDate = $_GET['dDate'];
$mDate = $_GET['mDate'];


$sql = "UPDATE projecttable
        SET cdiv = :cdiv,
            pName = :pName,
            pDesc = :pDesc,
            dDate = :dDate
        WHERE 
            pId = :pId";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':pId', $pId);
$stmt->bindParam(':cdiv', $cdiv);
$stmt->bindParam(':pName', $pName);
$stmt->bindParam(':pDesc', $pDesc);
$stmt->bindParam(':dDate', $dDate);
$stmt->execute();
$stmt->closeCursor();


header("Location: BEdisplay.php");