<?php
/**
 * Created by PhpStorm.
 * User: v-datatu
 * Date: 1/5/2018
 * Time: 9:31 AM
 */

include('connect.php');
session_start();
$pId = filter_input(INPUT_GET, 'pId');
$pName = filter_input(INPUT_GET, 'pName');
$pDesc = filter_input(INPUT_GET, 'pDesc');
$dDate = filter_input(INPUT_GET, 'dDate');
//$mDate = $_GET['mDate'];


$action = filter_input(INPUT_GET, 'action');

echo $action . "<br>";
echo $pId . "<br>";


switch ($action) {

    case 'delete' :
        echo $pId;
        $sql = "DELETE FROM projecttable WHERE pId  = '$pId'";
        $conn->exec($sql);
        header("Location: BEdisplay.php");
        break;

    case 'update' :



        header("Location: update.php");
        break;
}