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
$pName = filter_input(INPUT_GET, 'pName');
$pDesc = filter_input(INPUT_GET, 'pDesc');
$pDesc = nl2br($pDesc, false);
$dDate = filter_input(INPUT_GET, 'dDate');

$dates = $_GET['mDate'];

try {

    //insert data into database
    $sql = "INSERT INTO projecttable 
                  (pId, pName, pDesc, dDate)
            VALUES 
                  (:pId, :pName, :pDesc, :dDate)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':pId', $pId);
    $stmt->bindParam(':pName', $pName);
    $stmt->bindParam(':pDesc', $pDesc);
    $stmt->bindParam(':dDate', $dDate);
    $stmt->execute();


    //get pId for each row
    $result = $conn->prepare("SELECT pId FROM projecttable");
    $result->execute();
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    foreach($rows as $row){
        $pId = $row['pId'];
    }

    //insert milestone dates into datetable based on pId
    foreach($dates as $mDate){
    $sql2= "INSERT INTO datetable 
                  (pId, mDate)
            VALUES 
                  (:pId, :mDate)";
    $stmt = $conn->prepare($sql2);
    $stmt->bindParam(':pId', $pId);
    $stmt->bindParam(':mDate', $mDate);
    $stmt->execute();
    $stmt->closeCursor();
    }
    header("Location: BEdisplay.php");
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>


