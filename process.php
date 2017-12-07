<?php
$myFile = "data.json";

//create empty array
$arrData = array();

try {
    //get form data
    $formData = array(
        'projectName'=>$_POST['pName'],
        'projectDescription'=>$_POST['pDesc'],
        'dueDate'=>$_POST['dDate']
    );
    //get info from existing JSON
    $jsonData = file_get_contents($myFile);
    
    //convert JSON into array
    $arrData = json_decode($jsonData, true);
    
    //add user data to array
    array_push($arrData, $formData);
    
    //convert updated array to JSON
    $jsonData = json_encode($arrData, JSON_PRETTY_PRINT);
    
    //write JSON to data.json file
    if(file_put_contents($myFile, $jsonData)) {
        echo 'Data Saved';
    }
    else 
        echo 'error';
}
catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
    }