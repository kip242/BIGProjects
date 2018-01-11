<?php
/**
 * Created by PhpStorm.
 * User: v-datatu
 * Date: 1/2/2018
 * Time: 8:28 AM
 */

include('connect.php');
$pId = $_GET['pId'];
$date =$_GET['date'];

if(isset($_GET['date'])) {
    $sql = "DELETE FROM datetable WHERE date  = '$date' ";
    $conn->exec($sql);
}

header("Location: BEdisplay.php");