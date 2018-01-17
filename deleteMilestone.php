<?php
/**
 * Created by PhpStorm.
 * User: v-datatu
 * Date: 1/2/2018
 * Time: 8:28 AM
 */

include('connect.php');

$dateId = array();
if(isset($_GET['milestone'])){

$pId = $_GET['pId'];
$dateId = $_GET['dateId'];
$mDate = $_GET['mDate'];


echo $pId . "<br>";
print_r($dateId) . "<br>";
echo $mDate ;
}




//header("Location: BEdisplay.php");