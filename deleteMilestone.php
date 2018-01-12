<?php
/**
 * Created by PhpStorm.
 * User: v-datatu
 * Date: 1/2/2018
 * Time: 8:28 AM
 */

include('connect.php');

$pId = $_GET['pId'];
$mDate = $_GET['mDate'];


if(isset($_GET['mDate'])) {
    $sql = "DELETE FROM datetable 
        WHERE pId = :pId AND mDate = :mDate";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':pId', $pId);
    $stmt->bindParam(':mDate', $mDate);
    $stmt->execute();
}

header("Location: BEdisplay.php");