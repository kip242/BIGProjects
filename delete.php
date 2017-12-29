<?php
/**
 * Created by PhpStorm.
 * User: kipta
 * Date: 12/22/2017
 * Time: 10:04 AM
 */

include('connect.php');
$userid = $_GET['userid'];


$sql = "DELETE FROM projecttable WHERE userid  = '$userid'";
$conn->exec($sql);

echo "Project Deleted";

header("Location: BEdisplay.php");

?>











