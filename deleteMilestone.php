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

echo $pId;
echo $mDate;

if(isset($_GET['mDate'])) {
    $sql = "DELETE FROM datetable WHERE pId = '$pId' AND mDate  = '$mDate' ";
    $conn->exec($sql);
}

//header("Location: BEdisplay.php");