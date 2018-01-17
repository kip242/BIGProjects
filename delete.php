<?php
/**
 * Created by PhpStorm.
 * User: kipta
 * Date: 12/22/2017
 * Time: 10:04 AM
 */

include('connect.php');
$pId = $_GET['pId'];

$sql = "DELETE FROM projecttable 
        WHERE pId  = :pId";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':pId', $pId);
$stmt->execute();
$stmt->closeCursor();

header("Location: BEdisplay.php");

?>











