<?php
/**
 * Created by PhpStorm.
 * User: v-datatu
 * Date: 1/2/2018
 * Time: 8:28 AM
 */

$userid = $_GET['userid'];
$mDate = $_GET['date'];

$sql = "UPDATE projecttable
        SET '' = '$pName',
        pDesc = '$pDesc',
        dDate = '$dDate'
        WHERE userid = '$userid'";
$stmt = $conn->prepare($sql);
$stmt->execute();

if(isset($_GET['milestone'])){
    if(!empty($_GET['date'])){
        foreach($_GET['date'] as $selected){
            echo $selected ;
        }
    }
}

/*$date = filter_input(INPUT_GET, 'date', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
if($date !== NULL){
    foreach($date as $key => $value){
        echo $key. ' = ' . $value . '<br>';
    }
}else {
    echo "No date to delete";
}*/
//$dates = filter_input(INPUT_GET, 'date', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
//$toppings = filter_input(INPUT_GET, 'top', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
/*if ($dates !== NULL){
    foreach ($dates as $key => $value) {
        echo $key . ' = ' . $value . '<br>';
    }
    }else{
        echo 'No toppings selected';
    }*/




/*$sql = "DELETE FROM projecttable WHERE userid  = '$userid'";
$conn->exec($sql);

echo "Project Deleted";*/

//header("Location: BEdisplay.php");