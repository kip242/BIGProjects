<?php
/**
 * Created by PhpStorm.
 * User: kipta
 * Date: 12/22/2017
 * Time: 10:04 AM
 */

include('connect.php');

//get pId from previous page
$pId = $_GET['pId'];


//SQL delete statement bind to prevent SQL injection
$sql = "DELETE FROM projecttable 
        WHERE pId  = :pId";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':pId', $pId);
$stmt->execute();
$stmt->closeCursor();

header("Location: BEdisplay.php");

?>











