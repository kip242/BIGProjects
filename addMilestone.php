<?php

/**
 * Created by PhpStorm.
 * User: kipta
 * Date: 12/27/2017
 * Time: 6:45 PM
 */

session_start();
include('connect.php');
$userid = $_GET['userid'];
$result = $conn->prepare("SELECT userid, pName, pDesc, dDate, mDate FROM projecttable WHERE userid = '$userid'");
$result->execute();
// assign returned array elements to variables
$rows= $result->fetchAll(PDO::FETCH_ASSOC);





/*$pName = filter_input(INPUT_GET, 'pName'); //TODO change to INPUT_POST
$pDesc = filter_input(INPUT_GET, 'pDesc');
$pDesc = nl2br($pDesc, false);
$dDate = filter_input(INPUT_GET, 'dDate');
$mDate = filter_input(INPUT_GET, 'date');*/

$milestone_date = filter_input(INPUT_GET, 'tasklist', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
if ($milestone_date === NULL){
    $milestone_date = array();
}

$action = filter_input(INPUT_GET, 'action');

switch ($action){
    case 'add':
        $_SESSION["userid"] = $userid;
        print_r($_SESSION);
        //$userid = $_GET['userid'];
        $new_date = filter_input(INPUT_GET, 'task');
        $milestone_date[] = $new_date;
}
?>


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>Milestone Add</title>
    <link rel="stylesheet" type="text/css" href="form.css">
</head>
<?php
foreach ($rows as $row){
$userid = $row['userid'];
$pName = $row['pName'];
$pDesc = $row['pDesc'];
$dDate = $row['dDate'];
$mDate = $row['mDate'];

?>
<body>
<form action="updateSQL.php" method="GET">
<div>
    <div class="project-container">

        <label>Project ID:</label>
        <span><?php echo $userid; ?></span><br>
        <label>Project Owner:</label>
        <span><?php echo $pName; ?></span><br>
        <label>Project Description:</label>
        <span><?php echo $pDesc; ?> </span><br>
        <label>Project Due Date:</label>
        <span><?php echo $dDate; ?> </span><br>
        <label>Project Milestones:</label>
        <span><?php echo $mDate; ?></span>
        <br><br>
        <h2>Add Milestone Date:</h2>
        <?php foreach( $milestone_date as $date ) :  ?>
            <input type="hidden" name="tasklist[]"
                   value="<?php echo htmlspecialchars($date);?>">
            <?php endforeach;?>
            <input type="hidden" name="action" value="add">
            <label>Add Date:</label>
            <input type="date" name="task" ><br><br>
            <button class="buttonUpdate" type="submit">Add Date</button><br>
            <br>
    </div>
</div>
</form>


</body><?php } ?>
</html>