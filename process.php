<?php
/**
 * Created by PhpStorm.
 * User: v-datatu
 * Date: 1/5/2018
 * Time: 9:31 AM
 */

include('connect.php');
$pId = $_GET['pId'];
$pName = $_GET['pName'];
$pDesc = $_GET['pDesc'];
$dDate = $_GET['dDate'];
$mDate = $_GET['mDate'];


$action = filter_input(INPUT_GET, 'action');

echo $action;

switch ($action) {

    case 'delete' :
        $sql = "DELETE FROM projecttable WHERE pId  = '$pId'";
        $conn->exec($sql);
        header("Location: BEdisplay.php");
        break;

    case 'update' :
        header("Location: update.php");
        break;
}