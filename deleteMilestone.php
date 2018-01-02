<?php
/**
 * Created by PhpStorm.
 * User: v-datatu
 * Date: 1/2/2018
 * Time: 8:28 AM
 */

$userid = $_GET['userid'];
$date1 = $GET['date1'];


echo $userid . '<br>';
echo $date1;


/*$date = filter_input(INPUT_GET, 'date', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
if($date !== NULL){
    foreach($date as $key => $value){
        echo $key. ' = ' . $value . '<br>';
    }
}else {
    echo "No date to delete";
}*/
$dates = filter_input(INPUT_GET, 'date', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
//$toppings = filter_input(INPUT_GET, 'top', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
/*if ($dates !== NULL){
    foreach ($dates as $key => $value) {
        echo $key . ' = ' . $value . '<br>';
    }
    }else{
        echo 'No toppings selected';
    }*/

foreach ($dates as $date){
    echo $date;
}


/*$sql = "DELETE FROM projecttable WHERE userid  = '$userid'";
$conn->exec($sql);

echo "Project Deleted";*/

//header("Location: BEdisplay.php");