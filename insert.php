<?php
/**
 * Created by PhpStorm.
 * User: kipta
 * Date: 12/12/2017
 * Time: 10:27 AM
 */

include('connect.php');

//get variables from index.php
$pId = filter_input(INPUT_GET, 'pId');
$pName = filter_input(INPUT_GET, 'pName'); //TODO change to INPUT_POST
$pDesc = filter_input(INPUT_GET, 'pDesc');
$pDesc = nl2br($pDesc, false);
$dDate = filter_input(INPUT_GET, 'dDate');

$date1 = filter_input(INPUT_GET, 'date1');
/*$date2 = filter_input(INPUT_GET, 'date2');
$date3 = filter_input(INPUT_GET, 'date3');
$date4 = filter_input(INPUT_GET, 'date4');
$date5 = filter_input(INPUT_GET, 'date5');
$date6 = filter_input(INPUT_GET, 'date6');
$date7 = filter_input(INPUT_GET, 'date7');
$date8 = filter_input(INPUT_GET, 'date8');
$date9 = filter_input(INPUT_GET, 'date9');
$date10 = filter_input(INPUT_GET, 'date10');*/
try {

    //insert data into database
    $sql = "INSERT INTO projecttable (pId, pName, pDesc, dDate)
    VALUES ('$pId', '$pName', '$pDesc', '$dDate')";
    //use exec() because no results are returned
    $conn->exec($sql);

    $result = $conn->prepare("SELECT pId FROM projecttable");
    $result->execute();
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    foreach($rows as $row){
        $pId = $row['userid'];
    }
    echo $pId;
    $sql2= "INSERT INTO datetable (pId, date1)
        VALUES ('$pId', '$date1')";
    $conn->exec($sql2);
    header("Location: BEdisplay.php");
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>


